<?php
include("head.php");
   if (file_exists("install.lock")) {
	echo "<script>alert('请先删除后台目录下的install.lock目录！');</script>";
    echo "<script type='text/javascript'>window.location.href='/admin'</script>";
exit;
	}
  elseif (empty($_POST['a'])) {
	echo "<script>alert('哼！你啥都没输入就访问这个页面，Ao娘要向主人投诉你的IP！(๑˙ー˙๑)');</script>";
    echo "<script type='text/javascript'>window.location.href='/'</script>";
exit;
	}//空表单禁止访问本页面
	else{
	$aaa=file_get_contents("mod.php");
	$aaa=str_replace("m1n",$_POST['a'],$aaa);
	$aaa=str_replace("m2n",$_POST['b'],$aaa);
	$aaa=str_replace("m3n",$_POST['c'],$aaa);
	$aaa=str_replace("m4n",$_POST['d'],$aaa);
	$aaa=str_replace("m5n",$_POST['e'],$aaa);
	$aaa=str_replace("m6n",$_POST['f'],$aaa);
	$aaa=str_replace("m7n",$_POST['g'],$aaa);
	$aaa=str_replace("m8n",$_POST['h'],$aaa);
	$aaa=str_replace("m9n",$_POST['i'],$aaa);
	$aaa=str_replace("m10n",$_POST['j'],$aaa);
	$aaa=str_replace("m11n",$_POST['k'],$aaa);
	$aaa=str_replace("m12n",$_POST['l'],$aaa);
	$aaa=str_replace("m13n",$_POST['m'],$aaa);
	$aaa=str_replace("m14n",$_POST['n'],$aaa);
  $aaa=str_replace("m15n",$_POST['o'],$aaa);
  $aaa=str_replace("m16n",$_POST['user'],$aaa);
  $aaa=str_replace("m17n",$_POST['pass'],$aaa);
	file_put_contents('../config.php',$aaa, LOCK_EX);
if($_POST['lock']==2){
	$dir = iconv("UTF-8", "GBK", "install.lock");
	mkdir ($dir,0777,true);
}
	echo "<script>alert('修改成功！');</script>";
echo "<script type='text/javascript'>window.location.href='/admin'</script>";
	}
?>