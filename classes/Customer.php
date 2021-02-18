<?php
    ob_start();
	$filepath=realpath(dirname(__FILE__));
	include_once($filepath.'/../library/Database.php');
	include_once($filepath.'/../library/format.php');
    
    class Customer{

		private $db;
		private $fm;

		public function __construct(){

			$this->db=new Database();
			$this->fm=new format();
		}

	 	public function customerRegistration($data){

 		$name   	 =	mysqli_real_escape_string($this->db->link, $data['name']);
 		$address	 = 	mysqli_real_escape_string($this->db->link, $data['address']);
 		$city    	 = 	mysqli_real_escape_string($this->db->link, $data['city']);
 		$country 	 = 	mysqli_real_escape_string($this->db->link, $data['country']);
 		$zip    	 = 	mysqli_real_escape_string($this->db->link, $data['zip']);
 		$phone  	 = 	mysqli_real_escape_string($this->db->link, $data['phone']);
 		$email   	 = 	mysqli_real_escape_string($this->db->link, $data['email']);
 		$password    = 	mysqli_real_escape_string($this->db->link, md5($data['password']));
 	
 		


        if ($name == "" || $address == "" || $city == "" || $country == "" || $zip == "" || $phone == "" || $email == "" || $password == ""){
        	
        	$emptymsg=
        	"<span style='color:red;margin-left:20px;font-size:17px;font-weight:bold;'>Fields must not be empty!
			</span>";
			return $emptymsg;

        }

        $mailquery = "SELECT * FROM customer_table WHERE email='$email' LIMIT 1";
        $mailchk   = $this->db->select($mailquery);
        if ($mailchk != false){
        	$msg = "<span style='color:red;margin-left:20px;font-size:17px;font-weight:bold;'>Email already Exists !</span>";
            return $msg;

        } else{

        	$query = "INSERT INTO customer_table(name,address, city, country, zip, phone, email,password) VALUES('$name','$address', '$country', '$city', '$zip', '$phone', '$email', '$password') ";

        	$customerreg = $this->db->insert($query);
        	if ($customerreg) {
			$customerregmsg="<span style='color:green;margin-left:20px;padding:0px;font-size:15px;font-weight:bold;'>Customer Account Created Successfully!</span>";
			return $customerregmsg;
		}else{
        		$msg="<span style='color:red;padding:10px;font-size:20px;font-weight:bold;>Customer Data not inserted!</span>";
				return $msg;
        	}


        }

 	}

 		public function customerLogin($email,$password){

 		$email    = $this->fm->validation($email);
		$password = $this->fm->validation($password);

		$email    = mysqli_real_escape_string($this->db->link,$email);
		$password = mysqli_real_escape_string($this->db->link,$password);
 		
 		if ($email == "" || $password == "") {
 			$emptymsg=
        	"<span style='color:red;margin-left:20px;font-size:17px;font-weight:bold;'>Fields must not be empty!
			</span>";
			return $emptymsg;
 		}
 		$logquery="SELECT * FROM customer_table WHERE email ='$email' AND password ='$password'";
 		$result   = $this->db->select($logquery);
        if ($result!=false){
        	$value=$result->fetch_assoc();
        	Session::set("customerLogin",true);
        	Session::set("customerId",$value['id']);
        	Session::set("customerName",$value['name']);
            Session::set("customerPhone",$value['phone']);
            Session::set("customerEmail",$value['email']);
            header("Location:customerprofile.php");
            //echo"<script>location.href=order.php;</script>";
        	
        }else{
        	$msg="<span style=' color: red;font-weight:bold;margin-left:20px;'>Email or Password did not match!</span>";
        	return $msg;
        }
	} 	


    public function getCustomerData($id){

        $query="select * from customer_table where id='$id'";
        $result=$this->db->select($query);
        return $result;


    }

    public function customerupdate($data,$customerId){

        $name        =  mysqli_real_escape_string($this->db->link, $data['name']);
        $address     =  mysqli_real_escape_string($this->db->link, $data['address']);
        $city        =  mysqli_real_escape_string($this->db->link, $data['city']);
        $country     =  mysqli_real_escape_string($this->db->link, $data['country']);
        $zip         =  mysqli_real_escape_string($this->db->link, $data['zip']);
        $phone       =  mysqli_real_escape_string($this->db->link, $data['phone']);
        $email       =  mysqli_real_escape_string($this->db->link, $data['email']);
        
        


        if ($name == "" || $address == "" || $city == "" || $country == "" || $zip == "" || $phone == "" || $email == ""){
            
            $emptymsg=
            "<span style='color:red;margin-left:20px;font-size:17px;font-weight:bold;'>Fields must not be empty!
            </span>";
            return $emptymsg;

        }else{

                    $query="update customer_table
                    set 
                    name='$name',
                    address='$address',
                    city='$city',
                    country='$country',
                    zip='$zip',
                    phone='$phone',
                    email='$email'
                    where id='$customerId'";

            $updatedrow=$this->db->update($query);
            if ($updatedrow) {
                $catupdatemsg="<span style='color:green;padding:0px;font-size:15px;font-weight:bold;'>Customer data Updated Successfully!</span>";
                return $catupdatemsg;
            }else{
                $msg="<span style='color:red;padding:10px;font-size:20px;font-weight:bold;>Customer data  not Updated!</span>";
                return $msg;
            }


        }


    }


    public function getCustomer(){

            $query="select * from customer_table";
            $result=$this->db->select($query);
            return $result;
        }
} 
/*
Coded by:
Name:Md.Mahmudul Hasan Robin;
ID:150201043;
Date:24.08.2019;
Last Updated:05.09.2019;
-->
*/