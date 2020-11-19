<?php
	$con = mysqli_connect("localhost" , "root" , "pass" , "signup");
	if(!$con)
	{
		echo "error because : ". mysqli_connect_error();
	}
?>