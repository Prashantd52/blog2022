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
        $comment= new Comment;
        //dd($comment);
        $comment->comment=$request->comment;
        $comment->blog_id=$request->Blog_Id;
        $comment->user_id=Auth::id();
        //dd($comment);
        $comment->save();

        return redirect()->route('b_index');
    }

    public function index()
    {
        $comments=Comment::get();

        return view('Comment.index',compact('comments'));
    }
}
