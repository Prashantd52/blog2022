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
                            <td>
                                <div class="row ml-1">
                                    <a class="btn btn-primary" href="/categories/edit/{{$category->id}}" target="blank" title="edit category">Edit</a>&emsp;
                                    <form action="/categories/delete/{{$category->id}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger" title="Delete category">Delete</button>&emsp;
                                    </form>
                                    <a class="btn btn-info" href="/categories/show/{{$category->id}}" target="blank" title="view category" >View</a>&emsp;
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<div>
@endsection
