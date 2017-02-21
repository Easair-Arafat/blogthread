<?php
include '../classes/Category.php';
?>
<?php


$cat = new Category();

if($_SERVER['REQUEST_METHOD']=='POST'){
	$catName =$_POST['catName'];
	
	$insertCat =$cat->catInsert($catName);
}
?>

<?php
include 'inc/header.php';
include 'inc/sidebar.php';
?>


<div class="col-sm-9 animated  slideInRight">
<h3 class="v-center well">DASHBOARD</h3>
<div class="min-height well">
	
<div class="row">
<h2 class="v-center">Category Option
<strong style="color:red;"><span class="glyphicon glyphicon-arrow-right"></span></strong>Add Category</h2>

    
<form action="" method="post" class="well custom-form animated slideInUp">
 
 <?php
  if(isset($insertCat)){

    echo $insertCat;

  }

 ?>
 
<div class="form-group">
<label for="category" class="animated slideInRight">CATEGORY</label>
<input type="text" name="catName" class="form-control custom-input" id="" placeholder="Category Name" autocomplete="off">
</div>
<button type="submit" class="btn btn-default btn-info">Add Category</button>
</form>
      
</div><!--row-end -->
      
</div><!--end of min-height-->
</div><!--col-sm-9-end -->
</div><!--row-end -->
</div><!--container-end -->
</section><!--4th-row-end -->

<?php
include 'inc/footer.php';
?>