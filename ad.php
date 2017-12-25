<?php
session_start();
mysql_connect("localhost","root","");
mysql_select_db("webapp");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webapp";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if(isset($_GET['id']))
    $searchId = $_GET['id']; 
else
    header("Location: searchhome.php");

$sql = "SELECT * from register where user_id= '$searchId'";
    
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    
    while($row = $result->fetch_assoc()) {
        ?>

<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Landing Page - Start Bootstrap Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/landing-page.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Bootstrap Core CSS -->
    <link href="css/ad.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/portfolio-item.css" rel="stylesheet">
    <script type="text/javascript" src="jquery-1.11.3-jquery.min.js"></script>
    <script type="text/javascript" src="jquery.js"></script>


<script>
    function changeLinkOnChange() {
            
            var id = getQueryString('id');
            
            var x = document.getElementById("services").value;
            document.getElementById("add_services_link").href = "Add_Patient_Services.php?id="+id+"&sid="+x;
        }
        
        var getQueryString = function ( field, url ) {
        var href = url ? url : window.location.href;
        var reg = new RegExp( '[?&]' + field + '=([^&#]*)', 'i' );
        var string = reg.exec(href);
        return string ? string[1] : null;
    };
</script>

</head>







<body>
<!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
        <div class="container topnav">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand topnav" href="searchhome.php">Pet Portal Management System</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                         <?php echo  "<a href='petpost.php?id=".$row['user_id']."'>Pet Post</a>" ?>
                    </li>
                    <li>
                        <a href="log.php">Ads</a>
                    </li>
                    <li>
                      <?php echo  "<a href='profile.php?id=".$row['user_id']."'>".$row['display_name']."</a>" ?>
                    </li>
                    <li>
                        <a href="logout.php">Logout</a>
                    </li>
                
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
<?php
        }
} else {
    echo "0 results";
}

$conn->close();
?>


    <?php

mysql_connect("localhost","root","");
mysql_select_db("webapp");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webapp";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if(isset($_GET['id']))
    $searchId = $_GET['id']; 
else
    header("Location: searchhome.php");

$sql = "SELECT * from petpost where ad_id= '$searchId'";
    
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    
    while($row = $result->fetch_assoc()) {
        ?>


    <!-- Page Content -->
    <div class="container">

        <!-- Portfolio Item Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"> <?php echo $row['ad_name']; ?>
                    <small><?php echo $row['category']; ?></small>
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <!-- Portfolio Item Row -->
        <div class="row">

            <div class="col-md-8">
            <?php  

                            if (isset($_FILES['pic1']) == true){
                                if (empty($_FILES['pic1']['name']) == true){
                                    echo "please choose a file";
                                } else {

                                    $allowed = array('jpg','jpeg','png');
                                    $file_name = $_FILES['pic1']['name'];
                                    $file_extn = strtolower(end(explode('.', $file_name)));
                                    $file_temp = $_FILES['pic1']['tmp_name'];

                                        if (in_array($file_extn, $allowed) == true){

                                            change_ad_image($ad_data['ad_id'], $file_temp, $file_extn);


                                            



                                        }else {
                                            echo "file not allowed only : ";
                                            echo implode(',', $allowed);
                                        }

                                    
                                }
                            }


                            if (empty($row['image1']) == false) { 
                                echo '<img src="', $row['image1'], '"  class="img-responsive portfolio-item" width="300px" height="300px">'; 




                              }  
                            ?>

                            <form action="" method="post" enctype="multipart/form-data">
                         <input type ="file" name= "pic1"> 
                         <input name ="submit" type="submit">   
                         </form>
            </div>

            <div class="col-md-4">
                <h3>For Sale: <?php echo $row['ad_name']; ?></h3>
                <p>Owner:<?php echo $row['username']; ?></p>
                
                <h3>Pet Details</h3>
                <ul>
                    <li>Month/Year Old: <?php echo $row['monthyear']; ?></li>
                    <li>Papers: <?php echo $row['papers']; ?></li>
                    <li>Vaccines: <?php echo $row['vaccine']; ?></li>
                    <li>Price: P<?php echo $row['price']; ?></li>
                </ul>
            </div>

           

        </div>
        <!-- /.row -->

        <!-- Related Projects Row -->
        <div class="row">

            <div class="col-lg-12">
                <h3 class="page-header">Other Pictures</h3>
            </div>

            <div class="col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive portfolio-item" src="pup2.jpg" alt="">
                </a>
            </div>

            <div class="col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive portfolio-item" src="pup1.jpg" alt="">
                </a>
            </div>

            
            

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    
</body>
<?php
        }
} else {
    echo "0 results";
}

$conn->close();
?>
</html>
