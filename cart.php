<?php include ('files/header.php');?>
<?php
	if (isset($_GET['delcart'])) {
		 $delid=preg_replace('/[^-a-zA-Z0-9_]/', '',$_GET['delcart']);
		 $delfromcart=$cart->delfromcart($delid);
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
								<th width="5%">Action</th>
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
								<td>BDT <?php echo $result['price'];?></td>
								<td>
							<form action="" method="post">
								<input type="hidden" name="cartid" value="<?php echo $result['cartid'];?>"/>
								<input type="number" name="quantity" value="<?php echo $result['quantity'];?>"/>
								<input type="submit" name="submit" value="Update"/>
							</form>
								</td>
								<td>
								<?php 
									$total=$result['price']*$result['quantity'];
									echo "BDT ".$total;
									?>
								</td>
								<td>
								<a onclick="return confirm('Are u sure to remove the item?');" href="?delcart=<?php echo $result['cartid'];?>">X</a>
								</td>
							</tr>
						<?php
						$sum=$sum+$total;
						
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
						<td>BDT <?php echo $sum;?></td>
					</tr>
					<tr>
						<th>Grand Total :</th>
						<td>
						<?php
					
						$grandtotal=$sum+0;
						Session::set("grandtotal", $grandtotal);
						echo "BDT ". $grandtotal;
						?>
						</td>
					</tr>
				</table>
				<?php }else{
					header("Location:index.php");
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
		<br>
		<br>
		<br>
		<br>
		<div class="row text-center">
			
			<div class="col-md-6 col-sm-12">
				<!--<div class="shopleft">
					<a href="index.php"> 
						<img src="images/shop.png" alt="" />
					</a>
				</div>-->
				<div class="conshop">
					<a href="allproducts.php"><i class="fa fa-arrow-left"></i>Continue Shopping</a>
				</div>
			</div>
			
			<div class="col-md-6 col-sm-12">
				<!--<div class="shopright">
					<a href="checkout.php?price=<?php echo $grandtotal; ?>">
					 <img src="images/check.png" alt="" />
					</a>
				</div>-->
				<div class="onpayment">
					<a href="payment.php">Proceed Checkout</a>

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