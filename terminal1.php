<?php require_once 'common/init.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Terminal</title>
	<link href="assets/css/reset.css" rel="stylesheet">
	<link href="assets/css/general.css" rel="stylesheet">
	<link href="assets/css/bootstrap.css" rel="stylesheet">
	<link href="assets/css/bootstrap-theme.css" rel="stylesheet">
	<link href="assets/css/style.css" rel="stylesheet">
	<link href="assets/css/tinyscrollbar.css" rel="stylesheet" >

	<script type="text/javascript" src="assets/js/jquery.latest.js"></script>
        <script type="text/javascript" src="../../lib/jquery.tinyscrollbar.js"></script> 
        <script src="assets/js/jquery.tinyscrollbar.js"></script>
        <script type="text/javascript">
            $(document).ready(function()
            {
                var $scrollbar = $("#scrollbar1");

                $scrollbar.tinyscrollbar();
            });
        </script> 
</head>
<body>
<?php 
$product = array();
$product[] = array( '12345867885' => array (
			'product_id' => 1,
			'name' => 'Shahsons Picasso Ball Point',
			'price' => '700',
			'quantity' => '3',
	)
);
$product[] = array( '12345867884' => array (
			'product_id' => 1,
			'name' => 'Shahsons Picasso',
			'price' => '150',
			'quantity' => '1',
	)
);
$product[] = array( '12345867885' => array (
			'product_id' => 1,
			'name' => 'Shahsons Picasso Ball Point',
			'price' => '70',
			'quantity' => '5',
	)
);
$product[] = array( '12345867885' => array (
			'product_id' => 1,
			'name' => 'Shahsons Picasso Ball Point',
			'price' => '700',
			'quantity' => '3',
	)
);
$product[] = array( '12345867884' => array (
			'product_id' => 1,
			'name' => 'Shahsons Picasso',
			'price' => '150',
			'quantity' => '1',
	)
);
$product[] = array( '12345867885' => array (
			'product_id' => 1,
			'name' => 'Shahsons Picasso Ball Point',
			'price' => '70',
			'quantity' => '5',
	)
);
$product[] = array( '12345867885' => array (
			'product_id' => 1,
			'name' => 'Shahsons Picasso Ball Point',
			'price' => '700',
			'quantity' => '3',
	)
);
$product[] = array( '12345867884' => array (
			'product_id' => 1,
			'name' => 'Shahsons Picasso',
			'price' => '150',
			'quantity' => '1',
	)
);
$product[] = array( '12345867885' => array (
			'product_id' => 1,
			'name' => 'Shahsons Picasso Ball Point',
			'price' => '70',
			'quantity' => '5',
	)
);
?>

	<div class="container">
		<div class="row">
			<div class="col-md-12 userHead">
				<ul>
					<li class="col-md-3">
						<p>WELCOME : <?php echo $_SESSION['user']->first_name; ?> <?php echo $_SESSION['user']->last_name; ?></p>
					</li>
					<li class="col-md-3">
						<p>Date &amp; Time : <span><?php $date = new DateTime('now', new DateTimeZone('Asia/Karachi'));
 						echo $date->format("j-n-Y, g:i a"); ?></span></p>
					</li>
					<li class="col-md-2">
						<p>Shift Number : <span> 5 </span></p>
					</li>
					<li class="col-md-3">
						<p>Terminal Point Number : <span> 8 </span></p>
					</li>
					<li class="col-md-1">
						<p><a href="login.php?logout=true"><img src="assets/images/login.png"/></a></p>
					</li>
				</ul>
			</div>
			<div class="col-md-12 compHead">
					<div class="col-md-3">
						<img src="assets/images/logo.png" class="img-responsive marginauto" />
					</div>
					<div class="col-md-4 col-md-offset-1">
						<p>Customer Name : <span> Raheel Ghani </span></p>
					</div>
					<div class="col-md-4">
						<p class="alignRight">Bill Number : <span> 156 </span></p>
					</div>
				</ul>
			</div>
		</div><!-- Row Close -->

		<div class="row">
			<div class="col-md-8">
				<div class="col-md-12 latestScan">
					<form action="terminal_list.php" method="post">
						<div class="col-md-10 nopadding">
							<h1><?php echo $_SESSION['barcode_detail']['name']; ?></h1>
							<p>Free Pencil</p>
							<p><?php echo $_SESSION['barcode']; ?></p>
						</div>
						<div class="col-md-2 latestQty">
							<input type="text" name="latestqty" value="<?php echo $_SESSION['barcode_detail']['quantity']; ?>">
						</div>
					</form>
				</div><!-- latestScan Close -->

				<div class="col-md-12 productTable">
					<ul class="headingTable">
	                    <li class="col-md-1 nopadding">#</li>
	                    <li class="col-md-5">Description</li>
	                    <li class="col-md-2 nopadding">Price</li>
	                    <li class="col-md-2">Qty</li>
	                    <li class="col-md-2 nopadding noborderRight">Total</li>
	                    <div class="clearfix"></div>
                	</ul>
					<div id="scrollbar1">
			            <div class="scrollbar"><div class="track"><div class="thumb"><div class="end"></div></div></div></div>
			            <div class="viewport">
			                <div class="overview">
			                <ul>
			                	<?php 
			                	$count = 1;
								foreach ($_SESSION['terminal_list'] as $key => $value) {
									$barcode = key($value);
								?>
								<li class="col-md-12 nopadding">
				                    <div class="product">
					                    <div class="col-md-1 nopadding alignCenter"><?php echo $count; ?></div>
					                    <div class="col-md-5 "><?php echo $value[$barcode]['name']; ?></div>
					                    <div class="col-md-2 alignRight paddingright30"><?php echo $price = number_format((float)$value[$barcode]['price'], 2, '.', '') ?></div>
					                    <div class="col-md-2 alignCenter"><input type="text" value="<?php echo $qty = $value[$barcode]['quantity']; ?>"/></div>
					                    <div class="col-md-2 alignRight paddingright30"><?php echo number_format((float)$price * $qty, 2, '.', ''); ?></div>
					                    <div class="clearfix"></div>
				                	</div>
				                	<div class="productoffer">
				                		<div class="col-md-5 col-md-offset-1">Free Pencil</div>
					                    <div class="col-md-6 nopadding"></div>
					                    <div class="clearfix"></div>
				                	</div>
			                	</li><!-- One Product Close -->
								<?php
								$count++;
			                	}
			                	?>
			                </ul>
			                </div>
			            </div>
			        </div>
				</div><!-- Product Table Close -->
				
				<div class="col-md-12 marginTop subTotal">
					<ul>
						<li class="col-md-12">
							<div class="col-md-10">Sub Total</div>
	                    	<div class="col-md-2 alignRight paddingright30">800.00</div>
						</li>
						<li class="col-md-12 bgdark">
							<div class="col-md-10">Discount</div>
	                    	<div class="col-md-2 alignRight paddingright30">100.00</div>
						</li>
						<li class="col-md-12">
							<div class="col-md-10">Taxes</div>
	                    	<div class="col-md-2 alignRight paddingright30">0.00</div>
						</li>
						<li class="col-md-12">
							<div class="col-md-10">Totals</div>
	                    	<div class="col-md-2 alignRight paddingright30">700.00</div>
						</li>
					</ul>
				</div><!-- latestScan Close -->

				<div class="col-md-12 finalBill nopaddingRight">
					<div class="col-md-6 nopadding">
						<h1>Billed Amount</h1>
					</div>
					<div class="col-md-6 marginTop alignRight nopaddingRight">
						<span class="finalAmount">
							Rs. 100,000.00
						</span>
					</div>
				</div>
			</div>
			<div class="col-md-4 terminalControl">
				<div class="col-md-4 nopadding">
					<button>Hold<br/><span>(F1)</span></button>
				</div>
				<div class="col-md-8 nopadding">
					<button>REPORT<br/><span>(F2)</span></button>
				</div>

				<div class="col-md-12 nopadding">
					<button>configuration setting<br/><span>(F3)</span></button>
				</div>

				<div class="col-md-12 nopadding">
					<button>delete<br/><span>(delete)</span></button>
				</div>

				<div class="col-md-12 nopadding">
					<button>change / edit<br/><span>(F5)</span></button>
				</div>

				<div class="col-md-4 nopadding">
					<button>switch<br/><span>(F6)</span></button>
				</div>

				<div class="col-md-4 nopadding">
					<button>cash<br/><span>(F7)</span></button>
				</div>

				<div class="col-md-4 nopadding">
					<button>card<br/><span>(F8)</span></button>
				</div>

				<div class="col-md-12 nopadding">
					<button class="bgcheckoutBtn">checkout<br/><span>(cltr + enter)</span></button>
				</div>

				<div class="clearfix"></div>
				<div class="col-md-4">
					<button>7</button>
				</div>
				<div class="col-md-4">
					<button>8</button>
				</div>
				<div class="col-md-4">
					<button>9</button>
				</div>
				<div class="col-md-4">
					<button>4</button>
				</div>
				<div class="col-md-4">
					<button>5</button>
				</div>
				<div class="col-md-4">
					<button>6</button>
				</div>
				<div class="col-md-4">
					<button id="button_one">1</button>
				</div>
				<div class="col-md-4">
					<button>2</button>
				</div>
				<div class="col-md-4">
					<button>3</button>
				</div>
				<div class="col-md-4">
					<button>0</button>
				</div>
				<div class="col-md-8">
					<button>Checkout</button>
				</div>
				<div class="clearfix"></div>
			</div><!-- Right Col Close -->
		</div><!-- Row Close -->


		<div class="row footer">
			<div class="col-md-4">
				<p>Copyright 2015 </p>
			</div>

			<div class="col-md-4">
				<p>email: info@webnet.com.pk</p>
			</div>

			<div class="col-md-4 ">
				<img src="assets/images/powered_logo.png" class="img-responsive marginauto flogo" />
			</div>
		</div>
	</div><!-- Container Close -->




	
	<!--Attched Bootstrap JS  -->
	<script src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$(document).keypress(function(e) {
		  if(e.which == 49) {
		    alert('Press 1');
		  }
		  else if(e.which == 71) {
		    alert('Press G');
		  }
		});


	</script>
</body>
</html>