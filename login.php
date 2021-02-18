<?php include ('files/header.php');?>
<?php
	$login=Session::get("customerLogin");
	if ($login==true) {
		header("Location:customerprofile.php");
	}
?>
<?php
	if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['login'])){
		$email=$_POST['email'];
		$password=md5($_POST['password']);
        $customerLogin= $customer->customerLogin($email,$password);
       }
?>

<div class="navsection">
	
</div>

	<section class="uperfooter">
		<div class="header text-center">
		<h4>Login Area</h4>
		</div>
		<div class="container">
			<div class="row">

				<div class="col-md-4 col-sm-6">
					
					<div class="login">
						<h3>Existing Customers</h3>
						  <?php
			                if (isset($customerLogin)) {
			                    echo $customerLogin;
			                }
			             ?>
			        	<form action="" method="post">

			             	<input type="email" name="email" placeholder="Email">
			             	<br>
			             	<input type="password" name="password" placeholder="Password">
			              
			              <div class="button" style="margin-top: 5px;">
			             	<button class="button1" name="login">Sign In</button>
			             </div>
			             
			             </form>
			             
			              <p class="note" style="font-style: normal;">
			              If you forgot your passoword just enter your email and click <a href="#" style="font-weight: bold;color: purple;">here!</a>
			          	  </p>
 

                    </div>
				</div>


	<div class="col-md-8 col-sm-6" >
		<?php
        	if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['register'])){
             $customerReg= $customer->customerRegistration($_POST);
        
   		 	}
		?>
		<div class="register">
    		<h3>Register New Account</h3>
    		<?php
                if (isset($customerReg)) {
                    echo $customerReg;
                }
             ?>
    		<form action="" method="post">
		   		<table>
		   			<tbody>

					<tr>

					<td>
					<div>
					<input type="text" name="name" placeholder="Enter name here" />
					</div>
							
					<div>
					<input type="text" name="city" placeholder="Enter city here" />
					</div>
							
					<div>
					<input type="text" name="zip" placeholder="Enter Zip-Code here" />
					</div>
					
					<div>
					<input type="email" name="email" placeholder="Enter E-Mail here" />	
					</div>
		    		</td>

		    		<td>
					<div>
					<input type="text" name="address" placeholder="Enter address here" />
					</div>
		    		<div>
					<input type="text" name="country" placeholder="Enter country here" />
					</div>		        
	
		          <div>
		          <input type="text" name="phone" placeholder="Enter phone_no here" />
		          </div>
				  
				  <div>
					<input type="password" name="password" placeholder="Enter password here" />
				</div>
		    	</td>
		    </tr> 
		    </tbody>
		</table> 
		   <div class="button2">
		   	<button name="register">Create Account</button>
		   	<a href="index.php">Cancel</a>
		   </div>
		    
		    <div class="clear"></div>
		    </form>
    	</div>  
				</div>
			</div>
		</div>
	</section>	
	

<?php include ('files/footer.php');?>


<!--
Coded by:
Name:Md.Mahmudul Hasan Robin;
ID:150201043;
Date:29.07.2019;
Last Updated:21.08.2019;
-->
