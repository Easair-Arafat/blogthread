<?php
include '../blog/classes/post.php';

?>
<?php


$post= new Post();

if($_SERVER['REQUEST_METHOD']=='POST'){
	//$productName =$_POST['productName'];
	
	$insertThread =$post->threadInsert($_POST,$_FILES);
} 
?>

<?php
include 'inc/header.php';
include 'inc/sidebar.php';
?>
<section class="add_form">
<div class="col-sm-9 animated  slideInRight">
<h3 class="v-center well">ADD THREAD</h3>
<div class="min-height well">
<div class="row">
<h2 class="v-center">
<strong style="color:red;"><span class="glyphicon glyphicon-arrow-right"></span></strong>Add THREAD</h2>

<form action=" " method="POST" class="well custom-form animated slideInUp" enctype="multipart/form-data">
 
 <?php
  if(isset($insertThread)){
  

    echo $insertThread;
} 
?>
 <br>
 <br>


 <div class="form-group">
<label for="authorId" class="animated slideInRight"></label>
<input type="hidden" name="adminId" value="<?php echo session::get('adminId');?>" class="form-control custom-input" id="" autocomplete>
</div>
 

 <div class="form-group">
<label for="category">Category:</label>
<select name ="catId" class="form-control v-center" id="sel1" >
 <option  class="" >SELECT CATEGORY</option>
 <?php

 $getcat = $post->getAllCat();
 if($getcat){
  while($result = $getcat->fetch_assoc()){
      ?>
   <option class="" value="<?php  echo $result['catId'];?>"><?php echo $result['name'];?></option>
 <?php
 
   } 

    } 
   ?>
</select>

    </div>
    <div class="form-group">
<label for="category" class="animated slideInRight">TITLE</label>
<input type="text" name="title" class="form-control custom-input" id="" placeholder="Thread Title">
</div>



<div class="form-group">
<label for="description" class="animated slideInRight">Description</label>
<textarea name="body" class="form-control custom-input" rows="5" id="widgEditor">
  
</textarea>
</div>

<div class="form-group">
<label for="image" class="animated slideInRight">Upload Image</label>
<input type="file" name="image">
</div>



 <div class="form-group">
<label for="price" class="animated slideInRight"></label>
<input type="hidden" name="author" value="<?php echo session::get('adminName');?>" class="form-control custom-input" id="" autocomplete>
</div>



 <div class="form-group">
<label for="tags" class="animated slideInRight">Tags</label>
<input type="text" name="tags" class="form-control custom-input" id="" autocomplete placeholder="thread tags...">
</div>



<button type="submit" class="btn btn-default btn-info">Add Thraed</button>
</form>

</section><!--end of add form sectionn-->
      
</div><!--row-end -->
      
</div><!--end of min-height-->
</div><!--col-sm-9-end -->
</div><!--row-end -->
</div><!--container-end -->
</section><!--4th-row-end -->

<?php
include 'inc/footer.php';
?>