<?php
include_once 'lib/database.php';
include_once 'helpers/format.php';
//error_reporting(E_ALL ^ E_NOTICE);
?>
<?php

class Author
{
	
	private $db;
	private $fm;
	
	public function __construct(){
		$this->db = new database();
	    $this->fm = new Format();
	}
public function getauthors($id,$email){

       
        $query = "SELECT * FROM admin_table WHERE adminUser='$id' OR adminEmail='$email'";
        $result = $this->db->select($query);
        return $result;


    }
    public function getusers($id,$email){

       
        $query = "SELECT * FROM admin_table WHERE adminUser='$id' OR adminEmail='$email'";
        $result = $this->db->select($query);
        return $result;


    }

     public function signup($data){

    

    $adminName = $this->fm->validation($data['adminName']);
    $adminUser = $this->fm->validation($data['adminUser']); 
    $adminPass = $this->fm->validation($data['adminPass']);
     $adminEmail = $this->fm->validation($data['adminEmail']);
    
        
          
    $adminName = mysqli_real_escape_string($this->db->link,$data['adminName']);
     $adminUser = mysqli_real_escape_string($this->db->link,$data['adminUser']);
     $adminPass= mysqli_real_escape_string($this->db->link,$data['adminPass']);
      $adminEmail= mysqli_real_escape_string($this->db->link,$data['adminEmail']);
    




     if(empty($adminName) || empty($adminUser) || empty($adminPass) || empty($adminEmail)){

       $msg = "<label class=\"animated infinite jello btn btn-warning  pull-right\"> DATA MUST Not  be Empty !</label>";
          return $msg;
        
        
        

          //$nidDataCheck="SELECT * FROM admin_table WHERE nId='$nId' LIMIT 1";
          //$datachk=$this->db->select($nidDataCheck);


          //if($datachk != false){

          //$msg = "<label class=\"animated infinite jello btn btn-warning  pull-right\">ThIS  NID already exists .... !</label>";
           // return $msg;


         }else{

          $adminPass=md5($adminPass);

         $query = "INSERT INTO admin_table(adminName,adminUser,adminEmail,adminPass) VAlUES('$adminName','$adminUser','$adminEmail','$adminPass')";

         $register=$this->db->insert($query);


         if($register){

        $msg = "<span style=\"color:green;font-size:18px;\">Data Inserted Successfully.</span>";
         return $msg;

         }else{
            $msg = "<span style=\"color:brown;font-size:18px;\">Data not Inserted</span>";
         return $msg;
     
         }

         }

  }




   public function usersignup($data){

    

    $adminName = $this->fm->validation($data['adminName']);
    $adminUser = $this->fm->validation($data['adminUser']); 
    $adminPass = $this->fm->validation($data['adminPass']);
     $adminEmail = $this->fm->validation($data['adminEmail']);
    
        
          
    $adminName = mysqli_real_escape_string($this->db->link,$data['adminName']);
     $adminUser = mysqli_real_escape_string($this->db->link,$data['adminUser']);
     $adminPass= mysqli_real_escape_string($this->db->link,$data['adminPass']);
      $adminEmail= mysqli_real_escape_string($this->db->link,$data['adminEmail']);
    




     if(empty($adminName) || empty($adminUser) || empty($adminPass) || empty($adminEmail)){

       $msg = "<label class=\"animated infinite jello btn btn-warning  pull-right\"> DATA MUST Not  be Empty !</label>";
          return $msg;
        
        
        

          //$nidDataCheck="SELECT * FROM admin_table WHERE nId='$nId' LIMIT 1";
          //$datachk=$this->db->select($nidDataCheck);


          //if($datachk != false){

          //$msg = "<label class=\"animated infinite jello btn btn-warning  pull-right\">ThIS  NID already exists .... !</label>";
           // return $msg;


         }else{

          $adminPass=md5($adminPass);

         $query = "INSERT INTO tbl_user(adminName,adminUser,adminEmail,adminPass) VAlUES('$adminName','$adminUser','$adminEmail','$adminPass')";

         $register=$this->db->insert($query);


         if($register){

        $msg = "<span style=\"color:green;font-size:18px;\">Data Inserted Successfully.</span>";
         return $msg;

         }else{
            $msg = "<span style=\"color:brown;font-size:18px;\">Data not Inserted</span>";
         return $msg;
     
         }

         }

  }












































