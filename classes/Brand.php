<?php
include_once '../lib/database.php';
include_once '../helpers/format.php';

?>

<?php
class Brand
{
	
		
	private $db;
	private $fm;
	
	public function __construct(){
		$this->db = new database();
	    $this->fm = new Format();
	}



public function brandInsert($brandName){


     $brandName = $this->fm->validation($brandName);
     $brandName = mysqli_real_escape_string($this->db->link,$brandName);
     if(empty($brandName)){

      $msg ="<span> Brand name field  must <label class=\"animated infinite jello well\" > Not  be empty !</label></span>";
          return $msg;
    
         }else{

         $query = "INSERT INTO tbl_brand(brandName) VALUES('$brandName')";

         $brandInsert=$this->db->insert($query);


         if($brandInsert){

        $msg = "<span style=\"color:green;font-size:18px;\" class=\" bg-info\">Brand Inserted Successfully.</span><a href=\"brandlist.php\"> <span class=\"glyphicon glyphicon-list-alt\"></span> BRAND LIST</a>";
         return $msg;

         }else{
            $msg = "<span style=\"color:brown;font-size:18px;\" class=\" bg-info\">Brand not Inserted</span>";
         return $msg;
     
         }

         }




}	



    public function getAllBrand(){


        $query = "SELECT * FROM tbl_brand ORDER BY brandId DESC";
        $result = $this->db->select($query);
        return $result;
    }

    public function getBrandById($id){

    
        $query = "SELECT * FROM tbl_brand WHERE brandId='$id'";
        $result = $this->db->select($query);
        return $result;


    }


   public function delBrandById($id){

   $query = "DELETE FROM tbl_brand WHERE brandId='$id'";
   $delbrand =$this->db->delete($query);



     if($delbrand){

        $msg = "<span style=\"color:green;font-size:18px;  \"  class=\" bg-success\">Brand Name  Deleted Successfully.</span><a href=\"brandlist.php\"><span class=\"glyphicon glyphicon-list-alt\"></span> BRAND LIST</a>" ;
         return $msg;

         }else{
            $msg = "<span style=\"color:brown;font-size:18px;   \"  class=\" bg-success\">Brand Name not Deleted</span>";
         return $msg;
     
         }

    }








}//end of brand class

?>