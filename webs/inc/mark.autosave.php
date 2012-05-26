<?php
if (isset($_COOKIE['pt_username'])) {
    $usermarkfile = PT_DIR . 'data/user/' . $_COOKIE['pt_username'] . '/mark.php';
    include $usermarkfile;
    for ($i = 1; $i < 11; $i++) {
        if (strpos($markbook[$i], $bookid . '~*~')) {
            $usermarkstr = explode('~||~', $markbook[$i]);
            for ($j = 0; $j <= count($usermarkstr); $j++) {
                $usermarkarr = explode('~*~', $usermarkstr[$j]);
                if ($usermarkarr['0'] == $bookid) {
                    $repstr = $bookid . '~*~' . $usermarkarr['1'] . '~*~' . $usermarkarr['2'];
                    $usermarkfilestr = file_get_contents($usermarkfile);
                    $usermarkfilestr = str_replace($repstr, $bookid . '~*~' . $chapterid . '~*~' . $chaptername,
                        $usermarkfilestr);
                    $pt->writeto($usermarkfile, $usermarkfilestr);
                    break;
                }
            }
        }
    }
}
?>