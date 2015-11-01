<?php
include "db-fetch/query.php";
$title = "Dealer Registration";
if($updateDealerTitle!="")
	{
		 $title = $updateDealerTitle;	
	}
require_once ("layout/header.php");
require_once ("layout/primary-nav.php");
include "db-fetch/query.php";
?>

<div class="container">
	<!-- upper section -->
	<div class="row">

		<?php
		require_once ("layout/sidebar-nav.php");
		?>

		<div class="col-sm-9">

			<!-- column 2 -->
			<?php ?>
			<h3><i class="glyphicon glyphicon-user"></i> 
			<?php 
				if($rowDealerId!=""){
					echo $title.' of '.$rowDealerId['name'];
				}
				else{
					echo $title;
				}
			?></h3>
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
								<?php if($rowDealerId!=""){ ?>
									<input name="dealer_id" id="dealer_id" type="hidden" value="<?php echo $rowDealerId['id']; ?>"/>
								<?php } else { ?>
									<input name="dealer_id" id="dealer_id" type="hidden" value=""/>
								<?php } ?>
								<div class="col-md-12">
									<div class="form-group">
										<label for="inputName" class="control-label">Company Name</label>
										<?php if(!empty($rowDealerId['name'])){ ?>
											<input type="text" required class="form-control" value="<?php echo $rowDealerId['company']; ?>" id="company_name" />
										<?php } else { ?>
											<input type="text" required class="form-control"  id="company_name" placeholder="Enter Company Name"  />
										<?php }?>
									</div>
									<div class="form-group">
										<label for="inputName" class="control-label">Dealer Full Name</label>
										<?php if(!empty($rowDealerId['name'])){ ?>
											<input type="text" required class="form-control" id="dealer_name" value="<?php echo $rowDealerId['name']; ?>" />
										<?php } else{ ?>
											<input type="text" required class="form-control" id="dealer_name" placeholder="Enter Dealer Name" />
										<?php } ?>
									</div>
									<div class="form-group">
										<label for="inputName" class="control-label">Dealer Phone No.</label>
										<?php if(!empty($rowDealerId['phone'])){ ?>
											<input type="text" required class="form-control" id="dealer_phone" value="<?php echo $rowDealerId['phone']; ?>" />
										<?php } else{ ?>
										<input type="number" data-minlength="10" required class="form-control" id="dealer_phone" placeholder="Enter Dealer Phone" />
										<?php } ?>
										<span class="help-block">Phone Number must be 10 digits</span>
									</div>
									<div class="form-group">
										<label for="inputName" class="control-label">Dealer Email Address</label>
										<?php if(!empty($rowDealerId['email'])){ ?>
											<input type="text" required class="form-control" id="dealer_email" value="<?php echo $rowDealerId['email']; ?>" />
										<?php } else{ ?>
											<input type="email" pattern="^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$" required class="form-control" id="dealer_email" data-error="Email Address must be valid" placeholder="Enter Email Address" />
										<?php } ?>
										<div class="help-block with-errors"></div>
									</div>
									<div class="form-group">
										<label for="inputName" class="control-label">Dealer Location</label>
										<?php if(!empty($rowDealerId['location'])){ ?>
											<input type="text" required class="form-control" id="dealer_location" value="<?php echo $rowDealerId['location']; ?>" />
										<?php } else{ ?>
											<input type="text" required class="form-control" id="dealer_location" placeholder="Enter Dealer Location" />
										<?php } ?>
									</div>
									
											<button class="btn btn-success nextBtn btn-lg pull-right" id="dealerRegistry" type="submit" >	
												<?php if($rowDealerId!=""){ ?>
														Update Registration
												<?php } else { ?>
													Complete Registration
												<?php } ?>
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