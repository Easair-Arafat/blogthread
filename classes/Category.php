
<?php
include_once '../lib/database.php';
include_once '../helpers/format.php';
?>
<?php

class Category
{
	
	private $db;
	private $fm;
	
	public function __construct(){
		$this->db = new database();
	    $this->fm = new Format();
	}
	public function catInsert($catName){

     $catName = $this->fm->validation($catName);
     $catName = mysqli_real_escape_string($this->db->link,$catName);
     if(empty($catName)){

       $msg ="<span style=\"color:brown;font-size:18px;font-weight:700px;\" class=\"well\">Category field  must <label class=\"animated infinite jello well\" > Not  be empty !</label></span>";
          return $msg;
    
         }else{

         $query = "INSERT INTO tbl_category(catName) VALUES('$catName')";

         $catinsert=$this->db->insert($query);


         if($catinsert){

        $msg = "<span style=\"color:green;font-size:18px;\">Category Inserted Successfully.</span><a href=\"catlist.php\"> <span class=\"glyphicon glyphicon-list-alt\"></span> CATEGORY LIST</a>";
         return $msg;

         }else{
            $msg = "<span style=\"color:brown;font-size:18px;\">Category not Inserted</span>";
         return $msg;
     
         }

         }

	}

    public function getAllCat(){


        $query = "SELECT * FROM tbl_category ORDER BY catId DESC";
        $result = $this->db->select($query);
        return $result;
    }

    public function getCatById($id){

       
        $query = "SELECT * FROM tbl_category WHERE catId='$id'";
        $result = $this->db->select($query);
        return $result;


    }
 public function catUpdate($catName,$id){

     $catName = $this->fm->validation($catName);
     $catName = mysqli_real_escape_string($this->db->link,$catName);
     $id = mysqli_real_escape_string($this->db->link,$id);

     if(empty($catName)){

       $msg ="<span style=\"color:brown;font-size:18px;font-weight:700px;\" class=\"well\">Category field  must <label class=\"animated infinite jello well\" > Not  be empty !</label></span>";
          return $msg;
    
         }else{

                $query =  "UPDATE tbl_category 
                          SET 
                          catName ='$catName'
                          WHERE 
                          catId = '$id'
                          ";

         $catUpdate=$this->db->update($query);



         if($catUpdate){

        $msg = "<span style=\"color:green;font-size:18px;\">Category Updated Successfully.</span><a href=\"catlist.php\"> glyphicon-list-alt\"></span> CATEGORY LIST</a>" ;
         return $msg;

         }else{
            $msg = "<span style=\"color:brown;font-size:18px;\">Category not Updated</span>";
         return $msg;
     
         }

      }


    }

 public function delCatById($id){

   $query = "DELETE FROM tbl_category WHERE catId='$id'";
   $deldata =$this->db->delete($query);
   if($deldata){

       $msg  ="<span style=\"color:green;font-size:18px;\">Category Deleted Successfully.</span><a href=\"catlist.php\"><span class=\"glyphicon glyphicon-list-alt\"></span> CATEGORY LIST</a>" ;
         return $msg;

         }else{

         $msg = "<span style=\"color:brown;font-size:18px;\">Category not Deleted</span>";
         return $msg;
     
         }

    }



}//end of class


?>