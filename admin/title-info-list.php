<?php
include '../classes/Personal.php';
include_once'../helpers/format.php';
include 'inc/header.php';
include 'inc/sidebar.php';
error_reporting(E_ALL ^ E_NOTICE);
?>
<?php
$fm = new Format();
$per = new Personal();
if(isset($_GET['delproduct'])){
$id=$_GET['delproduct'];
$delPro =$per->delProById($id);
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
  

   $getPer= $per->getAllPersonalTitle();
   if($getPer){
   $i=0;
   while($result = $getPer->fetch_assoc() ){
   $i++;
   
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
   <?php break;
 }
 ?>
  

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
