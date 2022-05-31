<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    //

    public function store_comment(Request $request)
    {

        $request->commen;
        if(!$request->comment)
        {
            return ['status'=>'error','message'=>'comment field is empty'];
        }
        if(!$request->blogId)
        {
            return ['status'=>'error','message'=>'blog Id required'];
        }

        $newComment= new Comment;

        $newComment->comment = $request->comment;
        $newComment->blog_id = $request->blogId;
        $newComment->user_id = $request->userId;

        $newComment->save();

        return ['status'=>'success','message'=>'comment added successfully','data'=>$newComment];
        // dd($newComment);
    }

    private function validate_user(Request $request)
    {
        DB::table('table_name')->where('conenction_id',$request->connection_id)->where('auth_code',$request->auth_code)->first();
    }
}
