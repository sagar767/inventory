<?php $title = "Home - Inventory";
require_once ("layout/header.php");
require_once ("layout/primary-nav.php");
include "db-fetch/query.php";
?>
<script type="text/javascript">
        $(document).ready(function () {
            $.getJSON("dashboard.php", function (result) {
                var chart = new CanvasJS.Chart("chartContainer", {
                	title: {
					text: "Product Wise Stock"
					},
                	animationEnabled: true,
                    data: [
                        {
                        	type: "spline",
                        	showInLegend: true,
                            dataPoints: result
                        }
                    ]
                });
                chart.render();
            });
        });
</script>
    
<!-- Modal -->
<div class="modal fade" id="cookieModal" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                 <h4 class="modal-title" id="memberModalLabel">Welcome to Inventory</h4>

            </div>
            <div class="modal-body">
                <p>You are logged in as <b><?php echo $_SESSION['login_username']; ?></b></p>
                <p>Please note your preference will be saved during your access across all pages during active</p>
            	<div class="alert alert-danger">We have implemented cookies on this site.</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="container">
	<!-- upper section -->
	<div class="row">

		<?php
		require_once ("layout/sidebar-nav.php");
		?>

		<div class="col-sm-9 dashboard">

			<!-- column 2 -->
			<h3><i class="glyphicon glyphicon-dashboard"></i> Dashboard</h3>

			<hr>

			<div class="row">
				<!-- center left-->
				<div class="col-md-8">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4>Product Overview</h4>
						</div>
					 <div id="chartContainer" style="width: 550px; height: 320px;"></div>
					</div><!--/panel-->
					<div class="dashboard-summary">
						<p>Dashboard Summary</p>
						<div class="col-md-6 alert alert-info total-stockin">
							<p>Total Selling</p>
							<span>&#8377;<?php echo $rowSell;?></span>
						</div>
						<div class="col-md-6 alert alert-warning total-buyin">
							<p>Total BuyIn</p>
							<span>&#8377;<?php echo $rowBuyin['total'];?></span>
						</div>
						<div class="col-md-6 alert alert-success total-profit">
							<p>Total Profit</p>
							<span>&#8377;<?php echo $rowProfit['total'];?></span>
						</div>
						<div class="col-md-6 alert alert-danger total-dealer">
							<p>No. of Dealers</p>
							<span><?php echo $rowCountDealer['totalCountDealer'];?></span>
						</div>
						<div class="col-md-6 alert alert-warning total-product">
							<p>No. of Product Types</p>
							<span><?php echo $rowCountProduct['totalCountProduct'];?></span>
						</div>
					</div>
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