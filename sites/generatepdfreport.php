<?php 
require_once 'session.php';

	$customerName = $_SESSION['customerName'] ;
	$customerEmail = $_SESSION['customerEmail'] ;
	$customerPhone = $_SESSION['customerPhone'];
	$productName = $_SESSION['productName'];
	$productSku = $_SESSION['productSku'];
	$productCategory = $_SESSION['productCategory'];
	$paymentMode = $_SESSION['paymentMode'];
	$productQuantity = $_SESSION['productQuantity'];
	$productBillingAmount = $_SESSION['productBillingAmount'];
	$date = $_SESSION['date'];

require('library/fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont("Arial","B",16);
$pdf->Cell(0,10,"Inventory Management System",1,2,C);
$pdf->SetFont("Arial","",12);
$pdf->Cell(0,10,"Dated on-  {$date}",1,2,C);
$pdf->SetFont("Arial","I",18);
$pdf->Cell(0,20,"Invoice Copy on Purchase",0,1,C);
$pdf->SetFont('helvetica','',10);
$pdf->Cell(120,20,"This Invoice copy is given to Mr./Mrs. {$customerName} for buying products",0,1,L);

$pdf->Cell(60,10,"Customer Email-  {$customerEmail}",0,1,R);
$pdf->Cell(60,2,"Customer Phone-  {$customerPhone}",0,1,R);

$pdf->SetFont('helvetica','B',18);
$pdf->Cell(190,30,"Product Details",0,1,C);

$pdf->SetFont('Arial','',12);
$pdf->Cell(170,20,"Product SKU-  {$productSku }",0,1,R);
$pdf->Cell(170,15,"Model Name-  {$productName}",0,1,R);
$pdf->Cell(170,15,"Product Category-  {$productCategory}",0,1,R);
$pdf->Cell(170,15,"No. of Products-  {$productQuantity}",0,1,R);
$pdf->Cell(170,15,"Product Type-  {$productCategory}",0,1,R);
$pdf->Cell(170,15,"Total Amount to pay-  {$productBillingAmount}",0,1,R);
$pdf->Cell(170,15,"Payment Mode Selected-  {$paymentMode}",0,1,R);

$pdf->SetFont('Arial','B',12);
$pdf->Cell(120,50,"Thank You.Visit Again.",0,1,R);
$pdf->output();
?>