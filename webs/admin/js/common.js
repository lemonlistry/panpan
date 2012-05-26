function nTabs(tabObj,obj,css){
	var tabList=document.getElementById(tabObj).getElementsByTagName("li");
    var cssname=css;
	for(i=1;i<tabList.length;i++){
		if(tabList[i].id==obj.id){
			document.getElementById(tabObj+"_Title"+i).className=cssname;
			document.getElementById(tabObj+"_Content"+i).style.display="block";}
		else{document.getElementById(tabObj+"_Title"+i).className="btn0";
		document.getElementById(tabObj+"_Content"+i).style.display="none";}
		}
}

function ptCheckAll(e, itemName)
{
  var aa = document.getElementsByName(itemName);
  for (var i=0; i<aa.length; i++)
   aa[i].checked = e.checked;
}

function ptCheckItem(e, allName)
{
  var all = document.getElementsByName(allName)[0];
  if(!e.checked) all.checked = false;
  else
  {
    var aa = document.getElementsByName(e.name);
    for (var i=0; i<aa.length; i++)
     if(!aa[i].checked) return;
    all.checked = true;
  }
}