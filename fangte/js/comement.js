  //目前可用礼券ajax翻页
    $('#bonus_page').bind('click', function(e){
        var h=e.target;
        var ref=h.href;
        var url='';
        var id = $('#ticket_id').val();
        var href=$.baseurl+'product/ajaxcomment';
        if(ref.indexOf('?')=='-1'){
            url=href+'?id='+id;
        }else{
            url=href+'?'+ref.split('?')[1]+"&id="+id;
        }
        $.post(url,function(data){
            $("#all_bonus").html(data);
        });
        return false;
    });
    
    $('#comment_button').bind('click',function(){
	var comment_name = $('#comment_name').val();
	var comment_content = $('#comment_content').val();
	var authcode_content = $('#authcode_content').val();
	var id = $('#ticket_id').val();
	var bool = true;
	if(comment_name=='')
	{
	    alert('预订人不能为空');
	    return false;
	    bool = false;
	}
	if(comment_content=='')
	{
	    alert('评论内容不能为空');
	    return false;
	    bool = false;
	}
	if(authcode_content=='')
	{
	    alert('请输入验证码');
	    return false;
	    bool = false;
	}
	if(bool)
	{
	    var url = $.baseurl+'product/addcomment';
	    var data = 'id='+id+'&comment_name='+comment_name+'&comment_content='+comment_content+'&authcode_content='+authcode_content;
	    $.post(url, data, function(result){
		if(result.error)
		    alert(result.message);
		else
		{
		    alert(result.message);
		    $('#comment_name').val('');
		    $('#comment_content').val('');
		    $('#authcode_content').val('');
		}
	    }, 'json')
	}
    });