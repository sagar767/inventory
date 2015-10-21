<?php
include ("../configure/connection.php");

//For Dealer Information fetch in Product Registration
$queryDealerName = mysqli_query($db, "SELECT id,name FROM dealer ORDER BY id DESC");

//Product Registration
if (isset($_POST['productRegistration'])) {
	$productImage = $_FILES["productImage"]["name"];
	$productImagePath = "uploads/products/" . $productImage;
	move_uploaded_file($_FILES["productImage"]["tmp_name"], $productImagePath);
	if($productImage == ""){
		$productImagePath = "http://www.safteq.com/wp-content/uploads/2015/08/blank-product-w320.png";
	}
	$productSku = $_POST['product_sku'];
	$productName = mysqli_real_escape_string($db, $_POST['product_name']);
	$productDetails = mysqli_real_escape_string($db, $_POST['product_details']);
	$productQuantity = mysqli_real_escape_string($db, $_POST['product_quantity']);
	$productCategory = mysqli_real_escape_string($db, $_POST['product_category']);
	$productBuyingprice = mysqli_real_escape_string($db, $_POST['product_buying_price']);
	$productCommission = mysqli_real_escape_string($db, $_POST['product_commission']);
	$productDealer = mysqli_real_escape_string($db, $_POST['product_dealer']);

	$resultProduct = mysqli_query($db, "INSERT INTO product(id,sku,dealer_id,prd_name,prd_base_price,prd_com,prd_img,prd_details,prd_quantity,prd_catg) 
	values ('','$productSku','$productDealer','$productName', '$productBuyingprice','$productCommission','$productImagePath','$productDetails','$productQuantity','$productCategory')");

	$resultProductId = mysqli_query($db, "SELECT id from product WHERE sku='$productSku' and prd_name='$productName'");
	$count = mysqli_num_rows($resultProductId);
	$row = mysqli_fetch_array($resultProductId, MYSQLI_ASSOC);
	$product_id = $row['id'];

	if ($count == 1) {
		$productDate = date("Y-m-d");
		$userby = $_SESSION['login_username'];
		$resultLedger = mysqli_query($db, "INSERT INTO ledger(id,pid,quantity,tr_type,amount,date,services,user_by) 
		values ('','$product_id','$productQuantity','Inward', '$productBuyingprice','$productDate','Stock In','$userby')");

		if (!$resultProduct && !$resultLedger) {
			$_SESSION['upload_message'] = FALSE;
			header("Location:../sites/new-product");
		} else {
			$_SESSION['upload_message'] = TRUE;
			header("Location:../sites/new-product");
		}
	}
}

 //Product View Page
	$queryProductView = mysqli_query($db, "SELECT * FROM product ORDER BY id DESC");

	//Dealer View Page
	$queryDealerView = mysqli_query($db, "SELECT * FROM dealer ORDER BY id DESC");

	//Product Billing of specific product(id)
	$productSku = $_GET['product_sku'];
	$productId = base64_decode($_GET['product_id']);
	$queryProductBilling = mysqli_query($db, "SELECT * FROM product where id = '$productId' and sku= '$productSku'");
	$row = mysqli_fetch_array($queryProductBilling, MYSQLI_ASSOC);
?>