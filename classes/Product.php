<?php
include_once '../lib/database.php';
include_once '../helpers/format.php';
//error_reporting(E_ALL ^ E_NOTICE);
?>
<?php

class Product
{
	
	private $db;
	private $fm;
	
	public function __construct(){
		$this->db = new database();
	    $this->fm = new Format();
	}

 public function productInsert($data,$file){

    
     $productName    = mysqli_real_escape_string($this->db->link,$data['productName']);
     $catId          = mysqli_real_escape_string($this->db->link,$data['catId']);
     $brandId        = mysqli_real_escape_string($this->db->link,$data['brandId']);
     $body           = mysqli_real_escape_string($this->db->link,$data['body']);
     $price          = mysqli_real_escape_string($this->db->link,$data['price']);
     $type           = mysqli_real_escape_string($this->db->link,$data['type']);
     

     $permitted      = array('jpg','jpeg','png','gif');
     $file_name      =$file['image']['name'];
     $file_size      =$file['image']['size'];
     $file_temp      =$file['image']['tmp_name'];

     $div            =explode('.',$file_name);
     $file_ext       =strtolower(end($div));
     $unique_image   =substr(md5(time()), 0, 10).'.'.$file_ext;
     $uploaded_image   ="uploads/".$unique_image;


     if($productName==""||$catId ==""|| $brandId==""|| $body==""|| $price=="" || $file_name ==""||$type ==""){


        $msg ="<span style=\"color:brown;font-size:18px;font-weight:700px;\" class=\"well\"> Fields  must <label class=\"animated infinite jello well\" > Not  be empty !</label></span>";
          return $msg;

   }elseif($file_size>1048567){

    $msg ="<span style=\"color:brown;font-size:18px;font-weight:700px;\" class=\"well\"> Fields  must <label class=\"animated infinite jello well\" > less than 1MB!</label></span>";
          return $msg;

     }elseif(in_array($file_ext,$permitted)===false){

          $msg ="<span style=\"color:brown;font-size:18px;font-weight:700px;\" class=\"well\"> You can upload<label class=\"animated infinite jello well\" > only:-".implode(', ',$permitted)."</label></span>";
          return $msg;


  echo "<span class=\"danger\"> Ypu can upload only:-".implode(', ',$permitted)." </span>";


 }else{

      move_uploaded_file($file_temp,$uploaded_image);

      $query = "INSERT INTO tbl_product(productName,catId,brandId,body,price,image,type)
       VALUES('$productName','$catId','$brandId','$body','$price','$uploaded_image','$type')";

      
         $productinsert=$this->db->insert($query);


         if($productinsert){

        $msg = "<span style=\"color:green;font-size:18px;\">Your data Inserted Successfully.</span><a href=\"catlist.php\"> <span class=\"glyphicon glyphicon-list-alt\"></span> CATEGORY LIST</a>";
         return $msg;

       }else{
            $msg = "<span style=\"color:brown;font-size:18px;\">Data not Inserted</span>";
         return $msg;
     
         }


     }

}


   public function getAllProduct(){
          $query = "SELECT p.* ,c.catName,b.brandName
          FROM tbl_product as p ,tbl_category as c ,tbl_brand as b
          WHERE p.catId = c.catId AND p.brandId=b.brandId
          ORDER BY p.productId DESC";

       /* $query = "SELECT tbl_product.* ,tbl_category.catName,tbl_brand.brandName
          FROM tbl_product
          INNER JOIN tbl_category 
          ON tbl_product.catId = tbl_category.catId
          INNER JOIN tbl_brand
          ON tbl_product.brandId = tbl_brand.brandId
          ORDER BY tbl_product.productId DESC";
         */
          
        $result = $this->db->select($query);
        return $result;
    }





}//class end
	?>