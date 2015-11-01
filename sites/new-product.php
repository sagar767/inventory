<?php 
include "db-fetch/query.php";
$title = "Product Registration";
if($updateProductTitle!="")
	{
		 $title = $updateProductTitle;	
	}
require_once ("layout/header.php");
require_once ("layout/primary-nav.php");

?>

<div class="container">
	<!-- upper section -->
	<div class="row">
		<?php require_once ("layout/sidebar-nav.php");?>
		<div class="col-sm-9">
		<?php 
			if(!empty($productSku) && !empty($productId)){ ?>
			<h3><i class="glyphicon glyphicon-barcode"></i> Update Product of <?php echo $productSku;?></h3>
		<?php }else{ ?>	
			<!-- column 2 -->
			<h3><i class="glyphicon glyphicon-barcode"></i> Create New Product</h3>
		<?php } ?>
			<hr>
			<div class="row">
				<!-- center left-->
				<div class="col-md-12">
					<?php if($_SESSION['upload_message'] == 1){ ?>
					<div class="status alert alert-success">
						Product Successfully Created/Registered.
						<?php //unset($_SESSION['upload_message']); ?>
					</div>
					<?php } else if($_SESSION['update_message'] == 1){ ?>
					<div class="status alert alert-success">
						Product Updated Successfully.
						<?php //unset($_SESSION['update_message']); ?>
					</div>
					<?php } ?>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4>Complete Product Form Entry</h4>
						</div>
						<div class="panel-body">
							<div class="stepwizard col-md-offset-1">
								<div class="stepwizard-row setup-panel">
									<div class="stepwizard-step">
										<a href="#step-1" type="button" class="btn btn-danger btn-circle">1</a>
										<p>
											Product Details
										</p>
									</div>
									<div class="stepwizard-step">
										<a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
										<p>
											Price Details
										</p>
									</div>
									<div class="stepwizard-step">
										<a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
										<p>
											Dealer Details
										</p>
									</div>
								</div>
							</div>
							<form action="" method="post" enctype="multipart/form-data" name="productRegistration">
								<div class="row setup-content" id="step-1">
									<div class="col-xs-9 col-md-offset-1">
										<div class="col-md-12">
											<h3> Step 1</h3>
											<div class="form-group">
												<label class="control-label">Product SKU</label>
												<?php if(!empty($rowProduct['sku'])){ ?>
												<input name="product_sku" maxlength="100" readonly type="text" value="<?php echo $rowProduct['sku']; ?>" required="required" class="form-control" placeholder="Enter SKU"  />
												<input name="product_id" type="hidden" value="<?php echo $productId; ?>"/>
												<?php } else{ ?>
													<input name="product_sku" maxlength="100" readonly type="text" value="<?php echo "PDI" . mt_rand(); ?>" required="required" class="form-control" placeholder="Enter SKU"  />
												<?php } ?>
											</div>
											<div class="form-group">
												<label class="control-label">Product Name</label>
												<?php if(!empty($rowProduct['prd_name'])){ ?>
												<input name="product_name" maxlength="100" type="text" required="required" value="<?php echo $rowProduct['prd_name']; ?>" class="form-control" placeholder="Enter Product Name"  />
												<?php } else{ ?>
												<input name="product_name" maxlength="100" type="text" required="required" class="form-control" placeholder="Enter Product Name" />
												<?php } ?>
											</div>
											<div class="form-group">
												<label class="control-label">Product Details</label>
												<?php if(!empty($rowProduct['prd_details'])){ ?>
												<textarea name="product_details" required="required" class="form-control" placeholder="Enter Product Details" ><?php echo $rowProduct['prd_details']; ?></textarea>
												<?php } else{ ?>
												<textarea name="product_details" required="required" class="form-control" placeholder="Enter Product Details" ></textarea>
												<?php } ?>
											</div>
											<div class="form-group">
												<label class="control-label">Product Category</label>
												<?php if(!empty($rowProduct['prd_catg'])){ ?>
												<select class="form-control" name="product_category">
													<?php $selected = $rowProduct['prd_catg']; ?>
            		  								<option <?php if ($selected == "Home Appliances" ) echo 'selected=selected' ; ?>  value="Home Appliances">Home Appliances</option>
													<option <?php if ($selected == "Mobile" ) echo 'selected=selected' ; ?>  value="Mobile">Mobile</option>
													<option <?php if ($selected == "Grocery" ) echo 'selected=selected' ; ?>  value="Grocery">Grocery</option>
            		  							</select>
        										<?php }else{ ?>
          			 							<select class="form-control" name="product_category">
													<option value="Home Appliances">Home Appliances</option>
													<option value="Mobile">Mobile</option>
													<option value="Grocery">Grocery</option>
												</select>
       											<?php  } ?>							
											</div>
											<div class="form-group">
												<label class="control-label">Product Image</label>
												<div id="image-preview">
													<?php if(!empty($rowProduct['prd_img'])){ ?>
													<label for="image-upload" id="image-label">Upload Identity</label>
													<img src="<?php echo $rowProduct['prd_img'];?>"/>
													<input type="file" name="productImage" id="image-upload" />
													<?php } else {?>
													<label for="image-upload" id="image-label">Upload Identity</label>
													<input type="file" name="productImage" id="image-upload" />
													<?php } ?>
												</div>
											</div>
											<button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >
												Proceed Next
											</button>
										</div>
									</div>
								</div>
								<div class="row setup-content" id="step-2">
									<div class="col-xs-9 col-md-offset-1">
										<div class="col-md-12">
											<h3> Step 2</h3>
											<div class="form-group">
												<label class="control-label">Product Quantity(s)</label>
												<?php if(!empty($rowProduct['prd_quantity'])){ ?>
												<input name="product_quantity" maxlength="200" type="number" value="<?php echo $rowProduct['prd_quantity'];?>" required="required" class="form-control" placeholder="Enter Quantity" />
												<?php } else{ ?>
												<input name="product_quantity" maxlength="200" type="number" required="required" class="form-control" placeholder="Enter Quantity" />
												<?php } ?>
											</div>
											<div class="form-group">
												<label class="control-label">Product Buying Price</label>
												<?php if(!empty($rowProduct['prd_base_price'])){ ?>
												<input name="product_buying_price" value="<?php echo $rowProduct['prd_base_price']; ?>" maxlength="200" type="number" required="required" class="form-control" placeholder="Enter Buying Price" />
												<?php } else { ?>
												<input name="product_buying_price" maxlength="200" type="number" required="required" class="form-control" placeholder="Enter Buying Price" />	
												<?php } ?>
											</div>
											<div class="form-group">
												<label class="control-label">Product Commission (In %)</label>
												<?php if(!empty($rowProduct['prd_com'])){ ?>
												<input name="product_commission" value="<?php echo $rowProduct['prd_com']; ?>" maxlength="200" type="number" required="required" class="form-control" placeholder="Enter Commission Amount"  />
												<?php } else { ?>
													<input name="product_commission" maxlength="200" type="number" required="required" class="form-control" placeholder="Enter Commission Amount"  />
												<?php } ?>
											</div>
											<button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >
												Proceed Final
											</button>
										</div>
									</div>
								</div>
								
								<div class="row setup-content" id="step-3">
									<div class="col-xs-9 col-md-offset-1">
										<div class="col-md-12">
											<h3> Step 3</h3>
											<div class="form-group">
												<label class="control-label">Select Dealer</label>
													<select class="form-control" name="product_dealer">
														<?php
														$dealerName = $rowDealer['name'];
														while ($row = mysqli_fetch_array($queryDealerName, MYSQLI_ASSOC)) {
															if($dealerName == $row['name']){ ?>
											            		  <option selected='selected' value="<?php echo $row['id'];?>">
											            		  	<?php echo $row['name']; ?>
											            		  </option>
											        		<?php }
											        		else{
															echo "<option value='" . $row['id'] . "'>".$row['name']."</option>";
																} 
															}?>
													</select>
											</div>
											<?php if(!empty($rowProduct['prd_base_price'])){ ?>
											<input class="btn btn-success btn-lg pull-right" name="updateProductRegistration" type="submit" value="Update Product"/>
											<?php } else{ ?>
											<input class="btn btn-success btn-lg pull-right" name="productRegistration" type="submit" value="Complete Registration"/>
											<?php } ?>
										</div>
									</div>
								</div>
							</form>
						</div><!--/panel-body-->
					</div><!--/panel-->
				</div><!--/col-->
			</div><!--/row-->
		</div><!--/col-span-9-->
	</div>
</div>

<?php require_once ("layout/footer.php"); ?>