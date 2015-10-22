<?php $title = "View Dealers";
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
			<h3><i class="fa fa-bar-chart"></i> View Transactional Report of - <?php echo $productSku;?></h3>
			<hr>
			<div class="row view-reports">
				<!-- center left-->
				<p class="alert alert-info">
					View Individual Product Date Wise.
				</p>
				<table class="table table-hover table-responsive">
					<thead>
						<tr>
							<th>Serial</th>
							<th>Quantity</th>
							<th>Transaction Type</th>
							<th>Service Type</th>
							<th>Date</th>
							<th>Amount</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$i = 1;
						while ($rowReportbyId = mysqli_fetch_array($queryReportbyProductId,MYSQLI_ASSOC)) {
						if($rowReportbyId['services']=="Profit"){?>
						<tr class="alert alert-success">
							<td><?php echo $i; ?></td>
							<td><?php echo $rowReportbyId['quantity']; ?></td>
							<td><?php echo $rowReportbyId['tr_type']; ?></td>
							<td><?php echo $rowReportbyId['services']; ?></td>
							<td><?php echo $rowReportbyId['date']; ?></td>
							<td><?php echo $rowReportbyId['amount']; ?></td>
						</tr>
						<?php } else if($rowReportbyId['services']=="Checkout"){?>
						<tr class="alert alert-warning">
							<td><?php echo $i; ?></td>
							<td><?php echo $rowReportbyId['quantity']; ?></td>
							<td><?php echo $rowReportbyId['tr_type']; ?></td>
							<td><?php echo $rowReportbyId['services']; ?></td>
							<td><?php echo $rowReportbyId['date']; ?></td>
							<td><?php echo $rowReportbyId['amount']; ?></td>
						</tr>
						<?php } else{ ?>
							
						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $rowReportbyId['quantity']; ?></td>
							<td><?php echo $rowReportbyId['tr_type']; ?></td>
							<td><?php echo $rowReportbyId['services']; ?></td>
							<td><?php echo $rowReportbyId['date']; ?></td>
							<td><?php echo $rowReportbyId['amount']; ?></td>
						</tr>
							
						<?php } $i++; } ?>
					</tbody>
				</table>

			</div><!--/row-->
		</div><!--/col-span-9-->

	</div>
</div>

<?php
require_once ("layout/footer.php");
?>