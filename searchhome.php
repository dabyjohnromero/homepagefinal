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
                        <a href="searchhome.php">Ads</a>
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



<div class="container">

        <div class="row">

            <div class="col-md-3">
                <p class="lead">Pet Ads</p>
                <div class="list-group">
                    <a href="#" class="list-group-item">Dog</a>
                    <a href="#" class="list-group-item">Cat</a>
                </div>
            </div>

            <div class="col-md-9">

                <div class="row carousel-holder">

                    

                </div>
  
  
  
  

<?php

mysql_connect("localhost","root","");
mysql_select_db("webapp");



// Create connection





$sql = "SELECT *
    FROM petpost WHERE category = 1
";


$result = mysql_query($sql);

?>
<table>
<?php

if (mysql_num_rows($result) >0){
    // display data


          
    while($row = mysql_fetch_assoc($result)) {
    
        // echo out the contents of each row into a table
        ?>
        
        <div class="row">

                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                
                         <?php echo '<img src="', $row['image1'], '"  class="thumbnail img-responsive" width="300px" height="300px">'; ?>



                            <div class="caption">
                                <h4 class="pull-right"><?php echo $row['price']; ?></h4>
                                <h4><a href="<?php echo 'ad.php?id='.$row['ad_id']; ?>"> <?php echo $row['ad_name']; ?></a>
                                </h4>
                                <p><?php echo $row['address']; ?></p>
                                <?php echo  "<a href='viewprofile.php?id=".$row['user_id']."'>".$row['username']."</a>" ?>
                            </div>
                        </div>
                    </div>

        <?php
        
         
        
        }
        
    echo "</table>";
    
} 

print_r($_SESSION);

?>

  

  
  </table>
  
  </div>
<hr id="hr1">
</body>
</html>