<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        // $blogs=Blog::search('name',$search)->get();
        $blogs=Blog::search('name',$search)->paginate(10);
        
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

        $blog->file_path=$this->add_media($request->file('image'));
        $slug=str_replace(' ','$',strtolower($request->name));
        $random=Str::random(5);
        
        $blog->slug=$slug.$random;
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
    public function show($slug)
    {
        //
        $blog=Blog::where('slug',$slug)->withTrashed()->first();
        if($blog)
            return view('Blog.show',compact('blog'));
        else
        {
            session()->flash('warning','Blog not found');
            return redirect()->route('b_index');
        }
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

        if($request->file('image'))
        {
            $result=$this->delete_image($blog->id);
            $blog->file_path=$this->add_media($request->file('image'));
        }
        $slug=str_replace(' ','$',strtolower($request->name));
        $random=Str::random(5);
        $blog->slug=$slug.$random;

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
        $blogs=Blog::search('name',$search)->onlyTrashed()->paginate(10);
        $type="soft_deleted";

        return view('Blog.index',compact('blogs','type','search'));
    }

    public function restore_blog($id)
    {
        $blog=Blog::onlyTrashed()->where('id',$id);
        $blog->restore();

        return redirect()->route('b_index');
    }

    public function add_media($file)
    {
        $tempName=time();
        $extension=$file->getClientOriginalExtension();
        $fileName=$tempName.'.'.$extension;
        // $path = $file->storeAs('public/Blog',$fileName);
        //$path = $file->move(base_path('Blog'),$fileName);
        //$path = $file->move(public_path('Blog'),$fileName);
        $path = $file->move('Blog',$fileName);
        return $path;
    }

    public function delete_image($id)
    {
        $blog=Blog::findOrFail($id);

        $filename = public_path($blog->file_path);
        unlink($filename);

        $blog->file_path="";
        $blog->save();

        return redirect()->back();
    }
}
