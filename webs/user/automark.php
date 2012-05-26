<?php
include '../inc/global.php';
include '../data/user.php';

if (isset($_COOKIE['pt_automark'])) {
	$tempmark = $_COOKIE['pt_automark'];
} else {
	$tempmark = "&";
}

if (isset($_COOKIE['pt_username'])) {
	$username = $_COOKIE['pt_username'];
	include '../data/user/' . $username . '/info.php';
	include '../data/user/' . $username . '/point.php';
	include '../data/user/' . $username . '/mark.php';
	$usermarknum = $pt_user_marknum[$userlv];
	$usermarkc = $pt_user_markc[$userlv];
}

$markid = explode('&', $tempmark);
$j = 0;
for ($m = 0; $m < count($markid); $m++) {
	$bookid = $markid[$m];
	if ($bookid > 0) {
		$read=$show=$volumeid=$volumename=null;
		include PT_DIR . 'inc/data.php';
		if ($infoupdate){
			$chaptername=$lastchaptername;
			$chapterid=$lastchapterid;
		}
		if (isset($bookname) and $bookname != '') {
			$j++;
			$marklist[$j]['bookid'] = $bookid;
			$marklist[$j]['bookname'] = $bookname;
			$marklist[$j]['bookurl'] = $pt->getbookurl($bookid);
			$marklist[$j]['downurl'] = $pt->getdownurl($bookid);
			$marklist[$j]['author'] = $author;
			$marklist[$j]['authorurl'] = $pt->getsearchurl($author, 'author');
			$marklist[$j]['chaptername'] = $chaptername;
			$marklist[$j]['readurl'] = $pt->getreadurl($cutid,$bookid);
			$marklist[$j]['chapterurl'] = $pt->getchapterurl($cutid,$bookid,$chapterid);
			$marklist[$j]['markchapter'] = "功能不可用";
			$marklist[$j]['update'] = date("Y-m-d",$lastupdate);
		} else {
			$errbookid[] = $bookid;
		}
	}
}

include '../inc/array.sort.php';
if (isset($marklist)) {
	$marklist = sortarray($marklist, 'update', 'SORT_DESC');
	array_unshift($marklist, "");
} else {
	$marklist = "";
}

$marknum = $j;

/*
*自动删除获取失败的书籍
if (isset($errbookid)) {
	for ($j = 0; $j < count($errbookid); $j++) {
		$automarknew = "";
		$delid = $errbookid[$j];
		for ($i = 0; $i < count($markid); $i++) {
			$bookid = $markid[$i];
			if ($bookid <> $delid and $bookid <> "") {
				$automarknew .= '&' . $bookid;
			}
		}
		setcookie("pt_automark", $automarknew, time() + 3600 * 24 * 30, "/");
	}
}
*/

if (isset($_POST['del'])) {
	unset($_POST['del']);
	$automarknew = "";
	for ($i = 0; $i < count($markid); $i++) {
		$bookid = $markid[$i];
		$isdel=1;
		foreach ($_POST['delid'] as $key => $value) {
			if ($bookid == $value or $bookid == "") {
				$isdel=0;
			}
		}
		if ($isdel==1){
			$automarknew .= '&' . $bookid;
		}
	}
	setcookie("pt_automark", $automarknew, time() + 3600 * 24 * 30, "/");
	$pt_type='msg';
	$msg = "批量删除指定记录成功！";
	$url = PT_SITEURL . "user/automark.php";
	include PT_DIR . 'inc/useroutput.php';
	exit();
}

if (isset($_GET['action']) and $_GET['action'] == 'del') {
	$automarknew = "";
	$delid = $_GET['delid'];
	for ($i = 0; $i < count($markid); $i++) {
		$bookid = $markid[$i];
		if ($bookid <> $delid and $bookid <> "") {
			$automarknew .= '&' . $bookid;
		}
	}
	setcookie("pt_automark", $automarknew, time() + 3600 * 24 * 30, "/");
	$pt_type='msg';
	$msg = "删除指定记录成功！";
	$url = PT_SITEURL . "user/automark.php";
	include PT_DIR . 'inc/useroutput.php';
	exit();
}

$pt_type='automark';
include PT_DIR . 'inc/useroutput.php';
?>