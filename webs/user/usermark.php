<?php
include 'usercheck.php';

include '../data/user/' . $username . '/mark.php';
$usermarknum = $pt_user_marknum[$userlv];
$usermarkc = $pt_user_markc[$userlv];
if (isset($_GET['id'])) {
	$id = $_GET['id'];
} else {
	$id = 1;
}
if (isset($_GET['action'])) {
	$action = $_GET['action'];
}
if (isset($_GET['bookid'])) {
	$bookid = $_GET['bookid'];
}
if (isset($_GET['chapterid'])) {
	$chapterid = $_GET['chapterid'];
}
if (isset($_GET['chaptername'])) {
	$chaptername = $_GET['chaptername'];
}
if (isset($_GET['markid'])) {
	$markid = $_GET['markid'];
}

//添加
if (isset($action) and $action == "add") {
	if (!isset($markid)) {
		$issetbookid = 0;
		for ($i = 1; $i <= $usermarkc; $i++) {
			$tempmark = explode('~||~', $markbook[$i]);
			for ($j = 0; $j < count($tempmark); $j++) {
				$markcon = explode('~*~', $tempmark[$j]);
				if ($markcon['0'] == $bookid) {
					$issetbookid = 1;
					$markid = $i;
				}
			}
		}
		if ($issetbookid == 0) {
			if ($chapterid>0){
				$chaptermsg="书签更新至：$chaptername(章节id$chapterid)";
			}else{
				$chaptermsg="本次未添加书签";
			}
			$pt_type='markadd';
			include PT_DIR . 'inc/useroutput.php';
			exit();
		}
	}
	if (isset($markid)) {
		$tempmark = explode('~||~', $markbook[$markid]);
		$isnew = 1;
		for ($i = 0; $i < count($tempmark); $i++) {
			$markcon = explode('~*~', $tempmark[$i]);
			if ($markcon['0'] == $bookid) {
				$isnew = 0;
				$markword = "更新";
				if (isset($chapterid) and isset($chaptername)) {
					if ($chapterid >= $markcon['1']) {
						$markbook[$markid] = str_replace($markcon['0'].'~*~'.$markcon['1'].'~*~'.$markcon['2'], $markcon['0'].'~*~'.$chapterid.'~*~'.$chaptername, $markbook[$markid]);						
					} else {
						$pt_type='msg';
						$msg = "本书已经存在，且书签比本章新，若强制更新，请删除本书收藏后在重新加入书架！";
						$url = PT_SITEURL . "user/usermark.php?id=$markid";
						include PT_DIR . 'inc/useroutput.php';
						exit();
					}
				}
			}
		}
		if ($isnew == 1) {
			$markbook[$markid] = '~||~' . $bookid . '~*~' . $chapterid . '~*~' . $chaptername . $markbook[$markid];
			$markword = "添加";
		}
		if ($usermarknum <= count($tempmark)) {
			$pt_type='msg';
			$msg = "当前书架已满，请更换其他书架！";
			$url = PT_SITEURL . "user/usermark.php?action=add&bookid=" . $bookid . '$chapterid=' . $chapterid . '&chaptername=' . $chaptername;
			include PT_DIR . 'inc/useroutput.php';
			exit();
		} else {
			$str = "<?php\n";
			for ($i = 1; $i <= 10; $i++) {
				$str .= "\$markname['$i']='" . $markname[$i] . "';\n";
				$str .= "\$markbook['$i']='" . $markbook[$i] . "';\n";
			}
			$str .= '?>';
			$file = '../data/user/' . $username . '/mark.php';
			$result = $pt->writeto($file, $str);
			if ($result) {
				$pt_type='msg';
				$msg = "成功将小说" . $markword . "到书架中";
				if (isset($chapterid) and $chapterid>0) {
					$msg .= "，同时书签" . $markword . "到<br />“" . $chaptername . "”！";
				} else {
					$msg .= "！";
				}
				$url = PT_SITEURL . "user/usermark.php?id=$markid";
				include PT_DIR . 'inc/useroutput.php';
				exit();
			}
			exit();
		}
	}
}

