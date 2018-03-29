<?php
include("head.php");
$filename = '../config.php'; 
if (is_writable($filename)) { 
} else { 
	echo "<script>alert('修改前请将config.php文件和log目录及里面的文件权限为可写，否则将无法正常修改信息！(๑˙ー˙๑)');</script>";
} 
$content = file_get_contents("https://aoaoa.me/tz.txt");
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
 <meta charset="utf-8"/>
 <meta name="viewport" content="width=device-width, initial-scale=1"/>
 <title>假的后台</title>
<link href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
  <script src="//cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
  <script src="//cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="shortcut icon" href="https://img.aoaoa.me/favicon.ico">
</head>
<body>
<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid"> 
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse"
				data-target="#example-navbar-collapse">
			<span class="sr-only">切换导航</span>
			<span class="icon-bar"></span>
      <span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="#">假的后台</a>
	</div>
	<div class="collapse navbar-collapse" id="example-navbar-collapse">
		<ul class="nav navbar-nav">
			<li class="active"><a href="/">首页</a></li>
			<li><a href="/admin/log.php">日志</a></li>
			</ul>
			</div>
			</div>
			</nav>
<div class="col-xs-12 col-sm-10 col-lg-8 center-block" style="float: none;">
<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title"><center>网站信息配置</center></h3></div>
<div class="panel-body">
<div class="form-group">
<marquee behavior=left><font size="4" color="blue"><?php echo $content; ?></font></marquee>
</div>
  <form action="install.php" method="post" class="form-horizontal" role="form"><input type="hidden" name="do" value="submit"/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">网站名称</label>
	  <div class="col-sm-10"><input type="text" name="a" value="<?php echo $a; ?>" class="form-control" required/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">导航栏站名</label>
	  <div class="col-sm-10"><input type="text" name="b" value="<?php echo $b; ?>" class="form-control"/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">网站关键字</label>
	  <div class="col-sm-10"><input type="text" name="c" value="<?php echo $c; ?>" class="form-control"/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">网站描述</label>
	  <div class="col-sm-10"><input type="text" name="d" value="<?php echo $d; ?>" class="form-control"/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">顶部导航网站名一</label>
	  <div class="col-sm-10"><input type="text" name="e" value="<?php echo $e; ?>" class="form-control"/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">顶部导航网站链接一</label>
	  <div class="col-sm-10"><input type="url" name="f" value="<?php echo $f; ?>" class="form-control"/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">顶部导航网站名二</label>
	  <div class="col-sm-10"><input type="text" name="g" value="<?php echo $g; ?>" class="form-control" placeholder="多个账号之间用|隔开"/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">顶部导航网站链接二</label>
	  <div class="col-sm-10"><input type="url" name="h" value="<?php echo $h; ?>" class="form-control"/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">统计代码</label>
	  <div class="col-sm-10"><textarea class="form-control" name="i" rows="5"><?php echo $k; ?></textarea></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">底部版权链接名一</label>
	  <div class="col-sm-10"><input type="text" name="j" value="<?php echo $j; ?>" class="form-control"/></div>
	</div><br/>
		<div class="form-group">
	  <label class="col-sm-2 control-label">底部版权链接一</label>
	  <div class="col-sm-10"><input type="text" name="kk" value="<?php echo $k; ?>" class="form-control"/></div>
	</div><br/>
		<div class="form-group">
	  <label class="col-sm-2 control-label">底部版权链接名二</label>
	  <div class="col-sm-10"><input type="text" name="l" value="<?php echo $l; ?>" class="form-control"/></div>
	</div><br/>
		<div class="form-group">
	  <label class="col-sm-2 control-label">底部版权链接二</label>
	  <div class="col-sm-10"><input type="text" name="m" value="<?php echo $m; ?>" class="form-control"/></div>
	</div><br/>
		<div class="form-group">
	  <label class="col-sm-2 control-label">跳转接口</label>
	  <div class="col-sm-10"><input type="url" name="n" value="<?php echo $n; ?>" class="form-control"/></div>
	</div><br/>
<div class="form-group">
	  <label class="col-sm-2 control-label">黑名单域名(用,隔开)</label>
	  <div class="col-sm-10"><textarea class="form-control" name="o" rows="5"><?php echo $o; ?></textarea></div>
	</div><br/>
<div class="form-group">
	  <label class="col-sm-2 control-label">账号</label>
	  <div class="col-sm-10"><input type="text" name="user" value="<?php echo $user; ?>" class="form-control"></div>
	</div><br/>
		<div class="form-group">
	  <label class="col-sm-2 control-label">密码</label>
	  <div class="col-sm-10"><input type="text" name="pass" value="<?php echo $pass; ?>" class="form-control"></div>
	</div><br/>
<div class="form-group">
 <label class="col-sm-2 control-label">修改后台后是否锁定</label>
<div class="col-sm-10">
		<input type="radio" name="lock" value="1"/> 不锁定
		<input type="radio" name="lock" value="2" checked> 锁定（推荐）</div>
</div><br/>
	<button type="submit" class="btn btn-primary btn-block"> 立即提交</button>
  </form>
</div>
</div>
</body>
</html>