@extends('layouts.app')
@section('content')
<div class="container">
    <h3>Category List<span><a href="#" onclick="creatCategory()" title="create category">+</a></span></h3>
    <div class="row">
        <div class="col"></div>
        <div class="col-md-4">
            <form class="pt-1" action="" method="get">
                    <input type="text" placeholder="Search Category" name="searchCN" value="">&nbsp;
                    <button type="submit" class="btn btn-outline-info">Go</button>
            </form>
        </div>
    </div>
    <div id="data"></div>
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
                                    <a class="btn btn-info" href="#"  onclick="showcategory({{$category->id}})" title="view category" >View</a>&emsp;
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

<script>
    function showcategory(id)
    {
        $.ajax({
           type:'get' ,
           url:"/categories/show/"+id,
           data:{},     //when we send data in request
           success: function(response)
           {
                $("#data").html(response);
           },
           error: function(response)
           {
               alert('error occured');
           }
        });
    }

    function creatCategory()
    {
        $.ajax({
            type:'get',
            url:'/categories/create',
            success: function(response)
            {
                $("#data").html(response);
                // alert('success');
            },
            error: function(response)
            {
                alert("some error occured");
            }
        })
    }
</script>
@endsection
