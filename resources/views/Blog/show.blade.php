@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card">
        <h3 class="m-2">Show Blog</h3>
        <div class="card-body"> 
            <div class="card-body">
                <div class="row">
                    <label >Title</label>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                    <input type="text" class="form-control col-md-5 " value="{{$blog->name}}" name="name" placeholder="title of the blog" readonly> 
                </div>
                <br><br>
                <div class="row">
                    <label>Category</label>&emsp;&emsp;&emsp;&emsp;&emsp;
                    <input type="text" class="form-control col-md-5 " value="{{$blog->category->name}}" name="category" placeholder="Category of the blog" readonly> 
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
                    <textarea class="form-group col-md-5" name="content" placeholder="write content here" readonly>{{$blog->content}}</textarea>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection