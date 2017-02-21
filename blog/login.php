<?php
 include 'classes/userlogin.php';

?>
<?php
$adlog = new Adminlogin();
if($_SERVER['REQUEST_METHOD']=='POST'){
	$adminUser =$_POST['adminUser'];
	$adminPass =md5($_POST['adminPass']);
	$loginchk =$adlog->adminlogin($adminUser,$adminPass);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="css/font-awesome.min.css">
    <link  type="text/css" rel="stylesheet"  href="css/animate.min.css">
    <link type="text/css" rel="stylesheet" href="css/style.css">
</head>
<body>
    
<header>
    
    <div class="container section-padding">
     
    <div class="row">
        
        
        <div class="col-sm-1 animated slideInDown">
            <a href="#"> <img src="img/logo.png"></a>
        </div>
        <!--end of col sm 1-->
        
           <div class="col-sm-8 animated slideInRight">
        
               <h3>Thread Assignment</h3>
        </div>
        <div class="col-sm-3"><h2 class="animated rotateIn">+88-01756566459 </h2></div>
        
        </div>
         <!--row end-->
    </div>
     <!--container end-->
    
   

    </header>    
 <!--header end-->
    
   
    
    <section class="section-padding ">
	<div class="container well">
	<div class="row min-height ">
	
    <div class="col-sm-12">
    <h2 class="v-center well"><label class="animated zoomIn">User Login</label></h2>
    
	
	<form action="login.php" method="post" class="well custom-form animated slideInUp">

       <span  style="color:#be0b10;font-size:18px;" class="animated infinite jello">
       
       
        <?php
        if(isset($loginchk)){

        echo $loginchk;
        }
  ?>

       </span>
	<div class="form-group">
	
	<label for="username" class="animated slideInRight">User Name</label>
	<input type="text" name="adminUser" class="form-control custom-input" id="" placeholder="Your User Name" autocomplete="off">
	
	</div>
	
	
	<div class="form-group">
	
	<label for="password" class="animated slideInLeft">Password</label>
	<input type="password" name="adminPass" class="form-control custom-input" id="exampleInputPassword" placeholder="Your Password" autocomplete="off">
	
	</div>
<button type="submit" class="btn btn-default btn-info">Log in</button>

 <a href="../blog/blog-guest.php" class="pull-right">Home</a>
</form>
 
	    
        </div><!--col-sm-9-end -->
        </div><!--row-end -->
        </div><!--container-end -->
        </section>
    
    
  
    
<script src="js/jquery-1.12.3.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>