<?php
	$filepath=realpath(dirname(__FILE__));
	include_once($filepath.'/../library/Database.php');
	include_once($filepath.'/../library/format.php');
?>


<?php
class Product{

	private $db;
	private $fm;

	public function __construct(){

		$this->db=new Database();
		$this->fm=new format();
	}

	
public function insertProduct($data, $file){

	$productname  = mysqli_real_escape_string($this->db->link,$data['productname']);
	$catid        = mysqli_real_escape_string($this->db->link,$data['catid']);
	$brandid      = mysqli_real_escape_string($this->db->link,$data['brandid']);
	$body         = mysqli_real_escape_string($this->db->link,$data['body']);
	$price        = mysqli_real_escape_string($this->db->link,$data['price']);
	$type         = mysqli_real_escape_string($this->db->link,$data['type']);
	$status       = mysqli_real_escape_string($this->db->link,$data['status']);
	$quantity     = mysqli_real_escape_string($this->db->link,$data['quantity']);


	$permited  	    = array('jpg', 'jpeg', 'png', 'gif');
	$file_name      = $file['image']['name'];
	$file_size      = $file['image']['size'];
	$file_temp      = $file['image']['tmp_name'];

	$div            = explode('.', $file_name);
	$file_ext       = strtolower(end($div));
	$unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;
	$uploaded_image = "upload/".$unique_image;

	if ($productname == "" || $catid == "" || $brandid == "" || $body == "" || $price == "" || $file_name == "" || $type == "" || $status == "" || $quantity == "") {
		
		$emptymsg=
		"<span style='color:red;padding:0px;font-size:15px;font-weight:bold;'>Fields must not be empty!
		</span>";
			return $emptymsg;
		} elseif (in_array($file_ext, $permited) === false) {
				 echo "<span class='error'>You can upload only:-"
				 .implode(', ', $permited)."</span>";
			}
		else{
		move_uploaded_file($file_temp, $uploaded_image);
		$query="insert into products_table(productname,catid,brandid,body,price,image,type,status,quantity)
			 values('$productname','$catid','$brandid','$body','$price',
			 '$uploaded_image','$type','$status','$quantity')";
		$productinsert = $this->db->insert($query);
		if ($productinsert) {
			$productinsertmsg="<span style='color:green;padding:0px;font-size:15px;font-weight:bold;'>Product Added Successfully!</span>";
			return $productinsertmsg;
		}else{
			$msg="<span style='color:red;padding:10px;font-size:20px;font-weight:bold;>Product not inserted!</span>";
			return $msg;
			}
		}

	}


	public function insertStock($data){

	$productname  = mysqli_real_escape_string($this->db->link,$data['productname']);
	$price   = mysqli_real_escape_string($this->db->link,$data['price']);
	$quantity     = mysqli_real_escape_string($this->db->link,$data['quantity']);

		if ($productname == "" ||  $price == "" || $quantity == "") {
		
		$emptymsg=
		"<span style='color:red;padding:0px;font-size:15px;font-weight:bold;'>Fields must not be empty!
		</span>";
			return $emptymsg;
		}
		else{
			$query="insert into stock_in_table(productname,price,quantity) values('$productname','$price','$quantity')";
			$stockinsert = $this->db->insert($query);
		
		}
	}

	public function getallProducts(){

		$query="select products_table.*,category_table.catName ,brand_table.brandname
				from products_table
				inner join category_table
				on products_table.catid=category_table.catid
				inner join brand_table
				on products_table.brandid=brand_table.brandid
				order by products_table.productid desc limit 12 ";
		

		$result=$this->db->select($query);
		return $result;

	}
	
	public function getallProductsinadmin(){


		
		$query="select products_table.*,category_table.catName ,brand_table.brandname
				from products_table
				inner join category_table
				on products_table.catid=category_table.catid
				inner join brand_table
				on products_table.brandid=brand_table.brandid
				order by products_table.productid desc ";
			$result=$this->db->select($query);
			return $result;
				
			}

