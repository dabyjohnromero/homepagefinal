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


<br>
<br>
<br>
<br>
<br>

<form action="addpet.php" id ="petpostform" method="post" enctype="multipart/form-data" class="form-horizontal">
<fieldset>

<!-- Form Name -->
<center><legend>Pet Ad form</legend></center>


<!-- Title input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="name">Title:</label>  
  <div class="col-md-4">
  <input id="title" name="title" type="text" placeholder="Title" class="form-control input-md" required="">
    
  </div>
</div>

<!-- type input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="name">Type:</label>  
  <div class="col-md-4">
  
  <input type="radio" name="type" value="1" checked>Dog<br>
  <input type="radio" name="type" value="2">Cat<br> 
  </div>
</div>

<!-- location input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="name">Location:</label>  
  <div class="col-md-4">
  <input id="location" name="location" type="text" placeholder="Location" class="form-control input-md" required="">
    
  </div>
</div>

<!-- month/year old input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="name">Months/Year old:</label>  
  <div class="col-md-4">
  <input id="monthyear" name="monthyear" type="text" placeholder="Month/Year old" class="form-control input-md" required="">
    
  </div>
</div>



<!-- vaccine input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="name">Vaccine:</label>  
  <div class="col-md-4">
  <input id="vaccine" name="vaccine" type="text" placeholder="Display Name" class="form-control input-md">
    
  </div>
</div>

<!-- papers input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="name">Papers:</label>  
  <div class="col-md-4">
  <input id="papers" name="papers" type="text" placeholder="Display Name" class="form-control input-md" >
    
  </div>
</div>

<!-- price input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="name">Price: P</label>  
  <div class="col-md-4">
  <input id="price" name="price" type="text" placeholder="Price" class="form-control input-md" required="">
    
  </div>
</div>




<!-- gender Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="blood_group">Breed:</label>
  <div class="col-md-4">
    <select id="gender" name="breed" class="form-control">
      
        <option value="GoldenRetriever">Golden Retriever</option>
        <option value="SiberianHusky">Siberian Husky</option>
      
    </select>
  </div>
</div>

<!-- price input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="name">Contact no:</label>  
  <div class="col-md-4">
  <input id="contact" name="contact" type="text" placeholder="Contact no" class="form-control input-md" required="">
    
  </div>
</div>



<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="Create Account"></label>
  <div class="col-md-4">
     <input type="submit" id="fsSubmitButtoncreate" name="submit" value="Submit"/>
  </div>
</div>

</fieldset>
</form>



<!--petad-->



</body>
</html>
