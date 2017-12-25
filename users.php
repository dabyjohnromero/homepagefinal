<?php 

//change profile pic
function change_profile_image($user_id, $file_temp, $file_extn){

	$file_path = 'images/profile/'.substr(md5(time()), 0, 10). '.' .$file_extn;
	move_uploaded_file($file_temp, $file_path);

	mysql_query("UPDATE register SET profile = '".mysql_real_escape_string($file_path)."' WHERE user_id = ".(int)$user_id);


}

//change pet post pic
function change_ad_image($ad_id, $file_temp, $file_extn){

	$file_path = 'images/ads/'.substr(md5(time()), 0, 10). '.' .$file_extn;
	move_uploaded_file($file_temp, $file_path);

	mysql_query("UPDATE petpost SET image1 = '".mysql_real_escape_string($file_path)."' WHERE ad_id = ".(int)$ad_id);


}


//register pet
function register_pet($register_petinfo){

	array_walk($register_petinfo, 'array_sanitize');
	
	$fields = '`'.implode('`,`', array_keys($register_petinfo) ).'`';
	
	$data = '\'' . implode('\' ,\'', $register_petinfo) . '\'' ;
	
	
	mysql_query("INSERT INTO petpost($fields) VALUES ($data)");

}



//register user
function register_user($register_data){

	array_walk($register_data, 'array_sanitize');
	$register_data['password'] = md5($register_data['password']);
	

	$fields = '`'.implode('`,`', array_keys($register_data) ).'`';
	
	$data = '\'' . implode('\' ,\'', $register_data) . '\'' ;

	
	mysql_query("INSERT INTO register($fields) VALUES ($data)");

}


//getting data for pet post

function ad_data($ad_id, $user_id){

	$addata = array();
	$ad_id = (int)$ad_id;
	$user_id = (int)$user_id;

	$func_num_args = func_num_args();
	$func_get_args = func_get_args();

	if ($func_num_args > 1){

		unset($func_get_args[0]);

		  $fields = '`' . implode('`, `', $func_get_args) . '`';
		  $addata = mysql_fetch_assoc(mysql_query("SELECT * FROM petpost WHERE user_id = '$user_id'"));



		  return $addata;
	}
}

//getting info for user
function user_data($user_id){

	$data = array();
	$user_id = (int)$user_id;

	$func_num_args = func_num_args();
	$func_get_args = func_get_args();

	if ($func_num_args > 1){

		unset($func_get_args[0]);

		  $fields = '`' . implode('`, `', $func_get_args) . '`';
		  $data = mysql_fetch_assoc(mysql_query("SELECT * FROM register WHERE user_id = '$user_id'"));





		  return $data;
	}
}

//logged in
function logged_in(){
	return (isset($_SESSION['user_id'])) ? true : false;

}


function user_exists($username){

	$username = sanitize($username);	
	return (mysql_result(mysql_query("SELECT COUNT(user_id) FROM register WHERE username = '$username'"),0) == 1)? true : false;
}

function email_exists($email){

	$email = sanitize($email);	
	return (mysql_result(mysql_query("SELECT COUNT(user_id) FROM register WHERE email = '$email'"),0) == 1)? true : false;
}

function user_active($username){

	$username = sanitize($username);	
	return (mysql_result(mysql_query("SELECT COUNT(user_id) FROM register WHERE username = '$username' AND active = 1"),0) == 1)? true : false;
}

//get id from register
function user_id_from_username($username){
	$username = sanitize($username);
	return mysql_result(mysql_query("SELECT user_id FROM register WHERE username = '$username'") , 0, 'user_id');
}

//function ad_id_from_adname($adname){
//	$adname = sanitize($adname);
//	return mysql_result(mysql_query("SELECT ad_id FROM petpost WHERE ad_name = '$ad_name'") , 0, 'ad_id');
//}

//login
function login($username, $password){

	$user_id = user_id_from_username($username);

	$username = sanitize($username);
	$password = ($password);

	return (mysql_result(mysql_query("SELECT COUNT(user_id) FROM register WHERE username = '$username' AND password = '$password'"), 0) == 1) ? $user_id : false;
}

?>