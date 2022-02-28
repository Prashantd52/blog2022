@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card">
        <h3 class="m-2">New Blog</h3>
        <div class="card-body">
            <form action="{{route('b_store')}}" method="post">
                @csrf()
                @method('post')
                <div class="card-body">
                    <div class="row">
                        <label >Title</label>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                        <input type="text" class="form-control col-md-5 " name="name" placeholder="title of the blog">
                        @error('name')
                            <span class='text-danger'>{{$message}}</span>
                        @enderror
                    </div>
                    <br><br>
                    <div class="row">
                        <label>Choose Categories</label>&emsp;
                        <select class="form-select col-5" name="category"  aria-label="Default select example">
                            <option selected disabled>---select category---</option>  
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>  
                            @endforeach
                        </select>             
                    </div>
                        @error('category')
                            <span class='text-danger'>{{$message}}</span>
                        @enderror 
                        <br>
                    <div class="row">
                        <label>Choose Tags</label>&emsp;&emsp;&emsp;&emsp;
                        <select class=" form-select col-5" name="tags"  aria-label="Default select example">
                            <option selected disabled>---select tags---</option>
                            @foreach($tags as $tag)
                            <option value="{{$tag->id}}">{{$tag->name}}</option>  
                            @endforeach
                        </select>              
                    </div><br>
                        @error('tags')
                            <span class='text-danger'>{{$message}}</span>
                        @enderror
                    <div class="row">
                        <label>Content</label>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                        <textarea class="form-group col-md-5" name="content" placeholder="write content here"></textarea>
                    </div>
                </div>
                <button class="btn btn-success" type="submit">Create</button>
            </form>
        </div>
    </div>
</div>
@endsection