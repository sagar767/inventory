<?php $title = "Home - Inventory"; ?>

<?php
	require_once ("layout/header.php");
?>

<?php
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
			<h3><i class="glyphicon glyphicon-dashboard"></i> Dashboard</h3>

			<hr>

			<div class="row">
				<!-- center left-->
				<div class="col-md-7">

					<div class="panel panel-default">
						<div class="panel-heading">
							<h4>Product Overview</h4>
						</div>
						<div class="panel-body">

							<small>Total Profit</small>
							<div class="progress">
								<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100" style="width: 72%">
									<span class="sr-only">72% Complete</span>
								</div>
							</div>
							<hr>
							<small>Total Selling</small>
							<div class="progress">
								<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
									<span class="sr-only">20% Complete</span>
								</div>
							</div>
							<hr>
							<small>Total Buying</small>
							<div class="progress">
								<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
									<span class="sr-only">80% Complete</span>
								</div>
							</div>

						</div><!--/panel-body-->
					</div><!--/panel-->

				</div><!--/col-->

				<!--center-right-->
				<?php
					require_once ("layout/sub-nav.php");
				?>
			</div><!--/row-->
		</div><!--/col-span-9-->

	</div>
</div>

<?php
	require_once ("layout/footer.php");
?>