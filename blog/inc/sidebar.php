
    <section class="fourth-row section-padding">
    <div class="container well"
    <div class="row">
    <div class="col-sm-3 animated  slideInLeft">
    <h2 class="well v-center">MENUS</h2>
	<div class="dropdown well">
	<a class="dropdown-toggle" id="dLabel" role="button" data-toggle="dropdown" data-target="#"href="#" style="text-transform: uppercase;">
	<i class="fa fa-arrow-circle-o-right"></i>Categories<b class="caret"></b></a>
	<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
   <?php
   $getCat= $post->getCat();
   if($getCat){
   $i=0;
   while($result=$getCat->fetch_assoc()){
   $i++;
   ?>



	<li class="well"> <a href="CategoryWisePost.php?category=<?php echo $result['catId']?>"> <i class="fa fa-arrow-circle-o-right"></i><?php echo $result['name'];?></a></li>		
	


	<?php
     }

     }else{
  echo "No Category Created";
     //header("Location:404.php");
     }
     ?>


	</div><!--end of dropdown-->


	<div class="dropdown well">
	<a class="dropdown-toggle" id="dLabel" role="button" data-toggle="dropdown" data-target="#"href="#" style="text-transform: uppercase;">
	<i class="fa fa-arrow-circle-o-right"></i>latest Articles<b class="caret"></b></a>
	<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
   <?php
   $getlatestPost= $post->getLatestPosts();
   if($getlatestPost){
   $i=0;
   while($result=$getlatestPost->fetch_assoc()){
   $i++;
   ?>





 <div class="thumbnail">
    
     
      <div class="caption">
         <h4 class="btn btn-success" style="margin-left: 10px;"><i class="fa fa-tag" ></i>&nbsp;<?php echo $result['tags'];?></h4>

        <p class=" thum-height " style="text-align:justify; padding:5px;">

         <strong style="font-size: 25px;color:white; display:block; margin-bottom:15px; " class="btn btn-primary"><?php echo $result['title'];?></strong>
         <button class="btn btn-primary" style="margin-left: 10px;" role="button"><i class=""></i><?php echo $fm->formDate($result['date']);?></Button>
         <hr>

          <img src="../admin/<?php echo $result['image'];?>" style="margin-top:-15px;" alt="..." class="pull-right" width="120px;">


         <?php echo $fm->textShorten($result['body'],140);?>
         <br>
          <a href="post-details.php?id=<?php echo $result['id'];?>" class="btn btn-info pull-right" >Read More..</a>

     
          
         
              <hr>
         </p>
        
        
     
      </div>
    </div>

	</li>


	


	<?php
     }

     }else{
  echo "No Category Created";
     //header("Location:404.php");
     }
     ?>


	</div><!--end of dropdown-->

	

	</div><!--col-sm-3-end -->