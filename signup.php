<?php
	require("script/con.php");
	
	$conf = $con->query('SELECT Username FROM user');
	
	if(isset($_POST['submit']))
	{
		
		$name = $_POST['name'];
		$email = $_POST['email'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		$res = $con->query("SELECT * FROM user WHERE Username = '$username'");
		$em = $con->query("SELECT * FROM user WHERE Email = '$email'");
		if(mysqli_num_rows($res) > 0)
		{
			$err = "<div class='alert alert-danger'>این نام کاربری قبلاً استفاده شده!</div>";
		}
		elseif(mysqli_num_rows($em) > 0)
		{
			$error = "<div class='alert alert-danger'>این ایمیل قبلاً استفاده شده!</div>";
		}
		else
		{
			$con->query("SET CHARACTER SET utf8;");
			$con->query("INSERT INTO user (Name , Username , Email , Password) VALUES ('$name' , '$username' , '$email' , '$password')");
			header('location:index.php');
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
	
		<meta name="viewport" content="width=device-width , initial-scale=1.0" >
	  	<meta charset="utf-8">
		<title></title>
		
		<link rel="stylesheet" href="bootstrap/bootstrap.min.css">
		<link rel="stylesheet" href="style/main.css" >
		<script src="bootstrap/jquery.min.js"></script>
		<script src="bootstrap/bootstrap.min.js"></script> 
		
	</head>
	<body>
	<!-- Login  -->
	
		<div>
			<div id="login">
				<p class="header" >ثبت نام</p>
				<form action="" method="post" style="direction:rtl;"   >
					<?php echo $error; echo $err;?>
					<input type="name" class="input form-control"  name="name" id="name" placeholder="نام و نام خانوادگی" autocomplete="off" required >
					<input type="email" class="input form-control" id="email"   name="email" placeholder="ایمیل"  required >
					<input type="username" class="input form-control" name="username" placeholder="نام کاربری" required >
					<input type="password" class="input form-control" name="password" placeholder="رمز"required >
					<input class="submit btn-outline-secondary"  type="submit" name="submit"  value="ثبت نام" class="input"> 
				</form>
			</div>
		</div>
		
	<!-- LogIn -->
	
	</body>
</html>