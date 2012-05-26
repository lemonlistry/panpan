<?php
include PT_DIR . 'plus/bot/botlist.php';
include PT_DIR . 'plus/bot/data/botdate.php';
$timenew = 0;
$isbot=0;
$useragent = strtolower($_SERVER['HTTP_USER_AGENT']);
for ($i = 1; $i <= $botnum; $i++) {
    if (stripos($useragent, $botlist[$i]['type']) !== false) {
        $botip = $_SERVER['REMOTE_ADDR'];
        $bottime = $_SERVER['REQUEST_TIME'];
        $boturl = geturl();
        $botname = $botlist[$i]['name'];
        $botid = $i;
        $isbot=1;
        break;
    }
}
unset($botlist);
if ($isbot==1){
        //写入记录
    $file = PT_DIR . 'plus/bot/data/last.txt';
    $botdata = file($file);
    $datenum = count($botdata);
    $botstr = $botid . '|||' . $botname . '|||' . date('Y-m-d H:i:s', $bottime) .
        '|||' . $botip . '|||' . $boturl . "\n";
    if ($datenum>=50){
        $fornum=49;
    }else{
        $fornum=$datenum;
    }
    for ($i = 0; $i < $fornum; $i++) {
        $botstr .= $botdata[$i];
    }
    $pt->writeto($file, $botstr);
    //写入日记录
    $file = PT_DIR . 'plus/bot/data/day.php';
    include $file;
    if (date('Y-m-d') == $botdateday) {
        $botclick['day'][$botid] = $botclick['day'][$botid] + 1;
        $botstr = "<?php\n";
        for ($i = 1; $i <= $botnum; $i++) {
            $botstr .= "\$botclick['day']['$i']='" . $botclick['day'][$i] . "';\n";
        }
        $botstr .= "?>";
    } else {
        $timenew = 1;
        $botdateday = date('Y-m-d');
        copy(PT_DIR . 'plus/bot/data/day1.php', PT_DIR .
            'plus/bot/data/day2.php');
        copy(PT_DIR . 'plus/bot/data/day.php', PT_DIR .
            'plus/bot/data/day1.php');
        $botstr = "<?php\n";
        for ($i = 1; $i <= $botnum; $i++) {
            if ($i == $botid) {
                $botstr .= "\$botclick['day']['$i']='1';\n";
            } else {
                $botstr .= "\$botclick['day']['$i']='0';\n";
            }
    
        }
        $botstr .= "?>";
    }
    $pt->writeto($file, $botstr);
    
    //写入周记录
    $file = PT_DIR . 'plus/bot/data/week.php';
    include $file;
    
    if (date('W') == $botdateweek) {
        $botclick['week'][$botid] = $botclick['week'][$botid] + 1;
        $botstr = "<?php\n";
        for ($i = 1; $i <= $botnum; $i++) {
            $botstr .= "\$botclick['week']['$i']='" . $botclick['week'][$i] . "';\n";
        }
        $botstr .= "?>";
    } else {
        $timenew = 1;
        $botdateweek = date('W');   
        $botstr = "<?php\n";
        for ($i = 1; $i <= $botnum; $i++) {
            if ($i == $botid) {
                $botstr .= "\$botclick['week']['$i']='1';\n";
            } else {
                $botstr .= "\$botclick['week']['$i']='0';\n";
            }
    
        }
        $botstr .= "?>";
    }
    $pt->writeto($file, $botstr);
    
    //写入月记录
    $file = PT_DIR . 'plus/bot/data/month.php';
    include $file;
    if (date('Y-m') == $botdatemonth) {
        $botclick['month'][$botid] = $botclick['month'][$botid] + 1;
        $botstr = "<?php\n";
        for ($i = 1; $i <= $botnum; $i++) {
            $botstr .= "\$botclick['month']['$i']='" . $botclick['month'][$i] . "';\n";
        }
        $botstr .= "?>";
    } else {
        $timenew = 1;
        $botdatemonth = date('Y-m');
        $botstr = "<?php\n";
        for ($i = 1; $i <= $botnum; $i++) {
            if ($i == $botid) {
                $botstr .= "\$botclick['month']['$i']='1';\n";
            } else {
                $botstr .= "\$botclick['month']['$i']='0';\n";
            }
    
        }
        $botstr .= "?>";
    }
    $pt->writeto($file, $botstr);
    
    //写入年记录
    $file = PT_DIR . 'plus/bot/data/year.php';
    include $file;
    if (date('Y') == $botdateyear) {
        $botclick['year'][$botid] = $botclick['year'][$botid] + 1;
        $botstr = "<?php\n";
        for ($i = 1; $i <= $botnum; $i++) {
            $botstr .= "\$botclick['year']['$i']='" . $botclick['year'][$i] . "';\n";
        }
        $botstr .= "?>";
    } else {
        $timenew = 1;
        $botdateyear = date('Y');
        $botstr = "<?php\n";
        for ($i = 1; $i <= $botnum; $i++) {
            if ($i == $botid) {
                $botstr .= "\$botclick['year']['$i']='1';\n";
            } else {
                $botstr .= "\$botclick['year']['$i']='0';\n";
            }
    
        }
        $botstr .= "?>";
    }
    $pt->writeto($file, $botstr);
    
    //写入总记录
    $file = PT_DIR . 'plus/bot/data/all.php';
    include $file;
    $botclick['all'][$botid] = $botclick['all'][$botid] + 1;
    $botstr = "<?php\n";
    for ($i = 1; $i <= $botnum; $i++) {
        $botstr .= "\$botclick['all']['$i']='" . $botclick['all'][$i] . "';\n";
    }
    $botstr .= "?>";
    $pt->writeto($file, $botstr);
    
	unset ($botclick);
    //重写时间验证文件
    if ($timenew == 1) {
        $botstr = "<?php\n";
        $botstr .= "\$botdateday='$botdateday';\n";
        $botstr .= "\$botdateweek='$botdateweek';\n";
        $botstr .= "\$botdatemonth='$botdatemonth';\n";
        $botstr .= "\$botdateyear='$botdateyear';\n";
        $botstr .= "?>";
        $pt->writeto(PT_DIR . 'plus/bot/data/botdate.php', $botstr);
    }
}

?>