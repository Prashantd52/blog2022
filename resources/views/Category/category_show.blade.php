@extends('layouts.app')
@section('content')
<div class="container">
    <h3>Show Category</h3>
    <div class="card">
        <div class="card-body"> 
            <div class="row form-group">
                <lable class="col-md-2" >Category Name</lable>
                <input  class=" col-md-4 form-control " value="{{$category->name}}"type="text" name="name" placeholder="category name" readonly required>
            </div>
            <div class="row form-group">
                <lable class="col-md-2" >Category Description</lable>
                <textarea class=" col-md-4 form-control "type="text" name="description" placeholder="category description" readonly >{{$category->description}}</textarea>
            </div>     
        </div>
    </div>
<div>
@endsection
