
<input name="Blog_Id" type="hidden" value="{{$blogId}}" id="blog_id">
<div class="col-md-12  form-group ">
    <label> comment : </label>
    <textarea class="form-control" placeholde="enter comment here" name="comment" id="blog_comment"></textarea>
</div>
<button class="btn btn-success" type="btn" title="add comment" onclick="comment_save()" data-dismiss="modal">Submit</button>

<script>
function comment_save()
{
    var userId="{{$user_id ?? ''}}";
    var blog_id=$("#blog_id").val();
    var blogComment=$('#blog_comment').val();
    console.log('blogId-'+blog_id+',blog-comment:-'+blogComment+',user_id-'+userId);

    // alert('blogId-'+blog_id+',blog-comment:-'+blogComment+',user_id-'+userId);
    $.ajax({
        type:'post',
        url:'/api/save_comment',
        data:{
            _token: "{{csrf_token}}",
            comment: blogComment,
            blogId: blog_id,
            userId: userId,
        },
        success: function(response)
        {
            console.log(response);
            alert(response.message);
            if(response.status=='success')
            {
                var listComment="<li>"+response.data.comment+"</li>";
                $("#comment_list").prepend(listComment);
            }
                
        },
        error: function(response)
        {
            //console.log(response);
            alert('some error occured');
        }
    })

}    
</script>
    