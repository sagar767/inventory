<?php $title = "Product Registration";
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
			<h3><i class="glyphicon glyphicon-barcode"></i> Create New Product</h3>
			<hr>
			<div class="row">
				<!-- center left-->
				<div class="product-view col-sm-12">
			<?php
				while ($row = mysqli_fetch_array($queryProductView, MYSQLI_ASSOC)) {?>
						<div class="product-cell col-sm-4">
							<div class="product-img col-sm-12">
								<img src="<?php echo $row['prd_img']?>"/>
							</div>
							<div class="product-info col-sm-12">
								<div class="col-sm-12">
										<div class="sku col-sm-6">
											<?php echo $row['sku']; ?>
										</div>
										<div class="prd-base-price col-sm-6">
											<?php echo $row['prd_base_price']; ?>
										</div>
									<div class="prd-name col-sm-12">
											<?php echo $row['prd_name']; ?>
									</div>
									<div class="prd-catg col-sm-12">
										<?php echo $row['prd_catg']; ?>
									</div>
								</div>
							</div>
								<a href="create-billing?product_sku=<?php echo base64_encode($row['sku']); ?>&product_id=<?php echo base64_encode($row['id']); ?>" class="product-view-action btn btn-success">
									Make Billing
								</a>
						</div>
				<?php }
			?>
				</div><!--/col-->
			</div><!--/row-->
		</div><!--/col-span-9-->

	</div>
</div>

<?php
require_once ("layout/footer.php");
?>