// png IE 透明

// select 美化
function drop_mouseover(pos){
 try{window.clearTimeout(timer);}catch(e){}
}
function drop_onclick(pos){
	if(document.getElementById(pos+"Sel").style.display=='none'){document.getElementById(pos+"Sel").style.display='block';}else {document.getElementById(pos+"Sel").style.display='none';};return false;
}

function drop_mouseout(pos){
 var posSel=document.getElementById(pos+"Sel").style.display;
 if(posSel=="block"){
  timer = setTimeout("drop_hide('"+pos+"')", 1000);
 }
}
function drop_hide(pos){
 document.getElementById(pos+"Sel").style.display="none";
}
function search_show(pos,searchType,href){
    document.getElementById(pos+"Sel").style.display="none";
    document.getElementById(pos+"Slected").innerHTML=href.innerHTML;
 try{window.clearTimeout(timer);}catch(e){}
 return false;
}
// 选项卡1
function nTabs(tabObj,obj){
	var tabList=document.getElementById(tabObj).getElementsByTagName("dt");
	for(i=0;i<tabList.length;i++){
		if(tabList[i].id==obj.id){
			document.getElementById(tabObj+"_Title"+i).className="active";
			document.getElementById(tabObj+"_Content"+i).style.display="block";}
		else{document.getElementById(tabObj+"_Title"+i).className="normal";
		document.getElementById(tabObj+"_Content"+i).style.display="none";}
		}
}
// 选项卡2
function nTabrb(name,num){
	var tabnum=document.getElementById(name).getElementsByTagName("dd");
	for(i=0;i<tabnum.length;i++){
		if(tabnum[i].id==num.id){
			document.getElementById(name+i).className="active";
			document.getElementById(name+"Con"+i).style.display="block";}
		else{document.getElementById(name+i).className="normal";
		document.getElementById(name+"Con"+i).style.display="none";}
		}
}


function keybg(h){document.getElementById(h).className="on";document.getElementById("h2").className="";}
function keybg2(h){document.getElementById(h).className="on";}
function ckeybg(q){document.getElementById(q).className="";document.getElementById("h2").className="on";}
