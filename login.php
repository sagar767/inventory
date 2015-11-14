<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Login - Inventory</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta name="description" content="Inventory Managment System - Minor Project on PHP by Tamaghna Banerjee">
  		<link rel="shortcut icon" href="images/inventory.ico" />
  		
	<!-- All the files that are required -->
	<link rel="stylesheet" type="text/css" href="css/roboto-condensed.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
<body>
<?php
session_start();
if(!empty($_SESSION['login_username']))
{
header('Location: sites/home');
}
?>

<div class="wavecover">
	<div id="wavescreen"></div>
</div>

<!-- LOGIN FORM -->
<div class="text-center" style="padding:50px 0">
	<div class="logo">Login Required</div>
	<!-- Main Form -->
	<div class="login-form-1">
		<form id="login-form" class="text-left" action="" method="post">
			<div class="login-form-main-message"></div>
			<div class="main-login-form" id="main-login-form">
				<div class="login-group">
					<div class="form-group">
						<label for="lg_username" class="sr-only">Username</label>
						<input type="text" class="form-control" id="lg_username" name="lg_username" placeholder="username">
					</div>
					<div class="form-group">
						<label for="lg_password" class="sr-only">Password</label>
						<input type="password" class="form-control" id="lg_password" name="lg_password" placeholder="password">
					</div>
					<div class="form-group login-group-checkbox">
						<input type="checkbox" id="lg_remember" name="lg_remember">
						<label for="lg_remember">remember</label>
					</div>
				</div>
				<button type="submit" id="login-button" class="login-button">
					<i class="fa fa-chevron-right"></i>
				</button>
			</div>
			<div class="etc-login-form">
				<p>forgot your password? <a href="forgot-password">click here</a></p>
				<!--<p>new user? <a href="#">create new account</a></p> -->
			</div>
		</form>
	</div>
	<!-- end:Main Form -->
</div>
	<div class="powered-by col-md-3">
		<p class="powered-by-slogan">Powered By</p>
		<img src="images/powered-by.png"/>
	</div>
<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="js/jquery.validate.min.js" type="text/javascript"></script>
<script src="js/jquery.ui.shake.min.js" type="text/javascript"></script>
<script src="js/login.js" type="text/javascript"></script>
