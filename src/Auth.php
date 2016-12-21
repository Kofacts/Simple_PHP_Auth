<?php
//namespace Auth\dets;
//use src\Auth\login as k;
	/** Once the user is logged in. **/
	
	//$new = new k\login();
//var_dump(file_exists("../src/login.php"));
	require_once("../src/login.php");
	class Auth extends login{


		

		public function __construct()
		{
			//The User must be logged in.
			$this->isAlwaysLoggedin();
			


		}

		static function username()
		{
			//Use this method to echo the name of the guest.
			echo $username;

		}

		static function email()
		{
			echo $email;
		}

		static function addr()
		{
			echo $address;
		}

		public function isAlwaysLoggedin()
		{
			//Check if the user is logged in else redirect.
			if($this->isLoggedin()==TRUE)
			{
				return true;
			}
			else{
				die("You Need to log in");
			}
		}
	}