    //old start





 



public function textShorten($text,$limit=400){

  $text = $text." ";
  $text = substr($text,0,$limit);
  $text = substr($text,0,strrpos($text,' '));
  $text = $text.".....";
  return $text;
}






public function clientUpdate($data,$file,$id){

    


  $first_name = $this->fm->validation($data['first_name']);
    $last_name = $this->fm->validation($data['last_name']); 
     $email = $this->fm->validation($data['email']);
       $position = $this->fm->validation($data['position']);
         $office = $this->fm->validation($data['office']);
          




    $first_name    = mysqli_real_escape_string($this->db->link,$data['first_name']);
     $last_name          = mysqli_real_escape_string($this->db->link,$data['last_name']);
     $email        = mysqli_real_escape_string($this->db->link,$data['email']);
     $position           = mysqli_real_escape_string($this->db->link,$data['position']);
     $office          = mysqli_real_escape_string($this->db->link,$data['office']);
  
              
     $id = mysqli_real_escape_string($this->db->link,$id);

     $permitted      = array('jpg','jpeg','png','gif');
     $file_name      =$file['image']['name'];
     $file_size      =$file['image']['size'];
     $file_temp      =$file['image']['tmp_name'];

     $div            =explode('.',$file_name);
     $file_ext       =strtolower(end($div));
     $unique_image   =substr(md5(time()), 0, 10).'.'.$file_ext;
     $uploaded_image   ="uploads/".$unique_image;


     if($first_name==""||$last_name ==""|| $email==""|| $position==""|| $office==""){


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

  

       $query ="UPDATE tbl_members 
                   SET 
                   first_name  ='$first_name',
                   last_name  ='$last_name',
                   email        ='$email',
                   position        ='$position',
                   office  ='$office',
                   image     ='$uploaded_image'
                   WHERE 
                   user_id  ='$id'"; 


         $personUpdate=$this->db->update($query);


         if($personUpdate){

        $msg = "<span style=\"color:green;font-size:18px;\">Data Updated Successfully.</span><a href=\"client_list.php\"> <span class=\"glyphicon glyphicon-list-alt\"></span> SEE LIST</a>";
         return $msg;

       }else{
            $msg = "<span style=\"color:brown;font-size:18px;\">Data not Updated</span>";
         return $msg;
     
         }


     }

   }else{

    $query ="UPDATE tbl_members 
                   SET 
                 first_name  ='$first_name',
                   last_name  ='$last_name',
                   email        ='$email',
                   position        ='$position',
                   office  ='$office'
                   WHERE 
                   user_id  ='$id'";


         $personUpdate=$this->db->update($query);


         if($personUpdate){

        $msg = "<span style=\"color:green;font-size:18px;\">Data Updated Successfully.</span><a href=\"client_list.php\"> <span class=\"glyphicon glyphicon-list-alt\"></span> SEE LIST</a>";
         return $msg;

       }else{
            $msg = "<span style=\"color:brown;font-size:18px;\">Data not Updated</span>";
         return $msg;
     
         }
       }
   }
}//method end



















 public function clientInsert($data,$file){

    
     $first_name    = mysqli_real_escape_string($this->db->link,$data['first_name']);
     $last_name          = mysqli_real_escape_string($this->db->link,$data['last_name']);
     $email        = mysqli_real_escape_string($this->db->link,$data['email']);
     $position           = mysqli_real_escape_string($this->db->link,$data['position']);
     $office          = mysqli_real_escape_string($this->db->link,$data['office']);
     
    
              

     

     $permitted      = array('jpg','jpeg','png','gif');
     $file_name      =$file['image']['name'];
     $file_size      =$file['image']['size'];
     $file_temp      =$file['image']['tmp_name'];

     $div            =explode('.',$file_name);
     $file_ext       =strtolower(end($div));
     $unique_image   =substr(md5(time()), 0, 10).'.'.$file_ext;
     $uploaded_image   ="uploads/".$unique_image;


     if($first_name==""||$last_name ==""|| $email==""|| $position==""|| $office=="" || $file_name ==""){


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

      $query = "INSERT INTO 
       tbl_members (first_name,last_name,email,position,office,image)
       VALUES('$first_name','$last_name','$email','$position','$office','$uploaded_image')";

      
         $productinsert=$this->db->insert($query);


         if($productinsert){

        $msg = "<span style=\"color:green;font-size:18px;\">Data Inserted Successfully.</span><a href=\"client-list.php\"> <span class=\"glyphicon glyphicon-list-alt\"></span> SEE LIST</a>";
         return $msg;

       }else{
            $msg = "<span style=\"color:brown;font-size:18px;\">Data not Inserted</span>";
         return $msg;
     
         }


     }

}

 public function personInsert($data,$file){

    
     $fullName    = mysqli_real_escape_string($this->db->link,$data['fullName']);
     $villName          = mysqli_real_escape_string($this->db->link,$data['villName']);
     $po        = mysqli_real_escape_string($this->db->link,$data['po']);
     $ps           = mysqli_real_escape_string($this->db->link,$data['ps']);
     $district          = mysqli_real_escape_string($this->db->link,$data['district']);
     $phone           = mysqli_real_escape_string($this->db->link,$data['phone']);
     $email           = mysqli_real_escape_string($this->db->link,$data['email']);
              

     

     $permitted      = array('jpg','jpeg','png','gif');
     $file_name      =$file['image']['name'];
     $file_size      =$file['image']['size'];
     $file_temp      =$file['image']['tmp_name'];

     $div            =explode('.',$file_name);
     $file_ext       =strtolower(end($div));
     $unique_image   =substr(md5(time()), 0, 10).'.'.$file_ext;
     $uploaded_image   ="uploads/".$unique_image;


     if($fullName==""||$villName ==""|| $po==""|| $ps==""|| $district=="" || $phone=="" ||$email=="" ||$file_name ==""){


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

      $query = "INSERT INTO 
      personal_top (fullName,villName,po,ps,district,phone,email,image)
       VALUES('$fullName','$villName','$po','$ps','$district','$phone','$email','$uploaded_image')";

      
         $productinsert=$this->db->insert($query);


         if($productinsert){

        $msg = "<span style=\"color:green;font-size:18px;\">Data Inserted Successfully.</span><a href=\"title-info-list.php\"> <span class=\"glyphicon glyphicon-list-alt\"></span> SEE LIST</a>";
         return $msg;

       }else{
            $msg = "<span style=\"color:brown;font-size:18px;\">Data not Inserted</span>";
         return $msg;
     
         }


     }

}









  public function careerObjInsert($body){

     $body = $this->fm->validation($body);
     $body = mysqli_real_escape_string($this->db->link,$body);
     if(empty($body)){

       $msg ="<span style=\"color:brown;font-size:18px;font-weight:700px;\" class=\"well\">Data field  must <label class=\"animated infinite jello well\" > Not  be empty !</label></span>";
          return $msg;
    
         }else{

         $query = "INSERT INTO Career(body) VALUES('$body')";

         $careerinsert=$this->db->insert($query);


         if($careerinsert){

        $msg = "<span style=\"color:green;font-size:18px;\">Data Inserted Successfully.</span><a href=\"catlist.php\"> <span class=\"glyphicon glyphicon-list-alt\"></span> CATEGORY LIST</a>";
         return $msg;

         }else{
            $msg = "<span style=\"color:brown;font-size:18px;\">Data not Inserted</span>";
         return $msg;
     
         }

         }

  }























