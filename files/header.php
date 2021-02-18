<?php
    include 'library/Session.php';
	Session::init();
	include 'library/Database.php';
	include 'library/format.php';

	spl_autoload_register(function($class){
	include_once "classes/".$class.".php";
	
	});

	$db     	 =new Database();
	$fm      	 =new format();
	$product 	 =new Product();
	$cart        =new Cart();
	$customer    =new Customer();
	$category    =new Category();
	
?>

<!--Header Files Starts-->

<!DOCTYPE HTML>
<head>
	<style type="text/css">
	.navbar {
    
}
	</style>
<title>ChalDalShobji</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">



<link href="style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="responsive.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all"/>
<link rel="stylesheet"  href="font-awesome/css/font-awesome.min.css">
<link rel="stylesheet"  href="css/swiper.min.css">
<link rel="stylesheet"  href="swiper/swiperstyle.css">


<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css" />
<link rel="stylesheet" type="text/css" href="css/jquery.cslider.css" />
<link rel="stylesheet" type="text/css" href="css/jquery.bxslider.css" />
<link rel="stylesheet" type="text/css" href="css/animate.css" />
<link rel="stylesheet" type="text/css" href="css/owl.carousel.css" />
<link rel="stylesheet" type="text/css" href="css/owl.theme.default.css" />


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>  
  





<style type="text/css">
	.bg-light {
    background-color: 
    #fff !important;
    box-shadow: 0px 0px 3px -2px;
};
.list-group {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    padding-left: 0;
    margin-bottom: 0;
    width: 287px;
    height: 221px;
    margin-left: 33px;
}
</style>
</head>

<!--Header Files Ends-->

<body>

<!--Topbar Section-->

	<!--<section class="top">
		
		<div class="topdata text-center">
			<ul>
				<?php
				$login=Session::get("customerLogin");
				if ($login==true) {
				?>
				<li><a href="customerprofile.php">Profile</a></li>
				<?php
					}
				?>

				<li><a href="login.php">Sign In</a></li>
				<li><a href="login.php">Contact</a></li>
			</ul>
		</div>
	</section>-->

<!--Topbar Section-->


<!--Headersection-->

<section class="headsection templete">
	<div class="container">
		<div class="header">
			<div class="row">
				<div class="col-md-3 col-sm-12">
					<div class="logo">
						--<a href="index.php"><span style="
						background: rgb(233, 97, 37) none repeat scroll 0% 0%;
						color: rgb(255, 255, 255);
						border-radius: 127px;
						padding: 10px;
						font-size: 22px;
						width: 117px;
						margin-right: 10px;
						margin-left: -54px;
					">CD</span>চালডালসবজি</a>

					<!--<a href=""><img src="images/logo.png" style="height: 90px;
					width: 40px"></a>-->
					
					</div>
				</div>
				
				<div class="col-md-6 col-sm-12">
					<div class="searchbox">
				    <form action="search.php" method="get">
		              <input type="text" name="livesearch" required="" 
		               id="livesearch" autocomplete="off" class="" placeholder="Search for Products"/>
		               
		              <button class="btn btn-primary">Search</button>
		            
            		</form>




            		
			    </div>

				</div>
				

				<?php
				if (isset($_GET['cid'])) {
					$customerId=Session::get("customerId");
					$delComp=$product->delComparedData($customerId);	
					Session::destroy();
				}
				?>

				<div class="col-md-3 col-sm-12">
					<div class="shoppingcart">
					<div class="cart">
					<a href="cart.php" title="View my shopping cart" rel="nofollow">
					<span class="cart_title"><span><i class="fa fa-shopping-cart"></i></span>Cart</span>
					<span class="no_product">
						<?php
						$getdata=$cart->checkcart();
						if ($getdata) {
							$grandtotal=Session::get("grandtotal");
							echo $grandtotal."Tk";
						}else{
							echo "(0!)";
						}
						
						?>
					</span>
					</a>
					<?php
					$login=Session::get("customerLogin");
					if ($login==false){ 
					?> 
					<a href="login.php" style="margin-left: 12px;">Login</a><?php } else { ?>
					<a href="?cid=<?php Session::get("customerId")?>"style="margin-left: 5px;">LogOut</a><?php } ?></div>
			     </div>
			</div>	
		</div>
	</div>
	<br>
</section>

<section class="options">
	<nav class="navbar navbar-expand-lg navbar-light bg-light" style="border-radius: 4px;
    margin-bottom: 0px;" >
  	<a class="navbar-brand" href="index.php" style="margin-left:10px;background:#f4f4f4;width: 100px;text-align: center;margin-right: -16px;color:#80444E;font-weight: bold; "><i class="fa fa-home" style="margin-left: 5px;"></i>Home</a>
  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  	</button>

  	<div class="collapse navbar-collapse" id="navbarSupportedContent">
    	<ul class="navbar-nav mr-auto " style="">
      	<li class="nav-item" style="margin-left:20px;float: left;background:#f4f4f4;width: 140px;text-align: center;margin-right: -16px;color:#80444E;font-weight: bold; ">
        <a class="nav-link" href="allproducts.php
