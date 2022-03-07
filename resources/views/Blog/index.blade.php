@extends('layouts.app')
@section('content')
<div class="container">
    <h3>Blog List<span><a href="/blog/create" target="_blank" title="create blog">+</a></span></h3>
    <div class="row">
        <div class="col"></div>
        <div class="col-md-4">
            <form class="pt-1" action="" method="get">
                    <input type="text" placeholder="search Category" name="searchBN" value="{{$search}}">&nbsp;
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
                            <th>Category</th>
                            <th>Tags</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($blogs as $blog)
                        <tr>
                            <td>{{$blog->id}}</td>
                            <td>{{$blog->name}}</td>
                            <td>{{$blog->content}}</td>
                            <td>{{$blog->category->name}}</td>
                            <td>
                                @foreach($blog->tags as $tag)
                                <span class="badge badge-warning">{{$tag->name}}</span>
                                @endforeach
                            </td>
                            <td>
                                <div class="row ml-1">
                                    @if($blog->deleted_at)
                                        <a class="btn btn-warning" href="{{route('b_restore',$blog->id)}}" title="restore blog">Restore</a>&emsp;
                                    @else
                                        <a class="btn btn-primary" href="/blog/edit/{{$blog->id}}" target="blank" title="edit blog">Edit</a>&emsp;
                                    @endif
                                    <form action="{{route('b_delete')}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <input type="hidden" value="{{$blog->id}}" name="blog_id">
                                        <button type="submit" class="btn btn-danger" title="Delete blog">Delete</button>&emsp;
                                    </form>
                                    <a class="btn btn-info" href="/blog/show/{{$blog->id}}" target="blank" title="view blog" >View</a>&emsp;
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @if(! ($type??''))
            <a href="{{route('b_sod')}}" target="_blank">view deleted blogs</a>
        @endif
    </div>
<div>
@endsection
