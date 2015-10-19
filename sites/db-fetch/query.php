<?php
include ("../configure/connection.php");
//FOr Dealer Information fetch in Product Registration
$queryDealerName = mysqli_query($db,"SELECT name FROM dealer ORDER BY id DESC");
?>