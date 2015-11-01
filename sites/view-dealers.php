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
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>Serial</th>
								<th>Dealer Id</th>
								<th>Dealer Name</th>
								<th>Company Name</th>
								<th>Location</th>
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
								<td><?php echo $row['location']; ?></td>
								<td><?php echo $row['phone']; ?></td>								
								<td><?php echo $row['email']; ?></td>
								<td>
								<a disabled style="color: #E15639; font-size: 1.3em;" href="#" id="<?php echo $row['id']; ?>" class="delete">
	                               <i class="fa fa-trash-o"></i>
	                           </a>
	                           <a style="color: #7388B6; font-size: 1.3em;" href="new-dealer?dealer_id=<?php echo base64_encode($row['id']); ?>">
	                               <i class="fa fa-edit"></i>
	                           </a>
	                           </td>
							</tr>
							<?php $i++;
							}
							?>
						</tbody>
					</table>
				</div>
				
				<!-- Render pagination based on messages-->
      			<div class="pagination-wrap">
                	<ul class="pagination">
	                  <?PHP
						if ($page_counter == 0) {
							echo "<li><a href=?start='0' class='active'>0</a></li>";
							for ($j = 1; $j < $paginations; $j++) {
								echo "<li><a href=?start=$j>" . $j . "</a></li>";
							}
						} else {
							echo "<li><a href=?start=$previous>Previous</a></li>";
							for ($j = 0; $j < $paginations; $j++) {
								if ($j == $page_counter) {
									echo "<li><a href=?start=$j class='active'>" . $j . "</a></li>";
								} else {
									echo "<li><a href=?start=$j>" . $j . "</a></li>";
								}
							}
							if ($j != $page_counter + 1)
								echo "<li><a href=?start=$next>Next</a></li>";
						}
	                  ?>
                	</ul>
      			</div><!--/Pagination Finished here-->
			</div><!--/row-->
		</div><!--/col-span-9-->
	</div>
</div>

<?php
require_once ("layout/footer.php");
?>