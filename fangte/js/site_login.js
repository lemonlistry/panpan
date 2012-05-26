//登陆
function SubMit(){
    var username  = $('#username').val();
    var password = $('#password').val();
    var yzm = $('#captcha').val();
    var isSaveUsername = 0;
    $("[name='isSaveUsername']:checked").each(function(){ if ($(this).attr("checked")) { isSaveUsername=1;}})
    var bool = true;
    if(username == '' ){
        alert('用户名不能为空');
        bool =false;
        return false;
    }
    if(password == ''){
        alert('密码不能为空');
        bool = false;
        return false;
    }
    if(yzm==''){
        alert('验证码不能为空');
        bool = false;
        return false;
    }
    if(bool){
        var data = 'username='+username+"&password="+password+"&Authcode="+yzm+"&isSaveUsername="+isSaveUsername;
        var url = $.adminurl+'default/LoginIn';
        $.post(url,data,function(result){
            if(result == '-1'){
                alert('验证码不正确,请重新输入');
                 bool = false;
                return false;
            }else if(result == '-2'){
                alert('用户名或密码不对,请重新输入');
                bool = false;
                return false;
            }else{
                location.href=$.adminurl+'default/view';
            }
            
        })
    }
    
}

//刷新验证码
function captchaImage(){
      $('#authcode').attr('src',$.adminurl+'default/authcode?rand='+Math.random()+'&ac='+Math.random());
}