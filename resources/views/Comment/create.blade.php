
<div class="card">
    <div class="card-body">
        <div class="col"></div>
            <input name="Blog_Id" type="hidden" value="{{$blogId}}" id="blog_id">
            <div class="col-md-6  form-group ">
                <label> comment :</label>
                <textarea class="form-control" placeholde="enter comment here" name="comment" id="comment"></textarea>
            </div>
            <button class="btn btn-success" type="btn" title="add comment" onclick="comment_save()">Subbmit</button>
        <div class="col"></div>
    </div>
</div>
