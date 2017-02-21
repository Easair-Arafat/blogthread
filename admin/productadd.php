<?php
include '../classes/Brand.php';
include '../classes/category.php';
include '../classes/Product.php';
?>
<?php


$pro = new Product();

if($_SERVER['REQUEST_METHOD']=='POST'){
	//$productName =$_POST['productName'];
	
	$insertProduct =$pro->productInsert($_POST,$_FILES);
} 
?>

<?php
include 'inc/header.php';
include 'inc/sidebar.php';
?>
<section class="add_form">
<div class="col-sm-9 animated  slideInRight">
<h3 class="v-center well">ADD PRODUCT</h3>
<div class="min-height well">
<div class="row">
<h2 class="v-center">Product Option
<strong style="color:red;"><span class="glyphicon glyphicon-arrow-right"></span></strong>Add Product</h2>

<form action="productadd.php" method="post" class="well custom-form animated slideInUp" enctype="multipart/form-data">
 
 <?php
  if(isset($insertProduct)){
  

    echo $insertProduct;
} 
?>
 <br>
 <br>
 
<div class="form-group">
<label for="category" class="animated slideInRight">Name</label>
<input type="text" name="productName" class="form-control custom-input" id="" placeholder="Product Name">
</div>
<div class="form-group">
<label for="category">Category:</label>
<select name ="catId" class="form-control v-center" id="sel1" >
 <option  class="" >SELECT CATEGORY</option>
 <?php
 $cat = new Category();
 $getcat = $cat->getAllCat();
 if($getcat){
 	while($result = $getcat->fetch_assoc()){
      ?>
   <option class="" value="<?php  echo $result['catId'];?>"><?php echo $result['catName'];?></option>
 <?php
 
   } 

    } 
   ?>
</select>

    </div>


    <div class="form-group">
    <label for="category">Brand:</label>
    <select name ="brandId" class="form-control v-center" id="sel1" >
    <option  class=""> SELECT BRAND</option>

  
    <?php
    $brand = new Brand();
    $getbrand = $brand->getAllbrand();
    if($getbrand){
    while($result = $getbrand->fetch_assoc()){
    ?>

    <option  class="" value="<?php  echo $result['brandId'];?>"><?php  echo $result['brandName'];?></option>

   <?php
   }  } 
   ?>

</select>

</div>

<div class="form-group">
<label for="description" class="animated slideInRight">Description</label>
<textarea name="body" class="form-control custom-input" rows="5" id="widgEditor">
	
</textarea>
</div>

<div class="form-group">
<label for="price" class="animated slideInRight">Price</label>
<input type="text" name="price" class="form-control custom-input" id="" placeholder="Enter price...." autocomplete>
</div>

<div class="form-group">
<label for="image" class="animated slideInRight">Upload Image</label>
<input type="file" name="image">
</div>

<div class="form-group">
<label for="category">Product Type:</label>
<select name ="type" class="form-control v-center" id="sel1" >
  
  <option  class="" value="0">Featured</option>
  <option  class="" value="1">General</option>
</select>

</div>



<button type="submit" class="btn btn-default btn-info">Add Brand</button>
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