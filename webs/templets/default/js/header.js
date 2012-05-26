//设为首页
function SetHome(obj){
var url=window.location.href;
try{
obj.style.behavior='url(#default#homepage)';obj.setHomePage(url);
}
catch(e){
if(window.netscape) {
try {
netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");
}
catch (e) {
alert("此操作被浏览器拒绝！\n请在浏览器地址栏输入“about:config”并回车\n然后将 [signed.applets.codebase_principal_support]的值设置为'true',双击即可。");
}
var prefs = Components.classes['@mozilla.org/preferences-service;1'].getService(Components.interfaces.nsIPrefBranch);
prefs.setCharPref('browser.startup.homepage',url);
}
}
}
//添加到收藏夹
function AddFavorite()
{
var url=window.location.href;
try
{
window.external.addFavorite(url, "****");
}
catch (e)
{
try
{
window.sidebar.addPanel("****", url, "");
}
catch (e)
{
alert("加入收藏失败，请使用Ctrl+D进行添加");
}
}
}

function addfavor(url,title) {
if(confirm("网站名称："+title+"\n网址："+url+"\n确定添加收藏?")){
var ua = navigator.userAgent.toLowerCase();
if(ua.indexOf("msie 8")>-1){
external.AddToFavoritesBar(url,title,'IT有道');//IE8
}else{
try {
window.external.addFavorite(url, title);
} catch(e) {
try {
window.sidebar.addPanel(title, url, "");//firefox
} catch(e) {
alert("加入收藏失败，请使用Ctrl+D进行添加");
}
}
}
}
return false;
}
