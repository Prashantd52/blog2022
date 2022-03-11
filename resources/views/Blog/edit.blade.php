@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card">
        <h3 class="m-2">Edit Blog</h3>
        <div class="card-body">
            <form action="{{route('b_update',$blog->id)}}" method="post" enctype="multipart/form-data">
                @csrf()
                @method('put')
                <div class="card-body row">
                    <div class="col-8">
                        <div class="row">
                            <label >Title</label>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                            <input type="text" class="form-control col-md-7 " value="{{$blog->name}}" name="name" placeholder="title of the blog">
                            @error('name')
                                <span class='text-danger'>{{$message}}</span>
                            @enderror
                        </div>
                        <br><br>
                        <div class="row">
                            <label>Choose Categories</label>&emsp;
                            <select class=" js-example-basic-single form-select col-5" name="category"  aria-label="Default select example">
                                <option selected disabled>---select category---</option>  
                                @foreach($categories as $category)
                                <option @if($blog->category_id == $category->id) selected @endif
                                value="{{$category->id}}">{{$category->name}}
                                </option>  
                                @endforeach
                            </select>             
                            @error('category')
                            <span class='text-danger'>{{$message}}</span>
                            @enderror 
                        </div>
                            <br>
                        <div class="row">
                            <label>Choose Tags</label>&emsp;&emsp;&emsp;&emsp;
                            <select class="js-example-basic-multiple form-select col-md-7" name="tags[]" multiple="multiple"   aria-label="Default select example">
                                <option disabled>---select tags---</option>
                                @foreach($tags as $tag)
                                    <option 
                                        @foreach($blog->tags as $blogtag)
                                            @if($blogtag->id == $tag->id) selected @endif    
                                        @endforeach
                                        value="{{$tag->id}}">{{$tag->name}}
                                    </option>  
                                @endforeach
                            </select>              
                            @error('tags')
                                <span class='text-danger'>{{$message}}</span>
                            @enderror
                        </div><br>
                        <div class="row">
                            <label>Content</label>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                            <textarea class="form-group col-md-7" name="content" placeholder="write content here">{{$blog->content}}</textarea>
                            @error('content')
                                <span class='text-danger'>{{$message}}</span>
                            @enderror
                        </div>
                        <div class="row">
                            <label>Add Image</label>&emsp;&emsp;&emsp;&emsp;
                            <input type="file" name="image" >
                        </div>
                    </div>
                    <div class="col-4">
                        @if($blog->file_path)
                            <img src="{{asset($blog->file_path)}}"width="200" height="auto" alt="blog image">
                            <a class="btn btn-outline-danger" href="{{route('b_d_image',$blog->id)}}">Delete Image</a>
                        @endif
                    </div>
                </div>
                <button class="btn btn-success" type="submit">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection