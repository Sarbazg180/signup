<?php
	require("script/con.php");
	session_start();
	
	if(isset($_SESSION['user']))
	{
		header('location:welcome.php');
	}
	$result = $con->query('SELECT Username , Password FROM user');
	
	if(isset($_POST['submit']))
	{
		foreach($result as $row)
		{
			if($row['Username'] == $_POST['username'])
			{
				$user = $row['Username'];
				$p = $con->query("SELECT Password FROM user WHERE Username = '$user'");
				foreach($p as $pass)
				{
					if($_POST['password'] == $pass['Password'])
					{
						$_SESSION['user'] = $row['Username'];
						header('location:welcome.php');
					}
					else
					{
					$error = "<div class='alert alert-danger' >رمز شما اشتباه می باشد</div>";
					}
				}
			}
		}
	}
	$con->close();
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
				<p class="header" >ورود</p>
				<form action="" method="post" style="direction:rtl;"   >
					<?php echo $error; ?>
					<input type="username" class="input form-control" name="username" placeholder="نام کاربری" required >
					<input type="password" class="input form-control" name="password" placeholder="رمز"required >
					<p class="sign" ><a href="signup.php">هنوز ثبت نام نکرده ام</a></p>
					<input class="submit btn-outline-secondary"  type="submit" name="submit"  value="ورود" class="input"> 
				</form>
			</div>
		</div>
		
	<!-- LogIn -->
	
	</body>
</html>