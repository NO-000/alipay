<?php
include("../config.php");
header("Content-Type: text/html;charset=utf-8");
if (empty($_COOKIE["aoao_pass"])){
echo "<script>alert('你还没有登录！或者登录状态已过期请重新登录');</script>";
echo "<script type='text/javascript'>window.location.href='/admin/login.php'</script>";
exit;
}
elseif (empty($_COOKIE["aoao_user"])){
echo "<script>alert('你还没有登录！或者登录状态已过期请重新登录');</script>";
echo "<script type='text/javascript'>window.location.href='/admin/login.php'</script>";
exit;
}
elseif ($_COOKIE["aoao_pass"]!==$pass){
echo "<script>alert('你的账号或者密码错误，请重新登录！');</script>";
echo "<script type='text/javascript'>window.location.href='/admin/login.php'</script>";
exit;
}
elseif ($_COOKIE["aoao_user"]!==$user){
echo "<script>alert('你的账号或者密码错误，请重新登录！');</script>";
echo "<script type='text/javascript'>window.location.href='/admin/login.php'</script>";
exit;
}
?>