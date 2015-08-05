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

print_f($_SESSION['terminal_list']);
?>