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

							<form role="form" action="" method="post" id="dealerRegistration">
								<div class="col-md-12">
									<div class="form-group">
										<label class="control-label">Company Name</label>
										<input maxlength="100" type="text" required="required" class="form-control" id="company_name" placeholder="Enter Company Name"  />
									</div>
									<div class="form-group">
										<label class="control-label">Dealer Full Name</label>
										<input maxlength="100" type="text" required="required" class="form-control" id="dealer_name" placeholder="Enter Dealer Name" />
									</div>
									<div class="form-group">
										<label class="control-label">Dealer Phone No.</label>
										<input maxlength="100" type="text" required="required" class="form-control" id="dealer_phone" placeholder="Enter Dealer Phone" />
									</div>
									<div class="form-group">
										<label class="control-label">Dealer Email Address</label>
										<input maxlength="100" type="email" required="required" class="form-control" id="dealer_email" placeholder="Enter Email Address" />
									</div>
									<button class="btn btn-success nextBtn btn-lg pull-right" id="dealerRegistry" type="button" >
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