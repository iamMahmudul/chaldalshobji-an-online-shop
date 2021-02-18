<?php
	$filepath=realpath(dirname(__FILE__));
	include_once($filepath.'/../library/Database.php');
	include_once($filepath.'/../library/format.php');
?>



<?php
	
	class Cart{

		private $db;
		private $fm;

		public function __construct(){

			$this->db=new Database();
			$this->fm=new format();
		}

		public function addtocart($quantity,$id){

			$quantity = $this->fm->validation($quantity);
			$quantity = mysqli_real_escape_string($this->db->link,$quantity);
			$productid = mysqli_real_escape_string($this->db->link,$id);
			$sid=session_id();

			$query="select * from products_table where productid='$productid'";
			$result=$this->db->select($query)->fetch_assoc();
			
			$productname	=$result['productname'];
			$price			=$result['price'];
			$image			=$result['image'];

			$chkquery="select * from cart_table where productid='$productid' and
			sessionid='$sid'";
			$getpro=$this->db->select($chkquery);
			if ($getpro) {
				$message="Product already added!";
				return $message;
			}
			else{
			$query="insert into cart_table
					(sessionid,productid,productname,price,quantity,image)
				 	values
				 	('$sid','$productid','$productname','$price','$quantity',
				 	'$image')";
			$productinsert = $this->db->insert($query);
			if ($productinsert) {
				header("Location:cart.php");
			}else{
				header("Location:404.php");
				}

			}
		}

		public function getCartProduct(){

			$sid=session_id();
			$query="select * from cart_table where sessionid='$sid'";
			$result=$this->db->select($query);
			return $result;
		}

		public function updatecartquantity($cartid,$quantity){

			$cartid 	= mysqli_real_escape_string($this->db->link,$cartid);
			$quantity 	= mysqli_real_escape_string($this->db->link,$quantity);

			$query="update cart_table
					set 
					quantity='$quantity'
					where cartid='$cartid'
			";
			$updatedrow=$this->db->update($query);
			if ($updatedrow) {
				header("Location:cart.php");
			}else{
				$msg="<span style='color:red;padding:10px;font-size:20px;font-weight:bold;>Quantity not Updated!</span>";
				return $msg;
			}			

		}

		public function delfromcart($delid){

			$delid = mysqli_real_escape_string($this->db->link,$delid);
			$query="delete from cart_table where cartid='$delid'";
			$deldata=$this->db->delete($query);
			if ($deldata) {
				echo "<script>window.location='cart.php';</script>";
				}else{
					$msg="<span style='color:red;padding:10px;font-size:20px;font-weight:bold;>Product not Removed!</span>";
					return $msg;
				}

		}

		public function checkcart(){

			$sid=session_id();
			$query="select * from cart_table where sessionid='$sid'";
			$result=$this->db->select($query);
			return $result;
		}

		public function delcustomercart(){

			$sid=session_id();
			$query="delete from cart_table where sessionid='$sid'";
			$result=$this->db->delete($query);
			return $result;
		}


		public function orderProduct($customerId){

			$sid=session_id();
			$query="select * from cart_table where sessionid='$sid'";
			$getProduct=$this->db->select($query);
			if ($getProduct) {
				while ($result=$getProduct->fetch_assoc()) {
				
				$productid		=$result['productid'];
				$productname	=$result['productname'];
				$quantity 		=$result['quantity'];
				$price			=$result['price']* $quantity ;
				$image			=$result['image'];
				$invoice_no     =mt_rand();
				$query="insert into order_table
					(customerid,productid,invoice_no,productname,quantity,price,image)
				 	values
				 	('$customerId','$productid','$invoice_no','$productname','$quantity','$price',
				 	'$image')";
				 	

				$productinsert = $this->db->insert($query);
					
				}


			}

		}

		public function orderPendingProduct($customerId){

			$sid=session_id();
			$query="select * from cart_table where sessionid='$sid'";
			$getProduct=$this->db->select($query);
			if ($getProduct) {
				while ($result=$getProduct->fetch_assoc()) {
				
				$productid		=$result['productid'];
				$productname	=$result['productname'];
				$quantity 		=$result['quantity'];
				$price			=$result['price']* $quantity ;
				$image			=$result['image'];
				$invoice_no     =mt_rand();
				$query="insert into stock_out_table
					(customerid,productid,invoice_no,productname,quantity)
				 	values
				 	('$customerId','$productid','$invoice_no','$productname','$quantity')";
				 	

				$producPendingtinsert = $this->db->insert($query);
					
				}


			}

		}

		public function getstockoutdetails(){

			$query="select * from stock_out_table order by date desc";
			$result=$this->db->select($query);
			return $result;
		}

		public function getStockInDetails(){

			$query="select * from stock_in_table order by serialNo desc";
			$result=$this->db->select($query);
			return $result;
		}

		public function payableamount($customerId){

			$query="select price from order_table where customerId='$customerId' and
			date=now()";
			$result=$this->db->select($query);
			return $result;
		}

		public function getorderedProdcut($customerId){

			$query="select * from order_table where customerid='$customerId'
			order by productid desc";
			$result=$this->db->select($query);
			return $result;


		}

		public function checkOrder($customerId){

			$query="select * from order_table where customerid='$customerId'";
			$result=$this->db->select($query);
			return $result;
		}


		public function getallorderedproducts(){

			$query="select * from order_table order by date desc";
			$result=$this->db->select($query);
			return $result;
		}

		public function productshifted($id,$date,$price){

			$id 	= mysqli_real_escape_string($this->db->link,$id);
			$date 	= mysqli_real_escape_string($this->db->link,$date);
			$price 	= mysqli_real_escape_string($this->db->link,$price);

			$query="update order_table
					set 
					status='1'
					where customerid='$id' and date='$date' and price='$price'
			";
			$updatedrow=$this->db->update($query);
			if ($updatedrow) {
				$catupdatemsg="<span style='color:green;padding:0px;font-size:15px;font-weight:bold;'> Updated Successfully!</span>";
				return $catupdatemsg;
			}else{
				$msg="<span style='color:red;padding:10px;font-size:20px;font-weight:bold;>Not Updated!</span>";
				return $msg;
			}
		}

		public function delshiftedproduct($id,$date,$price){

			$id 	= mysqli_real_escape_string($this->db->link,$id);
			$date 	= mysqli_real_escape_string($this->db->link,$date);
			$price 	= mysqli_real_escape_string($this->db->link,$price);

			$query="delete from order_table where customerid='$id' and date='$date' and price='$price'";
			$deldata=$this->db->delete($query);
			if ($deldata) {
				$catdelmsg="<span style='color:green;padding:0px;font-size:15px;font-weight:bold;'>Product Removed Successfully!</span>";
					return $catdelmsg;
				}else{
					$msg="<span style='color:red;padding:10px;font-size:20px;font-weight:bold;>Product not Removed!</span>";
					return $msg;
				}

		}


		public function confirmproduct($id,$date,$price){

			$id 	= mysqli_real_escape_string($this->db->link,$id);
			$date 	= mysqli_real_escape_string($this->db->link,$date);
			$price 	= mysqli_real_escape_string($this->db->link,$price);

			$query="update order_table
					set 
					status='2'
					where customerid='$id' and date='$date' and price='$price'
			";
			$updatedrow=$this->db->update($query);
			if ($updatedrow) {
				$catupdatemsg="<span style='color:green;padding:0px;font-size:15px;font-weight:bold;'> Updated Successfully!</span>";
				return $catupdatemsg;
			}else{
				$msg="<span style='color:red;padding:10px;font-size:20px;font-weight:bold;>Not Updated!</span>";
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
Last Updated:19.07.2019;
-->