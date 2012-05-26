$('#sendmessage').bind('click',function(){
   var username = $('#username').val();
   var mobile = $('#mobile').val();
   var title = $('#title').val();
   var content = $('#messagecontent').val();
   var bool = true;
   if(username=='')
   {
       alert('留言人不能为空');
       bool = false;
       return false;
   }
   if(mobile == '')
   {
       alert('联系方式不能为空');
       bool = false;
       return false;
   }else{
       if(isNaN(mobile)){
            alert('请填写正确的联系方式');
           bool = false;
           return false;
       }
   }
   if(title ==''){
        alert('留言标题不能为空');
       bool = false;
       return false;
   }
   if(content ==''){
        alert('留言内容不能为空');
       bool = false;
       return false;
   }
   if(bool){
       var url = $.baseurl+'product/addmessage';
       var data = 'username='+username+'&mobile='+mobile+'&title='+title+'&content='+content;
       $.post(url,data,function(result){
           alert(result.message);
           if(!result.error){
                $('#username').val('');
                $('#mobile').val('');
                $('#title').val('');
                $('#messagecontent').val('');
           }
       },'json');
   }
});