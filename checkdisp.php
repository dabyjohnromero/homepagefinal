<?php

	mysql_connect("localhost", "root", "");
	mysql_select_db("webapp");

	
	$cdisplay = mysql_real_escape_string($_POST['displayname']);

	$check = mysql_query("SELECT display_name from register WHERE display_name='$cdisplay'	");
	$check_num_rows = mysql_num_rows($check);

	if ($cdisplay == NULL)
		echo "Choose display name:";
	else {
		if ($check_num_rows == 0)
			echo "display name is Available:";
		else if ($check_num_rows == 1)
			echo "display name not Available";

	}
	
?>