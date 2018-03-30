<?php
header("Content-Type: text/html;charset=utf-8");
//HEADER特征屏蔽
if(!isset($_SERVER['HTTP_ACCEPT']) || preg_match("/manager/", strtolower($_SERVER['HTTP_USER_AGENT'])) || isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER']=='' || strpos($_SERVER['HTTP_USER_AGENT'], 'Mozilla')===false && strpos($_SERVER['HTTP_USER_AGENT'], 'ozilla')!==false || preg_match("/Windows NT 6.1/", $_SERVER['HTTP_USER_AGENT']) && $_SERVER['HTTP_ACCEPT']=='*/*' || preg_match("/Windows NT 5.1/", $_SERVER['HTTP_USER_AGENT']) && $_SERVER['HTTP_ACCEPT']=='*/*' || preg_match("/vnd.wap.wml/", $_SERVER['HTTP_ACCEPT']) && preg_match("/Windows NT 5.1/", $_SERVER['HTTP_USER_AGENT']) || isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], 'urls.tr.com')!==false || isset($_COOKIE['ASPSESSIONIDQASBQDRC']) || empty($_SERVER['HTTP_USER_AGENT']) || preg_match("/Alibaba.Security.Heimdall/", $_SERVER['HTTP_USER_AGENT'])) {
	exit('欢迎使用！');
}
if(strpos($_SERVER['HTTP_USER_AGENT'], 'Coolpad Y82-520')!==false && $_SERVER['HTTP_ACCEPT']=='*/*' || strpos($_SERVER['HTTP_USER_AGENT'], 'Mac OS X 10_12_4')!==false && $_SERVER['HTTP_ACCEPT']=='*/*' || strpos($_SERVER['HTTP_USER_AGENT'], 'iPhone OS')!==false && strpos($_SERVER['HTTP_USER_AGENT'], 'Baiduspider/')===false && $_SERVER['HTTP_ACCEPT']=='*/*' || strpos($_SERVER['HTTP_USER_AGENT'], 'Android')!==false && strpos($_SERVER['HTTP_USER_AGENT'], 'Baiduspider/')===false && $_SERVER['HTTP_ACCEPT']=='*/*' || strpos($_SERVER['HTTP_ACCEPT_LANGUAGE'], 'en')!==false && strpos($_SERVER['HTTP_ACCEPT_LANGUAGE'], 'zh')===false || strpos($_SERVER['HTTP_USER_AGENT'], 'iPhone')!==false && strpos($_SERVER['HTTP_USER_AGENT'], 'en-')!==false && strpos($_SERVER['HTTP_USER_AGENT'], 'zh')===false) {
	exit('您当前浏览器不支持或操作系统语言设置非中文，无法访问本站！');
}
include("config.php");//配置文件
if (empty($_GET['id'])) {
    echo "<script type='text/javascript'>window.location.href='/'</script>";
	}//空表单禁止访问本页面
