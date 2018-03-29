<?php
header("Content-Type:text/html;Charset=utf8");
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:POST');
header('Access-Control-Allow-Methods:GET');
header('Access-Control-Allow-Headers:x-requested-with,content-type');
 include("config.php");//配置文件
	if (empty($_GET['url'])) {
		$count=urlencode('Error');	
		$result=array("code"=> 0,"msg"=>$count);
		exit(urldecode(json_encode($result)));	
	}
	$str=$_GET['url'];
	if(strstr($str,'http')){
	$str = htmlspecialchars($str);
	}
	else{
	$str = htmlspecialchars('http://'.$str);
	}
	$aa=base64_encode($str); //表单
$apiUrl1='http://api.t.sina.com.cn/short_url/shorten.json?source=3818214747&url_long='.$n.'?id='.$aa;
		$response1 = file_get_contents($apiUrl1);
		$jsona = json_decode($response1);
		$json1 = $jsona[0]->url_short;
	$count=urlencode($json1);	
	$result=array("code"=> 1,"short_url"=>$count);
	exit(urldecode(json_encode($result)));	
?>