//输出
$tempmark = explode('~||~', $markbook[$id]);
$j = 0;
for ($m = 1; $m < count($tempmark); $m++) {
	$markcon = explode('~*~', $tempmark[$m]);
	$bookid = $markcon['0'];
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
			$marklist[$j]['update'] = date("Y-m-d", $lastupdate);
		} else {
			$errbookid[] = $bookid;
		}
		if (isset($markcon['1']) and $markcon['1']>0) {
			if ($chapterid > $markcon['1']) {
				$marklist[$j]['markinfo'] = "<font color=green><b>有更新了</b></font>";
			} else {
				$marklist[$j]['markinfo'] = "没有更新";
			}
			$marklist[$j]['marktitle'] = '当前书签：' . $markcon['2'];
			$marklist[$j]['markurl'] = $pt->getchapterurl($cutid, $bookid, $markcon['1']);
		} else {
			$marklist[$j]['markinfo'] = "暂无书签";
			$marklist[$j]['marktitle'] = '暂无书签';
			$marklist[$j]['markurl'] = "#";
		}
	}
}

$usermarkname = $markname[$id];
include '../inc/array.sort.php';
if (isset($marklist)) {
	$marklist = sortarray($marklist, 'update', 'SORT_DESC');
	array_unshift($marklist, "");
} else {
	$marklist = "";
}
$marknum = $j;

//自动删除获取失败的书籍
/*
if (isset($errbookid)) {
	for ($ii = 0; $ii < count($errbookid); $ii++) {
		$automarknew = "";
		$delid = $errbookid[$ii];
		for ($i = 0; $i < count($tempmark); $i++) {
			$markcon = explode('~*~', $tempmark[$i]);
			$bookid = $markcon['0'];
			if ($bookid == $delid) {
				$markbook[$id] = str_replace('~||~' . $bookid, '', $markbook[$id]);
				if ($markcon['1'] != 0)
					$markbook[$id] = str_replace('~*~' . $markcon['1'], '', $markbook[$id]);
				if ($markcon['2'] != 0)
					$markbook[$id] = str_replace('~*~' . $markcon['2'], '', $markbook[$id]);
			}
		}
		$str = "<?php\n";
		for ($i = 1; $i <= 10; $i++) {
			$str .= "\$markname['$i']='" . $markname[$i] . "';\n";
			$str .= "\$markbook['$i']='" . $markbook[$i] . "';\n";
		}
		$str .= '?\>';
		$file = '../data/user/' . $username . '/mark.php';
		$pt->writeto($file, $str);
	}
}
*/

//删除
if (isset($_POST['del'])) {
	unset($_POST['del']);
	$automarknew = "";
	foreach ($_POST['delid'] as $key => $value) {
		for ($i = 0; $i < count($tempmark); $i++) {
			$markcon = explode('~*~', $tempmark[$i]);
			$bookid = $markcon['0'];
			if ($bookid == $value) {
				$markbook[$id] = str_replace('~||~'.$markcon['0'].'~*~'.$markcon['1'].'~*~'.$markcon['2'], '', $markbook[$id]);
			}
		}
	}
	$str = "<?php\n";
	for ($i = 1; $i <= 10; $i++) {
		$str .= "\$markname['$i']='" . $markname[$i] . "';\n";
		$str .= "\$markbook['$i']='" . $markbook[$i] . "';\n";
	}
	$str .= '?>';
	$file = '../data/user/' . $username . '/mark.php';
	$result = $pt->writeto($file, $str);
	if ($result) {
		$pt_type='msg';
		$msg = "批量删除指定记录成功！";
		$url = PT_SITEURL . "user/usermark.php?id=" . $id;
		include PT_DIR . 'inc/useroutput.php';
		exit();
	}
}

if (isset($action) and $action == 'del') {
	$automarknew = "";
	$delid = $_GET['delid'];
	for ($i = 0; $i < count($tempmark); $i++) {
		$markcon = explode('~*~', $tempmark[$i]);
		$bookid = $markcon['0'];
		if ($bookid == $delid) {
			$markbook[$id] = str_replace('~||~'.$markcon['0'].'~*~'.$markcon['1'].'~*~'.$markcon['2'], '', $markbook[$id]);
		}
	}
	$str = "<?php\n";
	for ($i = 1; $i <= 10; $i++) {
		$str .= "\$markname['$i']='" . $markname[$i] . "';\n";
		$str .= "\$markbook['$i']='" . $markbook[$i] . "';\n";
	}
	$str .= '?>';
	$file = '../data/user/' . $username . '/mark.php';
	$result = $pt->writeto($file, $str);
	if ($result) {
		$pt_type='msg';
		$msg = "删除指定记录成功！";
		$url = PT_SITEURL . "user/usermark.php?id=" . $id;
		include PT_DIR . 'inc/useroutput.php';
		exit();
	}
}

$pt_type='usermark';
include PT_DIR . 'inc/useroutput.php';
?>