<?php
if (PT_IMGURL == 'true') {
    $chaptercontent = str_replace('src="', 'src="' . PT_SITEURL . 'ptpic.php?type=chapterimg&bookid=' . $bookid . '&url=', $chaptercontent);
}

if (PT_RANDSTRPOWER == 'true') {
    include PT_DIR . 'data/randstr_set.php';
    include PT_DIR . 'inc/randstr.php';
    $chaptercontent = randstr($chaptercontent, $mark_bgcolor, $mark_size);
}

if (PT_CHAPTERREPLACE == 'true') {
    $str = file('./data/replace/chapter.php');
    $num = count($str);
    if ($num > 0) {
        for ($i = 0; $i < $num; $i++) {
            $estr = explode('|||', $str[$i]);
            $stra = $estr['0'];
            if (isset($estr['1'])) {
                $strb = $estr['1'];
            } else {
                $strb = "";
            }
            if (strpos($chaptercontent, $stra)) {
                $chaptercontent = str_replace($stra, $strb, $chaptercontent);
            }
        }
    }
}

$chaptercontent = str_replace( '\\', '', $chaptercontent );
$chaptercontent = str_replace( "'", '"', $chaptercontent );
$chaptercontent = str_replace( "\n", '', $chaptercontent );
$chaptercontent = str_replace( "\r", '', $chaptercontent );
?>