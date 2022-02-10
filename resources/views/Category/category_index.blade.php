@extends('layouts.app')
@section('content')
<div class="container">
    <h3>Category List</h3>
    <div class="card">
        <div class="card-body">
            <div class="table table-bordered ">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Decription</th>
                            <th>Created at</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->description}}</td>
                            <td>{{$category->created_at}}</td>
                            <td>edit</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<div>
@endsection