"><i class="fa fa-table" style="margin-right: 7px;"></i>All Products</a>
      	</li>

      <!--	<?php $checkcart=$cart->checkcart();
      		if ($checkcart) {?>

      	<li class="nav-item" style="margin-left:20px;margin-left:20px;float:left;background:#f4f4f4;width: 100px;text-align: center;margin-right: -16px;color:#80444E;font-weight: bold; ">
        <a class="nav-link" href="payment.php">Payment</a>
      	</li>
		<?php } ?>
-->
      	<?php $checkcart=$cart->checkcart();
      		if ($checkcart) {?>
      	<li class="nav-item" style="margin-left:20px;margin-left:20px;float:left;background:#f4f4f4;width: 100px;text-align: center;margin-right: -16px;color:#80444E;font-weight: bold; ">
        <a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart" style="margin-right: 7px;"></i>Cart</a>
      	</li>
      	<?php } ?>

      <?php
      	 $customerId=Session::get("customerId");
      	 $checkorder=$cart->checkOrder($customerId);
      		if ($checkorder) {?>
      	<li class="nav-item" style="margin-left:20px;margin-left:20px;float:left;background:#f4f4f4;width: 100px;text-align: center;margin-right: -16px;color:#80444E;font-weight: bold; ">
        <a class="nav-link" href="order.php"><i class="fa fa-cog" style="margin-right: 7px;"></i>Order</a>
      	</li>
      	<?php } ?>


      	<li class="nav-item dropdown" style="margin-left:20px;margin-left:20px;float:left;background:#f4f4f4;width: 130px;text-align: center;margin-right: -16px;color:#80444E;font-weight: bold; ">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-envelope" style="margin-right: 7px;"></i>Contact Us
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="FAQ.php">FAQ</a>
          <a class="dropdown-item" href="contactus.php">Contact</a>
        </div>
      </li>

      <?php
		$login=Session::get("customerLogin");
		if ($login==true) {
		?>

      <li class="nav-item dropdown" style="margin-left:20px;margin-left:20px;float:left;background:#f4f4f4;width: 130px;text-align: center;margin-right: -16px;color:#80444E;font-weight: bold; ">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        	<i class="fa fa-user" style="margin-right: 4px;"></i>
          My Account
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="customerprofile.php">My Profile</a>
          <a class="dropdown-item" href="#">Wish List</a>
          <a class="dropdown-item" href="#">Order List</a>
        </div>
      </li>
  <?php } ?>

  		<?php
          $customerId=Session::get("customerId");
          $getCProdcut=$product->getComparedProduct($customerId);
          if ($getCProdcut) {
         ?>
  		<li class="nav-item" style="margin-left:20px;margin-left:20px;float:left;background:#f4f4f4;width: 100px;text-align: center;margin-right: -16px;color:#80444E;font-weight: bold; ">
        <a class="nav-link" href="compare.php"><i class="fa fa-align-justify" style="margin-right: 7px;"></i>Compare</a>
      	</li>
	<?php } ?>
    
    <?php
          $customerId=Session::get("customerId");
          $checkwishlist=$product->checkwishlist($customerId);
          if ($checkwishlist) {
         ?>
  		<li class="nav-item" style="margin-left:20px;margin-left:20px;float:left;background:#f4f4f4;width: 100px;text-align: center;margin-right: -16px;color:#80444E;font-weight: bold; ">
        <a class="nav-link" href="wishlist.php"><i class="fa fa-heart" style="margin-right: 7px;"></i>WishList</a>
      	</li>
	<?php } ?>

      <li class="nav-item" style="margin-left:20px;margin-left:20px;float:left;background:#f4f4f4;width:130 px;text-align: center;margin-right: -16px;color:#80444E;font-weight: bold; ">
        <a class="nav-link" href="returnpolicy.php"><i class="fa fa-cog" style="margin-right: 7px;"></i>Return Policy</a>
      	</li>
    	</ul>
  	</div>
	</nav>
</section>


<script>
$(document).ready(function(){
 	$('#search_text').keyup(function(){

 	var txt= $(this).val();
 	if (txt !='') {

 	}else{
 		$('#result').html('');
 		$.ajax({
 			url:"fetch.php",
 			method:"post",
 			data:{search:txt},
 			dataType:"text",
 			success:function(data){
 				$('#result').html(data);
 			}
 		});
 	}
 });
 
 
});
</script>





<!--Headersection-->

<!--
Coded by:
Name:Md.Mahmudul Hasan Robin;
ID:150201043;
Date:24.07.2019;
Last Updated:25.07.2019;
-->