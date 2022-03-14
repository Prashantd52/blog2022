@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>blog_id</th>
                    <th>User_id</th>
                    <th>Comment</th>
                </tr>
            </thead>
            <tbody>
                @foreach($comments as $comment)
                <tr>
                    <td>{{$comment->id}}</td>
                    <td>{{$comment->blog_id}}</td>
                    <td>{{$comment->user_id}}</td>
                    <td>{{$comment->comment}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection