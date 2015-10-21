<?php 
 include "db-fetch/query.php";
 $title = "Billing of - $_productSku ";
 require_once ("layout/header.php");
 require_once ("layout/primary-nav.php");
?>

<div class="container">
	<!-- upper section -->
	<div class="row">
		<?php
		require_once ("layout/sidebar-nav.php");
		?>

		<div class="col-sm-9">

			<!-- column 2 -->
			<h3><i class="glyphicon glyphicon-barcode"></i>  Billing of Product SKU - <?php echo $row['sku'];?> </h3>
			<hr>
			<div class="row">
				<!-- center left-->
				<div class="product-billing col-sm-12">
					<div class="col-sm-6">
						<img src="<?php echo $row['prd_img']?>"/>
					</div>
					<div class="product-billing-info col-sm-6">
						<div class="prd prd-name col-sm-11 col-sm-offset-1"><?php echo $row['prd_name']; ?></div>
						<?php if($row['prd_quantity'] < 2){ ?>
							<div class="alert alert-danger prd prd-quantity col-sm-11 col-sm-offset-1">
								<i class="fa fa-shopping-cart"></i>
								<?php echo $row['prd_quantity']; ?> Item Available
							</div>
						<?php } else if($row['prd_quantity'] < 5) { ?>
							<div class="alert alert-warning prd prd-quantity col-sm-11 col-sm-offset-1">
								<i class="fa fa-shopping-cart"></i>
								<?php echo $row['prd_quantity']; ?> Items Available
								<p class="stock-message-status">Stock running low.Contact the Dealer</p>
							</div>
						<?php } else{ ?>
							<div class="prd prd-quantity col-sm-11 col-sm-offset-1">
									<i class="fa fa-shopping-cart"></i>
									<?php echo $row['prd_quantity']; ?> Items Available
							</div>
						<?php } ?>
						<div class="prd prd-catg col-sm-11 col-sm-offset-1">
							<i class="fa fa-tag"></i> 
							<?php echo $row['prd_catg']; ?>
						</div>
						<div class="prd prd-base-price col-sm-11 col-sm-offset-1">
							&#8377;<?php echo $row['prd_base_price']; ?>
						</div>
						<div class="prd prd-info-details col-sm-11 col-sm-offset-1">
							<label>Product Desctiption-</label>
							<?php echo $row['prd_details']; ?>
						</div>
					</div>
				</div>	
				
			</div><!--/row-->
		</div><!--/col-span-9-->

	</div>
</div>

<?php
require_once ("layout/footer.php");
?>