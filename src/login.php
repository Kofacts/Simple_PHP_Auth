<?php
//implenting Namespace.
namespace Auth\login;

/**
	Project Name: Simple Login and Register Lib.
	Description: A Full Authentication Lib. Login, Logout, Register etc.
	Author: Obodugo Rapheal
	Website: obodugo.me
	Date: 12:45AM
	$connect= new mysqli("username",$...);

**/	


class login{

	protected $tablename;
	protected $connect;
	protected $callback;
	protected $username;
	protected $password;
	protected $errormessage1;
	protected $errormessage2;

	/**
	* @param requires the connect and table Name.
	*
	**/
	public function __construct($connect,$tablename)
	{
		//Empty Shit.
		$this->connect=$connect;
		$this->tablename=$tablename;
	}

	/**
	* @param needs the username, password, error message to display
	* Error message can be encapsulated into HTML codes.
	**/

	public function verifyLogin($username,$password,$errormessage1,$errormessage2)
	{
		//Verify the user.

		//Check the db first.
		$this->username=$username;
		$this->password=$password;
		//$this->callback=$callback;
		$username1=$this->username;
		$password1=$this->password;
		$search1="SELECT * FROM $this->tablename WHERE username='$username1' AND password='$password1'";
		//Run the query
		$search11=$this->connect->query($search1);
		$search2="SELECT * FROM $this->tablename WHERE username='$username1' OR password='$password1'";
		$search21=$this->connect->query($search2);
		if($search11->num_rows>0)
		{
			//Echo Call back URL.
			ob_start();
				session_start();
				$_SESSION['username']=$this->username;
				$_SESSION['password']=$this->password;
				//Stores just the session.
			ob_flush();	
		}
		elseif(!$search11->num_rows>0)
		{

				 if($search21->num_rows>0)
				{
					//Either one of the details are correct.
					$this->errormessage1=$errormessage1;
					echo  $this->errormessage1;
				}
				else
				{	
					$this->errormessage2=$errormessage2;
					echo $this->errormessage2;
				}
		}
		else{
			echo $this->errormessage2;
		}

	}
	public function redirect($url)
	{
		header("Location: $url");
	}

	public function isLoggedin()
	{
		//Once the user is logged in.

		if($_SESSION['username']==$this->username && $_SESSION['password']==$this->password)
		{
			return true;
		}
		else{
			return false;
		}
	}

	

	public function logout()
	{
		session_destroy();
	}

	public function register($tablename,$username,$password,$email,$telephone,$address)
	{
		//This is the register user method.
		//Users can their details and also get verified.
		$this->username=$username;
		$this->password=$password;
		$this->email=$email;
		$this->telephone=$telephone;
		$this->address=$address;
		$this->tablename=$tablename;

		//Insert the details into the specified table.
		$insert=$connect->prepare("INSERT into $table ($username,$password,$email,$telephone,$address) VALUES ? ? ? ? ?");
		$insert->bind_param("s s s s l");
		$insert->execute(); 

	}
}