@extends('layouts.app')
@section('content')
<div class="container">
    <h3>Tag Show</h3>
    <div class="card">
        <div class="card-body">
            <div class="row form-group">
                <lable class="col-md-2" >Tag Name</lable>
                <input  class=" col-md-4 form-control "type="text" name="name" value="{{$tag->name}}" placeholder="tag name" readonly>
            </div>
            <div class="form-group">
                <h5>Tag Description</h5>
                <p>{{$tag->description}}</p>
            </div>
                
        </div>
    </div>
<div>
@endsection
