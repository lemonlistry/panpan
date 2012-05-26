<?php
if (file_exists('../data/install.lock')){
    exit('您已经安装过<b>PT小说程序</b>,重新安装请删除data目录下install.lock文件');
}
header('location:install.php');
?>
