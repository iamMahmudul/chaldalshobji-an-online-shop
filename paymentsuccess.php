<?php include ('files/header.php');?>
<?php
  $login=Session::get("customerLogin");
  if ($login==false) {
     header("Location:login.php");
  }
?>
<?php
	if (isset($_GET['orderid']) && $_GET['orderid']=='order') {
		$customerId=Session::get("customerId");
		$insertOrder=$cart->orderProduct($customerId);
		$insertPendingOrder=$cart->orderPendingProduct($customerId);
		$deldata=$cart->delcustomercart();
		header("Location:success.php");
	}
?>
<section class="success">
	<div class="container">
		<div class="title text-center">
      		<h1> Transaction Successfull! </h1>
     	</div>
		<div class="row text-center">
			<div class="col-md-12">
		<?php
			$val_id=urlencode($_POST['val_id']);
			$store_id=urlencode("ogsco5de5eba5790d7");
			$store_passwd=urlencode("ogsco5de5eba5790d7@ssl");
			$requested_url = ("https://sandbox.sslcommerz.com/validator/api/validationserverAPI.php?val_id=".$val_id."&store_id=".$store_id."&store_passwd=".$store_passwd."&v=1&format=json");

			$handle = curl_init();
			curl_setopt($handle, CURLOPT_URL, $requested_url);
			curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false); # IF YOU RUN FROM LOCAL PC
			curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false); # IF YOU RUN FROM LOCAL PC

			$result = curl_exec($handle);

			$code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

			if($code == 200 && !( curl_errno($handle)))
			{

				# TO CONVERT AS ARRAY
				# $result = json_decode($result, true);
				# $status = $result['status'];

				# TO CONVERT AS OBJECT
				$result = json_decode($result);

				# TRANSACTION INFO
				$status = $result->status;
				$tran_date = $result->tran_date;
				$tran_id = $result->tran_id;
				$val_id = $result->val_id;
				$amount = $result->amount;
				$store_amount = $result->store_amount;
				$bank_tran_id = $result->bank_tran_id;
				$card_type = $result->card_type;

				# EMI INFO
				$emi_instalment = $result->emi_instalment;
				$emi_amount = $result->emi_amount;
				$emi_description = $result->emi_description;
				$emi_issuer = $result->emi_issuer;

				# ISSUER INFO
				$card_no = $result->card_no;
				$card_issuer = $result->card_issuer;
				$card_brand = $result->card_brand;
				$card_issuer_country = $result->card_issuer_country;
				$card_issuer_country_code = $result->card_issuer_country_code;

				# API AUTHENTICATION
				$APIConnect = $result->APIConnect;
				$validated_on = $result->validated_on;
				$gw_version = $result->gw_version;

				#echo  $status."".$tran_date."".$tran_id."".$card_type;
				echo "Transaction Status:".$status;
				echo "<br>";
				echo "Transaction Date:".$tran_date;
				echo "<br>";
				echo "Transaction ID:".$tran_id;
				echo "<br>";
				echo "Transaction Card:".$card_type;


			} else {

				echo "Failed to connect with SSLCOMMERZ";
			}
?>
			</div>
	</div>
</section>

<div class="container">
			<div class="row text-center">
			<div class="col-md-12">
				<div class="orderproducts">
					<a href="?orderid=order">Confirm Order</a>
				</div>
			</div>
		</div>
		</div>
<?php include ('files/footer.php');?>