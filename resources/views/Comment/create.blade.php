@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="col"></div>
        <form action="{{route('s_comment')}}" method="post">
            @csrf()
            @method('post')
            <input name="Blog_Id" type="hidden" value="{{$blogId}}">
            <div class="col-md-6  form-group ">
                <label> comment :</label>
                <textarea class="form-control" placeholde="enter comment here" name="comment"></textarea>
            </div>
            <button class="btn btn-success" type="submit" title="add comment">Subbmit</button>
        </form>
        <div class="col"></div>
    </div>
</div>
@endsection