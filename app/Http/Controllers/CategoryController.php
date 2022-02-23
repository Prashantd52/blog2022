<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search=$request->searchCN?$request->searchCN:'';
        //dd($search);
        $categories=Category::get();
        //dd($categories);
        return view('Category.category_index')->withCategories($categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Category.category_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            'name'=>'required|unique:categories,name',
            'description'=>'required',
        ]);

        $category= new Category;
        $category->name=$request->name;
        $category->description=$request->description;
        $category->save();
        
        session()->flash('success','Category created succesfully');
        return redirect('/categories/index');
        //dd($category);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category,$id)
    {
        //
        $category=Category::where('id',$id)->first();

        return view('Category.category_show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category, $id)
    {
        //$category=Category::find($id);
        $category=Category::where('id',$id)->first();
         //dd($category);
        return view('Category.category_edit',Compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
        $category=Category::where('id',$request->id)->first();
        $category->name=$request->name;
        $category->description=$request->description;

        $category->save();

        return redirect('/categories/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category,$id)
    {
        //
        $category=Category::find($id);
        $category->delete();
        session()->flash('danger','Category Deleted Successfully!');
        return redirect('categories/index');
    }
}
