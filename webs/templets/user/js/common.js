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
if(confirm("网站名称："+title+"\n网址："+url+"\n确定添加收藏？")){
var ua = navigator.userAgent.toLowerCase();
if(ua.indexOf("msie 8")>-1){
external.AddToFavoritesBar(url,title,'小说阅读');//IE8
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

function novalue() {
	alert("您好，该功能暂未开放！");
}

function redirect(url)
{
	if(url.lastIndexOf('/.') > 0)
	{
		url = url.replace(/\/(\.[a-zA-Z]+)([0-9]+)$/g, "/$2$1");
	}
	else if(url.match(/\/([a-z]+).html([0-9]+)$/)) {
		url = url.replace(/\/([a-z]+).html([0-9]+)$/, "/$1-$2.html");
	}
	else if(url.match(/-.html([0-9]+)$/)) {
		url = url.replace(/-.html([0-9]+)$/, "-$1.html");
	}

	if(url.indexOf('://') == -1 && url.substr(0, 1) != '/' && url.substr(0, 1) != '?') url = $('base').attr('href')+url;
	location.href = url;
}

function confirmurl(url,message)
{
	if(confirm(message)) redirect(url);
}

function confirmform(form,message)
{
	if(confirm(message)) form.submit();
}

function a(obj)
    {   
        var cks = document.getElementsByTagName("input");
        var a = document.getElementById(obj);
        for(var i =0;i<cks.length-1;i++)
        {
            if(cks[i].type == "checkbox")
            {
                cks[i].checked = a.checked ;
            }
        }
    }

function checkall(fieldid)
{
	if(fieldid==null)
	{
		if($('#checkbox').attr('checked')==false)
		{
			$('input[type=checkbox]').attr('checked',true);
		}
		else
		{
			$('input[type=checkbox]').attr('checked',false);
		}
	}
	else
	{
		var fieldids = '#'+fieldid;
		var inputfieldids = 'input[boxid='+fieldid+']';
		if($(fieldids).attr('checked')==false)
		{
			$(inputfieldids).attr('checked',true);
		}
		else
		{
			$(inputfieldids).attr('checked',false);
		}
	}
}

function checkradio(radio)
{
	var result = false;
	for(var i=0; i<radio.length; i++)
	{
		if(radio[i].checked)
		{
			result = true;
			break;
		}
	}
    return result;
}

function checkselect(select)
{
	var result = false;
	for(var i=0;i<select.length;i++)
	{
		if(select[i].selected && select[i].value!='' && select[i].value!=0)
		{
			result = true;
			break;
		}
	}
    return result;
}

function ptCheckAll(e, itemName)
{
  var aa = document.getElementsByName(itemName);
  for (var i=0; i<aa.length; i++)
   aa[i].checked = e.checked;
}

function selectall(listid,selectname) {
	var hasChecked = false;
	var bookList = document.getElementsByName(selectname);
	var shelf = document.getElementById(listid);
	var list = new Array;
	for ( var i = 0; i < bookList.length; i++) {
		if (bookList[i].type == "checkbox") {
			bookList[i].checked = true;
			hasChecked = true;
		}
	}
	if (!hasChecked) {
		alert("列表为空");
	}
}

var flag=false;
function setpicWH(ImgD,w,h)
{
	var image=new Image();
	image.src=ImgD.src;
	if(image.width>0 && image.height>0)
	{
		flag=true;
		if(image.width/image.height>= w/h)
		{
			if(image.width>w)
			{
				ImgD.width=w;
				ImgD.height=(image.height*w)/image.width;
				ImgD.style.display="block";
			}else{
				ImgD.width=image.width;
				ImgD.height=image.height;
				ImgD.style.display="block";
			}
		}else{
			if(image.height>h)
			{
				ImgD.height=h;
				ImgD.width=(image.width*h)/image.height;
				ImgD.style.display="block";
			}else{
				ImgD.width=image.width;
				ImgD.height=image.height;
				ImgD.style.display="block";
			}
		}
	}
}

var Browser = new Object();
Browser.isMozilla = (typeof document.implementation != 'undefined') && (typeof document.implementation.createDocument != 'undefined') && (typeof HTMLDocument!='undefined');
Browser.isIE = window.ActiveXObject ? true : false;
Browser.isFirefox = (navigator.userAgent.toLowerCase().indexOf("firefox")!=-1);
Browser.isSafari = (navigator.userAgent.toLowerCase().indexOf("safari")!=-1);
Browser.isOpera = (navigator.userAgent.toLowerCase().indexOf("opera")!=-1);

var Common = new Object();
Common.htmlEncode = function(str)
{
	return str.replace(/&/g, '&amp;').replace(/"/g, '&quot;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
}

Common.trim = function(str)
{
	return str.replace(/(^\s*)|(\s*$)/g, "");
}

Common.strlen = function (str)
{
	if(Browser.isFirefox)
	{
		Charset = document.characterSet;
	}
	else
	{
		Charset = document.charset;
	}
	if(Charset.toLowerCase() == 'utf-8')
	{
		return str.replace(/[\u4e00-\u9fa5]/g, "***").length;
	}
	else
	{
		return str.replace(/[^\x00-\xff]/g, "**").length;
	}
}

Common.isdate = function (str)
{
   var result=str.match(/^(\d{4})(-|\/)(\d{1,2})\2(\d{1,2})$/);
   if(result==null) return false;
   var d=new Date(result[1], result[3]-1, result[4]);
   return (d.getFullYear()==result[1] && d.getMonth()+1==result[3] && d.getDate()==result[4]);
}

Common.isnumber = function(val)
{
    var reg = /[\d|\.|,]+/;
    return reg.test(val);
}

Common.isalphanumber = function (str)
{
	var result=str.match(/^[a-zA-Z0-9]+$/);
	if(result==null) return false;
	return true;
}

Common.isint = function(val)
{
    var reg = /\d+/;
    return reg.test(val);
}

Common.isemail = function(email)
{
    var reg = /([\w|_|\.|\+]+)@([-|\w]+)\.([A-Za-z]{2,4})/;
    return reg.test( email );
}

Common.fixeventargs = function(e)
{
    var evt = (typeof e == "undefined") ? window.event : e;
    return evt;
}

Common.srcelement = function(e)
{
    if (typeof e == "undefined") e = window.event;
    var src = document.all ? e.srcElement : e.target;
    return src;
}

Common.isdatetime = function(val)
{
	var result=str.match(/^(\d{4})(-|\/)(\d{1,2})\2(\d{1,2}) (\d{1,2}):(\d{1,2}):(\d{1,2})$/);
	if(result==null) return false;
	var d= new Date(result[1], result[3]-1, result[4], result[5], result[6], result[7]);
	return (d.getFullYear()==result[1]&&(d.getMonth()+1)==result[3]&&d.getDate()==result[4]&&d.getHours()==result[5]&&d.getMinutes()==result[6]&&d.getSeconds()==result[7]);
}

var FileNum = 1;
function AddInputFile(Field)
{
    FileNum++;
	var fileTag = "<div id='file_"+FileNum+"'><input type='file' name='"+Field+"["+FileNum+"]' size='20' onchange='javascript:AddInputFile(\""+Field+"\")'> <input type='text' name='"+Field+"_description["+FileNum+"]' size='20' title='名称'> <input type='button' value='删除' name='Del' onClick='DelInputFile("+FileNum+");'></div>";
	var fileObj = document.createElement("div");
	fileObj.id = 'file_'+FileNum;
	fileObj.innerHTML = fileTag;
	document.getElementById("file_div").appendChild(fileObj);
}

function DelInputFile(FileNum)
{
    var DelObj = document.getElementById("file_"+FileNum);
    document.getElementById("file_div").removeChild(DelObj);
}

function loginCheck(form)
{
	var username = form.username;
	var password = form.password;
	if(username.value == ''){alert("请输入用户名");username.focus();return false;}
	if(password.value == ''){alert("请输入密码");password.focus();return false;}
	return true;
}
function pmCheck(form)
{
	var username = form.username;
	var title = form.title;
	if(username.value == ''){alert("收件人不能为空！");username.focus();return false;}
	if(title.value == ''){alert("标题不能为空！");title.focus();return false;}
	return true;
}

function modal(url, triggerid, id, type)
{
	id = '#' + id;
	triggerid = '#' + triggerid;
	switch(type)
	{
		case 'ajax':
			$(id).jqm({ajax: url, modal:false, trigger: triggerid});
		break;
		default:
			$(id).jqm();
		break;
	}
	$(id).html('');
	$(id).hide();
}

function menu_selected(id)
{
	$('#menu_'+id).addClass('selected');
}

var fk;
var mode;
validator={
	errinput : 'errinput',
	errmsg : 'errmsg',
	errcls : 'no',
	yescls : 'yes',

	require : /[^(^\s*)|(\s*$)]/,
	email : /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/,
	phone : /^((\(\d{2,3}\))|(\d{3}\-))?(\(0\d{2,3}\)|0\d{2,3}-)?[1-9]\d{6,7}(\-\d{1,4})?$/,
	mobile : /^((\(\d{3}\))|(\d{3}\-))?13[0-9]\d{8}?$|15[0-9]\d{8}?$|18[0-9]\d{8}?$/,
	url : /^http:\/\/[A-Za-z0-9]+\.[A-Za-z0-9]+[\/=\?%\-&_~`@[\]\':+!]*([^<>\"\"])*$/,
	idCard : "this.isIdCard(value)",
	currency : /^\d+(\.\d+)?$/,
	number : /^\d+$/,
	zip : /^[1-9]\d{5}$/,
	ip  : /^[\d\.]{7,15}$/,
	qq : /^[1-9]\d{4,11}$/,
	integer : /^[-\+]?\d+$/,
	double : /^[-\+]?\d+(\.\d+)?$/,
	english : /^[A-Za-z]+$/,
	chinese : /^[\u0391-\uFFE5]+$/,
	userName : /^[a-z_ ]\w{3,}$/i,
	//unSafe : /^(([A-Z]*|[a-z]*|\d*|[-_\~!@#\$%\^&\*\.\(\)\[\]\{\}<>\?\\\/\'\"]*)|.{0,5})$|\s/,
	unSafe : /[<>\?\#\$\*\&;\\\/\[\]\{\}=\(\)\.\^%,]/,
	//safeStr : /[^#\'\"~\.\*\$&;\\\/\|]/,
	isSafe : function(str){return !this.unSafe.test(str);},
	safeString : "this.isSafe(value)",
	filter : "this.doFilter(value)",
	limit : "this.checkLimit(Common.strlen(value))",
	limitB : "this.checkLimit(this.LenB(value))",
	date : "this.isDate(value)",
	repeat : "this.checkRepeat(value)",
	range : "this.checkRange(value)",
	compare : "this.checkCompare(value)",
	custom : "this.Exec(value)",
	group : "this.mustChecked()",
	ajax: "this.doajax(errindex)",

	isIdCard : function(number){
	var date, Ai;
	var verify = "10x98765432";
	var Wi = [7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2];
	var area = ['','','','','','','','','','','','北京','天津','河北','山西','内蒙古','','','','','','辽宁','吉林','黑龙江','','','','','','','','上海','江苏','浙江','安徽','福建','江西','山东','','','','河南','湖北','湖南','广东','广西','海南','','','','重庆','四川','贵州','云南','西藏','','','','','','','陕西','甘肃','青海','宁夏','新疆','','','','','','台湾','','','','','','','','','','香港','澳门','','','','','','','','','国外'];
	var re = number.match(/^(\d{2})\d{4}(((\d{2})(\d{2})(\d{2})(\d{3}))|((\d{4})(\d{2})(\d{2})(\d{3}[x\d])))$/i);
	if(re == null) return false;
	if(re[1] >= area.length || area[re[1]] == "") return false;
	if(re[2].length == 12){
		Ai = number.substr(0, 17);
		date = [re[9], re[10], re[11]].join("-");
	} else {
		Ai = number.substr(0, 6) + "19" + number.substr(6);
		date = ["19" + re[4], re[5], re[6]].join("-");
	}
	if(!this.isDate(date, "ymd")) return false;
	var sum = 0;
	for(var i = 0;i<=16;i++){
		sum += Ai.charAt(i) * Wi[i];
	}
	Ai += verify.charAt(sum%11);

	return (number.length ==15 || number.length == 18 && number == Ai);
	},

	isDate : function(op){
		var formatString = this['element'].attr('format');
		formatString = formatString || "ymd";
		var m, year, month, day;
		switch(formatString){
		case "ymd" :
			m = op.match(new RegExp("^((\\d{4})|(\\d{2}))([-./])(\\d{1,2})\\4(\\d{1,2})$"));
			if(m == null ) return false;
			day = m[6];
			month = m[5]*1;
			year = (m[2].length == 4) ? m[2] : GetFullYear(parseInt(m[3], 10));
		break;
		case "dmy" :
			m = op.match(new RegExp("^(\\d{1,2})([-./])(\\d{1,2})\\2((\\d{4})|(\\d{2}))$"));
			if(m == null ) return false;
			day = m[1];
			month = m[3]*1;
			year = (m[5].length == 4) ? m[5] : GetFullYear(parseInt(m[6], 10));
		break;
		default :
			break;
		}
		if(!parseInt(month)) return false;
		month = month==0 ?12:month;
		var date = new Date(year, month-1, day);
		return (typeof(date) == "object" && year == date.getFullYear() && month == (date.getMonth()+1) && day == date.getDate());
		function GetFullYear(y){
			return ((y<30 ? "20" : "19") + y)|0;
		}
	}, //end isDate

	doFilter : function(value){
		var filter =this['element'].attr('accept');
		return new RegExp("^.+\.(?=EXT)(EXT)$".replace(/EXT/g,filter.split(/\s*,\s*/).join("|")),"gi").test(value);
	},

	checkLimit:function(len){
		var minval=this['element'].attr('min') ||Number.MIN_VALUE;
		var maxval=this['element'].attr('max') ||Number.MAX_VALUE;
		return (minval<= len && len<=maxval);

	},

	LenB : function(str){
		return str.replace(/[^\x00-\xff]/g,"**").length;
	},

	checkRepeat:function(value){
		var to = this['element'].attr('to');
		return value==jQuery('input[name="'+to+'"]').eq(0).val();
	},

	checkRange : function(value){
		value = value|0;
		var minval=this['element'].attr('min') || Number.MIN_VALUE;
		var maxval=this['element'].attr('max') || Number.MAX_VALUE;
		return (minval<=value && value<=maxval);
	},

	checkCompare : function(value){
		var compare=this['element'].attr('compare');
		if(isNaN(value)) return false;
		value = parseInt(value);
		return eval(value+compare);
	},

	Exec : function(value){
		var reg = this['element'].attr('regexp');
		return new RegExp(reg,"gi").test(value);
	},

	mustChecked : function(){
		var tagName=this['element'].attr('name');
		var f=this['element'].parents('form');
		var n=f.find('input[name="'+tagName+'"][checked]').length;
		var count = f.find('input[name="'+tagName+'"]').length;
		var minval=this['element'].attr('min') || 1;
		var maxval=this['element'].attr('max') || count;
		return (minval<=n && n<=maxval);
	},

	doajax : function(value) {
		var fk;
		var element = this['element'];
		var errindex = this['errindex'];
		var url=this['element'].attr('url');
		var mode = element.attr('mode') || 1 ;
		var msgid = element.attr('msgid');
		var val = this['element'].val();
		var str_errmsg=this['element'].attr('msg');
		var arr_errmsg = str_errmsg.indexOf('|') ? str_errmsg.split('|') :str_errmsg;
		var errmsg = arr_errmsg[errindex];
		var type=this['element'].attr('type');
		var errcls=this['errcls'];
		var yescls=this['yescls'];
		var param = val ?this['element'].attr('param') + '&value=' + val : this['element'].attr('param');	
		var Charset = Browser.isIE ? document.charset : document.characterSet;
		var methodtype = (Charset.toLowerCase() == 'utf-8') ? 'post' : 'get';
		var method=this['element'].attr('method') || methodtype;
		var s = $.ajax({
			type: method,
			url: url,
			data: param,
			cache: false,
			async: false,
			success: function(data){
				data = data.replace(/(^\s*)|(\s*$)/g, "");
				   if(data != 'success')
				   {
					  errmsg = errmsg ? errmsg : data;
					  fk = false;
					  (type!='checkbox' && type!='radio' && element.addClass('errinput'));
					  if(mode == 1)
					  {
						  if(msgid)
						  {
							  id = '#' + msgid;
							  $(id).removeClass('yes');
							  $(id).addClass('no');
							  $(id).html(errmsg);
						  }
						  else
						  {
							  jQuery("<span tag='err' class='"+errcls+"'></span>").html(errmsg).insertAfter(element);
						  }
					  }
					  else if(mode == 2)
					  {
						  alert(errmsg);
					  }
					  return false;
				   }
				   else
				   {
					   fk = true;
					   if(msgid)
						{
							id = '#' + msgid;
							$(id).removeClass('no');
							$(id).addClass('yes');
							$(id).html('');
						}
						else
						{
							jQuery("<span tag='err' class='"+yescls+"'>&nbsp;</span>").insertAfter(element);
						}
					   return true;
				   }
			   }
		 }).responseText;
		 s = s.replace(/(^\s*)|(\s*$)/g, "");
		 return s == 'success' ? true : false;
	}
};

validator.showErr=function (element, errindex){
	var str_errmsg=element.attr('msg') ||'unkonwn';
	var arr_errmsg = str_errmsg.split('|');
	var errmsg = arr_errmsg[errindex] ? arr_errmsg[errindex]: arr_errmsg[0];
	var mode = element.attr('mode') || 1;
	var msgid= element.attr('msgid');
	var type=element.attr('type');
	(type!='checkbox' && type!='radio' && element.addClass(this['errinput']));
	if(mode == 1)
	{
		if(msgid)
		{
			id = '#' + msgid;
			$(id).removeClass('yes');
			$(id).addClass('no');
			$(id).html(errmsg);
		}
		else
		{
			jQuery("<span tag='err' class='"+this['errcls']+"'></span>").html(errmsg).insertAfter(element);
		}
	}
	else
	{
		alert(errmsg);
	}
}

validator.removeErr =  function(element){
	element.removeClass(this['errinput']);
	element.parent('*').find('span[tag="err"]').remove();
}

validator.checkajax = function(element, datatype, errindex)
{
	var value=jQuery.trim(element.val());
	this['element'] = element;
	this['errindex'] = errindex;
	validator.removeErr(element);
	return eval(this[datatype]);
}

validator.checkDatatype = function(element,datatype){
	var value=jQuery.trim(element.val());
	this['element'] = element;
	validator.removeErr(element);
	switch(datatype){
		case "idCard" :
		case "date" :
		case "repeat" :
		case "range" :
		case "compare" :
		case "custom" :
		case "group" :
		case "limit" :
		case "limitB" :
		case "safeString" :
		case "filter" :
		return eval(this[datatype]);
		break;
		default:
			return this[datatype].test(value);
			break;
	}
}

validator.check=function(obj){
	var datatype = obj.attr('datatype');
	if(typeof(datatype) == "undefined") return true;

	if(obj.attr('require')!="true" && obj.val()=="") return true;
	var datatypes = datatype.split('|');
	var ok = true;

	jQuery.each(datatypes,function(index,data){
		if(typeof(validator[data]) == "undefined") {
			ok = false;
			return  false;
		}
		if(data != 'ajax')
		{
			if(validator.checkDatatype(obj,data)==false){
				validator.showErr(obj, index);
				return ok=false;
			}
			else
			{
				var msgid= obj.attr('msgid');
				if(msgid)
				{
					id = '#' + msgid;
					$(id).removeClass('no');
					$(id).addClass('yes');
					$(id).html('');
				}
				else
				{

					jQuery("<span tag='err' class='yes'></span>").insertAfter(obj);
				}
			}
		}
		else
		{
			ok = validator.checkajax(obj, data, index);
		}
	});
	return ok;
}

jQuery.fn.checkForm = function(m){
	mode = (m==1) ? 1 : 0;
	var form=jQuery(this);
	var elements = form.find('input[require],select[require],textarea[require]');
	elements.blur(function(index){
		return validator.check(jQuery(this));
	});

	form.submit(function(){
		var ok = true;
		var errIndex= new Array();
		var n=0;
		elements.each(function(i){
			if(validator.check(jQuery(this))==false){
				ok = false;
				errIndex[n++]=i;
			};
		});

		if(ok==false){
			elements.eq(errIndex[0]).focus().select();
			return false;
		}
		if(document.getElementById('video_uploader') && !upLoading)
		{
			uploadFile();
			return false;
		}
		if($('#f_filed_1') && set_show==false)
		{
			$("select[@id=catids] option").each(function()
			{
				$(this).attr('selected','selected');
			});
		}
		if($('#hava_checked').val()==0)
		{
			YP_checkform();
			return false;
		}
		return true;
	});
}

// 下拉菜单
var timeout = 500;
var closetimer = 0;
var ddmenuitem = 0;

function jsddm_open()
{
	jsddm_canceltimer();
	jsddm_close();
	ddmenuitem = $(this).find('ul').css('visibility', 'visible');
}

function jsddm_close()
{
	if (ddmenuitem) ddmenuitem.css('visibility', 'hidden');
}

function jsddm_timer()
{
	closetimer = window.setTimeout(jsddm_close, timeout);
}

function jsddm_canceltimer()
{
	if (closetimer)
	{
		window.clearTimeout(closetimer);
		closetimer = null;
	}
}

$(document).ready(function()
{
	$('#pinfo,#pmark,#pmsg').bind('mouseover', jsddm_open)
	$('#pinfo,#pmark,#pmsg').bind('mouseout', jsddm_timer)
});
document.onclick = jsddm_close;
