
<?php
    $product=new Product();
        if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
             $insertMsg= $product->insertMsg($_POST);
        
    }
?> 


<section class="contact">
	<div class="header text-center">
		<h4>Contact Us</h4>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="title">
					<h5>Address</h5>
					</div>
					<div class="address">
					<table>
						<tr>
							<td><i class="fa fa-home" style="margin-right: 5px;"></i>2500 B/D Street Road,Dhaka,Bangladesh</td>
						</tr>
						<tr>
							<td><i class="fa fa-phone" style="margin-right: 5px;"></i>+8801740140967</td>
						</tr>
						<tr>
							<td><i class="fa fa-envelope" style="margin-right: 5px;"></i>query@example.com</td>
						</tr>
						<tr>
							<td><i class="fa fa-globe" style="margin-right: 5px;"></i><a href="index.php">www.chaldalshobji.com</a></td>
						</tr>
					</table>

				</div>
					<div class="socialmedia">
						<h5>We are Social!</h5>
						<ul>
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
							<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
						</ul>
					</div>
			</div>
			<div class="col-md-2">
				<div class="null">
					
				</div>
			</div>
			<div class="col-md-6">
				<div class="title">
					<h5>Say Hello! to Us</h5>
				</div>

				<?php
		        if (isset($insertMsg)) {
		            echo $insertMsg;
		        }
		        ?> 

				<div class="form">
					<form action="" method="post">
						<table>
							<tr>
								
							</tr>
							<tr>
								<td><input type="text" name="name"placeholder="Your Name*" required="" /></td>
								
							</tr>
							<tr>
								
							</tr>
							<div>
							<tr>
								<td><input type="text" name="email"placeholder="Your Email*" required=""/></td>
								
							</tr>
						</div>
							<tr>
								
							</tr>
							<tr>
								<td><input type="text" name="phone"placeholder="Your Phone*" required=""/></td>
								
							</tr>
							<tr>
								
								<br>
								<td>
								<textarea name="body">
									
								</textarea>
								</td>
							</tr>
						</table>
						<div class="send">
							<input type="submit" name="submit" value="Message">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>

<!--
Coded by:
Name:Md.Mahmudul Hasan Robin;
ID:150201043;
Date:06.08.2019;
Last Updated:12.08.2019;
-->
