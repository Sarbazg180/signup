<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"  name="viewport" content="width=device-width , initial-scale=1.0"   >
		<title>Dashboard</title>
		
		<!-- including bootstrap-->
		<link rel="stylesheet" href="bootstrap/bootstrap.min.css">
		<link rel="stylesheet" href="style/main.css" >
		<script src="bootstrap/jquery.min.js"></script>
		<script src="bootstrap/bootstrap.min.js"></script>
		<!-- including bootstrap-->
		
	</head>
	<body>
	
		<article class="container" >
			<div class="content" >
				<p id="welcome" >welcome <?php echo $_SESSION['user'] ?></p>
			</div>
		</article>
</body>
</html>
		
