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
                    <a  class="col-md-2 btn btn-info" href="/categories/index" target="blank" title="all categories">Caregory Index</a>
                    <a  class="col-md-3 btn btn-primary" href="/categories/create" target="blank" title="create blog">Create Category</a>
                    <br>
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