	public function getdetailedProducts(){

		$query="select products_table.*,category_table.catName ,brand_table.brandname
				from products_table
				inner join category_table
				on products_table.catid=category_table.catid
				inner join brand_table
				on products_table.brandid=brand_table.brandid
				where status='0'
				order by products_table.productid desc ";
		

		$result=$this->db->select($query);
		return $result;

	}

	public function getProductsById($id){
		$query="select * from products_table where productid='$id'";
		$result=$this->db->select($query);
		return $result;
	}

	public function updateProduct($data, $file,$id){

	$productname  = mysqli_real_escape_string($this->db->link,$data['productname']);
	$catid        = mysqli_real_escape_string($this->db->link,$data['catid']);
	$brandid      = mysqli_real_escape_string($this->db->link,$data['brandid']);
	$body         = mysqli_real_escape_string($this->db->link,$data['body']);
	$price        = mysqli_real_escape_string($this->db->link,$data['price']);
	$type         = mysqli_real_escape_string($this->db->link,$data['type']);
	$status       = mysqli_real_escape_string($this->db->link,$data['status']);
	$quantity     = mysqli_real_escape_string($this->db->link,$data['quantity']);

	$permited    = array('jpg', 'jpeg', 'png', 'gif');
	$file_name   = $file['image']['name'];
	$file_size   = $file['image']['size'];
	$file_temp   = $file['image']['tmp_name'];

	$div             = explode('.', $file_name);
	$file_ext        = strtolower(end($div));
	$unique_image    = substr(md5(time()), 0, 10).'.'.$file_ext;
	$uploaded_image  = "upload/".$unique_image;

	if ($productname == "" || $catid == "" || $brandid == "" || $body == "" ||
	    $price== "" || $type == ""  || $status == "" || $quantity == "") {
		
		$emptymsg=
		"<span style='color:red;padding:0px;font-size:15px;font-weight:bold;'>Fields must not be empty!
		</span>";
		return $emptymsg;

		} else {

			if (!empty($file_name)) {

				if (in_array($file_ext, $permited) === false) {
					 echo "<span class='error'>You can upload only:-"
					 .implode(', ', $permited)."</span>";
				} else {
					move_uploaded_file($file_temp, $uploaded_image);
					$query= "update products_table
					set 
					productname ='$productname',
					catid       ='$catid',
					brandid     ='$brandid',
					body        ='$body',
					price       ='$price',
					image       ='$uploaded_image',
					type        ='$type',
					status      ='$status',
					quantity    ='$quantity'
					where productid='$id'";


					$productupdate = $this->db->update($query);
					if ($productupdate) {
						$productupdatemsg="<span style='color:green;padding:0px;font-size:15px;font-weight:bold;'>Product Updated Successfully!</span>";
						return $productupdatemsg;

					} else {
						$msg="<span style='color:red;padding:10px;font-size:20px;font-weight:bold;>Product not Updated!</span>";
						return $msg;
						}
					}

				} else {
					
					$query="update products_table
					set 
					productname ='$productname',
					catid       ='$catid',
					brandid     ='$brandid',
					body        ='$body',
					price       ='$price',
					type        ='$type',
					status      ='$status',
					quantity    ='$quantity'
					where productid='$id'";


					$productupdate = $this->db->update($query);
					if ($productupdate) {
						$productupdatemsg="<span style='color:green;padding:0px;font-size:15px;font-weight:bold;'>Product Updated Successfully!</span>";
						return $productupdatemsg;

					} else {
						$msg="<span style='color:red;padding:10px;font-size:20px;font-weight:bold;>Product not Updated!</span>";
						return $msg;
							}
					}

		}


	}



