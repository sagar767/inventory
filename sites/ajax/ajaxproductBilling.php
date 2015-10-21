<?php
include ("../../configure/connection.php");
//session_start();
if (isset($_POST['customerName']) && isset($_POST['productActualPrice']) && isset($_POST['productCommission']) && isset($_POST['customerEmail']) && isset($_POST['customerPhone']) && isset($_POST['paymentMode']) && isset($_POST['productQuantity']) && isset($_POST['productId'])) {
	$customerName = mysqli_real_escape_string($db, $_POST['customerName']);
	$customerEmail = mysqli_real_escape_string($db, $_POST['customerEmail']);
	$customerPhone = mysqli_real_escape_string($db, $_POST['customerPhone']);
	$paymentMode = mysqli_real_escape_string($db, $_POST['paymentMode']);
	$productQuantity = mysqli_real_escape_string($db, $_POST['productQuantity']);
	$productId = mysqli_real_escape_string($db, $_POST['productId']);
	$productCommission = mysqli_real_escape_string($db, $_POST['productCommission']);
	$productActualPrice = mysqli_real_escape_string($db, $_POST['productActualPrice']);
	$date =  date("Y-m-d");
	
	$resultProductQuantity = mysqli_query($db, "SELECT sum(quantity) as total FROM ledger where pid = '$productId'");
	//$resultProductCount = mysqli_num_rows($resultProductQuantity);
	$row = mysqli_fetch_array($resultProductQuantity, MYSQLI_ASSOC);
	$total = $row['total'];
	
	if($total>1){
		$productTotalAmount = ($productActualPrice*$productQuantity) ;
		$resultBilling = mysqli_query($db, "INSERT INTO billing(id,pid,cus_name,cus_phone,cus_mail,pay_mode,prd_quantity,date,prd_total) values ('','$productId','$customerName', '$customerPhone', '$customerEmail','$paymentMode','$productQuantity','$date','$productTotalAmount')");
		if (!$resultBilling) {
		die('Could not enter data: ' . mysql_error());
		}
		echo "Entered data successfully\n";
	}
	else{
		echo "Unsufficient Product Quantity\n";
	}
}
?>