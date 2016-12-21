<?php
	use Auth\login as l;
	use Auth\dets as details;
	require_once "../src/login.php";
	require_once "../src/Auth.php";
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
				$login= new l\login($connect,"user_details");
				//Logs the user in first.
				$login->verifyLogin($_POST['username'],$_POST['password'],"Failed Login","Error");

				if($login->isLoggedin()==TRUE)
				{
					//Checks when the user is loggedin in..
					$auth= new details\Auth();
					$auth::guest();
				}
				else{
					$login->redirect("http://scholarsjoint.com");
				}
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