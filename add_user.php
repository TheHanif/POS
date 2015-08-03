<?php require_once 'common/init.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Add User</title>
</head>
<body>

<?php include ABSPATH.'include/menu.php'; ?>
<hr>

<?php 
$user = new user();

if (isset($_POST['add_user'])) {
	
	$results = $user->do_register($_POST);
	
	if ($results) {
		echo $results;
	}else{
		echo 'Error';
	}
} 
?>

<h2>Add User</h2>
<form action="" method="post">
	<label for="fname">First Name <input type="text" name="fname" id="fname" required></label> <br>
	<label for="lname">Last Name <input type="text" name="lname" id="lname" required></label> <br>
	<label for="email">Email <input type="email" name="email" id="email" required></label> <br>
	<label for="username">Username <input type="text" name="username" id="username" required></label> <br>
	<label for="password">Password <input type="password" name="password" id="password" required></label> <br>
	<label for="mobile">Mobile <input type="text" name="mobile" id="mobile" required></label> <br>
	<label for="phone">Phone <input type="text" name="phone" id="phone" required></label> <br>
	<label for="address">Address <input type="text" name="address" id="address" required></label> <br>
	<label for="city">City <input type="text" name="city" id="city" required></label> <br>
	<label for="country">Country <input type="text" name="country" id="country" required></label> <br>
	<label for="nic">NIC <input type="text" name="nic" id="nic" required></label> <br>
	<label for="dob">Date of Birth <input type="date" name="dob" id="dob" required></label> <br>
	<label for="photo">Photo <input type="file" name="photo" id="photo"></label> <br>
	<label for="designation">Designation 
		<select name="designation" id="designation" required>
			<?php 
			foreach($designation as $designation=>$value){
				?>
					<option value="<?php echo $designation; ?>"><?php echo $value; ?></option>
				<?php
			}
			?>
		</select>
	</label> <br>
	<label for="permission">Permission Allow</label> <br>
	<?php 
	foreach($capabilities as $capability=>$value){
		?>
			<label><input type="checkbox" name="capabilities[]" value="<?php echo $capability; ?>"><?php echo $value; ?></label><br/>
		<?php

	}
	?>
	<input type="submit" name="add_user" value="Add User">
</form>
</body>
</html>