<?php 

mysql_connect("localhost","root","");
mysql_select_db("webapp");


if(isset($_GET['id'])){
$userid = $_POST['user_id'];
$username = $_POST['username'];


$query = mysql_query("SELECT * FROM register WHERE user_id = '$userid' ");

if ($query) {
	mysql_query("INSERT into userrating(user_id,username,rating) VALUES ('$userid','$username','1')" );

header("location: viewprofile.php?id=".$userid);
}

}

?>