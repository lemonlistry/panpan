<?php
//参数设置

class pt_tpl extends pt
{
    function gettpl($tplname, $tpldir = PT_TPL)
    {
        $tplfile = PT_DIR . PT_TPLDIR . $tpldir . '/' . $tplname . '.html';
        $cachefile = PT_DIR . 'cache/' . PT_TPLDIR . $tpldir . '/' . $tplname . '.tpl.php';
        $cachecheck = PT_DIR . 'cache/' . PT_TPLDIR . $tpldir . '/' . $tplname . '.check.php';
        if (!file_exists($tplfile)) {
            exit('模板文件' . $tplname . '.htm不存在!(' . $tplfile . ')');
        }
        //判断是否需要重新解析
        if (file_exists($cachecheck) and file_exists($cachefile) and PT_CACHE_BLOCK ==
            "true") {
            include $cachecheck;
            if (md5($tplfile) == $md5check && filemtime($tplfile) == $timecheck) {
                //echo "不需要再次解析<br><br>";
                return $cachefile;
            }
        }
        return pt_tpl::parser($tplname, $tpldir);

    }

    function parser($tplname, $tpldir = PT_TPL)
    {
		
        $tplfile = PT_DIR . PT_TPLDIR . $tpldir . '/' . $tplname . '.html';
        $cachefile = PT_DIR . 'cache/' . PT_TPLDIR .$tpldir . '/' . $tplname . '.tpl.php';
        $cachecheck = PT_DIR . 'cache/' . PT_TPLDIR . $tpldir . '/' . $tplname . '.check.php';


        //读取内容
        if (!file_exists($tplfile)) {
            exit('模板文件' . $tplname . '.htm不存在!(' . $tplfile . ')');
        }

        //判断是否需要重新解析
        if (file_exists($cachecheck) and file_exists($cachefile) and PT_CACHE_BLOCK ==
            "true") {
            include $cachecheck;
            if (md5($tplfile) == $md5check && filemtime($tplfile) == $timecheck) {
                //echo "不需要再次解析<br><br>";
                return $cachefile;
            }
        }

        ///echo "修改后第一次解析<br><br>";

        //写入解析校验文件
        $checkstr = "<?php\n";
        $checkstr .= '$md5check="' . md5($tplfile) . '";' . "\n";
        $checkstr .= '$timecheck="' . filemtime($tplfile) . '";' . "\n";
        $checkstr .= "?>";

        pt_tpl::writeto($cachecheck, $checkstr);

        //读取内容
        $htmlstr = file_get_contents($tplfile);

        //替换内容

        //替换引入文件
        $htmlstr = preg_replace("/\{pt.gettpl.user.([_0-9a-zA-Z]+)\}/ies", "\n" .
            "file_get_contents(pt_tpl::gettpl('\\1','user'))" . "\n", $htmlstr);
		
		$htmlstr = preg_replace("/\{pt.gettpl.wap.([_0-9a-zA-Z]+)\}/ies", "\n" .
            "file_get_contents(pt_tpl::gettpl('\\1','wap'))" . "\n", $htmlstr);
			
        $htmlstr = preg_replace("/\{pt.gettpl.([_0-9a-zA-Z]+)\}/ies", "\n" .
            "file_get_contents(pt_tpl::gettpl('\\1'))" . "\n", $htmlstr);


        //替换函数调用
        $htmlstr = preg_replace("/\{pt.getfunc.(.+?)\}/ies", "\n" .
            "pt_tpl::strrptags('<?php echo \\1?>')", $htmlstr);

        $htmlstr = preg_replace("/\{pt.getindexblock.([0-9]+)\}/ies", "\n" . "pt_tpl::
            strrptags('<?php echo \$pt_templets_block[\'\\1\']?>')", $htmlstr);
        
        $htmlstr = preg_replace("/\{pt.getblocklist.([0-9]+)\}/ies", "\n" . "pt_tpl::
            strrptags('<?php echo \$pt_block_list[\'\\1\']?>')", $htmlstr);
         
        $htmlstr = preg_replace("/\{ptann.([0-9]+).(.+?)\}/ies", "\n" . "pt_tpl::
            strrptags('<?php \$id=count(\$ptann)-\\1+1;echo \$ptann[\$id][\'\\2\']?>')", $htmlstr);   

        //广告调用
        $htmlstr = preg_replace("/\{pt.getad.(.+?)\}/ies", "\n" .
            "pt_tpl::strrptags('<script src=\"'.PT_SITEURL.'files/'.PT_ADDIR.'\\1.js\" type=\"text/javascript\" language=\"javascript\"></script>')",
            $htmlstr);
        //内嵌php代码

        $htmlstr = preg_replace("/\s*\{pt\:php\}\s*(.+?)\s*\{\/pt\:php\}[\n\r\t]*/ies",
            "pt_tpl::strrptags('\n<?php\n \\1 \n?>\n')", $htmlstr);

        //替换循环
        $htmlstr = preg_replace("/\s*\{pt\:list(.+?)row(.+?)([0-9]+)(.+?)\}\s*(.+?)\s*\{\/pt\:list\}[\n\r\t]*/ies",
            "pt_tpl::strrptags('\n<?php\nfor(\$i=1;\$i<=\\3;\$i++){\n?>\n\\5\n<?php\n}\n?>\n')",
            $htmlstr);

        $htmlstr = preg_replace("/\s*\{pt\:for\.(.+?)\}\s*(.+?)\s*\{\/pt\:for\}[\n\r\t]*/ies",
            "pt_tpl::strrptags('\n<?php\nfor(\$i=1;\$i<=\$\\1;\$i++){\n?>\n\\2\n<?php\n}\n?>\n')",
            $htmlstr);

        $htmlstr = preg_replace("/\s*\{pt\:list\s(.+?)row(.+?)([0-9]+)(.+?)\}\s*(.+?)\s*\{\/pt\:list\}/ies",
            "pt_tpl::strrptags('\n<?php\nfor(\$i=1;\$i<=\\3;\$i++){\n?>\n\\5\n<?php\n}\n?>\n')",
            $htmlstr);
        //替换循环中的变量
        $htmlstr = preg_replace("/\s*\{list\.([_0-9a-zA-Z]+)\}/ies",
            "pt_tpl::strrptags('<?php echo \$\\1[\$i]?>')", $htmlstr);

        $htmlstr = preg_replace("/\s*\{list\.([_0-9a-zA-Z]+)\.([_0-9a-zA-Z]+)\}/ies",
            "pt_tpl::strrptags('<?php echo \$\\1[\$i][\'\\2\']?>')", $htmlstr);
        $htmlstr = preg_replace("/\s*\{list\.([_0-9a-zA-Z]+)\.([_0-9a-zA-Z]+)\.([_0-9a-zA-Z]+)\}/ies",
            "pt_tpl::strrptags('<?php echo \$\\1[\$i][\'\\2\'][\'\\3\']?>')", $htmlstr);
        //替换判断
        $htmlstr = preg_replace("/\s*\{pt\:else\}[\n\r\t]*/ies", "pt_tpl::strrptags('\n<?php }else{ ?>\n')",
            $htmlstr);
        $htmlstr = preg_replace("/\s*\{\/pt\:if\}[\n\r\t]*/ies", "pt_tpl::strrptags('{/pt:if}')",
            $htmlstr);
        $countif = substr_count($htmlstr, '{/pt:if}');
        for ($sif = 0; $sif < $countif; $sif++) {
            $htmlstr = preg_replace("/\s*\{pt\:if\s(.+?)\}\s*(.+?)\s*\{\/pt\:if\}[\n\r\t]*/ies",
                "pt_tpl::strrptags('\n<?php\nif(\\1){\n?>\n\\2\n<?php } ?>\n')", $htmlstr);
        }

        //替换普通变量
        $htmlstr = preg_replace('/\s*\{\$(.+?)\}/ie', "pt_tpl::strrptags('<?php echo \$\\1?>')",
            $htmlstr);

        //逐个替换常量
        $htmlstr = str_ireplace('$pt_siteurl', 'PT_SITEURL', $htmlstr);
        $htmlstr = str_ireplace('$pt_shorturl', 'PT_SHORTURL', $htmlstr);
        $htmlstr = str_ireplace('$pt_sitename', 'PT_SITENAME', $htmlstr);
        $htmlstr = str_ireplace('$pt_zzname', 'PT_ZZNAME', $htmlstr);
        $htmlstr = str_ireplace('$pt_zzqq', 'PT_ZZQQ', $htmlstr);
        $htmlstr = str_ireplace('$pt_zzemail', 'PT_ZZEMAIL', $htmlstr);
        $htmlstr = str_ireplace('$pt_beian', 'PT_BEIAN', $htmlstr);
        $htmlstr = str_ireplace('$pt_dir', 'PT_DIR', $htmlstr);
        $htmlstr = str_ireplace('$PT_FILENAME_SEARCH', 'PT_FILENAME_SEARCH', $htmlstr);
        $htmlstr = str_ireplace('$PT_FILENAME_SORT', 'PT_FILENAME_SORT', $htmlstr);
        $htmlstr = str_ireplace('$PT_FILENAME_OVER', 'PT_FILENAME_OVER', $htmlstr);
        $htmlstr = str_ireplace('$PT_FILENAME_TOP', 'PT_FILENAME_TOP', $htmlstr);
        $htmlstr = str_ireplace('$PT_FILENAME_TOPOVER', 'PT_FILENAME_TOP', $htmlstr);
        $htmlstr = str_ireplace('$PT_FILENAME_BOOK', 'PT_FILENAME_BOOK', $htmlstr);
        $htmlstr = str_ireplace('$PT_FILENAME_READ', 'PT_FILENAME_READ', $htmlstr);
        $htmlstr = str_ireplace('$PT_FILENAME_CHAPTER', 'PT_FILENAME_CHAPTER', $htmlstr);
        $htmlstr = str_ireplace('$PT_FILENAME_DOWN', 'PT_FILENAME_DOWN', $htmlstr);
        $htmlstr = str_ireplace('$PT_FILENAME_READEND', 'PT_FILENAME_READEND', $htmlstr);

        //最终处理 去除多余字符
        $htmlstr = pt_tpl::strrptags($htmlstr);
        $htmlstr = trim($htmlstr);

        //判断是否需要写入缓存文件

        //写缓存文件
        pt_tpl::writeto($cachefile, $htmlstr);

        //返回地址
        return $cachefile;
    }

    function strrptags($expr)
    {
        $expr = str_replace('\\"', '"', $expr);
        $expr = str_replace('\"', '"', $expr);
        return $expr;
    }
}
?>