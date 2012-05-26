<?php
$datacode = $pt->getcode('http://www.00ks.com/Html/Book/'.floor(($bookid-PT_PLUSBID)/1000) . '/' . ($bookid-PT_PLUSBID).'/Index.html');
$menuarea = $pt->steal($datacode, '<div id="BookText">','<div id="NclassTitle">作者随语',false,false);
$menuarea = str_replace('<li></li>','',$menuarea);
$menuarea = preg_replace('/<div id="NclassTitle">['.$bookname.' ]?(.+?)&nbsp;&nbsp;【<a href="\/Book\/\w*\.aspx">分卷阅读<\/a>】<\/div>/','<explode><volume>\1</volume>',$menuarea);
$menuarea = str_replace('<li>','<explode>',$menuarea);
$menu = explode( "<explode>", $menuarea );
unset($menu[0]);
$t = 1;
foreach ( array_reverse( $menu ) as $tenrow ) {
	if ( $t > 10 ) {
		break;
	}
	if ( !stristr( $tenrow, "<volume>" ) ) {
		$ten_list[$t]['chapterid'] = intval( $pt->steal( $tenrow, 'href="', '.' ) ) + PT_PLUSTID;
		$ten_list[$t]['chaptername'] = trim( $pt->steal( $tenrow, '">', '</' ) );
		$ten_list[$t]['update'] = $pt->steal( $tenrow, '.html" title="', '更新字数' );
		$ten_list[$t]['chapterurl'] = $pt->getchapterurl($cutid,$bookid,$ten_list[$t]['chapterid']);
		$ten_list[$t]['urltitle'] = $pt->steal( $tenrow, '.html" title="', '">' );
		$t++;
	}
}
$v = 0;
$c = 0;
foreach ( $menu as $row ) {
	if ( $v == 0 and $c == 0 and !strstr( $row, "<volume>" ) ) {
		$v++;
		$vtemp = "正文";
		$zhengwen = 1;
		$volumeid[$v] = 1;
		$volumename[$v] = "正文";
	}
	if ( strstr( $row, "<volume>" ) ) {
		$vname = trim( $pt->steal( $row, "<volume>", "</volume>" ) );
		if ( $v == 0 ) {
			if ( $vname == "网" or strstr( $vname, "【】" )  or strstr( $vname, "正文" ) or strstr( $vname, "章节" ) or strstr( $vname, "目录" ) or strstr( $vname, "列表" ) or strstr( $vname, "阅读" ) or stristr( $vname, "VIP" ) or strstr( $vname, "网友上传" ) or strstr( $vname, "泡书吧" ) or strstr( $vname, "彩虹文学" ) or strstr( $vname, "小说网" ) ) {
				$vname = $vtemp = "正文";
				$zhengwen = 1;
			} else {
				$vtemp = $vname;
				$zhengwen = 0;
			}
		} else {
			if ( $vname == $vtemp or $vname == "网" or strstr( $vname, "【】" )  or strstr( $vname, "正文" ) or strstr( $vname, "章节" ) or strstr( $vname, "目录" ) or strstr( $vname, "列表" ) or strstr( $vname, "阅读" ) or stristr( $vname, "VIP" ) or strstr( $vname, "网友上传" ) or strstr( $vname, "泡书吧" ) or strstr( $vname, "彩虹文学" ) or strstr( $vname, "小说网" ) ) {
				if ( $zhengwen == 0 or ( stristr( $vname, "VIP" ) and $vtemp != "正文" ) ) {
					$vname = $vtemp = "正文";
					$zhengwen = 1;
				} else {
					continue;
				}
			} else {
				$vtemp = $vname;
			}
		}
		$v++;
		$volumeid[$v] = $c+1;
		$volumename[$v] = $vname;
	} else {
		$c++;
		$read[$c] = intval( $pt->steal( $row, 'href="', '.' ) ) + PT_PLUSTID;
		$show[$c] = trim( $pt->steal( $row, '">', '</' ) );
	}
}
?>