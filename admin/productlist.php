<?php
include '../classes/Product.php';
include_once'../helpers/format.php';
include 'inc/header.php';
include 'inc/sidebar.php';
error_reporting(E_ALL ^ E_NOTICE);
?>
<?php
$fm = new Format();
$pro = new Product();
if(isset($_GET['delproduct'])){
$id=$_GET['delproduct'];
$delPro =$pro->delProById($id);
}
?>
<div class="col-sm-9 animated  slideInRight">
<h2 class="v-center well">DASHBOARD</h2>
<div class="min-height well">
<div class="row">
<!-- dispaly deleted confirm message-->
<?php

if(isset($delCat)){
  
  echo $delCat;
}
?>
<div class="table-responsive">
<table class="table">
	<thead>
	<tr class="danger">
	<th> SL</th>
	<th>Product</th>
  <th>Category</th>
  <th>Brand</th>
  <th>Details</th>
  <th>Price</th>
  <th>Image</th>
  <th>Type</th>
	<th>Action </th>
	</tr>
  </thead>
  <tbody>
  <?php
   $k=$_POST['123'];
   if($k){

   $getPro= $pro->getAllProduct();
   if($getPro){
   $i=0;
   while($result = $getPro->fetch_assoc() ){
   $i++;
   while($i<=$k){
    ?>
  
    <tr class="success">
    <td><span class="badge" style="color:;font-size:18px;"><?php echo  $i;  ?></span></td>
    <td style="color:brown;font-size:18px;"><?php echo $result['productName'];?></td>
    <td style="color:brown;font-size:18px;"><?php echo $result['catName'];?></td>
    <td style="color:brown;font-size:18px;"><?php echo $result['brandName'];?></td>
    <td style="color:brown;font-size:18px;"><?php echo $fm->textShorten($result['body'],50);?></td>
    <td style="color:brown;font-size:18px;"><?php echo $result['price'];?></td>
    <td style="color:brown;font-size:18px;"> <img src="<?php echo $result['image'];?>" height="50px" width="70px"></td>
    <td style="color:brown;font-size:18px;"><?php echo $result['type'];?></td>
    <td style="color:brown;font-size:18px;"><a   data-toggle="toolpit" data-placement="top"title="DELETE" class="btn btn-danger" onclick="return confirm('Are you sure to delete !')" href="?delproduct=<?php echo $result['productId'];?>"><span class="glyphicon glyphicon-remove"></a>
    ||
    <a  data-toggle="toolpit" data-placement="top" title="EDIT" class="btn btn-success" href="productedit.php?productId=<?php echo $result['productId'];?>"><span class="glyphicon glyphicon-edit"></a></td>
    </tr>
   <?php break;}
   }

   }

   }else{

   $getPro= $pro->getAllProduct();

   if($getPro){
   $i=0;
   while($result = $getPro->fetch_assoc() ){
   $i++;
   while($i<=10){
    ?>
  <tr class="info">
  <td><span class="badge" style="color:;font-size:18px;"><?php echo  $i;  ?></span></td>
  <td style="color:brown;font-size:18px;"><?php echo $result['productName'];?></td>
  <td style="color:brown;font-size:18px;"><?php echo $result['catName'];?></td>
  <td style="color:brown;font-size:18px;"><?php echo $result['brandName'];?></td>
  <td style="color:brown;font-size:18px;"><?php echo $fm->textShorten($result['body'],50);?></td>
  <td style="color:brown;font-size:18px;"><?php echo $result['price'];?></td>
  <td style="color:brown;font-size:18px;"> <img src="<?php echo $result['image'];?>" height="50px" width="70px"></td>
  <td style="color:brown;font-size:18px;"><?php echo $result['type'];?></td>
  <td style="color:brown;font-size:18px;"><a   data-toggle="toolpit" data-placement="top" title="DELETE" class="btn btn-danger" onclick="return confirm('Are you sure to delete !')" href="?delcat=<?php echo $result['catId'];?>"><span class="glyphicon glyphicon-remove"></a>
   ||
   <a  data-toggle="toolpit" data-placement="top" title="EDIT" class="btn btn-success" href="catedit.php?catId=<?php echo $result['catId'];?>"><span class="glyphicon glyphicon-edit"></a></td>
  </tr>

  <?php break;}
  }
  }
  }
?>
<div class="row well">
<div class="col-sm-6">
<span class="pull-left" style="color:#3ca2a2 ;font-size:22px; text-transform: uppercase;">
 You have shown: 
   <?php 
   if($k){

   echo  $k;
   }elseif($i<10){

   echo $i ;

   }else{

   echo "<span style=\"color:;font-size:18px;\" class=\"badge\">10</span>";
   }

   ?>  Entities Out Of :
   <?php echo  $i;  ?>

 </span>
 </div><!--end of col sm 6-->
 <div class="col-sm-6 entity">
 <form action="productlist.php" method="POST" class="col-sm-6 pull-right">
 <div class="form-group">
 <label for="sel1">To see select number:</label>
 <select name ="123" class="form-control v-center" id="sel1" >
  <?php
 for($m=1;$m<$i;$m++){
 ?>
<option  class="" value="<?php echo  $m;?>" > <?php echo  $m;  ?></option>
<?php
}
?>
 <option  class="badge" value="<?php echo  $i;  ?>">ALL ENTITIES</option>
 </select>
 <button type="submit" class="btn btn-info pull-right" vlaue="Choose to show">Submit</button>
</div>
</form>
</div><!--col sm 6 -->
</div><!--row-end -->
</tbody>
</table>
</div>
</div><!--row-end -->
</div><!--end of min-height-->
</div><!--col-sm-9-end -->
</div><!--row-end -->
</div><!--container-end -->
</section><!--4th-row-end -->
<?php
include 'inc/footer.php';
?>
