<?php

include 'init.php';


//check login page

if (empty($_POST) === false) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	if (empty($username) === true || empty($password) === true){


		$errors[] = 'You need to enter username and password';
	} else if (user_exists($username) === false) {
		$errors[] = 'Username does not exist';

	} else if (user_active($username) === false) {
		$errors[] = 'You have not yet activated your account!';
	} else {

		$login = login($username, $password);
		if ($login === false) {

			$errors[] = 'Username/Password is incorrect';
		} else {
			$_SESSION['user_id'] = $login;
			header('location: searchhome.php');
			exit();
		}

	}

print_r($errors);
}



?>