		public function delProductById($id){
		$id = mysqli_real_escape_string($this->db->link,$id);
		$query="select * from products_table where productid='$id'";
		$getData=$this->db->select($query);
		if ($getData) {
			while ($delImg=$getData->fetch_assoc()) {
				$dellink=$delImg['image'];
				unlink($dellink);
			}
		}





		$delquery="delete from products_table where productid='$id'";
		$deldata=$this->db->delete($delquery);
		if ($deldata) {
			$productdelmsg="<span style='color:green;padding:0px;font-size:15px;font-weight:bold;'>Product Deleted Successfully!</span>";
				return $productdelmsg;
			}else{
				$msg="<span style='color:red;padding:10px;font-size:20px;font-weight:bold;>Product not Deleted!</span>";
				return $msg;
			}
		}



		public function getOfferedProducts(){
		/*$query="select * from products_table where type='3' order by productid desc limit 4";*/


		$query="select products_table.*,category_table.catName ,brand_table.brandname
				from products_table
				inner join category_table
				on products_table.catid=category_table.catid
				inner join brand_table
				on products_table.brandid=brand_table.brandid
				where type='3'
				order by products_table.productid desc limit 4";
		
		$result=$this->db->select($query);
		return $result;
		}

		public function getProductsByCat($id){
			$catid= mysqli_real_escape_string($this->db->link,$id);
			$query="select * from products_table 
					where catid='$catid'";
			$result=$this->db->select($query);
			return $result;

		}

		public function getProductsByBrand($id){
			$brandid= mysqli_real_escape_string($this->db->link,$id);
			$query="select * from products_table where brandid='$brandid'";
			$result=$this->db->select($query);
			return $result;

		}

		public function getSingleProduct($id){

			$query="select p.*,c.catName,b.brandname
					from products_table as p,category_table as c,
					brand_table as b where
					p.catid=c.catid and p.brandid=b.brandid and p.productid='$id'
					order by p.productid desc";
			$result=$this->db->select($query);
			return $result;
		}

		public function getallOfferedProducts(){
			$query="select products_table.*,category_table.catName ,brand_table.brandname
				from products_table
				inner join category_table
				on products_table.catid=category_table.catid
				inner join brand_table
				on products_table.brandid=brand_table.brandid
				where type='3'
				order by products_table.productid desc";
		
		$result=$this->db->select($query);
		return $result;
		}


		public function insertCompareData($compareid,$customerId){

			$customerId= mysqli_real_escape_string($this->db->link,$customerId);
			$productid= mysqli_real_escape_string($this->db->link,$compareid);

		

			$query="select * from products_table where productid='$productid'";
			$result=$this->db->select($query)->fetch_assoc();
			if ($result) {
				
				$productid		=$result['productid'];
				$productname	=$result['productname'];
				$price			=$result['price'];
				$image			=$result['image'];

				$query="insert into compare_table
					(customerid,productid,productname,price,image)
				 	values
				 	('$customerId','$productid','$productname','$price',
				 	'$image')";
				$productinsert = $this->db->insert($query);

				if ($productinsert) {
					$compmsg="<span style='color:green;padding:0px;font-size:15px;font-weight:bold;'>Product Added to Compare!</span>";
					return $compmsg;
				}else{
					$msg="<span style='color:red;padding:10px;font-size:20px;font-weight:bold;>Product not Added!</span>";
					return $msg;
			}
					
				}


		}

		public function getComparedProduct($customerId){
			$query="select * from compare_table where customerId='$customerId' order by id desc";
			$result=$this->db->select($query);
			return $result;
		}

		public function delfromcompare($compareid){

			$compareid = mysqli_real_escape_string($this->db->link,$compareid);
			$query="delete from compare_table where productid='$compareid'";
			$deldata=$this->db->delete($query);
			if ($deldata) {
				echo "<script>window.location='compare.php';</script>";
				}else{
					$msg="<span style='color:red;padding:10px;font-size:20px;font-weight:bold;>Product not Removed!</span>";
					return $msg;
				}

		}

		public function delComparedData($customerId){

			$query="delete from compare_table where customerId='$customerId'";
			$deldata=$this->db->delete($query);
			if ($deldata) {
				
			}
		}

