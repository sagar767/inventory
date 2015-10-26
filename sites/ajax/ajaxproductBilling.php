<?php
include ("../../configure/connection.php");
session_start();
if (isset($_POST['customerName']) && isset($_POST['productBasePrice']) && isset($_POST['productUserBy']) && isset($_POST['productActualPrice']) && isset($_POST['productCommission']) && isset($_POST['customerEmail']) && isset($_POST['customerPhone']) && isset($_POST['paymentMode']) && isset($_POST['productQuantity']) && isset($_POST['productId'])) {
	$customerName = mysqli_real_escape_string($db, $_POST['customerName']);
	$customerEmail = mysqli_real_escape_string($db, $_POST['customerEmail']);
	$customerPhone = mysqli_real_escape_string($db, $_POST['customerPhone']);
	$paymentMode = mysqli_real_escape_string($db, $_POST['paymentMode']);
	$productQuantity = mysqli_real_escape_string($db, $_POST['productQuantity']);
	$productId = mysqli_real_escape_string($db, $_POST['productId']);
	$productCommission = mysqli_real_escape_string($db, $_POST['productCommission']);
	$productActualPrice = mysqli_real_escape_string($db, $_POST['productActualPrice']);
	$productBasePrice = mysqli_real_escape_string($db, $_POST['productBasePrice']);
	$productUserBy= mysqli_real_escape_string($db, $_POST['productUserBy']);
	$date =  date("Y-m-d");
	
	$resultProductName = mysqli_query($db, "SELECT * FROM product where id = '$productId'");
	$rowProductName = mysqli_fetch_array($resultProductName, MYSQLI_ASSOC);
	
	$productName = $rowProductName['prd_name'];
	$productSku = $rowProductName['sku'];
	$productCategory = $rowProductName['prd_catg'];
	
	$_SESSION['customerName'] = $customerName;
	$_SESSION['customerEmail'] = $customerEmail;
	$_SESSION['customerPhone'] = $customerPhone;
	$_SESSION['productName'] = $productName;
	$_SESSION['productSku'] = $productSku;
	$_SESSION['productCategory'] = $productCategory;
	$_SESSION['paymentMode'] = $paymentMode;
	$_SESSION['productQuantity'] = $productQuantity;
	$_SESSION['productBillingAmount'] = $productBasePrice*$productQuantity;
	$_SESSION['date'] = $date;
	
	$resultProductQuantity = mysqli_query($db, "SELECT sum(quantity) as total FROM ledger where pid = '$productId' and tr_type in('Inward','Outward') and services in ('Stock In','Checkout')");
	$row = mysqli_fetch_array($resultProductQuantity, MYSQLI_ASSOC);
	$total = $row['total'];
	
	if($total>1 && $total>$productQuantity){
		
		$productTotalBillingAmount = ($productBasePrice*$productQuantity);
		$productTotalLedgerAmount = ($productBasePrice*$productQuantity)*-1;
		$productCommissionAmount = ($productCommission*$productQuantity);
		$productLedgerQuantity = $productQuantity*-1;
		$resultBilling = mysqli_query($db, "INSERT INTO billing(id,pid,cus_name,cus_phone,cus_mail,pay_mode,prd_quantity,date,prd_total) values ('','$productId','$customerName', '$customerPhone', '$customerEmail','$paymentMode','$productQuantity','$date','$productTotalBillingAmount')");
		$resultLedger = mysqli_query($db, "INSERT INTO ledger(id,pid,quantity,tr_type,amount,date,services,user_by) values ('','$productId','$productLedgerQuantity','Outward','$productTotalLedgerAmount','$date','Checkout','$productUserBy')");
		$resultCommission = mysqli_query($db, "INSERT INTO ledger(id,pid,quantity,tr_type,amount,date,services,user_by) values ('','$productId','$productLedgerQuantity','Outward','$productCommissionAmount','$date','Profit','$productUserBy')");
		
		if (!$resultBilling && !$resultLedger) {
		die('Could not enter data: ' . mysql_error());
		}
		echo "Entered data successfully\n";
	}
	else{
		echo "Insufficient Product Quantity\n";
	}
}
?>