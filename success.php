<?php
	include_once('connect.php');


	if (isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $displayname = $_POST['displayname'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    
        $query = "insert into register(username,password,displayname,email,name,gender,address)
    values ('$username','$password','$displayname','$email','$name','$gender','$address')";
    
    if(mysql_query($query)){    
    echo "<script>alert('Success')</script>";
    mysql_connect("localhost","root","");
    mysql_select_db("webapp");

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "webapp";


    $conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
} 
    $query = "select * from register ORDER BY user_id DESC LIMIT 1 ";
    $result = $conn->query($query);


if ($result->num_rows > 0) {
    // output data of each row
    
        while($row = $result->fetch_assoc()) {
            header('location:userinfo.php?id='.$row['user_id']);
            }
        }   
    }
}


    }
?>
