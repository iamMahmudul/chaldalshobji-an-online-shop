<style type="text/css">
	.mybutton{float: left;margin-right: 10px;}
</style><?php include ('files/header.php');?>
<?php
if (isset($_GET['proid'])) {
	$id=preg_replace('/[^-a-zA-Z0-9_]/', '',$_GET['proid']);
}
?>
<?php
    
    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
    $quantity=$_POST['quantity'];
    $addtocart= $cart->addtocart($quantity,$id);
    }
?>
<?php
      $customerId=Session::get("customerId");
      if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['compare'])){
      	$productid=$_POST['productid'];
        $insertCompareData= $product->insertCompareData($productid,$customerId);
    }
?>
<?php
      
      if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['wishlist'])){
        $saveTowishlist= $product->saveTowishlist($id,$customerId);
    }
?>


<div class="navsection">
	
</div>
	<section class="previewsection">
		<div class="container">
			<div class="row">
				<div class="col-md-2 col-sm-12">
					<div class="sidebarsocial">
						<ul>
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
							<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
							<li><a href="#"><i class="fa fa-google"></i></a></li>
							<li><a href="#"><i class="fa fa-envelope"></i></a></li>
							<li><a href="#"><i class="fa fa-phone"></i></a></li>
						</ul>
					</div>
				</div>
				<?php
			        $getSingleProduct=$product->getSingleProduct($id);
			        if ($getSingleProduct) {
			          while ($result=$getSingleProduct->fetch_assoc()) {
			        ?>
				<div class="col-md-4 col-sm-12">
					<div class="previewimage">
						<img src="admin/<?php echo $result['image']; ?>">
					</div>
				</div>
				
				<div class="col-md-6 col-sm-12">
					<div class="productspreview">
					<h2><?php echo $result['productname']; ?></h2>				
					<div class="price">
						<p>Price:   <span style="color: blue;font-size: 18px;">BDT <?php echo $result['price']; ?></span></p>
						<p>Category: <span style="color: blue;font-size: 18px;"><?php echo $result['catName']; ?></span></p>
						<p>Brand:<span style="color: blue;font-size: 18px;"><?php echo $result['brandname']; ?></span></p>
					</div>
					<div class="add-cart">
						<form action="" method="post">
							<input type="number" class="buyfield" name="quantity" value="1"/>
							<input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
						</form>
						<br>
							<span style="color: red;font-weight: bold;">
								<?php
									if (isset($addtocart)) {
										echo $addtocart;
									}
								?>
							</span>	
					
					<?php
						$login=Session::get("customerLogin");
						if ($login==true) {
					?>
				
						<div class="add-list">
						 <div class="mybutton">
							<form action="" method="post">
							<input type="hidden" class="buyfield" name="productid" value="<?php echo $result['productid']; ?>"/>
							<input type="submit" class="buysubmit" name="compare" value="Add to Compare"/>
							</form>
						 </div>
						 <div class="mybutton">
							<form action="" method="post">
							<input type="hidden" class="buyfield" name="productid" value="<?php echo $result['productid']; ?>"/>
							<input type="submit" class="buysubmit" name="wishlist" value="Add to WishList"/>
							</form>
						</div>
						</div>
					<?php } ?>
						<?php
							if (isset($insertCompareData)){
								echo $insertCompareData;
							}
							if (isset($saveTowishlist)){
								echo $saveTowishlist;
							}
							
						?>			
							</div>
						</div>
					</div>
				</div>
				<?php } } ?>
			</div>
		</div>
	</div>
</section>

<section class="detailspro">	
		<div class="container">
			<div class="tabmenu">
			<ul class="nav nav-tabs" style="border-bottom: 1px solid #fff;">
				<li><a href="#description" data-toggle="tab">Description</a></li>
				<li><a href="#reviews" data-toggle="tab">Reviews</a></li>
				
			</ul>
			</div>
<div class="tab-content">
	<div class="tab-pane" id="description">
		<div class="productdesc text-center">
			<div class="container">
				<div class="row">
				<div class="col-md-2">
					
				</div>
				<div class="col-md-8">
					<?php
			        $getSingleProduct=$product->getSingleProduct($id);
			        if ($getSingleProduct) {
			          while ($result=$getSingleProduct->fetch_assoc()) {
			        ?>
					<p><?php echo $result['body']; ?></p>
				</div>
			<?php } }?>
				<div class="col-md-2">
					
				</div>
			</div>
		</div>
		
    </div>
</div>



		<!--<div class="tab-pane" id="reviews">
			<div class="container">
				<div class="row">
					<div class="col-md-2">
						
					</div>
					<div class="col-md-4">
						<div class="reviews">
							<p>24.04.2019</p>
							<h5>Michael Handovic</h5>
							<p>
								Suitable ghorar anda....
							</p>
						</div>
						<div class="reviews">
							<p>24.04.2019</p>
							<h5>Michael Handovic</h5>
							<p>
								Suitable ghorar anda....
							</p>
						</div>
						<div class="reviews">
							<p>24.04.2019</p>
							<h5>Michael Handovic</h5>
							<p>
								Suitable ghorar anda....
							</p>
						</div>
						<div class="allreviews">
							<a href="">Show all reviews</a>
						</div>
					</div>
					<div class="col-md-4">
						<div class="inputreviews">
							<h4>Write a Review</h4>
							<form action="" method="post">
								<table>
									<tr>
										<th>Name:</th>
										<td>
											<input type="text" name="name">
										</td>
									</tr>
									<tr>
										<th>Review:</th>
										<td>
										<textarea name="review">
											
										</textarea>
										</td>
									</tr>
									<tr>
										<th></th>
										<td>
											<input type="submit" name="BUTTON" value="Review" >
										</td>
									</tr>
								</table>
							</form>
						</div>
					</div>
					<div class="col-md-2">
						
					</div>
					</div>
				</div>
			</div>-->
		</div>
	</div>
</section>




<section class="relatedproducts">
		<div class="header text-center">
		<h4>Related Products</h4>
		</div>
		
				
				
	<div class="container">
		<div class="row">
			<?php
	        //$getSingleProduct=$product->getallProducts();
	        //if ($getSingleProduct) {
			$query="select * from products_table where productid='$id'";
			$post=$db->select($query);
			if ($post) {
	        while ($result=$post->fetch_assoc()) {
	        ?>
		<?php
			$catid=$result['catid'];
			$queryrelated="select * from products_table where catid='$catid' limit 4";
			$relatedpost=$db->select($queryrelated);
			if($relatedpost){
				while($rresult=$relatedpost->fetch_assoc()){
			?>
			<div class="col-md-3">
				<div class="relatedimage">
					<a href="preview.php?proid=<?php echo $rresult['productid']; ?>">
				<img src="admin/<?php echo $rresult['image'];?>" style="
				width: 255px;
				height: 200px;
				border: 1px solid #ddd;
				box-shadow: 0px 1px 4px -1px;
				padding: 30px;
			}"/></a>
				</div>
			</div>
			<?php } } ?>
		</div>
	<?php } } else{echo "No related post available";}?>
	</div>
</section>


<br>
<br>
<?php include ('files/footer.php');?>
<!--
Coded by:
Name:Md.Mahmudul Hasan Robin;
ID:150201043;
Date:30.07.2019;
Last Updated:22.08.2019;
-->

