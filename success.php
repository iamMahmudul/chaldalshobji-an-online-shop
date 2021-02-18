<?php include ('files/header.php');?>
<?php
  $login=Session::get("customerLogin");
  if ($login==false) {
     header("Location:login.php");
  }
?>
<section class="success">
	<div class="container">
		<div class="title text-center">
      	<h1> Success </h1>
     	</div>
		<div class="row text-center">
			<div class="col-md-12">
				<?php
				$customerId=Session::get("customerId");
				$amount=$cart->payableamount($customerId);
				if ($amount) {
					$sum=0;
					while ($result=$amount->fetch_assoc()) {
						$price=$result['price'];
						$sum=$sum + $price;
						
					}
				}
				?>
				<div class="successmessage">
					<h5>
						Thanks for your purchase.We have revieved your order successfully.Here is your order details....<a href="order.php">Order Details</a></h5>
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
