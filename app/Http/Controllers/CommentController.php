<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Auth;

class CommentController extends Controller
{
    //
    public function create($blogId)
    {
        return view('Comment.create',compact('blogId'));
    }

    public function store(Request $request)
    {
        $newComment= new Comment;
        
        $newComment->comment=$request->comment;
        $newComment->blog_id=$request->Blog_Id;
        $newComment->user_id=Auth::id();
        //dd($newComment);
        $newComment->save();

        return ['status'=>'success','data'=>$newComment];

        //return redirect()->route('b_index');
    }

    public function index()
    {
        $comments=Comment::get();

        return view('Comment.index',compact('comments'));
    }
}
