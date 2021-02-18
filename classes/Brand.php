<?php
	$filepath=realpath(dirname(__FILE__));
	include_once($filepath.'/../library/Database.php');
	include_once($filepath.'/../library/format.php');
?>


<?php

	class Brand{
		private $db;
		private $fm;

		public function __construct(){

			$this->db=new Database();
			$this->fm=new format();
		}

		public function addbrand($brandname){

		$brandname = $this->fm->validation($brandname);
		$brandname = mysqli_real_escape_string($this->db->link,$brandname);

		if(empty($brandname)){
			$brandaddmsg="<span style='color:red;padding:0px;font-size:15px;font-weight:bold;'>Brand field must not be empty!</span>";
			return $brandaddmsg;
		}
		else{
			$query="insert into brand_table(brandname) values('$brandname')";
			$brandinsert = $this->db->insert($query);
			if ($brandinsert) {
				$brandinsertmsg="<span style='color:green;padding:0px;font-size:15px;font-weight:bold;'>Brand Added Successfully!</span>";
				return $brandinsertmsg;
			}else{
				$msg="<span style='color:red;padding:10px;font-size:20px;font-weight:bold;>Brand not Added!</span>";
				return $msg;
			}
		}
	}

	public function getallbrand(){
		$query="select * from brand_table order by brandid desc";
		$result=$this->db->select($query);
		return $result;

	}

	public function getBrandById($id){
		$query="select * from brand_table where brandid='$id'";
		$result=$this->db->select($query);
		return $result;
	}

		public function updatebrand($brandname,$id){
		$brandname = $this->fm->validation($brandname);
		$brandname = mysqli_real_escape_string($this->db->link,$brandname);
		$id = mysqli_real_escape_string($this->db->link,$id);

		if(empty($brandname)){
			$brandinsertmsg="<span style='color:red;padding:0px;font-size:15px;font-weight:bold;'>Brand Name field must not be empty!</span>";
			return $brandinsertmsg;
		}else{
			$query="update brand_table
					set 
					brandname='$brandname'
					where brandid='$id'
			";
			$updatedrow=$this->db->update($query);
			if ($updatedrow) {
				$brandupmsg="<span style='color:green;padding:0px;font-size:15px;font-weight:bold;'>Brand Name Updated Successfully!</span>";
				return $brandupmsg;
			}else{
				$msg="<span style='color:red;padding:10px;font-size:20px;font-weight:bold;>Brand Name not Updated!</span>";
				return $msg;
			}
		}
	}

	public function delBrandById($id){
	$id = mysqli_real_escape_string($this->db->link,$id);
	$query="delete from brand_table where brandid='$id'";
	$deldata=$this->db->delete($query);
	if ($deldata) {
		$branddelmsg="<span style='color:green;padding:0px;font-size:15px;font-weight:bold;'>Brand Name Deleted Successfully!</span>";
			return $branddelmsg;
		}else{
			$msg="<span style='color:red;padding:10px;font-size:20px;font-weight:bold;>Brand Name not Deleted!</span>";
			return $msg;
		}
	}

}

?>
<!--
Coded by:
Name:Md.Mahmudul Hasan Robin;
ID:150201043;
Date:16.08.2019;
Last Updated:23.08.2019;
-->
