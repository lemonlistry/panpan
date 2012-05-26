//读取cookies函数  此处勿动
function getCookie(name){ 
var arr = document.cookie.match(new RegExp("(^| )"+name+"=([^;]*)(;|$)")); 
if(arr != null) 
return unescape(arr[2]); 
return null; 
} 
//以上内容勿动

// 判断是否已经登录
if(getCookie("pt_username")){//判断是否登录 登录则向下 没有登录转到下面
var sodu_keyword=["baidu","booksky","sodu"]; //来路判断，即访问来路中包含这个关键词
var sodu_refer=document.referrer;
var sodu_tan="0";  //判断初始值

for (var i = 0; i < sodu_keyword.length; i++) {
if (sodu_refer.indexOf(sodu_keyword[i]) > -1) {sodu_tan="1";break;}   //如果来路中存在这个关键词 则改变初始值
}
//如果初始值没有改变 即弹出
if (sodu_tan=="0")
{
var expDays_265 = 1;
var exp_265 = new Date();
exp_265.setTime(exp_265.getTime() + (expDays_265*5*60*1000)); //设置时间 5*60*1000 即为5分钟  每分钟60秒 每秒1000毫秒
document.cookie = "is_use_cookie=yes" + "; expires=" + exp_265.toGMTString() +  "; path=/";
if(document.cookie.indexOf('ttt') == -1)
{

//弹窗开始
r = 5;//随机数的范围  即循环显示多少广告
var seed = Math.random();
rnd = Math.ceil(seed * r); //这5行产生随机数

switch (rnd) {

case 1:
//广告代码
document.writeln("<img src=\"/images/adpic/250X250.gif\" height=\"250\" width=\"250\">");

  break;

case 2:
//广告代码
document.writeln("<img src=\"/images/adpic/250X250.gif\" height=\"250\" width=\"250\">");

  break;

case 3:

document.writeln("<img src=\"/images/adpic/250X250.gif\" height=\"250\" width=\"250\">");

  break;

case 4:
document.writeln("<img src=\"/images/adpic/250X250.gif\" height=\"250\" width=\"250\">");

  break;

case 5:
document.writeln("<img src=\"/images/adpic/250X250.gif\" height=\"250\" width=\"250\">");

  break;
  
} 

document.cookie = "ttt" + "; expires=" + exp_265.toGMTString() +  "; path=/; ";
}else{
document.writeln(" ");
}



}

}else{
//下面为没有登录的 注释略
var sodu_keyword=["baidu","booksky","sodu"];
var sodu_refer=document.referrer;
var sodu_tan="0";

for (var i = 0; i < sodu_keyword.length; i++) {
if (sodu_refer.indexOf(sodu_keyword[i]) > -1) {sodu_tan="1";break;}
}
if (sodu_tan=="0")
{

r = 5;//随机数的范围
var seed = Math.random();
rnd = Math.ceil(seed * r); //这5行产生随机数

switch (rnd) {

case 1:
document.writeln("<img src=\"/images/adpic/250X250.gif\" height=\"250\" width=\"250\">");
  break;
case 2:
document.writeln("<img src=\"/images/adpic/250X250.gif\" height=\"250\" width=\"250\">");
  break;
case 3:
document.writeln("<img src=\"/images/adpic/250X250.gif\" height=\"250\" width=\"250\">");
  break;
case 4:
document.writeln("<img src=\"/images/adpic/250X250.gif\" height=\"250\" width=\"250\">");
  break;
case 5:
document.writeln("<img src=\"/images/adpic/250X250.gif\" height=\"250\" width=\"250\">");
  break;  
} 
}

}