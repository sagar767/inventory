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
			<h3><i class="glyphicon glyphicon-user"></i> View Dealers</h3>
			<hr>
			<div class="row view-dealers">
				<!-- center left-->
				<p class="alert alert-success">
					Manage Dealer Details.Edit or Delete details.
				</p>
				<table class="table table-hover table-responsive">
					<thead>
						<tr>
							<th>Serial</th>
							<th>Dealer Id</th>
							<th>Dealer Name</th>
							<th>Company Name</th>
							<th>Phone No.</th>
							<th>Email Address</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$i = 1;
						while ($row = mysqli_fetch_array($queryDealerView, MYSQLI_ASSOC)) {
						?>
						<tr>
							<td><?php echo $i; ?></td>
							<td>DINV<?php echo $row['id']; ?></td>
							<td><?php echo $row['name']; ?></td>
							<td><?php echo $row['company']; ?></td>
							<td><?php echo $row['phone']; ?></td>
							<td><?php echo $row['email']; ?></td>
							<td>
							<a style="color: #E15639; font-size: 1.3em;" href="#" id="<?php echo $row['id']; ?>" class="delete">
                               <i class="fa fa-trash-o"></i>
                           </a>
                           <a style="color: #7388B6; font-size: 1.3em;" href="#">
                               <i class="fa fa-edit"></i>
                           </a>
                           </td>
						</tr>
						<?php
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