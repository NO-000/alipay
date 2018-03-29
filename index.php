<?php
include("config.php");//配置文件
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
   function GetOS() {
		$OS = $_SERVER['HTTP_USER_AGENT'];
		if (preg_match('/win/i',$OS)) {
			$OS = 'Windows';
		}
		elseif (preg_match('/mac/i',$OS)) {
			$OS = 'MAC';
		}
		elseif (preg_match('/Android/i',$OS)) {
			$OS = 'Android';
		}
		elseif (preg_match('/unix/i',$OS)) {
			$OS = 'Unix';
		}
		elseif (preg_match('/bsd/i',$OS)) {
			$OS = 'BSD';
		}
		else {
			$OS = 'Other';
		}
		return $OS;
	    }
		//获取操作系统
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
    $a2 = $obj->GetOS();
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
		}else{         $loc = $location->desc;    
		}    
		return $loc;
		}
		$as = getIPLoc_sina($ao);
		//获取IP第一个
		$ac = date("Y年m月d日H时i分s秒");
		//获取时间
	   $file_path = "./log/log.txt";
	 if(file_exists($file_path)){
		$stro = file_get_contents($file_path);
		$stro = str_replace("\r\n","<br />",$stro);
		$stro =htmlspecialchars($stro);
	 }else{
        $stro="暂无日志";
     }
		//读取日志
		$file_path2 = "./log/time.txt";
	 if(file_exists($file_path2)){
		$stro2 = file_get_contents($file_path2);
		$stro2 = str_replace("\r\n","<br />",$stro2);
		$stro2 =htmlspecialchars($stro2);
     }else{
        $stro2="未知";
     }
		//读取时间
		$file_path3 = "./log/ly.txt";
	 if(file_exists($file_path3)){
		$stro3 = file_get_contents($file_path3);
		$stro3 = str_replace("\r\n","<br />",$stro3);
		$stro3 =htmlspecialchars($stro3);
     }else{
     $stro3="暂无留言";
     }
	//读取留言
     if(file_exists("./log/log2.txt")){
		$content = file_get_contents("./log/log2.txt");
			$content =htmlspecialchars($content);
        $array = explode("\n", $content);
     }else{
        $array="0";
      }	
		//操作次数
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
		body{background-image:url(/fonts/bgr.jpg);background-repeat:no-repeat;background-attachment:fixed;background-position:center}	.music{position:fixed!important;position:absolute;width:60px;height:65px;z-index:9999;right:0;bottom:0;top:expression(offsetParent.scrollTop+offsetParent.clientHeight-150);cursor:pointer;}
		.fixed-bottom {position: fixed;bottom: 0;width:100%;}
      </style>	  
