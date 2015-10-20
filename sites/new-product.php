<?php $title = "Product Registration";
require_once ("layout/header.php");
require_once ("layout/primary-nav.php");
include "db-fetch/query.php"
?>

<div class="container">
	<!-- upper section -->
	<div class="row">

		<?php
		require_once ("layout/sidebar-nav.php");
		?>

		<div class="col-sm-9">

			<!-- column 2 -->
			<h3><i class="glyphicon glyphicon-barcode"></i> Create New Product</h3>
			<hr>
			<div class="row">
				<!-- center left-->
				<div class="col-md-12">
					<?php if($_SESSION['upload_message'] == 1){ ?>
					<div class="status alert alert-success">
						Product Successfully Created/Registered.
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
												<input name="product_sku" maxlength="100" readonly type="text" value="<?php echo "PDI" . mt_rand(); ?>" required="required" class="form-control" placeholder="Enter First Name"  />
											</div>
											<div class="form-group">
												<label class="control-label">Product Name</label>
												<input name="product_name" maxlength="100" type="text" required="required" class="form-control" placeholder="Enter Last Name" />
											</div>
											<div class="form-group">
												<label class="control-label">Product Details</label>
												<textarea name="product_details" required="required" class="form-control" placeholder="Enter your address" ></textarea>
											</div>
											<div class="form-group">
												<label class="control-label">Product Category</label>
												<select class="form-control" name="product_category">
													<option value="Home Appliances">Home Appliances</option>
													<option value="Mobile">Mobile</option>
													<option value="Grocery">Grocery</option>
												</select>
											</div>
											<div class="form-group">
												<label class="control-label">Product Image</label>
												<div id="image-preview">
													<label for="image-upload" id="image-label">Upload Identity</label>
													<input type="file" name="productImage" id="image-upload" />
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
												<input name="product_quantity" maxlength="200" type="number" required="required" class="form-control" placeholder="Enter Quantity" />
											</div>
											<div class="form-group">
												<label class="control-label">Product Buying Price</label>
												<input name="product_buying_price" maxlength="200" type="number" required="required" class="form-control" placeholder="Enter Buying Price" />
											</div>
											<div class="form-group">
												<label class="control-label">Product Commission (In %)</label>
												<input name="product_commission" maxlength="200" type="number" required="required" class="form-control" placeholder="Enter Commission Amount"  />
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
													while ($row = mysqli_fetch_array($queryDealerName, MYSQLI_ASSOC)) {
														echo "<option value='" . $row['id'] . "'>".$row['name']."</option>";
													}
													?>
												</select>
											</div>
											<input class="btn btn-success btn-lg pull-right" name="productRegistration" type="submit" value="Complete Registration"/>
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

<?php
require_once ("layout/footer.php");
?>