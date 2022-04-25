<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $categories=Category::all();

        return ["status"=>"sucsess","mesaage"=>"list of categories","categories"=>$categories];
    }

    public function show(Request $request)
    {

        $category=Category::where('id',$request->id)->first();

        //$blog->category_id;
        if($category)
            return ["status"=>"sucsess","mesaage"=>"categorie","data"=>$category];
        else
            return ["status"=>"error","mesaage"=>"categorie not found"];
    }

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

        return ["status"=>"sucsess","mesaage"=>"categorie saved succesfuly","data"=>$category];

    }
}
