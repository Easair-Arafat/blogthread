<?php
include '../classes/Category.php';
?>
<?php
if(!isset($_GET['catId']) || $_GET['catId']==NULL){
echo "<script> window.location='catlist.php';</script>";
}else{
$id=$_GET['catId'];
}
$cat = new Category();
if($_SERVER['REQUEST_METHOD']=='POST'){
  $catName = $_POST['catName'];
  $updateCat = $cat->catUpdate($catName,$id);
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
<h2 class="v-center"><label class="animated zoomIn"><span style="color:brown;">Update Category
</span></label></h2>
<?php
$getCat=$cat->getCatById($id);
if($getCat){
while($result=$getCat->fetch_assoc()){
?>
<form action=" " method="post" class="well custom-form animated slideInUp">
<?php
if(isset($updateCat)){
   echo $updateCat;
}
?>
<div class="form-group">
<label for="category" class="animated slideInRight">CATEGORY</label>
<input type="text" name="catName" value="<?php echo $result['catName'];?>" class="form-control custom-input" id="" placeholder="" autocomplete="off">
</div>
<button type="submit" class="btn btn-default btn-info">Update</button>
</form>
<?php

  }

 }

?>
</div><!--row-end -->
</div><!--end of min-height-->
</div><!--col-sm-9-end -->
</div><!--row-end -->
</div><!--container-end -->
</section><!--4th-row-end -->
<?php
include 'inc/footer.php';
?>