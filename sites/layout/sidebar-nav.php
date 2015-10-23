<div class="col-sm-3">
      <!-- left -->
      <h3><i class="glyphicon glyphicon-briefcase"></i> Toolbox</h3>
      <hr>
      
      <ul class="nav nav-stacked">
      	<li><a href="home"><i class="glyphicon glyphicon-dashboard"></i> Dashboard</a></li>
        <li><a href="view-reports"><i class="glyphicon glyphicon-list-alt"></i> View Reports</a></li>
        <li><a href="view-dealers"><i class="glyphicon glyphicon-user"></i> View Delears</a></li>
        <li><a href="view-products"><i class="glyphicon glyphicon-barcode"></i> VIew Products</a></li>
      </ul>
      
      <hr>
      <?php if(substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1) == "view-reports.php"){ ?>
      <div class="filter-search">
			<div class="col-md-12">
				<h3>Filter your Search</h3>
			</div>
			<div class="form-group">
				<input type="text" class="form-control" id="search-name" placeholder="Search by Product Name">
			</div>
			<div class="form-group">
				<input type="text" class="form-control" id="search-sku" placeholder="Search by Product SKU">
			</div>
			<div class="form-group">
				<div class="checkbox">
					<label>
						<input type="checkbox" id="search-stock" value="">
						Less Stock Product(s)</label>
				</div>
			</div>
			<div class="form-group">
					  <select class="form-control" id="search-taxonomy">
					    	<option value="Home Appliances">Home Appliances</option>
							<option value="Mobile">Mobile</option>
							<option value="Grocery">Grocery</option>
					  </select>
			</div>
			<div class="search-action">
				<input type="submit" class="btn btn-success" value="Search Details"/>
			</div>
		</div>

      <?php } ?>
 </div>