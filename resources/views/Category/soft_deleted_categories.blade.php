@extends('layouts.app')
@section('content')
<div class="container">
    <h3>Category List<span> / Soft Deleted</span></h3>
    
    <div class="card">
        <div class="card-body">
            <div class="table ">
                <table class="table table-bordered ">
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
                                    @if(Auth::user())     
                                    <a href="/categories/restore/{{$category->id}}" class="btn btn-warning" >restore</a>&emsp;
                                    <form action="/categories/delete/{{$category->id}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger" title="Delete category">Delete</button>&emsp;
                                    </form>
                                    @endif
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
