@extends('layouts.app')
@section('content')
<div class="container">
<div class="card">
    <div class="card-body">
        <h3 >Comments<a href="#" id="create_comment" title="create comment" onclick="create_coomment()">+</a></h3>
        <div id="createdata"></div>
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>blog_id</th>
                    <th>User_id</th>
                    <th>Comment</th>
                </tr>
            </thead>
            <tbody id="comment_list">
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
</div>
<script>
function create_coomment(){
       
var blog_id=2;
    //alert('create Comment');
    $.ajax({
        type:'GET',
        url:'/comment/create/'+blog_id,
        success: function(response)
        {
            $("#createdata").html(response);
        }
    })
}

function comment_save()
{
    var blod_id=$("#blog_id").val();
    var comment=$("#comment").val();
    console.log(blod_id,comment);

    $.ajax({
        type:'POST',
        url:"{{route('s_comment')}}",
        data:{
            _token:"{{csrf_token()}}",
            comment:comment,
            Blog_Id:blod_id,
        },
        success: function(response)
        {
            console.log(response);
            $("#createdata").empty();
            $newCommentrow='<tr><td>'+response.data.id+'</td><td>'+response.data.blog_id+'</td><td>'+response.data.user_id+'</td><td>'+response.data.comment+'</td></tr>';

            $("#comment_list").append($newCommentrow);
        },
        error:function(response)
        {
            console.log(response);
            alert('some error occured');
        }
    })
}
</script>
@endsection