<?php
include 'lib/user-session.php';
Session::checkLogin();
include_once 'lib/user-database.php';
include_once 'helpers/format.php';
?>
<?php
class Userlogin{
	private $db;
	private $fm;
	
	public function __construct(){
		$this->db = new database();
	    $this->fm = new Format();
	}

public function userlogin($adminUser,$adminPass){

   

		 $adminUser =$this->fm->validation($adminUser);
		 $adminPass =$this->fm->validation($adminPass);
	     $adminUser =mysqli_real_escape_string($this->db->link,$adminUser);
		 $adminPass =mysqli_real_escape_string($this->db->link,$adminPass);

         if(empty($adminUser) || empty($adminPass)){

         $loginmsg ="<i class=\"well\">User Name or Password must <label class=\"animated infinite jello well\"> Not empty !</label></i>";
          return $loginmsg;
    
         }else{
         	$query="SELECT * FROM admin_table WHERE adminUser = '$adminUser' AND adminPass = '$adminPass'";
         
          $result =$this->db->select($query);
            if($result != false){
            	
              $value =$result->fetch_assoc();
              Session::set("adminlogin", true);
              Session::set("adminId", $value['adminId']);
              Session::set("adminUser", $value['adminUser']);
              Session::set("adminName", $value['adminName']);
              header("Location:blog/index.php");

            }else{
           
            $loginmsg ="User Name or Password  not match !";
          return $loginmsg;
            }



         }//end of  first if



}//end of func
}


?>




