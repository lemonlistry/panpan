<!--



/* ºóÌ¨µ¼º½ */
var num = 0;
var close_num = 0;
var div = document.getElementsByTagName('div');
window.onload = function()
{
    var img = document.getElementById('back_btn');
    img.onclick = display_fn;
    var closes = document.getElementsByTagName('div');
    for(i = 0; i < closes.length; i++)
    {
        if(closes[i].className == 'close_float')
        {
            close_num = i;
        }
    }
    closes[close_num].onclick = none_fn;
}
function display_fn()
{
    for(i = 0; i < div.length; i++)
    {
        if(div[i].className == 'back_nav')
        {
            num = i;
        }
    }
    div[num].style.display = 'block';
}
function none_fn()
{
    for(i = 0; i < div.length; i++)
    {
        if(div[i].className == 'back_nav')
        {
            num = i;
        }
    }
    div[num].style.display = 'none';
}

//-->