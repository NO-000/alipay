<?php
include("config.php");//配置文件
if (empty($_POST['ly'])) {
		echo "<script>alert('你啥都没输入就访问这个页面');</script>";
		echo "<script type='text/javascript'>window.location.href='/'</script>";
		}
		//空表单禁止访问本页面
else{
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
		$loc = "";   
		if($location===FALSE) return "";     
		if (empty($location->desc)) {    
		$loc = $location->province.$location->city.$location->district.$location->isp;  
		}else{         $loc = $location->desc;    
		}    
		return $loc;
		}
		$as = getIPLoc_sina($ao);
		//获取IP第一个
		$ac = date("Y年m月d日H时i分s秒");
		//获取时间
		$str=$_POST['ly']; 
  $str= htmlspecialchars($str);
		$az=array($ac,"，一位来自",$as,"(",$ao,")的网友使用",$a1,"留言说：",$str,"。\n");
		//数组-关于日志格式
		$file = './log/liu.txt';
		$asa1 = './log/time.txt';
		$asa2 = './log/ly.txt';
		file_put_contents($file, $az, FILE_APPEND | LOCK_EX);
		//写入所有生成日志
        file_put_contents($asa1, $ac, LOCK_EX);
		file_put_contents($asa2, $str, LOCK_EX);
		//写入最新生成日志
}
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
<title><?php echo $a; ?></title>
	  <meta charset="UTF-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	  <!-- 网页关键词 -->
	  <meta name="description" content="<?php echo $c; ?>">
	  <meta name="keywords" content="<?php echo $d; ?>" />
      <link rel="shortcut icon" href="/fonts/favicon.ico">
	  <link rel="stylesheet" href="/fonts/amazeui.css">
	   <!-- 网页背景 -->
	 <style> 
		body{background-image:url(/fonts/bgr.jpg);
        background-repeat:no-repeat;background-attachment:fixed;background-position:center}	.music{position:fixed!important;position:absolute;width:60px;height:65px;z-index:9999;right:0;bottom:0;top:expression(offsetParent.scrollTop+offsetParent.clientHeight-150);cursor:pointer;}
     </style>
</head>
<body>
	<script>alert('提交成功！我已收到你的留言～(￣▽￣～)~')</script>
    <script type='text/javascript'>window.location.href='/'</script>
    <?php echo $i; ?>				
 </body>
 </html>