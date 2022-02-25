<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tags=Tag::all();
        return view('Tag.tag_index',compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('Tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required',
        ]);

        $tag=new Tag;
        $tag->name=$request->name;
        $tag->description=$request->description;

        $tag->save();

        session()->flash('success','Tags created successfull');
        return redirect('tags/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag,$id)
    {
        $tag=Tag::find($id);
        return view('Tag.tag_show',Compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag,$id)
    {
        $tag=Tag::where('id',$id)->first();
        return view('Tag.tag_edit',compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag,$id)
    {
        //
        $request->validate([
            'name'=>'required',
            'description'=>'required',
        ]);
        
        $tag=Tag::where('id',$id)->first();
        $tag->name=$request->name;
        $tag->description=$request->description;

        $tag->save();

        //$tag=Tag::where('id',$id)->update(['name'=>$request->name,'description'=>$request->description]);

        session()->flash('success','Tag updated Succesfully!');
        return redirect('tags/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag,$id)
    {
        //
        $tag=Tag::where('id',$id)->first();

        $tag->delete();

        session()->flash('danger','Tag deleted succesfully');
        return redirect()->back();
    }
}
