<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use App\Tag;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //dd($request);
        $search=$request->searchBN ?$request->searchBN : '';
        $blogs=Blog::search('name',$search)->get();
        
        return view('Blog.index',Compact('blogs','search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories=Category::all();
        $tags=Tag::all();
        return view('Blog.create_blog',compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //dd($request);
        $request->validate([
            'name'=>'required|unique:blogs,name|min:5',
            'category'=>'required',
            'content'=>'required',
        ]);
        $blog= new Blog;
        $blog->name=$request->name;
        $blog->content=$request->content;
        $blog->category_id=$request->category;

        $blog->save();
        
        $blog->tags()->sync($request->tags);
        session()->flash('success','Blog Created Succesfully');
        return redirect()->route('b_index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog,$id)
    {
        //
        $blog=Blog::where('id',$id)->withTrashed()->first();

        return view('Blog.show',compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        //dd($blog);
        $categories=Category::all();
        $tags=Tag::all();
        return view('Blog.edit',Compact('blog','categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        //
        $request->validate([

            'name'=>'required|unique:blogs,name,'.$blog->id.'|min:5',
            'category'=>'required',
            'tags'=>'required',
            'content'=>'required',
        ]);

        $blog->name = $request->name;
        $blog->category_id = $request->category;
        $blog->content = $request->content;

        $blog->save();
        $blog->tags()->sync($request->tags);

        session()->flash('success','Blog updated successfully');

        return redirect()->route('b_index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Blog $blog)
    {
        //dd($request);
        //echo "under development";
        $blog=Blog::withTrashed()->find($request->blog_id);

        //dd($blog);
        if($blog->deleted_at)
        {
            $blog->forceDelete();
            session()->flash('danger','Blog Deleted Permanently');
        }
        else
        {
            $blog->delete();
            session()->flash('danger','Blog Deleted Successfully');
        }
        return redirect()->back();

    }

    public function soft_deleted_blogs(Request $request)
    {
        $search=$request->searchBN ?$request->searchBN : '';
        $blogs=Blog::search('name',$search)->onlyTrashed()->get();
        $type="soft_deleted";

        return view('Blog.index',compact('blogs','type','search'));
    }

    public function restore_blog($id)
    {
        $blog=Blog::onlyTrashed()->where('id',$id);
        $blog->restore();

        return redirect()->route('b_index');
    }
}
