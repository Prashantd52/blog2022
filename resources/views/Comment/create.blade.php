
<input name="Blog_Id" type="hidden" value="{{$blogId}}" id="blog_id">
<div class="col-md-12  form-group ">
    <label> comment :</label>
    <textarea class="form-control" placeholde="enter comment here" name="comment" id="blog_comment"></textarea>
</div>
<button class="btn btn-success" type="btn" title="add comment" onclick="comment_save()" data-dismiss="modal">Subbmit</button>

    