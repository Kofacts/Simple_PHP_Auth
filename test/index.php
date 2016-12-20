<?php
	include "../src/login.php";
	try
	{
		$connect= new mysqli("localhost","root","pico4421","loginlib");

		if(!isset($connect))
		{
			throw new Exception("Error Establishing DB Connection", 1);
			
		}
		else{
			if(isset($_POST['submit']))
			{
				$login= new login($connect,"user_details");
				$login->verifyLogin($_POST['username'],$_POST['password'],"http://facebook.com","Failed Login","Error");
				//$login::guest();
			}
		}
	}catch (Exception $e)
	{
		die("Unable to Connect!");
	}



?>


<form action='index.php' method="post">
	<input type="text" name="username">
	<input type="password" name="password">
	<input type="submit" name="submit">
</form>