<?php
session_start();
if (!empty($_SESSION['login_username'])) {
	$userid = $_SESSION['login_userid'];
	$username = $_SESSION['login_username'];
} else {
	$_SESSION['login_userid'] = "";
	$_SESSION['login_username'] = "";
	session_destroy();
	header("Location:../login");
}
?>