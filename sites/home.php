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
					text: "Product Stock Amount"
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
				<div class="col-md-7">

					<div class="panel panel-default">
						<div class="panel-heading">
							<h4>Product Overview</h4>
						</div>
					 <div id="chartContainer" style="width: 480px; height: 250px;"></div>
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