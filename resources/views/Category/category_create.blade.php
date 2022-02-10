@extends('layouts.app')
@section('content')
<div class="container">
    <h3>Create Category</h3>
    <div class="card">
        <div class="card-body">
            <form action="/categories_store" method="post">
                @csrf
                @method('post')
                <div class="row form-group">
                    <lable class="col-md-2" >Category Name</lable>
                    <input  class=" col-md-4 form-control "type="text" name="name" placeholder="category name" required>
                </div>
                <div class="row form-group">
                    <lable class="col-md-2" >Category Description</lable>
                    {{--<input  class=" col-md-4 form-control "type="text" name="description" placeholder="category description" required>--}}
                    <textarea class=" col-md-4 form-control "type="text" name="description" placeholder="category description" ></textarea>
                </div>
                <button class="btn btn-info">Save</button>
            </form>
        </div>
    </div>
<div>
@endsection
