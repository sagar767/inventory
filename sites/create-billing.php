<?php
include "db-fetch/query.php";
$title = "Billing of - $productSku ";
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
			<h3><i class="fa fa-archive"></i> Stock Details & Product Info </h3>
			<hr>
			<div class="row">
				<!-- center left-->
				<div class="product-billing col-sm-12">
					<div class="col-sm-6">
						<img src="<?php echo $rowProduct['prd_img']?>"/>
					</div>
					<div class="product-billing-info col-sm-6">
						<div class="prd prd-name col-sm-11 col-sm-offset-1"><?php echo $rowProduct['prd_name']; ?></div>
						<?php if($rowProductQuantity['total'] < 2){ ?>
							<div class="alert alert-danger prd prd-quantity col-sm-11 col-sm-offset-1">
								<i class="fa fa-shopping-cart"></i>
								<?php echo $rowProductQuantity['total']; ?> Item Available
							</div>
						<?php } else if($rowProductQuantity['total'] < 5) { ?>
							<div class="alert alert-warning prd prd-quantity col-sm-11 col-sm-offset-1">
								<i class="fa fa-shopping-cart"></i>
								<?php echo $rowProductQuantity['total']; ?> Items Available
								<p class="stock-message-status">Stock running low.Contact the Dealer</p>
							</div>
						<?php } else{ ?>
							<div class="prd prd-quantity col-sm-11 col-sm-offset-1">
									<i class="fa fa-shopping-cart"></i>
									<?php echo $rowProductQuantity['total']; ?> Items Available
							</div>
						<?php } ?>
						<div class="prd prd-catg col-sm-11 col-sm-offset-1">
							<i class="fa fa-tag"></i> 
							<?php echo $rowProduct['prd_catg']; ?>
						</div>
						<div class="prd prd-base-price col-sm-11 col-sm-offset-1">
							&#8377;
							<?php 
								$commission = (($rowProduct['prd_base_price'] * $rowProduct['prd_com'])/100);
								$actual_price = ($rowProduct['prd_base_price'] + $commission);
							    echo $actual_price; 
						    ?>
							<span class="per-unit">Per Unit / Per Box</span>
							<input type="hidden" id="prd_commission" value="<?php echo $commission;?>">
							<input type="hidden" id="prd_actual_price" value="<?php echo $actual_price;?>">
						</div>
						<div class="prd prd-info-details col-sm-11 col-sm-offset-1">
							<label>Product Desctiption-</label>
							<?php echo $rowProduct['prd_details']; ?>
						</div>
					</div> <!--Product Billing Info-->
				</div>	<!--Product Billing-->
				<hr>
				
				<!--Product Billing Form-->
				<h3><i class="glyphicon glyphicon-barcode"></i> Billing of Product SKU - <?php echo $row['sku']; ?> </h3>
				<hr>
				<div id="status"></div>
				<div class="panel panel-default">
						<div class="panel-heading">
							<h4>Complete Billing Information</h4>
						</div>
						
						<div class="panel-body">
							<form role="form" action="" method="post" id="productBilling">
								<div class="col-md-12">
								 <label class="control-label">Product Qantity</label>
									<div class="input-group col-md-2">
										<span class="input-group-btn">
											<button type="button" class="btn btn-default btn-number"  data-type="minus" data-field="quant[2]">
												<span class="glyphicon glyphicon-minus"></span>
											</button> </span>
										<input type="text" name="quant[2]" class="form-control input-number" id="prd_quantity" value="2" min="1" max="100">
										<span class="input-group-btn">
											<button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[2]">
												<span class="glyphicon glyphicon-plus"></span>
											</button> </span>
									</div>
									
									<div class="form-group">
										<label class="control-label">Customer Name</label>
										<input maxlength="100" type="text" required="required" class="form-control" id="customer_name" placeholder="Enter Customer Name"  />
									</div>
									<div class="form-group">
										<label class="control-label">Customer Email</label>
										<input maxlength="100" type="email" required="required" class="form-control" id="customer_email" placeholder="Enter Customer Email" />
									</div>
									<div class="form-group">
										<label class="control-label">Customer Phone No.</label>
										<input maxlength="100" type="text" required="required" class="form-control" id="customer_phone" placeholder="Enter Customer Phone" />
									</div>
									<div class="form-group">
										<label class="control-label">Payment Mode</label>
										<select class="form-control" name="payment_mode" id="payment_mode">
													<option value="Cash">Cash</option>
													<option value="Cheque">Cheque</option>
													<option value="Card">Credit/Debit Card/NEFT</option>
													<option value="Credit">On Credit</option>
										</select>
									</div>
									<input type="hidden" id="prd_id" value="<?php echo $row['id'];?>">
									<button class="btn btn-info nextBtn btn-lg pull-right" id="btnBilling" type="button" >
										Complete Billing
									</button>
								</div>
							</form>

						</div><!--/panel-body-->
					</div><!--/panel-->
				
			</div><!--/row-->
		</div><!--/col-span-9-->

	</div><!--/row-->
</div><!--/container-->

<?php
require_once ("layout/footer.php");
?>