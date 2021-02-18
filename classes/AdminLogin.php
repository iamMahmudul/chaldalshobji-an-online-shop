<?php 
	$filepath=realpath(dirname(__FILE__));
	include_once($filepath.'/../library/Session.php');
	Session::checkLogin();
	include_once($filepath.'/../library/Database.php');
	include_once($filepath.'/../library/format.php');
?>



<?php

class AdminLogin{

	private $db;
	private $fm;

	public function __construct(){

	$this->db=new Database();
	$this->fm=new format();
	
	}

	public function adminLogin($adminUser,$adminPass){

		$adminUser=$this->fm->validation($adminUser);
		$adminPass=$this->fm->validation($adminPass);
		
		$adminUser = mysqli_real_escape_string($this->db->link,$adminUser);
		$adminPass = mysqli_real_escape_string($this->db->link,$adminPass);

		if(empty($adminUser) || empty($adminPass)){
			$loginmsg="Username or Password must not be empty!";
			return $loginmsg;
		}
		else{
			$query = "SELECT * FROM admin_table WHERE adminUser = '$adminUser' AND 		adminPass = '$adminPass'";
			$result = $this->db->select($query);
			if($result!=false){
				$value=$result->fetch_assoc();
				Session::set("adminlogin",true);
				Session::set("adminId", $value['adminId']);
				Session::set("adminUser", $value['adminUser']);
				Session::set("adminName", $value['adminName']);
				header("Location:panel.php");
				
			}else{
				$loginmsg = "Username or Password does not match!";
				return $loginmsg;
			}
		}
	}
}

?>

<!--
Coded by:
Name:Md.Mahmudul Hasan Robin;
ID:150201043;

-->
