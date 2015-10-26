<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Recover Password - Inventory</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta name="description" content="Inventory Managment System - Minor Project on PHP by Tamaghna Banerjee">
		<link rel="shortcut icon" href="images/inventory.ico" />

		<!-- All the files that are required -->
		<link rel="stylesheet" type="text/css" href="css/roboto-condensed.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="css/formValidation.css">
		<link rel="stylesheet" type="text/css" href="css/login.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<?php
		session_start();
		if (!empty($_SESSION['login_username'])) {
			header('Location: sites/home');
		}
		?>

		<!-- LOGIN FORM -->
		<div class="text-center" style="padding:50px 0">
			<div class="logo">
				Password Recovery
			</div>
			<!-- Main Form -->
			<div class="login-form-1">

				<form id="forgot-form" role="form" data-toggle="validator" class="text-left" action="" method="post">
					<div class="login-form-main-message"></div>
					<div class="main-login-form" id="main-login-form">
						<div class="login-group">
							<div class="form-group">
								<label for="lg_password" class="sr-only">User Name</label>
								<input type="text" class="form-control" id="lg_username" name="lg_username" placeholder="Your Username">
							</div>
							<div class="form-group">
								<label for="lg_password" class="sr-only">Current Password</label>
								<input type="password" class="form-control" id="lg_password" name="lg_password" placeholder="Current Password">
							</div>
						</div>
						<button type="submit" id="forgot-button" class="login-button">
							<i class="fa fa-chevron-right"></i>
						</button>
					</div>
					<div class="etc-login-form">
						<p>
							If you can still remember password! <a href="login">click here</a>
						</p>
						<!--<p>new user? <a href="#">create new account</a></p> -->
					</div>
				</form>

				<!-- Password Update Modal -->
				<div class="modal fade" id="passwordUpdateModal" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" id="close" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<h4 class="modal-title" id="memberModalLabel"><b>Notification</b></h4>

							</div>
							<div class="modal-body alert alert-success">
								<p>
									Your Password Update Successfully.
								</p>
							</div>
						</div>
					</div>
				</div>

				<form role="form" data-toggle="validator" id="retrieve-form" class="text-left" action="" method="post">
					<div class="login-form-main-message"></div>
					<div class="main-login-form" id="main-login-form">
						<div class="login-group">
							<div class="form-group">
								<label for="lg_password" class="sr-only">New Password</label>
								<input type="password" class="form-control" id="lg_new_password" name="lg_new_password" placeholder="New Password">
							</div>
							<div class="form-group">
								<label for="lg_password" class="sr-only">Confirm Password</label>
								<input type="password" class="form-control" id="lg_confirm_password" name="lg_confirm_password" placeholder="Re-enter Password">
							</div>
						</div>
						<button type="submit" id="retrieve-button" class="login-button">
							<i class="fa fa-chevron-right"></i>
						</button>
					</div>
					<div class="etc-login-form">
						<p>
							If you can still remember password! <a href="login">click here</a>
						</p>
						<!--<p>new user? <a href="#">create new account</a></p> -->
					</div>
				</form>
			</div>
			<!-- end:Main Form -->
		</div>

		<div class="powered-by col-md-3">
			<p class="powered-by-slogan">
				Powered By
			</p>
			<img src="images/powered-by.png"/>
		</div>
		<script src="js/jquery.min.js" type="text/javascript"></script>
		<script src="js/bootstrap.min.js" type="text/javascript"></script>
		<script src="js/jquery.validate.min.js" type="text/javascript"></script>
		<script src="js/jquery.ui.shake.min.js" type="text/javascript"></script>
		<script src="js/validator.js" type="text/javascript"></script>
		<script src="js/login.js" type="text/javascript"></script>
