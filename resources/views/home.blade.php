@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <br>
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <a  class="col-md-2 btn btn-info" href="/categories/index" target="blank" title="all categories">Categories</a> 
            <a  class="col-md-2 btn btn-primary" href="/tags/index" target="blank" title="all tags">Tags</a>
            <a  class="col-md-2 btn btn-success" href="{{route('b_index')}}" target="blank" title="all tags">Blogs</a>
            <a  class="col-md-2 btn btn-secondary" href="{{route('i_comment')}}" target="blank" title="all tags">Comments</a>
        </div>
    </div>
</div>
@endsection
