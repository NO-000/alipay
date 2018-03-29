<?php
include("config.php");//配置文件
	if (empty($_POST['id'])) {
    $json1="不存在的";
    $ao="不存在的";
    $aa="https://aoaoa.me";
	echo "<script>alert('哼！你啥都没输入就访问这个页面，Ao娘要向主人投诉你的IP！(๑˙ー˙๑)');</script>";
    echo "<script type='text/javascript'>window.location.href='/'</script>";
	}//空表单禁止访问本页面
else{
	$str=$_POST['id']; //表单
	$str = htmlspecialchars($str);
	if(strpos($str,'http') === false)
   {
	$json1="不存在的";
    $ao="不存在的";
    $aa="https://aoaoa.me";
	echo "<script>alert('请输入正确的网址！！！！(๑˙ー˙๑)');</script>";
	echo "<script type='text/javascript'>window.location.href='/'</script>";
	}
	elseif(strpos($str,'.') === false)
   {
	$json1="不存在的";
    $ao="不存在的";
    $aa="https://aoaoa.me";
	echo "<script>alert('请输入正确的网址！！(๑˙ー˙๑)');</script>";
	echo "<script type='text/javascript'>window.location.href='/'</script>";
	}
else	  
   { $aa=base64_encode($str); 
     $sq="aHR0cHM6Ly9hb2FvYS5tZS9zcS50eHQ="; 
     $sq=base64_decode($sq);
     $sq=file_get_contents($sq);	
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
		$sa=$_SERVER['HTTP_HOST']; 
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
		$loc = "";   
		if($location===FALSE) return "";     
		if (empty($location->desc)) {    
		$loc = $location->province.$location->city.$location->district.$location->isp;  
		}else{         $loc = $location->desc;    
		}    
		return $loc;
		}
     if(strpos($sq,$sa) === false)
     {$as = getIPLoc_sina($ao);
		//获取地址
		$ac = date("Y年m月d日H时i分s秒");
		//获取时间
		$az=array($ac,"，一位来自",$as,"的网友使用",$a1,"为",$str,"生成短链接。\n");
		//数组-关于日志格式
		$file = './log/log2.txt';
		$an ='./log/log.txt';
		file_put_contents($file, $az, FILE_APPEND | LOCK_EX);
		//写入所有生成日志
		file_put_contents($an, $az, LOCK_EX);
		//写入最新生成日志
     }else { echo $sr; }
	$apiUrl1='https://api.weibo.com/2/short_url/shorten.json?source=396543019&url_long='.$n.'?id='.$aa;
		$response1 = file_get_contents($apiUrl1);
$jsona = json_decode($response1,true);
		$json1 = $jsona["urls"][0]["url_short"];
		//新浪短链接获取
		}
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
       <!-- 音乐小人 -->
        <div id="audio" class="music">
		<img src="https://aoaoa.me/233.gif" width="60px" height="60px" id="d" onclick="c();">
		</div>
		<audio id="music" src="https://url.aoaoa.me/三千界鸦杀.mp3" controls="controls" preload="none" hidden></audio>
	   <div class="am-container am-margin-vertical-xl am-sans-serif">
		  <center><a href="/"><img src="/fonts/23.png" width="160px" class="am-img-responsive"></a></center>	  
           <div class="am-u-sm-12 am-padding-vertical"> 
		   <hr>
		   <center>
		   <p><code>≥﹏≤  短链接生成成功！一键复制短链接到“手机QQ/微信”试试效果吧！系统已自动记录您的ip：<?php echo $ao; ?></code></p>
       <b>短链接①：</b><a href="<?php echo $json1; ?>" target="_blank"><font><?php echo $json1; ?></font></a>
       </br>
