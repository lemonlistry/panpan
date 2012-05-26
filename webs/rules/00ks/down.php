<?php
$msgstr='下载需要登陆并扣除积分，所以只能提供生成后的地址，当没有生成则无法下载';
$downlistnum='1';
$downlist['1']['name']=$bookname.$type.'下载';
$downlist['1']['size']=ceil($lastsize/1000).'K';
$downlist['1']['date']=pt_datetime();
$downid=$bookid-PT_PLUSBID;
$dcid=floor($downid/1000);
switch ($type){
case 'txt':
  $downlist['1']['url']="http://www.00ks.com/Down/Txt/$dcid/$downid/$downid.rar";
  break;
case 'umd':
  $downlist['1']['url']="http://www.00ks.com/Down/Chm/$dcid/$downid/$downid.chm";
  break;
case 'jar':
  $downlist['1']['url']="http://www.00ks.com/Down/Txt/$dcid/$downid/$downid.rar";
  break;
case 'jad':
  $downlist['1']['url']="http://www.00ks.com/Down/Txt/$dcid/$downid/$downid.rar";
  break;
case 'chm':
  $downlist['1']['url']="http://www.00ks.com/Down/Chm/$dcid/$downid/$downid.chm";
  break;
default:
  $downlist['1']['url']="http://www.00ks.com/Down/Txt/$dcid/$downid/$downid.rar";
  break;
}
?>