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
			<h3><i class="fa fa-calculator"></i> View Ledger Report</h3>
			<hr>
			<div class="row view-reports">
				<!-- center left-->
				<p class="alert alert-info">
					Manage Report Details.Use Filter to search particular report.
				</p>
				<table class="table table-hover table-responsive">
					<thead>
						<tr>
							<th>Serial</th>
							<th>Product SKU</th>
							<th>Product Name</th>
							<th>Taxonomy</th>
							<th>Quantity</th>
							<th>Amount</th>
							<th>Details</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$i = 1;
						while ($rowReport = mysqli_fetch_array($queryReport,MYSQLI_ASSOC)) {
						$totalQuantity = $rowReport['stck'] + $rowReport['qnt']; 
						if($totalQuantity<=2){?>
						<tr class="alert alert-danger">
							<td><?php echo $i; ?></td>
							<td><?php echo $rowReport['sku']; ?></td>
							<td><?php echo $rowReport['prd_name']; ?></td>
							<td><?php echo $rowReport['prd_catg']; ?></td>
							<td><?php echo $totalQuantity; ?></td>
							<td><?php echo $rowReport['total']; ?></td>
							<td>
								<a href="view-reports-by-id?product_sku=<?php echo base64_encode($rowReport['sku']); ?>&product_id=<?php echo base64_encode($rowReport['pid']); ?>">
								<i class="fa fa-external-link"></i>
								</a>
							</td>
						</tr>
						<?php } else {?>
						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $rowReport['sku']; ?></td>
							<td><?php echo $rowReport['prd_name']; ?></td>
							<td><?php echo $rowReport['prd_catg']; ?></td>
							<td><?php echo $totalQuantity; ?></td>
							<td><?php echo $rowReport['total']; ?></td>
							<td>
								<a href="view-reports-by-id?product_sku=<?php echo base64_encode($rowReport['sku']); ?>&product_id=<?php echo base64_encode($rowReport['pid']); ?>">
								<i class="fa fa-external-link"></i>
								</a>
							</td>
						</tr>
						<?php }
						$i++; 
						} 
						?>
					</tbody>
				</table>

			</div><!--/row-->
		</div><!--/col-span-9-->

	</div>
</div>

<?php
require_once ("layout/footer.php");
?>