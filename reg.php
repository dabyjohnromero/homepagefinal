<?php
	include_once('connect.php');


	if (isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $displayname = $_POST['displayname'];
    $fname = $_POST['name'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    
   

        
        
        $query = "insert into register(username,password,display_name,first_name,gender,address,email)
        values ('$username','$password','$displayname','$fname','$gender','$address','$email')";
        
        
       if(mysql_query($query)){ 
    echo "<script>alert('Success')</script>";
    header('location: index.php');
    }

}

?>