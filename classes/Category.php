<?php
	$filepath=realpath(dirname(__FILE__));
	include_once($filepath.'/../library/Database.php');
	include_once($filepath.'/../library/format.php');
?>


<?php

	class Category{
		private $db;
		private $fm;

		public function __construct(){

			$this->db=new Database();
			$this->fm=new format();
		}

		public function catInsert($catName){

		$catName = $this->fm->validation($catName);
		$catName = mysqli_real_escape_string($this->db->link,$catName);

		/*$image = $_FILES['image']['name'];
		$target = "catupload/".basename($image);*/

		$permited  	    = array('jpg', 'jpeg', 'png', 'gif');
		$image      = $_FILES['image']['name'];
		$file_size      = $_FILES['image']['size'];
		$file_temp      = $_FILES['image']['tmp_name'];
		$div            = explode('.', $image);
		$file_ext       = strtolower(end($div));
		$unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;
		$uploaded_image = "catupload/".$unique_image;

		

		if(empty($catName)||empty($image)){
			$catinsertmsg="<span style='color:red;padding:0px;font-size:15px;font-weight:bold;'>Category field must not be empty!</span>";
			return $catinsertmsg;
		}
		else{
			move_uploaded_file($file_temp, $uploaded_image);
			$query="insert into category_table(catName,image) values('$catName','$uploaded_image')";
			$catinsert = $this->db->insert($query);
			if ($catinsert) {
				$catinsertmsg="<span style='color:green;padding:0px;font-size:15px;font-weight:bold;'>Category Inserted Successfully!</span>";
				return $catinsertmsg;
			}else{
				$msg="<span style='color:red;padding:10px;font-size:20px;font-weight:bold;>Category not inserted!</span>";
				return $msg;
			}
		}
	}

	
	public function getallcat(){
		$query="select * from category_table order by catid desc";
		$result=$this->db->select($query);
		return $result;

	}
	public function getallcategories(){
		$query="select * from category_table order by catid desc limit 12";
		$result=$this->db->select($query);
		return $result;

	}

	public function getCatById($id){
		$query="select * from category_table where catid='$id'";
		$result=$this->db->select($query);
		return $result;
	}

	public function updateCat($catName,$id){
		$catName = $this->fm->validation($catName);
		$catName = mysqli_real_escape_string($this->db->link,$catName);
		$id = mysqli_real_escape_string($this->db->link,$id);

		if(empty($catName)){
			$catinsertmsg="<span style='color:red;padding:0px;font-size:15px;font-weight:bold;'>Category field must not be empty!</span>";
			return $catinsertmsg;
		}else{
			$query="update category_table
					set 
					catName='$catName'
					where catid='$id'
			";
			$updatedrow=$this->db->update($query);
			if ($updatedrow) {
				$catupdatemsg="<span style='color:green;padding:0px;font-size:15px;font-weight:bold;'>Category Updated Successfully!</span>";
				return $catupdatemsg;
			}else{
				$msg="<span style='color:red;padding:10px;font-size:20px;font-weight:bold;>Category not Updated!</span>";
				return $msg;
			}
		}
	}

	public function delCatById($id){
		$id = mysqli_real_escape_string($this->db->link,$id);
		$query="delete from category_table where catid='$id'";
		$deldata=$this->db->delete($query);
		if ($deldata) {
			$catdelmsg="<span style='color:green;padding:0px;font-size:15px;font-weight:bold;'>Category Deleted Successfully!</span>";
				return $catdelmsg;
			}else{
				$msg="<span style='color:red;padding:10px;font-size:20px;font-weight:bold;>Category not Deleted!</span>";
				return $msg;
			}
		}
	}

?>

<!--
Coded by:
Name:Md.Mahmudul Hasan Robin;
ID:150201043;
Date:18.08.2019;
Last Updated:18.08.2019;
-->