</head>
<body>
	   <!-- 顶部导航栏 -->
	   <header class="am-topbar am-topbar-fixed-top am-sans-serif">
			<div class="am-container">
				<h1 class="am-topbar-brand">
					<a href="/"><font color="#19a7f0"><i class="am-icon-google am-icon-sm"></i> </font><?php echo $b; ?></a>
				</h1>
				<button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-secondary am-show-sm-only" data-am-collapse="{target: '#collapse-head'}">
					<span class="am-sr-only">导航切换</span>
					<span class="am-icon-bars"></span>
				</button>
				<nav class="am-collapse am-topbar-collapse am-fr" id="collapse-head">
					<ul class="am-nav am-nav-pills am-topbar-nav">
					    <li>
							<a href="/">首页</a>
						</li>
						<li>
							<a href="<?php echo $f; ?>"><?php echo $e; ?></a>
						</li>
						<li>
							<a href="<?php echo $h; ?>"><?php echo $g; ?></a>
						</li>
					</ul>
				</nav>
			</div>
	   </header>
      <!-- 网页背景 -->
	<div class="bg am-sans-serif">
         </br>
        <div class="am-container am-margin-vertical-xl">
		  <center><a href="/"><img src="/fonts/23.png" width="160px" class="am-img-responsive"></a></center>	  
          <div class="am-u-lg-12 am-padding-vertical"> 
		  <hr>
		  <!-- 表单提交部分 -->
		  <form action="url.php" method="post" name="form">
			<div class="am-u-md-12 am-u-sm-centered">
				<div class="am-form-group am-form-success">
			       <input type="url" name="id" class="am-form-field am-text-center am-round" value="http://" required/>
				</div>
				<button type="submit" class="am-btn am-btn-success am-btn-sm am-btn-block am-round">生成短链接</button>
			</div>
		  </form>		 
	                       <div class="am-u-md-12 am-u-sm-centered am-margin-vertical am-text-center">

								<center>
								<code>
								来自<?php echo $as; ?>的网友，系统已自动记录您的ip：<?php echo $ao; ?>
								</code>
								</br>
								<small>
                                新版接口可跳转任意被QQ管家拦截的网址，老版接口已停用
								<hr>								
								</small>
								<!-- 底部小徽章 -->
                               <span class="am-badge am-badge-primary am-round" data-am-modal="{target: '#my-alert'}">系统日志</span>
							   <span class="am-badge am-badge-primary am-round" data-am-modal="{target: '#tan-alert'}">本机信息</span>
							   <span class="am-badge am-badge-primary am-round" data-am-modal="{target: '#lian-alert'}">数据中心</span>
  							   <span class="am-badge am-badge-primary am-round" data-am-modal="{target: '#liuyan'}">留言反馈</span>
                               </center>
						   </div>
			</div>        
	   </div>
    </div>
			  <div class="am-modal am-modal-alert" tabindex="-1" id="my-alert">
				<div class="am-modal-dialog">
					<div class="am-modal-hd">
				     系统日志
					</div>
					<div class="am-modal-bd am-sans-serif">
					<hr>
						<form action="log.php" method="post" name="form">
							<div class="am-form-group am-form-success">
							<input type="text" name="id" class="am-form-field am-round am-text-center" placeholder="输入IP、地址、或链接" required/>
							</div>
						<center><button type="submit" class="am-btn am-btn-success am-btn-sm am-round">查询记录</button></center>
						</form>		 
					<hr>
					<small>本系统已被使用“<span class="am-badge am-badge-success am-round"><small><?php echo (count($array)-1); ?></small></span>”次！</small>
					<hr>
					<article class="am-comment am-comment-success">
					   <a href="/">
					   <img src="https://aoaoa.me/wp-content/uploads/2017/06/7877.gif" alt="" class="am-comment-avatar" width="48" height="48"/>
					   </a>
					   <div class="am-comment-main">
						<div class="am-comment-bd">
						<?php echo $stro; ?>
						</div>
					  </div>
				   </article>
					</div>
					<div class="am-modal-footer">
						<span class="am-modal-btn">关闭</span>
					</div>
				</div>
               </div>
		    <div class="am-modal am-modal-alert" tabindex="-1" id="lian-alert">
				<div class="am-modal-dialog">
					<div class="am-modal-hd">
				     数据查询
					</div>
					<div class="am-modal-bd am-sans-serif">
					<hr>
					<form action="tongji.php" method="post" name="form">
					<div class="am-form-group am-form-success">
			        <input type="url" name="id" class="am-form-field am-round am-text-center" value="http://" required/>
				    </div>
				    <center>
					<button type="submit" class="am-btn am-btn-success am-btn-sm am-round">立即查询</button>
					</center>
		            </form>		 
					<hr>
					<small>输入原网址即可查询访问数据！</small>
					</div>
					<div class="am-modal-footer">
						<span class="am-modal-btn">关闭</span>
					</div>
				</div>
           </div>
           <div class="am-modal am-modal-alert" tabindex="-1" id="liuyan">
				<div class="am-modal-dialog">
					<div class="am-modal-hd">
				     投诉建议
					</div>
					<div class="am-modal-bd am-sans-serif">
					<hr>
					<form action="liu.php" method="post" name="form">
					<div class="am-form-group am-form-success">
			        <input type="text" name="ly" class="am-form-field am-round am-text-center" placeholder="请输入你的留言内容" required/>
				    </div>
				    <center>
					<button type="submit" class="am-btn am-btn-success am-btn-sm am-round">提交留言</button>
					</center>
		            </form>		 
					<hr>
					<article class="am-comment am-comment-success">
					   <a href="/">
					   <img src="https://aoaoa.me/wp-content/uploads/2017/06/7877.gif" alt="" class="am-comment-avatar" width="48" height="48"/>
					   </a>
					   <div class="am-comment-main">
						<header class="am-comment-hd">
						  <div class="am-comment-meta">
							<b>某人</b>
							在 <?php echo $stro2; ?>说:
						  </div>
						</header>
						<div class="am-comment-bd">
						<?php echo $stro3; ?>
						</div>
					  </div>
				   </article>
					</div>
					<div class="am-modal-footer">
						<span class="am-modal-btn">关闭</span>
					</div>
				</div>
           </div>
		   <div class="am-modal am-modal-alert" tabindex="-1" id="tan-alert">
				<div class="am-modal-dialog">
					<div class="am-modal-hd">
				     本机信息
					</div>
					<div class="am-modal-bd am-sans-serif">
					<hr>
					<small>
					地点：<?php echo $as; ?></br>
					IP：<?php echo $ao; ?></br>
					软件：<?php echo $a1; ?></br>
					系统：<?php echo $a2; ?></br>
					时间：<?php echo $ac; ?></br>
					</small>
					</div>
					<div class="am-modal-footer">
						<span class="am-modal-btn">关闭</span>
					</div>
				</div>
           </div>
	<!-- 网页底部 -->
	<footer class="footer fixed-bottom">
    <p class="am-text-sm">Powered by <a href="<?php echo $k; ?>" target="_blank" rel="author"><?php echo $j; ?></a> &copy; 2017  <a href="<?php echo $m; ?>" target="_blank"><?php echo $l; ?></a></p>
    </footer>		
	<script src="https://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
	<script src="//cdn.bootcss.com/amazeui/2.3.0/js/amazeui.min.js"></script>
	<script>
    $(function(){
    function footerPosition(){
        $("footer").removeClass("fixed-bottom");
        var contentHeight = document.body.scrollHeight,//网页正文全文高度
            winHeight = window.innerHeight;//可视窗口高度，不包括浏览器顶部工具栏
        if(!(contentHeight > winHeight)){
            //当网页正文高度小于可视窗口高度时，为footer添加类fixed-bottom
            $("footer").addClass("fixed-bottom");
        } else {
            $("footer").removeClass("fixed-bottom");
        }
    }
    footerPosition();
    $(window).resize(footerPosition);
});
	</script>
	<!-- 统计代码 -->
 	<?php echo $i; ?>
</body>
</html>