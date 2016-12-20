<?php
	use Auth\login as l;
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
				$login= new l\login($connect,"user_details");
				//Logs the user in first.
				$login->verifyLogin($_POST['username'],$_POST['password'],"Failed Login","Error");

				if($login->isLoggedin()==TRUE)
				{
					//Checks when the user is loggedin in..
					var_dump("hello");
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