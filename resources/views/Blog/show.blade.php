@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">
        {{--<h3 class="m-2">Show Blog</h3>--}}
        <div class="card-body"> 
            <div class="card-body row">
                <div class="col-8">
                    <div class="row">
                        <label >Title</label>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                        <input type="text" class="form-control col-md-7 " value="{{$blog->name}}" name="name" placeholder="title of the blog" readonly> 
                    </div>
                    <br><br>
                    <div class="row">
                        <label>Category</label>&emsp;&emsp;&emsp;&emsp;&emsp;
                        <input type="text" class="form-control col-md-7 " value="{{$blog->category->name}}" name="category" placeholder="Category of the blog" readonly> 
                    </div>
                        <br>
                    <div class="row">
                        <label>Tags</label>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                        @foreach($blog->tags as $tag)
                            <span class="badge badge-light">{{$tag->name}}</span>
                        @endforeach
                    </div><br>
                    <div class="row">
                        <label>Content</label>&emsp;&emsp;&emsp;&emsp;&emsp;
                        <textarea class="form-group col-md-7" name="content" placeholder="write content here" readonly>{{$blog->content}}</textarea>
                    </div>
                </div>
                <div class="col-4">
                    <img src="{{asset($blog->file_path)}}"width="200" height="auto" alt="blog image">
                </div>
            </div>
        </div>
        <a class="btn btn-success col-md-3" href="#" {{--target="_blank"--}} title="add comment" data-toggle="modal" data-target="#exampleModal" onclick="create_comment({{$blog->id}},'{{$blog->name}}')">Comment</a>
        <div >
            <ul id="comment_list">
                @foreach($blog->comments as $tempcomment)
                    <li>{{$tempcomment->comment}}</li>
                @endforeach

            </ul>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ADD Comment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modal_body">
        ADD COMMENT
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>

<script>
function create_comment(blogId,name)
{
    // alert("hello");
    $.ajax({
        type: 'get',
        url: '/comment/create/'+blogId,
        // data:{

        // },
        success: function(response)
        {
            console.log(response);
            $("#modal_body").html(response);
            $("#exampleModalLabel").html(name);
        },
        error: function(response)
        {
            console.log(response);
            alert("some_error_occured");
        }

    });
}  


</script>
@endsection

