<?php
include ("../../configure/connection.php");
if ($_POST['del_dealer_id']) {
	$del_dealer_id = mysql_real_escape_string($db,$_POST['del_dealer_id']);
	$deleteDealerResult = mysqli_query($db,"DELETE FROM `dealer` WHERE id='$del_dealer_id'");
	$deleteProductResult = mysqli_query($db,"DELETE FROM `product` WHERE dealer_id='$del_dealer_id'");
	if (!$deleteDealerResult && !$deleteProductResult) {
		die('Could not enter data: ' . mysql_error());
	}
	echo "Delete Dealer successfully\n";
}
?>