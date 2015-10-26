<?php
include ("../../configure/connection.php");
session_start();

/*For Recovery Authentication*/
if (isset($_POST['username']) && isset($_POST['password'])) {
	// username and password sent from Form
	$username = mysqli_real_escape_string($db, $_POST['username']);
	//Here converting passsword into MD5 encryption.
	$password = md5(mysqli_real_escape_string($db, $_POST['password']));

	$result = mysqli_query($db, "SELECT id,username FROM user WHERE username='$username' and password='$password'");
	$count = mysqli_num_rows($result);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	// If result matched $username and $password, table row  must be 1 row
	if ($count == 1) {
		//Storing user session value.
		$_SESSION['login_userid'] = $row['id'];
		echo $row['id'];
		echo $row['username'];
	}

}

/*For Password Update*/
if (isset($_POST['new_password'])) {

	//Here converting passsword into MD5 encryption.
	$updatePassword = md5(mysqli_real_escape_string($db, $_POST['new_password']));
	$user_id = $_SESSION['login_userid'] ;
	$result = mysqli_query($db, "update user set password='$updatePassword' where id='$user_id'");
	if($result){
		echo "Password Update successfully\n";
	}
}
?>