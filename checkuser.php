<?php

	mysql_connect("localhost", "root", "");
	mysql_select_db("webapp");

	
	$cusername = mysql_real_escape_string($_POST['username']);

	$check = mysql_query("SELECT username from register WHERE username='$cusername'	");
	$check_num_rows = mysql_num_rows($check);

	if ($cusername == NULL)
		echo "Choose username:";
	else {
		if ($check_num_rows == 0)
			echo "Username is Available:";
		else if ($check_num_rows == 1)
			echo "Username not Available";

	}
	
?>