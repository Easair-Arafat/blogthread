<?php
include '../classes/Brand.php';
?>
<?php


$brand = new Brand();

if($_SERVER['REQUEST_METHOD']=='POST'){
	$brandName =$_POST['brandName'];
	
	$insertBrand =$brand->brandInsert($brandName);
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
<h2 class="v-center">Brand Option
<strong style="color:red;"><span class="glyphicon glyphicon-arrow-right"></span></strong>Add Brand</h2>

    
<form action=" " method="post" class="well custom-form animated slideInUp">
 
 <?php
  if(isset($insertBrand)){

    echo $insertBrand;

  }

 ?>
 
<div class="form-group">
<label for="category" class="animated slideInRight">BRAND</label>
<input type="text" name="brandName" class="form-control custom-input" id="" placeholder="Brand Name" autocomplete="off">
</div>
<button type="submit" class="btn btn-default btn-info">Add Brand</button>
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