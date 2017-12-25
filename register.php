
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
    <script type="text/javascript" src="trying.js"></script>

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
                <a class="navbar-brand topnav" href="index.php">Pet Portal Management System</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="#about">Pet Post</a>
                    </li>
                    <li>
                        <a href="profile.php">Blah</a>
                    </li>
                    <li>
                        <a href="#contact">About Us</a>
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

<form action="reg.php" id ="form" method="post" class="form-horizontal">
<fieldset>

<!-- Form Name -->
<center><legend>Registration Form</legend></center>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="name">Username:</label>  
  <div class="col-md-4">
  <input id="username" name="username" type="text" placeholder="Username" class="form-control input-md" >
    <span id="userchecker"></span> 
    <br>
    <span id="usererror"></span>
      </div>
</div>
<br>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="name">Password:</label>  
  <div class="col-md-4">
  <input id="password" name="password" type="password" placeholder="Password" class="form-control input-md" required="">
    <span id="passerror"></span>
  </div>
</div>
<br>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="name">Confirm Password:</label>  
  <div class="col-md-4">
  <input id="confirmpass" name="confirmpass" type="password" placeholder="Confirm Password" class="form-control input-md" required="">
    <span id="confirmpasserror"></span>
  </div>
</div>
<br>



<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="name">Display Name:</label>  
  <div class="col-md-4">
  <input id="displayname" name="displayname" type="text" placeholder="Display Name" class="form-control input-md" required="">
      <span id="dispchecker"></span>   
  </div>
</div>
<br>



<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="email">E-mail</label>  
  <div class="col-md-4">
  <input id="email" name="email" type="email" placeholder="E-mail" class="form-control input-md" required="">
    
  </div>
</div>
<br>
<span id="emailerror"></span>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="name">Full Name:</label>  
  <div class="col-md-4">
  <input id="name" name="name" type="text" placeholder="Enter your name" class="form-control input-md" required="">
    
  </div>
</div>
<br>
<span id="usererror"></span>


<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="blood_group">Gender</label>
  <div class="col-md-4">
    <select id="gender" name="gender" class="form-control">
      
        <option value="Male">Male</option>
        <option value="Female">Female</option>
      
    </select>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="street">Address</label>  
  <div class="col-md-4">
  <input id="address" name="address" type="text" placeholder="Address" class="form-control input-md" required="">
    
  </div>
</div>



<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="Create Account"></label>
  <div class="col-md-4">
     <input type="submit" id="submit" name="submit" value="Create Account"/>
  </div>
</div>

</fieldset>
</form>



</body>
</html>
