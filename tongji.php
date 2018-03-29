<?php
include("config.php");//配置文件
if (empty($_POST['id'])) {
   $str="不存在";
   $arrays=array("不存在","嗯嗯");
   $cn = 1;
	$cm = 1; 
	echo "<script>alert('哼！你啥都没输入就访问这个页面，Ao娘要向主人投诉你的IP！(๑˙ー˙๑)');</script>";
    echo "<script type='text/javascript'>window.location.href='/'</script>";
	}//空表单禁止访问本页面
else{
	$str=$_POST['id'];  
 $str = htmlspecialchars($str);
if(strpos($str,'http') === false)
   {
    $arrays=array("不存在","嗯嗯");
    $cn = 1;
	$cm = 1; 
	echo "<script>alert('请输入正确的网址！！！！(๑˙ー˙๑)');</script>";
	echo "<script type='text/javascript'>window.location.href='/'</script>";
	}//判断表单内容
elseif(strpos($str,'.') === false)
   {
    $arrays=array("不存在","嗯嗯");
    $cn = 1;
	$cm = 1; 
	echo "<script>alert('请输入正确的网址！！(๑˙ー˙๑)');</script>";
	echo "<script type='text/javascript'>window.location.href='/'</script>";
	}//判断表单内容
else{
	$url=base64_encode($str); //加密表单
	$apiUrl1='./log/log/'.$url.'.txt';
    $apiUrl2='./log/log/'.$url.'ip.txt';
if(file_exists($apiUrl1))
	{
	$content = file_get_contents($apiUrl1);//读取日志
	$array = explode("\n", $content);//分割成数组
	$arrays = array_reverse($array);//反向排列数组
	$contentas = file_get_contents($apiUrl2);//读取日志
	$arrayas = explode("\n", $contentas);//分割成数组
	$cn = count($arrayas);
	$cm = count($arrays); 
	}
else{
    $arrays=array("不存在","嗯嗯");
    $cn = 1;
	$cm = 1; 
	echo "<script>alert('没有相关记录！(๑˙ー˙๑)');</script>";
	echo "<script type='text/javascript'>window.location.href='/'</script>";
    }
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
		   <p><code>≥﹏≤  数据查询成功！你查询的网址是：“<span class="am-badge am-badge-primary am-round"><small><?php echo $str; ?></small></span>”，该网址通过防红系统一共被访问过“<span class="am-badge am-badge-success am-round"><small><?php echo ($cm-1); ?></small></span>”次，一共有“<span class="am-badge am-badge-success am-round"><small><?php echo ($cn-1); ?></small></span>”个IP。以下为详细记录</code></p>
			<?php foreach($arrays as $key=>$item){
			if(strpos($item,'网站')!==false)
			echo "<span class='am-badge am-badge-success am-round'>". $key."</span>. ".$item."<hr>";
			} //查找数组键值?>
		     <p>
			 <a class="am-btn am-btn-success am-round am-btn-sm" href="/">返回首页</a> 
			 <button class="itemCopy am-btn am-btn-success am-round am-btn-sm" id="TKLS" type="button" data-clipboard-text="我是傻逼">一键复制</button>
			 </p>			 
           </center>
          </div>
       </div>
       <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
       <script src="fonts/clipboard.min.js" type="text/javascript"></script>
	   <script type="text/javascript" src="https://sfz.aoaoc.me/music.js"></script>
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
	   <!-- 统计代码 -->
      <?php echo $i; ?>		
 </body>
 </html>