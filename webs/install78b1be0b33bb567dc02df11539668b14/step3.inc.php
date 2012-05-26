<?php include 'header.share.php';?>
	 <table width="100%" cellpadding="0" cellspacing="0" class="table_list">
                  <tr>
                    <th>检查项目</th>
                    <th>当前环境</th>
                    <th>建议环境</th>
                    <th>功能影响</th>
                  </tr>
                  <tr>
                    <td>操作系统</td>
                    <td><?php echo php_uname();?></td>
                    <td>Windows_NT/Linux/Freebsd</td>
                    <td><font color="yellow">&radic;</font></td>
                  </tr>
                  <tr>
                    <td>Web 服务器</td>
                    <td><?php echo $_SERVER['SERVER_SOFTWARE'];?></td>
                    <td>Apache/IIS</td>
                    <td><font color="yellow">&radic;</font></td>
                  </tr>
                  <tr>
                    <td>php 版本</td>
                    <td>php <?php echo phpversion();?></td>
                    <td>php 5.0.0 及以上</td>
                    <td><?php if(phpversion() >= '5.0.0'){ ?><font color="yellow">&radic;<?php }else{ ?><font color="red">无法正常使用</font><?php }?></font></td>
                  </tr>
                  <tr>
                    <td>Mysql 扩展</td>
                    <td><?php if(extension_loaded('mysql')){ ?>&radic;<?php }else{ ?>&times;<?php }?></td>
                    <td>必须开启</td>
                    <td><?php if(extension_loaded('mysql')){ ?><font color="yellow">&radic;</font><?php }else{ ?><font color="red">无法正常使用</font><?php }?></td>
                  </tr>
                  <tr>
                    <td>GD 扩展</td>
                    <td><?php if(function_exists( "gd_info" )){ ?>&radic; (支持 png jpg gif) <?php }else{ ?>&times;<?php }?></td>
                    <td>必须开启</td>
                    <td><?php if(function_exists( "gd_info" )){ ?><font color="yellow">&radic;</font><?php }else{ ?><font color="red">无法添加图片水印及生成验证码</font><?php }?></td>
                  </tr>
                  <tr>
                    <td>allow_url_fopen</td>
                    <td><?php if(ini_get('allow_url_fopen')){ ?>&radic;<?php }else{ ?>&times;<?php }?></td>
                    <td>必须开启</td>
                    <td><?php if(ini_get('allow_url_fopen')){ ?><font color="yellow">&radic;</font><?php }else{ ?><font color="red">无法获取远程数据</font><?php }?></td>
                  </tr>
                  <tr>
                    <td>Zlib 扩展</td>
                    <td><?php if(extension_loaded('zlib')){ ?>&radic;<?php }else{ ?>&times;<?php }?></td>
                    <td>建议开启</td>
                    <td><?php if(extension_loaded('zlib')){ ?><font color="yellow">&radic;</font><?php }else{ ?><font color="red">不支持Gzip功能</font><?php }?></td>
                  </tr>                  
                  <tr>
                    <td>Curl 扩展</td>
                    <td><?php if(function_exists("curl_init")){ ?>&radic;<?php }else{ ?>&times;<?php }?></td>
                    <td>建议开启</td>
                    <td><?php if(function_exists("curl_init")){ ?><font color="yellow">&radic;</font><?php }else{ ?><font color="red">无法模拟登陆</font><?php }?></td>
                  </tr>
                  <tr>
                    <td>PHP信息 PHPINFO</td>
                    <td colspan="3" align="center"><a href="install.php?act=phpinfo" target="_blank" style="text-decoration:underline;" title="查看PHPINFO信息">PHPINFO</a></td>
                  </tr>
                </table>
        <form id="install" action="install.php" method="get">
            <input type="hidden" name="step" value="4" />
        </form>
        <input type="button" onclick="javascript:history.go(-1);" value="返回上一步 : 软件许可协议" class="btn" />
        <input type="button" onclick="$('#install').submit();" class="btn" value="下一步 : 文件权限检测" />
  </div>
</div>
</body>
</html>