		public function saveTowishlist($id,$customerId){


			

			$pquery="select * from products_table where productid='$id'";
			$result=$this->db->select($pquery)->fetch_assoc();
			if ($result) {
				
				$productid		=$result['productid'];
				$productname	=$result['productname'];
				$price			=$result['price'] ;
				$image			=$result['image'];

				$query="insert into wishlist_table
					(customerid,productid,productname,price,image)
				 	values
				 	('$customerId','$productid','$productname','$price',
				 	'$image')";
				$productinsert = $this->db->insert($query);
				if ($productinsert) {
					$compmsg="<span style='color:green;padding:0px;font-size:15px;font-weight:bold;'>Product Added to Wishlist!</span>";
					return $compmsg;
				}else{
					$msg="<span style='color:red;padding:10px;font-size:20px;font-weight:bold;>Product not Added!</span>";
					return $msg;
			}
					
			}
		}


		public function checkwishlist($customerId){

			$query="select * from wishlist_table where customerId='$customerId' order by id desc";
			$result=$this->db->select($query);
			return $result;
		}

		public function delwishlistdata($customerId,$productid){

			$query="delete from wishlist_table where customerId='$customerId' and productid='$productid'";
			$deldata=$this->db->delete($query);
		}




		/*public function insertReview($reviewid,$customerId){

			$customerId= mysqli_real_escape_string($this->db->link,$customerId);
			$productid= mysqli_real_escape_string($this->db->link,$reviewid);

			/*$cquery="select * from compare_table where customerid='$customerId' and productid='$productid'";
			$check=$this->db->select($cquery);
			if ($check) {
				$msg="<span style='color:red;padding:10px;font-size:20px;font-weight:bold;>Product Already Added!</span>";
					return $msg;
			}

			$query="select * from products_table where productid='$productid'";
			$result=$this->db->select($query)->fetch_assoc();
			if ($result) {
				
				$productid		=$result['productid'];
				$productname	=$result['productname'];
				$review			=$result['review'];

				$query="insert into review_table
					(customerid,productid,productname,review)
				 	values
				 	('$customerId','$productid','$productname','$review')";
				$insertreview = $this->db->insert($query);
					
				$insertreview = $this->db->insert($query);

				if ($insertreview) {
					$compmsg="<span style='color:green;padding:0px;font-size:15px;font-weight:bold;'>Product Added to Compare!</span>";
					return $compmsg;
				}else{
					$msg="<span style='color:red;padding:10px;font-size:20px;font-weight:bold;>Product not Added!</span>";
					return $msg;
			}
					
				}


		}*/


	public function insertMsg($data){

	$name  = mysqli_real_escape_string($this->db->link,$data['name']);
	$email   = mysqli_real_escape_string($this->db->link,$data['email']);
	$phone     = mysqli_real_escape_string($this->db->link,$data['phone']);
	$body     = mysqli_real_escape_string($this->db->link,$data['body']);

		if ($name == "" ||  $email == "" || $phone == "" ||  $body == "" ) {
		
		$emptymsg=
		"<span style='color:red;padding:0px;font-size:15px;font-weight:bold;'>Fields must not be empty!
		</span>";
			return $emptymsg;
		}
		else{
			$query="insert into contact_table(name,email,phone,body) values('$name','$email','$phone','$body')";
			$insertMsg = $this->db->insert($query);
			if ($insertMsg) {
					$insertMsg="<span style='color:green;padding:0px;font-size:15px;font-weight:bold;'>Message sent Successfully!</span>";
					return $insertMsg;
				}else{
					$msg="<span style='color:red;padding:10px;font-size:20px;font-weight:bold;>Message not Sent!</span>";
					return $msg;
			}
		
		}
	}


	public function getmessages(){

			$query="select * from contact_table order by date desc";
			$result=$this->db->select($query);
			return $result;
		}


		public function delmsg($id){

			$query="delete from contact_table where id='$id'";
			$deldata=$this->db->delete($query);
		}

} 

?>
<!--
Coded by:
Name:Md.Mahmudul Hasan Robin;
ID:150201043;
Date:23.08.2019;
Last Updated:25.08.2019;
-->
