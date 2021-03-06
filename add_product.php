<?php require_once 'header.php'; ?>
<section>
	<hr/>
	<div class="container">
		<div class="row">
			<div class="tableHeading">
				<p class="nomargin alignCenter"><?php echo (isset($_GET['id']))? 'Update' : 'Add' ?>  Products</p>
			</div>
			
			<?php 
			$product = new product();

			$suppliers = new supplier();
			$suppliers_list = $suppliers->get_suppliers();
		
			$ID = (isset($_GET['id']))? $_GET['id'] : NULL;
			if (isset($_POST['add_product'])) {		
				// Update old record
				if (isset($ID)) {
					$results = $product->pro_update($_POST, $ID);
				}else{ // Insert new
					$results = $product->pro_insert($_POST);
				}
				if ($results) {
					echo '<div class="alert alert-success" role="alert"> Add Product Sucessfully </div>';
				}else{
					echo '<div class="alert alert-danger" role="alert"> Error </div>';
				}
			}
			if (isset($ID)) {
				$product_result = $product->pro_get($ID);
			}
			?>

			<form class="form-horizontal dashboardForm"  action="add_product.php<?php echo isset($ID)? ('?id='.$ID) : ''; ?> " method="post">
			<div class="col-md-6">	
				<div class="form-group">
					<label for="p_name" class="col-sm-3 control-label">Product Name: </label>
					<div class="col-sm-8">
						<input type="text" name="p_name" value="<?php echo (isset($ID))? $product_result->p_name : '' ?>" required>
					</div>
				</div>
			</div><!-- Col-md-6 Close -->
			<div class="col-md-6">	
				<div class="form-group">
					<label for="p_supplier" class="col-sm-3 control-label">Supplier Name: </label>
					<div class="col-sm-8">
						<select name="p_supplier" id="p_supplier" required>
							<?php 
							foreach($suppliers_list as $suplier){ ?>
								<option value="<?php echo $suplier->sup_id; ?>" <?php (isset($ID))? $sup = $product_result->p_supplier : ''; if(isset($ID)){if($suplier->sup_id == $sup){echo 'selected=selected';}}?>><?php echo $suplier->sup_name; ?></option>
							<?php
							}
							?>
						</select>
					</div>
				</div>
			</div><!-- Col-md-6 Close -->
			<div class="clear"></div>
			<div class="col-md-6">	
				<div class="form-group">
					<label for="p_cost" class="col-sm-3 control-label">Cost: </label>
					<div class="col-sm-8">
						<input type="text" name="p_cost" value="<?php echo (isset($ID))? $product_result->p_cost : '' ?>" class="form-control" required>
					</div>
				</div>
			</div><!-- Col-md-6 Close -->
			<div class="col-md-6">	
				<div class="form-group">
				    <label for="p_price" class="col-sm-3 control-label">Price: </label>
					<div class="col-sm-8">
						<input type="text" name="p_price" value="<?php echo (isset($ID))? $product_result->p_price : '' ?>" class="form-control" required>
					</div>
				</div>
			</div><!-- Col-md-6 Close -->
			<div class="col-md-6">	
				<div class="form-group">
				    <label for="p_gst" class="col-sm-3 control-label">GST: </label>
					<div class="col-sm-8">
						<input type="text" name="p_gst" value="<?php echo (isset($ID))? $product_result->p_gst : '' ?>" class="form-control" required>
					</div>
				</div>
			</div><!-- Col-md-6 Close -->
			<div class="col-md-6">	
				<div class="form-group">
				    <label for="p_vat" class="col-sm-3 control-label">VAT: </label>
					<div class="col-sm-8">
						<input type="text" name="p_vat" value="<?php echo (isset($ID))? $product_result->p_vat : '' ?>" class="form-control" required>
					</div>
				</div>
			</div><!-- Col-md-6 Close -->
			<div class="col-md-6">	
				<div class="form-group">
				    <label for="p_volumetype" class="col-sm-3 control-label">Volume Type: </label>
					<div class="col-sm-8">
						<input type="text" name="p_volumetype" value="<?php echo (isset($ID))? $product_result->p_volumetype : '' ?>" class="form-control" required>
					</div>
				</div>
			</div><!-- Col-md-6 Close -->
			<div class="col-md-6">	
				<div class="form-group">
				    <label for="p_volumevalue" class="col-sm-3 control-label">Volume Value: </label>
					<div class="col-sm-8">
						<input type="text" name="p_volumevalue" value="<?php echo (isset($ID))? $product_result->p_volumevalue : '' ?>" class="form-control" required>
					</div>
				</div>
			</div><!-- Col-md-6 Close -->
			<div class="col-md-6">	
				<div class="form-group">
				    <label for="p_skucrate" class="col-sm-3 control-label">SKU Crate: </label>
					<div class="col-sm-8">
						<input type="text" name="p_skucrate" value="<?php echo (isset($ID))? $product_result->p_skucrate : '' ?>" class="form-control" required>
					</div>
				</div>
			</div><!-- Col-md-6 Close -->
			<div class="col-md-6">	
				<div class="form-group">
				    <label for="p_skucarton" class="col-sm-3 control-label">SKU Carton: </label>
					<div class="col-sm-8">
						<input type="text" name="p_skucarton" value="<?php echo (isset($ID))? $product_result->p_skucarton : '' ?>" class="form-control" required>
					</div>
				</div>
			</div><!-- Col-md-6 Close -->
			<div class="col-md-6">	
				<div class="form-group">
				    <label for="p_skubag" class="col-sm-3 control-label">SKU Bag: </label>
					<div class="col-sm-8">
						<input type="text" name="p_skubag" value="<?php echo (isset($ID))? $product_result->p_skubag : '' ?>" class="form-control" required>
					</div>
				</div>
			</div><!-- Col-md-6 Close -->
			<div class="clear"></div>
			<div class="col-md-6">
				<div class="form-group">
					<label class="col-sm-3 control-label"></label>
					<div class="col-sm-8">
						<button type="submit" class="btn submitBtn" name="add_product"><?php echo (isset($ID))? 'Update' : 'Add' ?> Product</button>
					</div>
			  	</div>
			</div>
			</form>
		</div><!-- Row Close -->
	</div><!-- Container Close -->
</section>

<!--
<form action="add_inventory.php<?php echo isset($ID)? ('?id='.$ID) : ''; ?> " method="post">
	<label for="name">Item Name: <input type="text" name="inv_name" value="<?php echo (isset($ID))? $inventory_result->inv_name : '' ?>"></label><br>
	<label for="cost">Cost: <input type="text" name="inv_cost" value="<?php echo (isset($ID))? $inventory_result->inv_cost : '' ?>"></label><br>
	<label for="price">Price: <input type="text" name="inv_price" value="<?php echo (isset($ID))? $inventory_result->inv_price : '' ?>"></label><br>
	<label for="quantity">Quantity: <input type="text" name="inv_quantity" value="<?php echo (isset($ID))? $inventory_result->inv_quantity : '' ?>"></label><br>
	<label for="barcode">Barcode: <input type="text" name="inv_barcode" value="<?php echo (isset($ID))? $inventory_result->inv_barcode : '' ?>"></label><br><br>
	<input type="submit" name="add_inventory" value="Add Item">
</form>
-->
<?php require_once 'footer.php'; ?>