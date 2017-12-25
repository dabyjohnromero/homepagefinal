<?php
session_start();

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
                         <?php echo  "<a href='petpost.php?id=".$_SESSION['user_id']."'>Pet Post</a>" ?>
                    </li>
                    <li>
                        <a href="log.php">Ads</a>
                    </li>
                    <li>
                      <?php echo  "<a href='profile.php?id=".$_SESSION['user_id']."'>".$_SESSION['username']."</a>" ?>
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

        <div style="padding-top:50px;"> </div>
        <div class="col-lg-3 col-md-3 hidden-sm hidden-xs">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="media">
                        <div align="center">
                            <?php  

                            function change_profile_image($user_id, $file_temp, $file_extn){

                            $file_path = 'images/profile/'.substr(md5(time()), 0, 10). '.' .$file_extn;
                            move_uploaded_file($file_temp, $file_path);

                            mysql_query("UPDATE register SET profile = '".mysql_real_escape_string($file_path)."' WHERE user_id = ".(int)$user_id);


                                }

                            //upload picture    
                            if (isset($_FILES['profile']) == true){
                                if (empty($_FILES['profile']['name']) == true){
                                    echo "please choose a file";
                                } else {

                                    $allowed = array('jpg','jpeg','png');   //allowed file
                                    $file_name = $_FILES['profile']['name']; //file name
                                    $file_extn = strtolower(end(explode('.', $file_name))); //file extension
                                    $file_temp = $_FILES['profile']['tmp_name']; //file temporary handler

                                        if (in_array($file_extn, $allowed) == true){

                                            change_profile_image($searchId, $file_temp, $file_extn); //function


                                            


                                        }else {
                                            echo "file not allowed only : ";
                                            echo implode(',', $allowed);
                                        }

                                    
                                }
                            }


                            if (empty($row['profile']) == false) { 
                                echo '<img src="', $row['profile'], '"  class="thumbnail img-responsive" width="300px" height="300px">'; 
                                    //see profile



                              }  
                            ?>
                            <form action="" method="post" enctype="multipart/form-data">
                         <input type ="file" name= "profile"> 
                         <input name ="submit" type="submit">   
                         </form>
                        </div>
                        <div class="media-body">
                            <hr>
                            <h3><strong>Bio</strong></h3>
                            <p><?php echo $row['display_name']; ?></p>
                            <hr>
                            <h3><strong>Address</strong></h3>
                            <p><?php echo $row['address']; ?></p>
                            <hr>
                            <h3><strong>Gender</strong></h3>
                            <p><?php echo $row['gender']; ?></p>
                            <hr>
                            <h3><strong>Options</strong></h3>
                            <!--<p><a href="changepassword.php">Change Password</a></p> -->
                            <div class="ratings">
                                <p class="pull-right"></p>
                                <p><a href="#">Rate</a></p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                </p>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>

   
<?php
        }
} else {
    echo "0 results";
}

$conn->close();
?>
</body>
</html>
