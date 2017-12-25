<?php 

require 'connect-db.php';



$title= $_POST['title'];

$type= $_POST['type'];

$location= $_POST['location'];

$monthyear= $_POST['monthyear'];

$vaccine= $_POST['vaccine'];

$papers= $_POST['papers'];

$price= $_POST['price'];

$breed= $_POST['breed'];

$contactno= $_POST['contact'];

session_start();


mysql_query("INSERT INTO 

petpost(user_id, username, ad_name,price,contact_info,category,breed,address,monthyear,vaccine,papers) 

VALUES(
'$_SESSION[user_id]',
'$_SESSION[username]', 
'$title',
'$price',
'$contactno',
'$type',
'$breed',
'$location',
'$monthyear',
'$vaccine',
'$papers') 

") or die(mysql_error());



header("Location: log.php");

?>
