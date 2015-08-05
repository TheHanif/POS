<?php 
require_once 'common/init.php';

if (!isset($_SESSION['terminal_list'])) {
	$_SESSION['terminal_list'] = array();
}


$_SESSION['barcode_detail']['quantity'] = $_POST['latestqty'];

// Add new scan Session with update quantity
$latest_product_add_detail = array ( $_SESSION['barcode'] => $_SESSION['barcode_detail'] );


// Complete Scan Terminal List
$_SESSION['terminal_list'][] = $latest_product_add_detail;


$count = count($_SESSION['terminal_list']);
// print_f($_SESSION['terminal_list']);
// return print_f($latest_product_add_detail);
$price 	= $_SESSION['barcode_detail']['price'];
$qty 	= $_SESSION['barcode_detail']['quantity'];
$total 	= $price * $qty; 
$id = key($_SESSION['terminal_list']);


echo '<li class="col-md-12 nopadding">
	<div class="product">
	    <div class="col-md-1 nopadding alignCenter">'.($count+1).'</div>
	    <div class="col-md-5 ">'. $_SESSION['barcode_detail']['name'] .'<a href="product_delete.php?product_id='. $id .'" style="color:#fff;"><span class="glyphicon glyphicon-trash floatRight" aria-hidden="true"></span></a></div>
	    <div class="col-md-2 alignRight paddingright30">'. $price .'</div>
	    <div class="col-md-2 alignCenter"><input type="text" value="'. $qty .'"/></div>
	    <div class="col-md-2 alignRight paddingright30">'. $total .'</div>
	    <div class="clearfix"></div>
	</div>
	<div class="productoffer">
		<div class="col-md-5 col-md-offset-1">Free Pencil</div>
	    <div class="col-md-6 nopadding"></div>
	    <div class="clearfix"></div>
	</div>
</li>';
?>