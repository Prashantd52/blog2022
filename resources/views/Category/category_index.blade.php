@extends('layouts.app')
@section('content')
<div class="container">
    <h3>Category List<span><a href="/categories/create" target="_blank" title="create category">+</a></span></h3>
    <div class="row">
        <div class="col"></div>
        <div class="col-md-4">
            <form class="pt-1" action="" method="get">
                    <input type="text" placeholder="Search Category" name="searchCN" value="">&nbsp;
                    <button type="submit" class="btn btn-outline-info">Go</button>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="table ">
                <table class="table table-bordered ">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Decription</th>
                            <th>Blogs</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->description}}</td>
                            <td>
                            @foreach($category->blogs as $blog)  
                                <span class="badge badge-success">{{$blog->name}}</span>
                            @endforeach
                            </td>
                            <td>
                                <div class="row ml-1">
                                    @if(Auth::user())
                                    <a class="btn btn-primary" href="/categories/edit/{{$category->id}}" target="blank" title="edit category">Edit</a>&emsp;
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
        <a href="/categories/shoft_deleted" target="_blank">view deleted categories</a>
    </div>
<div>
@endsection