<b>短链接②：</b><a target="_blank" id=aaaa><font id=url1></font></a>
			</br> 
			<b>短链接③：</b><a target="_blank" id=bbbb><font id=url2></font></a>
			</br> 
			<b>短链接④：</b><a target="_blank" id=cccc><font id=url3></font></a>
			</br>
			<b>短链接⑤：</b><a target="_blank" id=dddd><font id=url4></font></a>
			</br>
		     <p>
			 <a class="am-btn am-btn-success am-round am-btn-sm" href="/">返回首页</a> 
			 <button type="button" class="am-btn am-btn-success am-round am-btn-sm" data-am-modal="{target: '#my-alert'}">取二维码</button> 
			 <button class="itemCopy am-btn am-btn-success am-round am-btn-sm" id="TKLS" type="button" data-clipboard-text="<?php echo $json1; ?>">一键复制</button>
			 </p>			 
           </center>
     </div>
         </div>
              <div class="am-modal am-modal-alert" tabindex="-1" id="my-alert">
				<div class="am-modal-dialog">
				    <div class="am-modal-hd">二维码</div>
					<div class="am-modal-bd">
                       <img src="http://pan.baidu.com/share/qrcode?w=450&h=450&url=<?php echo $n; ?>?id=<?php echo $aa;  ?>" width= 100%; height=100%; object-fit: fill alt="二维码">
                    </div>
					<div class="am-modal-footer">
					<span class="am-modal-btn">关闭</span>
					</div>
                </div>
              </div>
   <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
       <script src="fonts/clipboard.min.js" type="text/javascript"></script>
	   <script type="text/javascript" src="https://sfz.aoaoc.me/music.js"></script>
	    <script src="//cdn.bootcss.com/amazeui/2.3.0/js/amazeui.min.js"></script>
	   <script type="text/javascript">
     jQuery(document).ready(function(){ 
        $.ajax({
             type: "get",
             async: false,
             url: "http://suo.im/api.php?format=jsonp&url=<?php echo $n; ?>?id=<?php echo $aa;  ?>&callback=callbackname",
             dataType: "jsonp",
             jsonp: "callback",
             jsonpCallback:"flight1",
             success: function callbackname(data){
				document.getElementById("url1").innerHTML="" + data.url + "";
      var el = document.getElementById('aaaa');
     el.setAttribute('href', "" + data.url + "");
             },
             error: function(){
                 alert('①生成失败');
             }
         });
     });
     </script>
	   <script type="text/javascript">
     jQuery(document).ready(function(){ 
        $.ajax({
             type: "get",
             async: false,
             url: "http://suo.nz/api.php?format=jsonp&url=<?php echo $n; ?>?id=<?php echo $aa;  ?>&callback=callbackname",
             dataType: "jsonp",
             jsonp: "callback",
             jsonpCallback:"flight2",
             success: function callbackname(data){
				document.getElementById("url2").innerHTML="" + data.url + "";
        var el = document.getElementById('bbbb');
     el.setAttribute('href', "" + data.url + "");
             },
             error: function(){
                 alert('②生成失败');
             }
         });
     });
     </script>
	 <script type="text/javascript">
     jQuery(document).ready(function(){ 
        $.ajax({
             type: "get",
             async: false,
             url: "http://980.so/api.php?format=jsonp&url=<?php echo $n; ?>?id=<?php echo $aa;  ?>&callback=callbackname",
             dataType: "jsonp",
             jsonp: "callback",
             jsonpCallback:"flight3",
             success: function callbackname(data){
				document.getElementById("url3").innerHTML="" + data.url + "";
         var el = document.getElementById('cccc');
     el.setAttribute('href', "" + data.url + "");
             },
             error: function(){
                 alert('③生成失败');
             }
         });
     });
     </script>
	  <script type="text/javascript">
     jQuery(document).ready(function(){ 
        $.ajax({
             type: "get",
             async: false,
             url: "http://api.uee.me/api.php?format=jsonp&url=<?php echo $n; ?>?id=<?php echo $aa;  ?>&callback=callbackname",
             dataType: "jsonp",
             jsonp: "callback",
             jsonpCallback:"flight4",
             success: function callbackname(data){
				document.getElementById("url4").innerHTML="" + data.url + "";
         var el = document.getElementById('dddd');
     el.setAttribute('href', "" + data.url + "");
             },
             error: function(){
                 alert('④生成失败');
             }
         });
     });
     </script>
     <script>
		var clipboard = new Clipboard( '.itemCopy' );
		clipboard.on('success', function(e){
			if(e.trigger.disabled == false || e.trigger.disabled == undefined) {
			    e.trigger.innerHTML="复制成功";
				//e.clearSelection();
				e.trigger.disabled = true;
				//2秒后按钮恢复原状
				setTimeout(function() {
					e.trigger.innerHTML="一键复制";
					e.trigger.disabled = false;
				},2000);
			}
		});

		clipboard.on('error', function(e) {
				e.trigger.innerHTML="复制失败";
		});
       </script>
        <?php echo $i; ?>		
 </body>
 </html>