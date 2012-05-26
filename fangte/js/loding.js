function showLoding() {
    var win = parent.window;
    var divbg = win.document.createElement("div");  //win.document.createElement("<div id=\"divBgLoding\" style=\"filter:alpha(opacity=30);opacity:0.3;border:0px solid black;position:absolute;left:0px;top:0px;background-color:gray;\"></div>");
    divbg.setAttribute("id", "divBgLoding");
    //divbg.setAttribute("style", "filter:alpha(opacity=30);opacity:0.3;border:0px solid black;position:absolute;left:0px;top:0px;background-color:gray;");
    if (divbg.style.filter == "") {
        divbg.style.filter = "alpha(opacity=30)";
    } else {
        divbg.style.opacity = 0.3;
    }
    divbg.style.border = "0px solid black";
    divbg.style.position = "absolute";
    divbg.style.left = "0px";
    divbg.style.top = "0px";
    divbg.style.backgroundColor = "gray";


    var divloding = win.document.createElement("div");
    divloding.setAttribute("id", "divLoding");
    //divloding.setAttribute("style", "text-align:center;border:0px solid black;position:absolute;left:0px;top:0px;");
    divloding.style.border = "0px solid black";
    divloding.style.position = "absolute";
    divloding.style.left = "0px";
    divloding.style.top = "0px";
    divloding.style.textAlign = "center";


    var imgLoding = win.document.createElement("img");
    imgLoding.setAttribute("id", "imgLoding");
    imgLoding.setAttribute("src", "temp/image/loding.gif");
    var divCon = win.document.createElement("div");
    divCon.setAttribute("id", "divCon");


    divCon.innerHTML = "<span style=\"font-weight:bold;color:black;\">正在处理请稍等。。。</span><br>";
    divCon.appendChild(imgLoding);
    divloding.appendChild(divCon);
    win.document.body.appendChild(divbg);
    win.document.body.appendChild(divloding);


    var bgHeight = 0;
    if (win.document.body.offsetHeight < win.document.documentElement.clientHeight) {
        bgHeight = win.document.documentElement.clientHeight;
    } else {
        if (win.document.body.scrollHeight < win.document.body.offsetHeight) {
            bgHeight = win.document.body.offsetHeight;
        } else {
            bgHeight = win.document.body.scrollHeight;
        }
    }
    if (win.document.body.scrollHeight < win.document.documentElement.clientHeight) {
        bgHeight = win.document.documentElement.clientHeight;
    } else {
        if (win.document.body.scrollHeight < win.document.body.offsetHeight) {
            bgHeight = win.document.body.offsetHeight;
        } else {
            bgHeight = win.document.body.scrollHeight;
        }
    }

    divbg.style.width = win.document.body.offsetWidth + "px";
    divbg.style.height = bgHeight + "px";
    divloding.style.width = win.document.body.offsetWidth + "px";
    divloding.style.height = bgHeight + "px";
    divCon.style.marginTop = parseInt(getScrollTop() + win.document.documentElement.clientHeight / 2) + "px";
    win.onscroll = setLoding;
}
function setLoding() {
    var win = parent.window;
    var divCon = win.document.getElementById("divCon");
    divCon.style.marginTop = parseInt(getScrollTop() + win.document.documentElement.clientHeight / 2);
}
function closeLoding() {
    var win = parent.window;
    var divLoding = win.document.getElementById("divLoding");
    win.document.body.removeChild(divLoding);
    var divBgLoding = win.document.getElementById("divBgLoding");
    win.document.body.removeChild(divBgLoding);
    win.onscroll = null;
}
function getScrollTop() {
    var scrollPos = 0;
    if (typeof parent.window.pageYOffset != 'undefined') {
        scrollPos = parent.window.pageYOffset;
    }
    else if (typeof parent.window.document.compatMode != 'undefined' &&
	   parent.window.document.compatMode != 'BackCompat') {
        scrollPos = parent.window.document.documentElement.scrollTop;
    }
    else if (typeof parent.window.document.body != 'undefined') {
        scrollPos = parent.window.document.body.scrollTop;
    }
    return scrollPos;
}  