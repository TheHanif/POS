<?php 
require_once 'common/init.php';

echo $barcode = $_GET['bc'];

$barcode_detail = array (
	'product_id' => 15,
	'name' => 'Shahsons Picasso Ball Pen',
	'price' => '250',
	'quantity' => 1,
	);

$_SESSION['barcode'] = $barcode;
$_SESSION['barcode_detail'] = $barcode_detail;


print_f($barcode_detail);

?>