<?php 

$con = mysqli_connect("localhost","root","","chaldalshobji");

?>


<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>


        <div class="grid_10">
            <div class="box round first grid">
                <h2> Dashbord</h2>
                <div class="block">               
                  
                  <div class="totalproducts">
                  	<?php
					$sql = "select count(productid) as Count from products_table";
					 $result = $con->query($sql);
					 $row = $result->fetch_assoc();  
					?>
                  	<h4>Total Products:<span style="color: purple;margin-left: 15px;
                  	font-size: 50px;"><?php echo $row['Count'];?></span></h4>
                  </div>      
                  <br>
                  <br>
                  <div class="totalcustomers">
                  	<?php
					$sql = "select count(id) as Count from customer_table";
					 $result = $con->query($sql);
					 $row = $result->fetch_assoc();  
					?>
                  	<h4>Total Customers:<span style="color: purple;margin-left: 15px;
                  	font-size: 50px;"><?php echo $row['Count'];?></span></h4>
                  </div> 
                  <br>
                  <br>
                  <div class="totalOrders">
                  	<?php
					$sql = "select count(id) as Count from order_table";
					 $result = $con->query($sql);
					 $row = $result->fetch_assoc();  
					?>
                  	<h4>Total Orders:<span style="color: purple;margin-left: 15px;
                  	font-size: 50px;"><?php echo $row['Count'];?></span></h4>
                  </div> 
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>