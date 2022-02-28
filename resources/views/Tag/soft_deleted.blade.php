@extends('layouts.app')
@section('content')
<div class="container">
    <h3>Shoft deleted Tag<span></h3>
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
                        @foreach($tags as $tag)
                        <tr>
                            <td>{{$tag->id}}</td>
                            <td>{{$tag->name}}</td>
                            <td>{{$tag->description}}</td>
                            <td>{{$tag->created_at}}</td>
                            <td>
                                <div class="row ml-1">
                                    <a class="btn btn-warning" href="/tags/restore/{{$tag->id}}"  title="restore tag">Restore</a>&emsp;
                                    <a class="btn btn-danger" href="/tags/delete/{{$tag->id}}" title="Delete tag">Delete</a>&emsp;
                                    <a class="btn btn-info" href="/tags/show/{{$tag->id}}" target="blank" title="view tag" >View</a>&emsp;
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
