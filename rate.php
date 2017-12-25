<?php 
session_start();
mysql_connect("localhost","root","");
mysql_select_db("webapp");

$userid = $_POST['user_id'];
$username = $_POST['username'];




$rate = "insert into userrating(user_id,username,rating) values ('$userid','$username',1)";

if(mysql_query($rate)){ 
    echo "<script>alert('Success')</script>";
    header('location: viewprofile.php?='.$userid);
    }


?>