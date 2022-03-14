@extends('layouts.app')
@section('content')
<div class="container">
    <h3>Blog List<span><a href="/blog/create" target="_blank" title="create blog">+</a></span></h3>
    <div class="row">
        <div class="col"></div>
        <div class="col-md-4">
            <form class="pt-1" action="" method="get">
                    <input type="text" placeholder="Search Blog" name="searchBN" value="{{$search}}">&nbsp;
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
                        <tr id="blog{{$blog->id}}">
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
                                    <a class="btn btn-info" href="{{route('b_show',$blog->slug)}}" target="_blank" title="view blog" {{--data-toggle="modal" data-target="#exampleModal"  onclick="viewblog('{{$blog->slug}}')"--}}>View</a>&emsp;
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{$blogs->links()}}
        </div>
        @if(! ($type??''))
            <a href="{{route('b_sod')}}" target="_blank">view deleted blogs</a>
        @endif
    </div>
<div>

<!-- Scrollable modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">View Blog</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="blog_data">
        
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>
<script>
    function viewblog(slug)
    {
        //alert(slug);

        $.ajax({
            type:'get',
            url:'/blog/show/'+slug,
            success: function(response)
            {
                $("#blog_data").html(response);
            },
            error: function(response)
            {
                alert("error occured");
            }
        });
    }
</script>
@endsection
