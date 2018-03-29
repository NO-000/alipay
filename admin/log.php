<?php
include("head.php");
  $apiUrl='../log/log2.txt';
  $content = file_get_contents($apiUrl);//读取日志
  $content = htmlspecialchars($content);
  $array = explode("\n", $content);//分割成数组
  $arrays = array_reverse($array);
  $cm = count($arrays); 
?>
<!DOCTYPE html>
<html lang="zh-cn">
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
		   <center><a href="http://nav.aoaoa.me"><img src="/fonts/23.png" width="160px" class="am-img-responsive"></a></center>	  
           <div class="am-u-sm-12 am-padding-vertical"> 
		   <hr>
		   <center>
		   <p><code>≥﹏≤  系统一共有“<span class="am-badge am-badge-success am-round"><small><?php echo ($cm-1); ?></small></span>”条记录。以下为详细记录</code></p>
				<?php 
if (empty($_GET['page'])) {
$_GET['page']=1;}
$page=$_GET['page']?(int)$_GET['page']:'0';
$page=htmlspecialchars($page);
$size=50;
$pnum = ceil(count($arrays) / $size);
$newArray = array_slice($arrays,($page-1)*$size,$size);
			foreach($newArray as $key=>$item){
if (empty($item)==false) {
		echo "<span class='am-badge am-badge-success am-round'>". $key."</span>. ".$item."<hr>";
}
}
echo '<ul class="am-pagination">';
for($aw=1;$aw<=$pnum-1;$aw++)
{
echo '<li>';
  echo "<a href=\"?page=$aw\"";
  if($aw==$page){echo "style='color:red;'";};
  echo ">$aw</a>\n\n";
echo '</li>';
}
echo "</ul>";
?>
<hr>
		     <p>
			 <a class="am-btn am-btn-success am-round am-btn-sm" href="/admin">返回后台</a> 
			 <button class="itemCopy am-btn am-btn-success am-round am-btn-sm" id="TKLS"  type="button" data-clipboard-text="我是傻逼">一键复制</button>
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