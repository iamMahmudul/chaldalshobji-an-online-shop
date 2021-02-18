<?php include ('files/header.php');?>
<?php
  $login=Session::get("customerLogin");
  if ($login==false) {
     header("Location:login.php");
  }
?>
<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
    $cartid=$_POST['cartid'];
    $quantity=$_POST['quantity'];
    $updatecartquantity= $cart->updatecartquantity($cartid,$quantity);
    if ($quantity<=0) {
    	$delfromcart=$cart->delfromcart($cartid);
    }
    }
   ?>
<?php
	if (!isset($_GET['id'])) {
		echo "<meta http-equiv='refresh' content='0;URL=?id=live'/>";
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


<section class="navsection">
	
</section>

<section class="cartsection">
	<br>
	<div class="main">
	<div class="container">
		<div class="row">
			<div class="col-md-1">
				
			</div>
			<div class="col-md-10">
				
    				<div class="content">
    				<div class="cartoption">		
						<div class="cartpage">
			    			<div class="header text-center">
							<h4>Shopping Cart</h4>
						</div>
						<?php
						if (isset($updatecartquantity)) {
							echo $updatecartquantity;
						}
						?>
						<?php
						if (isset($delfromcart)) {
							echo $delfromcart;
						}
						?>
						<table class="table table-striped table-responsive-md">
							<tr>
								<th width="5%">Serial No</th>
								<th width="15%">Product Name</th>
								<th width="15%">Image</th>
								<th width="15%">Price</th>
								<th width="35%">Quantity</th>
								<th width="15%">Total Price</th>
								
							</tr>
							<?php
							$getProdcut=$cart->getCartProduct();
							if ($getProdcut) {
								$sum=0;
								$i=0;
								while ($result=$getProdcut->fetch_assoc()) {
									$i++;
							?>
							<tr>
								<td><?php echo $i;?></td>
								<td><?php echo $result['productname'];?></td>
								<td><img src="admin/<?php echo $result['image'];?>" alt=""/></td>
								<td><?php echo $result['price'];?></td>
								<td>
							<form action="" method="post">
								
							<?php echo $result['quantity'];?>
								
							</form>
								</td>
								<td>
								<?php 
									$total=$result['price']*$result['quantity'];
									echo $total;
									?>
								</td>
								
							</tr>
						<?php
						$sum=$sum+$total;
						Session::set("sum", $sum);
						?>
						<?php } } ?>	
						</table>

					</div>
				</div>  	
     		<div class="totalsummation">
     			<?php $getdata=$cart->checkcart();
				if ($getdata){ ?>
				<table class="" style="float:right;text-align:left;" width="40%">
					<tr>
						<th>Sub Total : </th>
						<td>TK. <?php echo $sum;?></td>
					</tr>
					<tr>
						<th>Grand Total :</th>
						<td>
						<?php
						
						$grandtotal=$sum+0;
						echo $grandtotal;
						?>
						</td>
					</tr>
				</table>
				<?php }else{
					echo "Cart is Empty.Shop now!";
				}
				?>
		</div>
    </div>
 </div>
			</div>
			<div class="col-md-1">
				
			</div>
		</div>
		<br>
		<br>
		<div class="container">
			<div class="row text-center">
			<div class="col-md-12">
				<div class="orderproducts">
					<a href="?orderid=order">Order Now</a>
				</div>
			</div>
		</div>
		</div>
	</div>
	<br>
	<br>
</section>

<?php include ('contact.php');?>
<?php include ('files/footer.php');?>
<!--
Coded by:
Name:Md.Mahmudul Hasan Robin;
ID:150201043;
Date:14.08.2019;
Last Updated:15.08.2019;
-->