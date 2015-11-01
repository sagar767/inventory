<?php
include ("../../configure/connection.php");
//session_start();
if (isset($_POST['companyName']) && isset($_POST['dealerName']) && isset($_POST['dealerPhone']) && isset($_POST['dealerEmail'])) {
	$companyName = mysqli_real_escape_string($db, $_POST['companyName']);
	$dealerName = mysqli_real_escape_string($db, $_POST['dealerName']);
	$dealerPhone = $_POST['dealerPhone'];
	$dealerEmail = mysqli_real_escape_string($db, $_POST['dealerEmail']);
    $dealerLocation = mysqli_real_escape_string($db, $_POST['dealerLocation']);

	$result = mysqli_query($db, "INSERT INTO dealer(id,company,name,phone,email,location) values ('','$companyName', '$dealerName', '$dealerPhone','$dealerEmail','$dealerLocation')");
	if (!$result) {
		die('Could not enter data: ' . mysql_error());
	}
	echo "Entered data successfully\n";

}
?>