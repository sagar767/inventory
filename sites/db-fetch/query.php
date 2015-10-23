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
		$productImagePath = "uploads/products/"."no_image.jpg";
	}
	$productSku = $_POST['product_sku'];
	$productName = mysqli_real_escape_string($db, $_POST['product_name']);
	$productDetails = mysqli_real_escape_string($db, $_POST['product_details']);
	$productQuantity = mysqli_real_escape_string($db, $_POST['product_quantity']);
	$productCategory = mysqli_real_escape_string($db, $_POST['product_category']);
	$productBuyingprice = mysqli_real_escape_string($db, $_POST['product_buying_price']);
	$productCommission = mysqli_real_escape_string($db, $_POST['product_commission']);
	$productDealer = mysqli_real_escape_string($db, $_POST['product_dealer']);

	$productTotalBuyingAmount = ($productQuantity*$productBuyingprice);
	
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
		values ('','$product_id','$productQuantity','Inward', '$productTotalBuyingAmount','$productDate','Stock In','$userby')");

		if (!$resultProduct && !$resultLedger) {
			$_SESSION['upload_message'] = FALSE;
			header("Location:../sites/new-product");
		} else {
			$_SESSION['upload_message'] = TRUE;
			header("Location:../sites/new-product");
		}
	}
}

	//Product Update
	if (isset($_POST['updateProductRegistration'])){
	$productId = $_POST['product_id'];
	$productSku = $_POST['product_sku'];
	$productName = mysqli_real_escape_string($db, $_POST['product_name']);
	$productDetails = mysqli_real_escape_string($db, $_POST['product_details']);
	$productQuantity = mysqli_real_escape_string($db, $_POST['product_quantity']);
	$productCategory = mysqli_real_escape_string($db, $_POST['product_category']);
	$productBuyingprice = mysqli_real_escape_string($db, $_POST['product_buying_price']);
	$productCommission = mysqli_real_escape_string($db, $_POST['product_commission']);
	$productDealer = mysqli_real_escape_string($db, $_POST['product_dealer']);
	
	$productTotalBuyingAmount = ($productQuantity*$productBuyingprice);
	
	$resultProductUpdate = mysqli_query($db, "update product set prd_name = '$productName',prd_details='$productDetails',
										prd_base_price = '$productBuyingprice',prd_com = '$productCommission',
										dealer_id='$productDealer',prd_catg='$productCategory',prd_quantity='$productQuantity' 
										where id='$productId'");

	$resultLedgerUpdate = mysqli_query($db, "update ledger set quantity='$productQuantity',amount = '$productTotalBuyingAmount' where pid='$productId'");

	if (!$resultProductUpdate && !$resultLedgerUPdate) {
			$_SESSION['update_message'] = FALSE;
			header("Location:../sites/new-product");
	} else {
			$_SESSION['update_message'] = TRUE;
			header("Location:../sites/new-product");
		}
	}
	
 	//Product View Page
	$queryProductView = mysqli_query($db, "SELECT * FROM product ORDER BY id DESC");

	//Dealer View Page
	$queryDealerView = mysqli_query($db, "SELECT * FROM dealer ORDER BY id DESC");

	//Product Billing of specific product(id)
	$productSku = base64_decode($_GET['product_sku']);
	$productId = base64_decode($_GET['product_id']);
	
	$queryProductBilling = mysqli_query($db, "SELECT * FROM product where id = '$productId' and sku= '$productSku'");
	$resultProductQuantity = mysqli_query($db, "SELECT sum(quantity) as total FROM ledger where pid = '$productId' and tr_type in('Inward','Outward') and services in ('Stock In','Checkout')");
	
	$rowProduct = mysqli_fetch_array($queryProductBilling, MYSQLI_ASSOC);
	$dealer_id = $rowProduct["dealer_id"];
	
	$resultDealer = mysqli_query($db, "SELECT * FROM dealer where id = '$dealer_id'");
	$rowDealer = mysqli_fetch_array($resultDealer, MYSQLI_ASSOC);
	
	$rowProductQuantity = mysqli_fetch_array($resultProductQuantity, MYSQLI_ASSOC);
	
	//Product Report View Default - All Products
	$queryVariable = "SELECT product.sku,product.prd_name,product.prd_catg,
								sum(ledger.amount) as total,
								sum(case when services = 'Stock In' then quantity end) as stck,
								sum(case when services = 'Checkout' then quantity end) as qnt,
								ledger.pid
								FROM product
								LEFT JOIN ledger
								ON product.id=ledger.pid";
	
    $groupby = " group by ledger.pid";
    $orderbyLimit = " order by ledger.pid desc LIMIT 1";											
	if (isset($_POST['productFilterSearch'])) {
					
		$productName = mysqli_real_escape_string($db,$_POST['search-name']);
		$productSku = mysqli_real_escape_string($db,$_POST['search-sku']);
		$productTaxonomy = mysqli_real_escape_string($db, $_POST['search-taxonomy']);
		
		if($productName!=""){
			$conditionProductName = " and product.prd_name LIKE '%$productName%'";
			$queryVariable .= $conditionProductName;
		}
		if($productSku!=""){
			$conditionProductSku = " and product.sku='$productSku'";
			$queryVariable .= $conditionProductSku;
		}
		if($productTaxonomy!="Select"){
			$conditionProductStock = " and product.prd_catg='$productTaxonomy'";
			$queryVariable .= $productTaxonomy;
		}
		$queryReport = mysqli_query($db,$queryVariable.$groupby.$orderbyLimit);
	}
	else{
		$queryReport = mysqli_query($db,$queryVariable.$groupby);
		
	}
	
	//Product Report View Default by product id
	$productSku = base64_decode($_GET['product_sku']);
	$productId = base64_decode($_GET['product_id']);
	$queryReportbyProductId = mysqli_query($db, "SELECT product.sku,product.prd_name,ledger.* from product,ledger where ledger.pid='$productId' and product.id = '$productId' order by ledger.date desc");
	
	//Dashboard Summary
	$resultTotalSell = mysqli_query($db, "SELECT sum(amount) as total FROM ledger where tr_type= 'Outward' and services = 'Checkout'");
	$resultTotalBuyin = mysqli_query($db, "SELECT sum(amount) as total FROM ledger where tr_type= 'Inward' and services = 'Stock In'");
	$resultTotalProfit = mysqli_query($db, "SELECT sum(amount) as total FROM ledger where tr_type= 'Outward' and services = 'Profit'");
	$resultDealerCount = mysqli_query($db, "SELECT count(id) as totalCountDealer FROM dealer");
	$resultProductCount = mysqli_query($db, "SELECT count(id) as totalCountProduct FROM product");
	
	$rowSell = mysqli_fetch_array($resultTotalSell, MYSQLI_ASSOC);
	$rowSell = $rowSell['total']*-1;
	$rowBuyin = mysqli_fetch_array($resultTotalBuyin, MYSQLI_ASSOC);
	$rowProfit = mysqli_fetch_array($resultTotalProfit, MYSQLI_ASSOC);
	$rowCountDealer = mysqli_fetch_array($resultDealerCount, MYSQLI_ASSOC);
	$rowCountProduct = mysqli_fetch_array($resultProductCount, MYSQLI_ASSOC);
	