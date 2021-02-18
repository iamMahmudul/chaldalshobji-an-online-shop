<?php include ('files/header.php');?>
<?php
  $login=Session::get("customerLogin");
  if ($login==false) {
     header("Location:login.php");
  }
?>
<section class="payment">
	<div class="container">
		<div class="title text-center">
      	<h1>Choose Payment Option</h1>
     	</div>
		<div class="row text-center">
			<div class="col-md-6">
				<div class="offlinepayment">
					<a href="paymentoffline.php">Offline Payment</a>
				</div>
			</div>
			<div class="col-md-6">
				<div class="onlinepayment">
					<a href="paymentonline.php">Online Payment</a>
				</div>
			</div>
		</div>
		<div class="backbutton text-center">
			<a href="cart.php">Previous Page</a>
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
