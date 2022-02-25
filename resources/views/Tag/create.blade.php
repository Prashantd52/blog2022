@extends('layouts.app')
@section('content')
<div class="container">
    <h3>Create Tags</h3>
    <div class="card">
        <div class="card-body">
            <form action="/tags/store" method="post">
                @csrf
                @method('post')
                <div class="row form-group">
                    <lable class="col-md-2" >Tag Name</lable>
                    <input  class=" col-md-4 form-control "type="text" name="name" placeholder="tag name" required>
                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="row form-group">
                    <lable class="col-md-2" >Tag Description</lable>
                    <textarea class=" col-md-4 form-control "type="text" name="description" placeholder="tag description" ></textarea>
                    @error('description')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-info">Save</button>
            </form>
        </div>
    </div>
<div>
@endsection
