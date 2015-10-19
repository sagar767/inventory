<?php $title = "Product Registration";
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
			<h3><i class="glyphicon glyphicon-barcode"></i> Create New Product</h3>
			<hr>
			<div class="row">
				<!-- center left-->
				<div class="col-md-12">

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
											Dealer Details
										</p>
									</div>
									<div class="stepwizard-step">
										<a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
										<p>
											Price Details
										</p>
									</div>
								</div>
							</div>
							<form role="form" action="" method="post" id="productRegistration">
								<div class="row setup-content" id="step-1">
									<div class="col-xs-9 col-md-offset-1">
										<div class="col-md-12">
											<h3> Step 1</h3>
											<div class="form-group">
												<label class="control-label">Product SKU</label>
												<input  maxlength="100" disabled type="text" value="<?php echo "PDI" . mt_rand(); ?>" required="required" class="form-control" placeholder="Enter First Name"  />
											</div>
											<div class="form-group">
												<label class="control-label">Product Name</label>
												<input maxlength="100" type="text" required="required" class="form-control" placeholder="Enter Last Name" />
											</div>
											<div class="form-group">
												<label class="control-label">Product Details</label>
												<textarea required="required" class="form-control" placeholder="Enter your address" ></textarea>
											</div>
											<div class="form-group">
												<label class="control-label">Product Image</label>
												<div id="image-preview">
													<label for="image-upload" id="image-label">Upload Identity</label>
													<input type="file" name="image" id="image-upload" />
												</div>
											</div>
											<div class="form-group">
												<label class="control-label">Product Category</label>
												<select class="form-control" id="sel1">
													<option>Home Appliance</option>
													<option>Mobile</option>
													<option>Grocery</option>
												</select>
											</div>
											<button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >
												Next
											</button>
										</div>
									</div>
								</div>
								<div class="row setup-content" id="step-2">
									<div class="col-xs-9 col-md-offset-1">
										<div class="col-md-12">
											<h3> Step 2</h3>
											<div class="form-group">
												<label class="control-label">Company Name</label>
												<input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Name" />
											</div>
											<div class="form-group">
												<label class="control-label">Company Address</label>
												<input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Address"  />
											</div>
											<button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >
												Next
											</button>
										</div>
									</div>
								</div>
								<div class="row setup-content" id="step-3">
									<div class="col-xs-9 col-md-offset-1">
										<div class="col-md-12">
											<h3> Step 3</h3>
											<div class="form-group">
												<label class="control-label">Company Name</label>
												<input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Name" />
											</div>
											<div class="form-group">
												<label class="control-label">Company Address</label>
												<input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Address"  />
											</div>
											<button class="btn btn-success btn-lg pull-right" type="submit">
												Submit
											</button>
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