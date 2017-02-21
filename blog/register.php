<?php
 
error_reporting(E_ALL ^ E_NOTICE);
 
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
            <a href="../blog/blog-guest.php"> <img src="img/logo.png"></a>
        </div>
        <!--end of col sm 1-->
        
           <div class="col-sm-8 animated slideInRight">
        
               <h3>Thread Assignment</h3>
        </div>
        <div class="col-sm-3"><h2 class="animated rotateIn">+88-01756566459</h2></div>
        
        </div>
         <!--row end-->
    </div>
     <!--container end-->
    
   

    </header>    
 <!--header end-->
    
   
    
    <section class="section-padding ">
	<div class="container well">
	<div class="row min-height ">
	
    <div class="col-sm-6 col-sm-offset-3">
    <h2 class="v-center well"><label class="animated zoomIn">User Sign Up</h2>






 <?php
        include '../admin/classes/author.php';
       $author = new Author();


    

       if($_SERVER['REQUEST_METHOD']=='POST'){
          $adminName=$_POST['adminName'];
        $userName=$_POST['adminUser'];
        $userEmail=$_POST['adminEmail'];
         $passWord=$_POST['adminPass'];
         $namelength=strlen($userName);
        $passlength=strlen($passWord);
        //echo $passlength;

         $getuser=$author->getusers($userName,$userEmail);
        if($getuser){

        while($result=$getuser->fetch_assoc()){
      
    $username= $result['adminUser'];
    $email= $result['adminEmail'];
    echo $email;
   }
}

if(empty($userName) || empty($userEmail) || empty($passWord) || empty($adminName)){


       echo"<ul class=\"btn btn-success\"><li>data must not be empty.</li></ul>";


        }else if($namelength < 3 || $passlength < 3){
      
          echo"<ul class=\"btn btn-success\"><li>The User name & Password  must contain 3 letters.</li></ul>";

        }else if($userName==$username || $userEmail==$email){

                echo"<ul class=\"btn btn-success\"><li>Sorry, The User name or email already Exists .Try Again correctly...</li></ul>";
        

        }else{




 // $productName =$_POST['productName'];
          $signUp =$author->usersignup($_POST);
         }
        }
       ?>


           















       <?php
        if(isset($signUp)){

        echo  $signUp ;



        }
  ?>

    
	

            <form  action=" " method="POST" id="form-wizard" class="form-horizontal col-sm-6 col-sm-offset-3">


              <div id="form-wizard-1" class="step">
                <div class="control-group">
                  <label class="control-label">Name</label>
                  <div class="controls">
                    <input id="adminName" type="text" name="adminName" class="">
                  </div>
                </div>
                 <div class="control-group">
                  <label class="control-label">username</label>
                  <div class="controls">
                    <input id="adminUser" type="text" name="adminUser" />
                  </div>
                </div>
                 <div class="control-group">
                  <label class="control-label">Email</label>
                  <div class="controls">
                    <input id="adminEmail" type="text" name="adminEmail" />
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Password</label>
                  <div class="controls">
                    <input id="adminPass" type="password" name="adminPass" />
                  </div>
                </div>
           
               
              <div class="form-actions">
               
                <input id="next" class="btn btn-primary" type="submit" value="Submit" />

                 <a href="../blog/blog-guest.php" class="pull-right">Home</a>
                </div>
             
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
























