<?php $title = "Dealer Registration";
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
			<h3><i class="glyphicon glyphicon-user"></i> New Dealer Registration</h3>
			<hr>
			<div class="row">
				<!-- center left-->
				<div class="col-md-12">
					<div id="status"></div>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4>Complete Dealer Information</h4>
						</div>
						<div class="panel-body">

							<form role="form" data-toggle="validator" action="" method="post" id="dealerRegistration">
								<div class="col-md-12">
									<div class="form-group">
										<label for="inputName" class="control-label">Company Name</label>
										<input type="text" required class="form-control" id="company_name" placeholder="Enter Company Name"  />
									</div>
									<div class="form-group">
										<label for="inputName" class="control-label">Dealer Full Name</label>
										<input type="text" required class="form-control" id="dealer_name" placeholder="Enter Dealer Name" />
									</div>
									<div class="form-group">
										<label for="inputName" class="control-label">Dealer Phone No.</label>
										<input type="number" data-minlength="10" required class="form-control" id="dealer_phone" placeholder="Enter Dealer Phone" />
										<span class="help-block">Phone Number must be 10 digits</span>
									</div>
									<div class="form-group">
										<label for="inputName" class="control-label">Dealer Email Address</label>
										<input type="email" pattern="^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$" required class="form-control" id="dealer_email" data-error="Email Address must be valid" placeholder="Enter Email Address" />
										<div class="help-block with-errors"></div>
									</div>
									<button class="btn btn-success nextBtn btn-lg pull-right" id="dealerRegistry" type="submit" >
										Complete Registration
									</button>
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