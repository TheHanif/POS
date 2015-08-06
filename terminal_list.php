<?php 
require_once 'common/init.php';

if (!isset($_SESSION['terminal_list'])) {
	$_SESSION['terminal_list'] = array();
}


if(isset($_POST['latestqty'])){
	$_SESSION['barcode_detail']['quantity'] = $_POST['latestqty'];
	// Add new scan Session with update quantity
	$latest_product_add_detail = array ( $_SESSION['barcode'] => $_SESSION['barcode_detail'] );

	// Complete Scan Terminal List
	$_SESSION['terminal_list'][] = $latest_product_add_detail;

	$count = count($_SESSION['terminal_list']);
	$price 	= $_SESSION['barcode_detail']['price'];
	$qty 	= $_SESSION['barcode_detail']['quantity'];
	$price1 = number_format((float)$price, 2, '.', '');
	$total 	= $price * $qty; 
	$total1 = number_format((float)$total, 2, '.', '');
	$id = end(array_keys($_SESSION['terminal_list']));

	echo '<li class="col-md-12 nopadding product_list">
		<div class="product">
		    <div class="col-md-1 nopadding alignCenter">'.($count+1).'</div>
		    <div class="col-md-5 ">'. $_SESSION['barcode_detail']['name'] .'<a class="itemDelete" href="terminal_list.php?product_id='. $id .'" style="color:#fff;"><span class="glyphicon glyphicon-trash floatRight" aria-hidden="true"></span></a></div>
		    <div class="col-md-2 alignRight paddingright30">'. $price1 .'</div>
		    <div class="col-md-2 alignCenter"><input type="text" value="'. $qty .'"/></div>
		    <div class="col-md-2 alignRight paddingright30">'. $total1 .'<input type="hidden" class="subtotalAmt" value="'. $total1.'" /></div>
		    <div class="clearfix"></div>
		</div>
		<div class="productoffer">
			<div class="col-md-5 col-md-offset-1">Free Pencil</div>
		    <div class="col-md-6 nopadding"></div>
		    <div class="clearfix"></div>
		</div>
	</li>';
}

if(isset($_GET['product_id'])){
	unset($_SESSION['terminal_list'][$_GET['product_id']]);
	echo 'sucess';
}

//print_f($_SESSION['terminal_list']);
?>