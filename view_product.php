<?php require_once 'header.php'; ?>
<section>
	<hr/>
	<div class="container">
		<div class="row">
			<div class="tableHeading">
				<p class="nomargin alignCenter">View Products</p>
			</div>
			<div class="col-md-12">	
				<?php 
				$product = new product();
				$results = $product->get_product();

				if ($results) {
				?>
				<table border="1" cellpadding="5" cellspacing="0" class="table table-hover tableView">
					<tr>
						<th>Product Name</th>
						<th>Product Supplier</th>
						<th>Product Cost</th>
						<th>Product Price</th>
						<th>Product GST</th>
						<th>Action</th>
					</tr>
						<?php 
						foreach($results as $res){
						echo '<tr>';
						echo '<td>'. $res->p_name .'</td>';
						echo '<td>'. $res->p_supplier.'</td>';
						echo '<td>'. $res->p_cost .'</td>';
						echo '<td>'. $res->p_price .'</td>';
						echo '<td>'. $res->p_gst .'</td>';
						echo '<td><a href="add_product.php?id='.$res->p_id.'"><span class="glyphicon glyphicon-pencil"></span></a></td>';
						echo '</tr>';
						}
						?>
				</table>
				<?php
				}else{
					echo 'Error';
				} 
				?>
			</div>
		<div><!-- Row Close -->
	</div><!-- Container Close -->
</section>
<?php require_once 'footer.php'; ?>