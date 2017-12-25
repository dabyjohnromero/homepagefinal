<?php 

session_start();


require 'connect.php';
require 'general.php';
require 'users.php';

if (logged_in() === true){
	$session_user_id = $_SESSION ['user_id'];
	$user_data = user_data($session_user_id, 'display_name', 'first_name', 'address', 'gender', 'email', 'profile');
	$ad_data = ad_data('ad_id', $session_user_id, 'display_name','ad_name','price','contact_info','datetime', 'category', 'breed', 'monthyear', 'vaccine', 'papers', 'image1');
	
}



$errors = array();

?>