
<?php
include '../classes/Category.php';
include 'inc/header.php';
include 'inc/sidebar.php';
error_reporting(E_ALL ^ E_NOTICE);
?>
<?php

$cat = new Category();
if(isset($_GET['delcat'])){

  $id=$_GET['delcat'];
  $delCat =$cat->delCatById($id);
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

<table class="table">
	<thead>
	<tr class="danger">
	<th> Serial No</th>
	<th> Category Name</th>
	<th>Action </th>
	</tr>
  </thead>
  <tbody>
  <?php
   $k=$_POST['123'];
   if($k){

   $getCat= $cat->getAllCat();
   if($getCat){
   $i=0;
   while($result = $getCat->fetch_assoc() ){
   $i++;
   while($i<=$k){
    ?>
  
    <tr class="success">
    <td><span class="badge" style="color:;font-size:18px;"><?php echo  $i;  ?></span></td>
    <td style="color:brown;font-size:18px;"><?php echo $result['catName'];?></td>
  <td style="color:brown;font-size:18px;"><a   data-toggle="toolpit" data-placement="top" title="DELETE" class="btn btn-danger" onclick="return confirm('Are you sure to delete !')" href="?delcat=<?php echo $result['catId'];?>"><span class="glyphicon glyphicon-remove"></a>
   ||
   <a  data-toggle="toolpit" data-placement="top" title="EDIT" class="btn btn-success" href="catedit.php?catId=<?php echo $result['catId'];?>"><span class="glyphicon glyphicon-edit"></a></td>
    </tr>
  <?php break;}
 }

 }

}else{

  $getCat= $cat->getAllCat();

 if($getCat){
  
  $i=0;
  
  
  while($result = $getCat->fetch_assoc() ){
  $i++;
while($i<=10){
    ?>
    
  <tr class="info">

  <td  class="animated slideInLeft"><span class="badge" style="color:;font-size:18px;"><?php echo  $i;  ?></span></td>

  <td style="color:blue;font-size:18px;" class=""><?php echo $result['catName'];?></td>

  <td style="color:blue;font-size:18px;"class="animated slideInDown "><a  data-toggle="toolpit" data-placement="top" title="DELETE" class="btn btn-danger" onclick="return confirm('Are you sure to delete !')" href="?delcat=<?php echo $result['catId'];?>"><span class="glyphicon glyphicon-remove"></span></a>
   ||
   <a   data-toggle="toolpit" data-placement="top" title="EDIT" class="btn btn-success" href="catedit.php?catId=<?php echo $result['catId'];?>"><span class="glyphicon glyphicon-edit"></span></a></td>
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

<form action="catlist.php" method="POST" class="col-sm-6 pull-right">
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
    </div><!--row-end -->
    </div><!--end of min-height-->
    </div><!--col-sm-9-end -->
    </div><!--row-end -->
    </div><!--container-end -->
    </section><!--4th-row-end -->


<?php
include 'inc/footer.php';
?>
