<?php
include("config.php");//配置文件
if (empty($_POST['id'])) {
  $str="不存在";
  $arrays=array("不存在","嗯嗯");
  $arrayas="不存在";
  echo "<script>alert('哼！你啥都没输入就访问这个页面，Ao娘要向主人投诉你的IP！(๑˙ー˙๑)');</script>";
  echo "<script type='text/javascript'>window.location.href='/'</script>";
	}//空表单禁止访问本页面
else{
  $str = $_POST['id'];
  $str = htmlspecialchars($str);
  $log = "./log/log2.txt";
  $content = file_get_contents($log);//读取日志
  $array = explode("\n", $content);//分割为数组
  $arrays = array_reverse($array);
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
		   <p><code>≥﹏≤  日志查询成功！你查询的关键词是：“<span class="am-badge am-badge-primary am-round"><small><?php echo $str; ?></small></span>”，显示空白说明没有相关记录。</code></p>
			<?php foreach($arrays as $key=>$item){
			if(strpos($item,$str)!==false)
			echo  "<span class='am-badge am-badge-success am-round'>".$key."</span>. ".$item."<hr>";
			} //查找数组键值?>  
		     <p>
			 <a class="am-btn am-btn-success am-round am-btn-sm" href="/">返回首页</a> 
			 <button class="itemCopy am-btn am-btn-success am-round am-btn-sm" id="TKLS" type="button" data-clipboard-text="<?php echo $str; ?>">一键复制</button>
			 </p>			 
           </center>
           </div>
        </div>
       <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
       <script src="fonts/clipboard.min.js" type="text/javascript"></script>
	   <script type="text/javascript" src="https://sfz.aoaoc.me/music.js"></script>
       <script>
		var clipboard = new Clipboard( '.itemCopy' );//一键复制
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