<?php
include 'classes/post.php';
error_reporting(E_ALL ^ E_NOTICE);

?>

<?php
 $post = new Post();
 $fm = new Format();
?>

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="css/font-awesome.min.css">
     <link  type="text/css" rel="stylesheet"  href="../admin/css/animate.min.css">
    <link type="text/css" rel="stylesheet" href="css/dashboard_style.css">

</head>
<body>
   
<header>
    
    <div class="container section-padding custom-container animated  slideInUp">
     
    <div class="row">
    <div class="col-sm-1 animated  slideInUp">
    <a href="#"> <img src="img/logo.png"></a>
    </div><!--end of col sm 1-->
    <div class="col-sm-8">
    <h3>Thread Assignment</h3>
    </div>
    <div class="col-sm-3"><h2 >+88-01756566459 </h2></div>
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
      <ul class="nav navbar-nav">
        <li class=""><a href="blog-guest.php"><span class="glyphicon glyphicon-home"></span>HOME </a></li>
        
      </ul>
      <form action="guest-search.php" method="get"  class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" name="search" class="form-control" placeholder="Search Keyword..">
        </div>
        <button type="submit" class="btn btn-default">Search</button>
      </form>

      <ul class="nav navbar-nav navbar-right">
       
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><label class="animated infinite zoomIn"> HELLO, GUEST<?php //echo Session::get('adminName');   ?> </label><span class="caret"></span></a>
      
          <ul class="dropdown-menu">
            <li><a href="login.php" class="btn btn-info">User Signin</a></li>
             <li><a href="../admin/login.php" class="btn btn-primary"> Author Signin</a></li>
               <li><a href="../admin/register.php" class="btn btn-info"> Author SignUP</a></li>
                 <li><a href="register.php" class="btn btn-primary"> User Signup</a></li>
            
           
            <li role="separator" class="divider"></li>
            <li><a href="#" class="btn btn-danger">Separated link</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</header><!--header end-->