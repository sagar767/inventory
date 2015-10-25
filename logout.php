<?php
session_start();
if(!empty($_SESSION['login_username']))
{
$_SESSION['login_username']='';
session_destroy();
}
echo "<script>$.removeCookie('visits','hit');</script>";
header("Location:login");
?>