public function educationInsert($data){

    
     $examTitle       = mysqli_real_escape_string($this->db->link,$data['examTitle']);
     $subject         = mysqli_real_escape_string($this->db->link,$data['subject']);
     $institute       = mysqli_real_escape_string($this->db->link,$data['institute']);
     $result          = mysqli_real_escape_string($this->db->link,$data['result']);
     $passYear        = mysqli_real_escape_string($this->db->link,$data['passYear']);
     $duration        = mysqli_real_escape_string($this->db->link,$data['duration']);
     $achievement     = mysqli_real_escape_string($this->db->link,$data['achievement']);
              

     


     if($examTitle==""||$subject ==""|| $institute==""|| $result==""|| $passYear=="" || $duration=="" ||$achievement==""){


        $msg ="<span style=\"color:brown;font-size:18px;font-weight:700px;\" class=\"well\"> Fields  must <label class=\"animated infinite jello well\" > Not  be empty !</label></span>";
          return $msg;

       }else{

    

      $query = "INSERT INTO 
      education(examTitle,subject,institute,result,passYear,duration,achievement)
       VALUES('$examTitle','$subject','$institute','$result','$passYear','$duration','$achievement')";

      
         $educationinsert=$this->db->insert($query);


         if($educationinsert){

        $msg = "<span style=\"color:green;font-size:18px;\">Data Inserted Successfully.</span><a href=\"education-list.php\"> <span class=\"glyphicon glyphicon-list-alt\"></span> SEE LIST</a>";
         return $msg;

       }else{
            $msg = "<span style=\"color:brown;font-size:18px;\">Data not Inserted</span>";
         return $msg;
     
         }


     }

}

















   public function getAllEducation(){
         $query = "SELECT * FROM education ORDER BY examId ASC";
        $result = $this->db->select($query);
        return $result;
  
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


 
   public function getAllCareerobj(){
         $query = "SELECT * FROM Career ORDER BY careerId DESC";
        $result = $this->db->select($query);
        return $result;
  
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



  public function getAllClientlTitle(){
         $query = "SELECT * FROM  tbl_members ORDER BY user_id";
        $result = $this->db->select($query);
        return $result;
  
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


  public function getAllPersonalTitle(){
         $query = "SELECT * FROM  personal_top ORDER BY personId DESC";
        $result = $this->db->select($query);
        return $result;
  
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

public function careerUpdate($body,$id){

     $body = $this->fm->validation($body);
     $body = mysqli_real_escape_string($this->db->link,$body);
     $id = mysqli_real_escape_string($this->db->link,$id);

     if(empty($body)){

       $msg ="<span style=\"color:brown;font-size:18px;font-weight:700px;\" class=\"well\">Data field  must <label class=\"animated infinite jello well\" > Not  be empty !</label></span>";
          return $msg;
    
         }else{

                $query =  "UPDATE Career 
                          SET 
                          body ='$body'
                          WHERE 
                          careerId = '$id'
                          ";

         $careerUpdate=$this->db->update($query);



         if($careerUpdate){

        $msg = "<span style=\"color:green;font-size:18px;\">Category Updated Successfully.</span><a href=\"careerobj_list.php\"><span class=\"glyphicon glyphicon-list-alt\"></span> SEE LIST</a>" ;
         return $msg;

         }else{
            $msg = "<span style=\"color:brown;font-size:18px;\">Category not Updated</span>";
         return $msg;
     
         }

      }


    }





public function delCareerById($id){

   $query = "DELETE FROM Career WHERE careerId='$id'";
   $deledu =$this->db->delete($query);



     if($deledu){

        $msg = "<span style=\"color:green;font-size:18px;  \"  class=\" bg-success\">Data Name  Deleted Successfully.</span><a href=\"education-list.php\"><span class=\"glyphicon glyphicon-list-alt\"></span>SEE LIST</a>" ;
         return $msg;

         }else{
            $msg = "<span style=\"color:brown;font-size:18px;   \"  class=\" bg-success\">Data not Deleted</span>";
         return $msg;
     
         }

    }








public function delEducationById($id){

   $query = "DELETE FROM education WHERE examId='$id'";
   $deledu =$this->db->delete($query);



     if($deledu){

        $msg = "<span style=\"color:green;font-size:18px;  \"  class=\" bg-success\">Data Name  Deleted Successfully.</span><a href=\"education-list.php\"><span class=\"glyphicon glyphicon-list-alt\"></span>SEE LIST</a>" ;
         return $msg;

         }else{
            $msg = "<span style=\"color:brown;font-size:18px;   \"  class=\" bg-success\">Data not Deleted</span>";
         return $msg;
     
         }

    }





  public function delClientById($id){

   $query = "DELETE FROM tbl_members WHERE user_id='$id'";
   $delperson =$this->db->delete($query);



     if($delperson){

        $msg = "<span style=\"color:green;font-size:18px;  \"  class=\" bg-success\">Brand Name  Deleted Successfully.</span><a href=\"client_list.php\"><span class=\"glyphicon glyphicon-list-alt\"></span>SEE LIST</a>" ;
         return $msg;

         }else{
            $msg = "<span style=\"color:brown;font-size:18px;   \"  class=\" bg-success\">Brand Name not Deleted</span>";
         return $msg;
     
         }

    }





  public function delPersonById($id){

   $query = "DELETE FROM personal_top WHERE personId='$id'";
   $delperson =$this->db->delete($query);



     if($delperson){

        $msg = "<span style=\"color:green;font-size:18px;  \"  class=\" bg-success\">Brand Name  Deleted Successfully.</span><a href=\"brandlist.php\"><span class=\"glyphicon glyphicon-list-alt\"></span>SEE LIST</a>" ;
         return $msg;

         }else{
            $msg = "<span style=\"color:brown;font-size:18px;   \"  class=\" bg-success\">Brand Name not Deleted</span>";
         return $msg;
     
         }

    }



    public function getClientById($id){

       
        $query = "SELECT * FROM tbl_members WHERE user_id='$id'";
        $result = $this->db->select($query);
        return $result;


    }



    public function getPersonById($id){

       
        $query = "SELECT * FROM personal_top WHERE personId='$id'";
        $result = $this->db->select($query);
        return $result;


    }



  public function getCareerById($id){

       
        $query = "SELECT * FROM Career WHERE careerId='$id'";
        $result = $this->db->select($query);
        return $result;


    }

    public function getEducationById($id){

       
        $query = "SELECT * FROM education WHERE examId='$id'";
        $result = $this->db->select($query);
        return $result;


    }





public function personUpdate($data,$file,$id){

    


  $fullName = $this->fm->validation($data['fullName']);
    $villName = $this->fm->validation($data['villName']); 
     $po = $this->fm->validation($data['po']);
       $ps = $this->fm->validation($data['ps']);
         $district = $this->fm->validation($data['district']);
           $phone = $this->fm->validation($data['phone']);
             $email = $this->fm->validation($data['email']);




    $fullName    = mysqli_real_escape_string($this->db->link,$data['fullName']);
     $villName          = mysqli_real_escape_string($this->db->link,$data['villName']);
     $po        = mysqli_real_escape_string($this->db->link,$data['po']);
     $ps           = mysqli_real_escape_string($this->db->link,$data['ps']);
     $district          = mysqli_real_escape_string($this->db->link,$data['district']);
     $phone           = mysqli_real_escape_string($this->db->link,$data['phone']);
     $email           = mysqli_real_escape_string($this->db->link,$data['email']);
              
     $id = mysqli_real_escape_string($this->db->link,$id);

     $permitted      = array('jpg','jpeg','png','gif');
     $file_name      =$file['image']['name'];
     $file_size      =$file['image']['size'];
     $file_temp      =$file['image']['tmp_name'];

     $div            =explode('.',$file_name);
     $file_ext       =strtolower(end($div));
     $unique_image   =substr(md5(time()), 0, 10).'.'.$file_ext;
     $uploaded_image   ="uploads/".$unique_image;


     if($fullName==""||$villName ==""|| $po==""|| $ps==""|| $district=="" || $phone=="" ||$email==""){


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

  

       $query ="UPDATE personal_top 
                   SET 
                   fullName  ='$fullName',
                   villName  ='$villName',
                   po        ='$po',
                   ps        ='$ps',
                   district  ='$district',
                   phone     ='$phone',
                   email     ='$email',
                   image     ='$uploaded_image'
                   
                   WHERE 
                   personId  ='$id'"; 


         $personUpdate=$this->db->update($query);


         if($personUpdate){

        $msg = "<span style=\"color:green;font-size:18px;\">Data Updated Successfully.</span><a href=\"title-info-list.php\"> <span class=\"glyphicon glyphicon-list-alt\"></span> SEE LIST</a>";
         return $msg;

       }else{
            $msg = "<span style=\"color:brown;font-size:18px;\">Data not Updated</span>";
         return $msg;
     
         }


     }

   }else{

    $query ="UPDATE personal_top 
                   SET 
                   fullName  ='$fullName',
                   villName  ='$villName',
                   po        ='$po',
                   ps        ='$ps',
                   district  ='$district',
                   phone     ='$phone',
                   email     ='$email'
                   WHERE personId  ='$id'"; 


         $personUpdate=$this->db->update($query);


         if($personUpdate){

        $msg = "<span style=\"color:green;font-size:18px;\">Data Updated Successfully.</span><a href=\"title-info-list.php\"> <span class=\"glyphicon glyphicon-list-alt\"></span> SEE LIST</a>";
         return $msg;

       }else{
            $msg = "<span style=\"color:brown;font-size:18px;\">Data not Updated</span>";
         return $msg;
     
         }
       }
   }
}//method end






public function educationUpdate($data,$id){

      $examTitle = $this->fm->validation($data['examTitle']);
      $subject = $this->fm->validation($data['subject']); 
     $institute = $this->fm->validation($data['institute']);
       $result = $this->fm->validation($data['result']);
         $passYear = $this->fm->validation($data['passYear']);
           $duration = $this->fm->validation($data['duration']);
             $achievement = $this->fm->validation($data['achievement']);




    $examTitle    = mysqli_real_escape_string($this->db->link,$data['examTitle']);
     $subject          = mysqli_real_escape_string($this->db->link,$data['subject']);
     $institute        = mysqli_real_escape_string($this->db->link,$data['institute']);
     $result           = mysqli_real_escape_string($this->db->link,$data['result']);
     $passYear          = mysqli_real_escape_string($this->db->link,$data['passYear']);
     $duration           = mysqli_real_escape_string($this->db->link,$data['duration']);
     $achievement           = mysqli_real_escape_string($this->db->link,$data['achievement']);
              
     $id = mysqli_real_escape_string($this->db->link,$id);
      if($examTitle==""||$subject ==""|| $institute==""|| $result==""|| $passYear=="" || $duration=="" ||$achievement==""){

       $msg ="<span style=\"color:brown;font-size:18px;font-weight:700px;\" class=\"well\"> Field  must <label class=\"animated infinite jello well\" > Not  be empty !</label></span>";
          return $msg;
    
         }else{

                $query =  "UPDATE education 
                          SET 
                          examTitle ='$examTitle',
                          subject ='$subject',
                          institute ='$institute',
                          result ='$result',
                          passYear ='$passYear',
                          duration ='$duration',
                          achievement ='$achievement'
                          WHERE 
                          examId = '$id'
                          ";

         $eduUpdate=$this->db->update($query);



         if($eduUpdate){

        $msg = "<span style=\"color:green;font-size:18px;\">Data Updated Successfully.</span><a href=\"education-list.php\"><span class=\"glyphicon glyphicon-list-alt\"></span> CATEGORY LIST</a>" ;
         return $msg;

         }else{
            $msg = "<span style=\"color:brown;font-size:18px;\">Data not Updated</span>";
         return $msg;
     
         }




         }


    }//method end















}//class end
	?>