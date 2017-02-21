<?php
include '../lib/session.php';
Session::checkSession();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link href='https://fonts.googleapis.com/css?family=Josefin+Sans:400,100,100italic,300,300italic,400italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="css/font-awesome.min.css">
     <link  type="text/css" rel="stylesheet"  href="css/animate.min.css">
    
    <link type="text/css" rel="stylesheet" href="css/style.css">

</head>
<body>
   
<header>
    
    <div class="container section-padding custom-container animated  slideInUp">
     
    <div class="row">
    <div class="col-sm-1 animated  slideInUp">
    <a href="#"> <img src="img/logo.png"></a>
    </div><!--end of col sm 1-->
    <div class="col-sm-8">
    <h3>THREAD ASSIGNMENT</h3>
    </div>
    <div class="col-sm-3"><h2 >+88-01756566 </h2></div>
    </div><!--row end-->
    </div><!--container end-->
    
<nav class="navbar navbar-default mynav">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Brand</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    
      <!--<form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>-->

      <ul class="nav navbar-nav navbar-right">
       
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i>

          <label class="animated infinite zoomIn"> Hello,<?php echo Session::get('adminName');   ?> 
          </label><span class="caret"></span></a>
          <?php

        if(isset($_GET['action']) && $_GET['action']=="logout"){

        Session::destroy();

        }
          ?>
          <ul class="dropdown-menu">
            <li><a href="login.php">Sign in</a></li>
            
            <li><a href="?action=logout">Log out</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</header><!--header end-->