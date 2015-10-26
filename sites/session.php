<?php
session_start();
if (!empty($_SESSION['login_username']) && !empty($_SESSION['login_userid'])) {
	$userid = $_SESSION['login_userid'];
	$username = $_SESSION['login_username'];
} else {
	$_SESSION['login_userid'] = "";
	$_SESSION['login_username'] = "";
	session_destroy();
	header("Location:../login");
}
?>