<?php
include '../blog/classes/post.php';

?>

<?php
if(!isset($_GET['threadId']) || $_GET['threadId']==NULL){
echo "<script> window.location='client_edit.php';</script>";
}else{
$id=$_GET['threadId'];

}
?>

<?php


$post= new Post();

if($_SERVER['REQUEST_METHOD']=='POST'){
	//$productName =$_POST['productName'];
	
	$updateThread =$post->threadUpdate($_POST,$_FILES,$id);
} 
?>

<?php
include 'inc/header.php';
include 'inc/sidebar.php';
?>
<section class="add_form">
<div class="col-sm-9 animated  slideInRight">
<h3 class="v-center well"></h3>
<div class="min-height well">
<div class="row">
<h2 class="v-center">Product Option
<strong style="color:red;"><span class="glyphicon glyphicon-arrow-right"></span></strong>Add Product</h2>

<form action=" " method="POST" class="well custom-form animated slideInUp" enctype="multipart/form-data">


<?php
$getThread=$post->getThreadById($id);
if($getThread){
while($result=$getThread->fetch_assoc()){

?>

 <?php
 
  if(isset($updateThread)){
  

    echo $updateThread;
} 
?>


 <br>
 <br>




<div class="form-group">
<label for="category" class="animated slideInRight">TITLE</label>
<input type="text" name="title" class="form-control custom-input" id="" value="<?php echo $result['title'];?>">
</div>



<div class="form-group">
<label for="description" class="animated slideInRight">Description</label>
<textarea name="body" class="form-control custom-input" rows="5" id="widgEditor">
<?php echo $result['body'];?>
  
</textarea>
</div>




<div class="form-group">
<label for="image" class="animated slideInRight">Upload Image</label>
<img src="<?php echo $result['image'];?>" height="80px" width="120px">
<br><br>
<input type="file" name="image">
</div>







 <div class="form-group">
<label for="tags" class="animated slideInRight">Tags</label>
<input type="text" name="tags" class="form-control custom-input" id="" autocomplete value="<?php echo $result['tags'];?>">
</div>



<button type="submit" class="btn btn-default btn-info">Update Thraed</button>
<?php

}
}

?>
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