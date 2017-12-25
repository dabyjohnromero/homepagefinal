<?php

session_start();


	require 'connect-db.php';
if(isset($_POST['username']) && isset($_POST['password']))
{
	
	
$username = $_POST['username'];
$password = $_POST['password'];

	$query = mysql_query("SELECT * FROM register WHERE username='$username' ") or die(mysql_error());
	
	$row = mysql_fetch_assoc($query);
				
	
	
	
	
	
	if(mysql_num_rows($query) >= 1)
		{
				
					$dbusername = $row['username'];
					$dbpassword= $row['password'];
				
			if($username == $dbusername&&$password==$dbpassword)	
			{
				
				
				
				$_SESSION['username']=$username;
				
				echo "<script>alert('You are now logged in')</script>";
				echo "<script>alert('WELCOME')</script>";
				header('location: log.php');

			
				
			}
			else
				die( "Your Password is Incorrect!");
		}
		else
			
			die("That user doesn't exist!");
	}
	else if(!isset($_SESSION['username']))
		die("Please enter a username and a password!");
		
?>