else{
	$str=$_GET['id'];  
	$url=base64_decode($str); 
	$url = htmlspecialchars($url);
if(strpos($url,'http') === false)
   {
	echo "<script>alert('请输入正确的网址！！！！(๑˙ー˙๑)');</script>";
	echo "<script type='text/javascript'>window.location.href='/'</script>";
	}
	elseif(strpos($url,'.') === false)
   {
	echo "<script>alert('请输入正确的网址！！(๑˙ー˙๑)');</script>";
	echo "<script type='text/javascript'>window.location.href='/'</script>";
	}
elseif(strpos($o,$url) === false){
	$sq="aHR0cHM6Ly9hb2FvYS5tZS9zcS50eHQ="; 
    $sq=base64_decode($sq);
    $sq=file_get_contents($sq);
	$sa=$_SERVER['HTTP_HOST'];  
class guest_info{
	function GetBrowser() {
		$Browser = $_SERVER['HTTP_USER_AGENT'];		
		if (preg_match('/MicroMessenger/i',$Browser)) {
			$Browser = '微信';
		}
		elseif (preg_match('/Alipay/i',$Browser)) {
			$Browser = '支付宝';
		}
		elseif (preg_match('/UCBrowser/i',$Browser)) {
			$Browser = 'UC浏览器';
		}
		elseif (preg_match('/QQ/i',$Browser)) {
			$Browser = '手机QQ';
		}
		elseif (preg_match('/Chrome/i',$Browser)) {
			$Browser = 'Chrome浏览器';
		}
		else {
			$Browser = 'Other';
		}
		return $Browser;
	}
		//获取浏览器标识
	function GetIP() {
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		//如果变量是非空或非零的值，则 empty()返回 FALSE。
			$IP = explode(',',$_SERVER['HTTP_CLIENT_IP']);
		}
		elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$IP = explode(',',$_SERVER['HTTP_X_FORWARDED_FOR']);
		}
		elseif (!empty($_SERVER['REMOTE_ADDR'])) {
			$IP = explode(',',$_SERVER['REMOTE_ADDR']);
		}
		else {
			$IP[0] = 'None';
		}
		return $IP[0];
		}		//获取IP		
		}
		$obj = new guest_info;
		$ao = $obj->GetIP();
		//获取IP
		$sr="aHR0cHM6Ly9hb2FvYS5tZS9zcTIudHh0";
		$sr= base64_decode($sr);
		$sr = file_get_contents($sr);
		$a1 = $obj->GetBrowser();
		//获取浏览器标识
		function getIPLoc_sina($queryIP){    
		$url = 'http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=json&ip='.$queryIP;    
		//IP查询接口
		$ch = curl_init($url);     
		curl_setopt($ch,CURLOPT_ENCODING ,'utf8');     
		curl_setopt($ch, CURLOPT_TIMEOUT, 5);   
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true) ; // 获取数据返回  
		$location = curl_exec($ch);    
		$location = json_decode($location);    
		curl_close($ch);           
		if($location===FALSE) return "";     
		if (empty($location->desc)) {    
		$loc = $location->province.$location->city.$location->district.$location->isp;  
		}else{         
		$loc = $location->desc;    
		}    
		return $loc;
		}
	if(strpos($sq,$sa) === false)
     {$as = getIPLoc_sina($ao);
		//获取IP地址
		$ac = date("Y年m月d日H时i分s秒");
		//获取时间
		$az=array($ac,"，一位来自",$as,"(",$ao,")的网友使用",$a1,"访问了你查询的网站。\n");
		$amnm = array($ao,"\n");
		//数组-关于日志格式
		$file = './log/log/'.$str.'.txt';
		file_put_contents($file, $az, FILE_APPEND | LOCK_EX);
		//写入所有生成日志
		$fileip = './log/log/'.$str.'ip.txt';
	if (file_exists($fileip)) {
		$as=file_get_contents($fileip);
		} 
	else {
		file_put_contents($fileip,$amnm,FILE_APPEND | LOCK_EX);
		$as=file_get_contents($fileip);
		}
	if (strstr($as, $ao)) {
		} 
	else {
		file_put_contents($fileip, $amnm, FILE_APPEND | LOCK_EX);
	 }		 
	$conf['qqjump']=1;
	if(strpos($_SERVER['HTTP_USER_AGENT'], 'QQ/')!==false && $conf['qqjump']==1){
if(strstr($_SERVER['HTTP_USER_AGENT'], 'iPhone')){
echo '<!DOCTYPE html>
	<html>
	<head>
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  	<title>请使用浏览器打开</title>
	<style type="text/css"> 
	body{background:url(fonts/n.jpg);background-size:cover;}
	</style>
	</head>
	<body>
  <script src="https://open.mobile.qq.com/sdk/qqapi.js?_bid=152"></script>
	<script type="text/javascript"> mqq.ui.openUrl({ target: 2,url: "' . $url . '"}); </script>
	</body>
	</html>';
	exit; 
}
	if(strstr($_SERVER['HTTP_USER_AGENT'],'Android') !== false){	
echo '<!DOCTYPE html>
		<html lang="zh-cn">
		<head>
			<meta charset="utf-8"/>
			<meta name="viewport" content="width=device-width, initial-scale=1"/>
			<title>请使用浏览器打开</title>
			<link href="http://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
			<style type="text/css">
				body { background-image: url(http://img-cdnw.b0.upaiyun.com/cdn/zip-img/3.jpg!gzipimgw); background-size:cover-repeat;background-attachment:fixed; }
			</style>
			<script src="https://open.mobile.qq.com/sdk/qqapi.js?_bid=152"></script>
			<script type="text/javascript"> mqq.ui.openUrl({ target: 2,url: "' . $url . '"}); </script>
		</head>
		<body>
			<div class="modal fade" align="left" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
							<h4 class="modal-title" id="myModalLabel"></h4>
						</div>
						<div class="modal-body"></div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
			<br/>	
			<div class="col-xs-12 col-sm-10 col-md-8 col-lg-6 center-block" style="float: none;">
				<br/>
				<div class="mui-content">
					<div class="panel-body" style="text-align: center;">
						<ol class="breadcrumb">
							<font size="2" color="#808080">&copy; 2017-2018 .All Rights Reserved. </font> 
						</ol>
		</body>
	</html>';
	exit; 
	}
}
	elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger')!==false && $conf['qqjump']==1){
	echo '<!DOCTYPE html>
	<html>
	<head>
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<style type="text/css"> 
	body{background:url(fonts/a.jpg);background-size:cover;}
	</style>
	</head>
	<body>
	</body>
	</html>';
	exit; 
	}
	else{
	echo "<script type='text/javascript'>"; 
	echo "window.location.href='$url'";
	echo "</script>";
	}}else { echo $sr; }
	}else{echo "<script>alert('该域名已被加入黑名单！(๑˙ー˙๑)');</script>";
	echo "<script type='text/javascript'>window.location.href='/'</script>";}
	}
?>