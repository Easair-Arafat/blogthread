<?php
include_once 'lib/database.php';
include_once 'helpers/format.php';
error_reporting(E_ALL ^ E_NOTICE);
?>
<?php

class Post
{
	
	private $db;
	private $fm;
	
	public function __construct(){
		$this->db = new database();
	    $this->fm = new Format();
	}

  public function searchPost($search){

  
        $query = "SELECT * FROM tbl_post WHERE title LIKE '%$search %' OR body LIKE '%$search%' ";
        $result = $this->db->select($query);
        return $result;



  }



  public function delThreadById($id){

   $query = "DELETE FROM tbl_post WHERE id='$id'";
   $delperson =$this->db->delete($query);



     if($delperson){

        $msg = "<span style=\"color:green;font-size:18px;  \"  class=\" bg-success\">Data Deleted Successfully.</span>" ;
         return $msg;

         }else{
            $msg = "<span style=\"color:brown;font-size:18px;   \"  class=\" bg-success\">Brand Name not Deleted</span>";
         return $msg;
     
         }

    }



public function threadUpdate($data,$file,$id){

    


  $title = $this->fm->validation($data['title']);
    $body = $this->fm->validation($data['body']); 
     $tags = $this->fm->validation($data['tags']);





    $title    = mysqli_real_escape_string($this->db->link,$data['title']);
     $body          = mysqli_real_escape_string($this->db->link,$data['body']);
     $tags        = mysqli_real_escape_string($this->db->link,$data['tags']);
   
              
     $id = mysqli_real_escape_string($this->db->link,$id);
    

     $permitted      = array('jpg','jpeg','png','gif');
     $file_name      =$file['image']['name'];
     $file_size      =$file['image']['size'];
     $file_temp      =$file['image']['tmp_name'];

     $div            =explode('.',$file_name);
     $file_ext       =strtolower(end($div));
     $unique_image   =substr(md5(time()), 0, 10).'.'.$file_ext;
     $uploaded_image   ="uploads/".$unique_image;


     if($title==""||$body ==""|| $tags==""){


        $msg ="<span style=\"color:brown;font-size:18px;font-weight:700px;\" class=\"well\"> Fields  must <label class=\"animated infinite jello well\" > Not  be empty !</label></span>";
          return $msg;

   }else{
          

          if(!empty($file_name)){

        if($file_size>1048567){

        $msg ="<span style=\"color:brown;font-size:18px;font-weight:700px;\" class=\"well\"> Fields  must <label class=\"animated infinite jello well\" > less than 1MB!</label></span>";
          return $msg;

       }elseif(in_array($file_ext,$permitted)===false){

          $msg ="<span style=\"color:brown;font-size:18px;font-weight:700px;\" class=\"well\"> You can upload<label class=\"animated infinite jello well\" > only:-".implode(', ',$permitted)."</label></span>";
          return $msg;


       echo "<span class=\"danger\"> Ypu can upload only:-".implode(', ',$permitted)." </span>";


      }else{

      move_uploaded_file($file_temp,$uploaded_image);

  

       $query ="UPDATE tbl_post
                   SET 
                   title  ='$title',
                   body  ='$body',
                   tags        ='$tags',
                   image     ='$uploaded_image'
                   WHERE 
                   id  ='$id'"; 


         $threadUpdate=$this->db->update($query);


         if($threadUpdate){

        $msg = "<span style=\"color:green;font-size:18px;\">Data Updated Successfully.</span>";
         return $msg;

       }else{
            $msg = "<span style=\"color:brown;font-size:18px;\">Data not Updated</span>";
         return $msg;
     
         }


     }

   }else{

    $query ="UPDATE tbl_post 
                   SET 
                 title  ='$title',
                   body  ='$body',
                   tags        ='$tags'
                   WHERE 
                   id  ='$id'";


         $threadUpdate=$this->db->update($query);


         if($threadUpdate){

        $msg = "<span style=\"color:green;font-size:18px;\">Data Updated Successfully.</span>";

        //header("Location:thread-list.php?adminId=$adminid");
          return $msg;

       }else{
            $msg = "<span style=\"color:brown;font-size:18px;\">Data not Updated</span>";
         return $msg;
     
         }
       }
   }
}//method end


























