<?php
include("../config.php");
if (empty($_POST['user'])==false && empty($_POST['user'])==false) {
$_POST['user']=htmlspecialchars($_POST['user']);
$_POST['pass']=htmlspecialchars($_POST['pass']);
if($_POST['pass']==$pass && $_POST['user']==$user){
setcookie("aoao_user", $_POST['user'], time() + 604800);
setcookie("aoao_pass", $_POST['pass'], time() + 604800);
echo "<script>alert('登录成功！');</script>";
echo "<script type='text/javascript'>window.location.href='/admin'</script>";
}
elseif(empty($_POST['pass'])==false && $_POST['user']!==$pass && $_POST['user']!==$pass){
echo "<script>alert('账号或者密码错误请重新登录！');</script>";
}
}
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
  <div class="container" style="padding-top:70px;">
    <div class="col-xs-12 col-sm-10 col-lg-8 center-block" style="float: none;">
      <div class="panel panel-primary">
        <div class="panel-heading"><h3 class="panel-title">用户登陆</h3></div>
        <div class="panel-body">
          <form action="./login.php" method="post" class="form-horizontal" role="form">
            <div class="input-group">
              <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
              <input type="text" name="user" value="<?php echo @$_POST['user'];?>" class="form-control" placeholder="用户名" required="required"/>
            </div><br/>
            <div class="input-group">
              <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
              <input type="password" name="pass" class="form-control" placeholder="密码" required="required"/>
            </div><br/>
            <div class="form-group">
              <div class="col-xs-12"><input type="submit" value="登陆" class="btn btn-primary form-control"/></div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>