    public function getThreadById($id){

       
        $query = "SELECT * FROM tbl_post WHERE id='$id'";
        $result = $this->db->select($query);
        return $result;


    }




    public function getPostByAuthorId($id){
          $query = "SELECT p.* ,c.name
          FROM tbl_post as p ,tbl_category as c
          WHERE p.catId = c.catId AND p.adminId='$id'
          ORDER BY p.id DESC";

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



  public function threadInsert($data,$file){

    
     $adminId    = mysqli_real_escape_string($this->db->link,$data['adminId']);
     $catId          = mysqli_real_escape_string($this->db->link,$data['catId']);
     $title        = mysqli_real_escape_string($this->db->link,$data['title']);
     $body           = mysqli_real_escape_string($this->db->link,$data['body']);
     $tags          = mysqli_real_escape_string($this->db->link,$data['tags']);
     $author           = mysqli_real_escape_string($this->db->link,$data['author']);
     

     $permitted      = array('jpg','jpeg','png','gif');
     $file_name      =$file['image']['name'];
     $file_size      =$file['image']['size'];
     $file_temp      =$file['image']['tmp_name'];

     $div            =explode('.',$file_name);
     $file_ext       =strtolower(end($div));
     $unique_image   =substr(md5(time()), 0, 10).'.'.$file_ext;
     $uploaded_image   ="uploads/".$unique_image;


     if($title=="" || $body=="" || $tags=="" || $file_name ==""){


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

      $query = "INSERT INTO tbl_post(adminId,catId,title,body,image,author,tags)
       VALUES('$adminId','$catId','$title','$body','$uploaded_image','$author','$tags')";

      
         $threadinsert=$this->db->insert($query);


         if($threadinsert){

        $msg = "<span style=\"color:green;font-size:18px;\">Your data Inserted Successfully.</span>";
         return $msg;

       }else{
            $msg = "<span style=\"color:brown;font-size:18px;\">Data not Inserted</span>";
         return $msg;
     
         }


     }

}

    public function getAllCat(){


        $query = "SELECT * FROM tbl_category ORDER BY catId DESC";
        $result = $this->db->select($query);
        return $result;
    }


  public function getCat(){


        $query = "SELECT * FROM tbl_category ORDER BY rand()";
        $result = $this->db->select($query);
        return $result;
    }
 public function getCurrentPages($start_form,$perPage){


        $query = "SELECT * FROM tbl_post limit $start_form,$perPage";
        $result = $this->db->select($query);
        return $result;
    }

    public function getLatestPosts(){


        $query = "SELECT * FROM tbl_post ORDER BY date DESC limit 5";
        $result = $this->db->select($query);
        return $result;
    }

public function getAllPost(){


        $query = "SELECT * FROM tbl_post";
        $result = $this->db->select($query);
        return $result;
    }

    public function getPostById($id){


        $query = "SELECT * FROM tbl_post WHERE id='$id'";
        $result = $this->db->select($query);
        return $result;
    }
      public function getPostByCategory($category){


        $query = "SELECT * FROM tbl_post WHERE catId='$category'";
        $result = $this->db->select($query);
        return $result;
    }

  public function getPostByAuthor($author,$adminId){


        $query = "SELECT * FROM tbl_post WHERE author='$author' AND adminId='$adminId'";
        $result = $this->db->select($query);
        return $result;
    }

     public function getRelatedPostByCatId($catID){


        $query = "SELECT * FROM tbl_post WHERE catId='$catID' ORDER BY rand() LIMIT 6";
        $result = $this->db->select($query);
        return $result;
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