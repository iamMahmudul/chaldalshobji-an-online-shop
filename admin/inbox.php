<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
	$filepath=realpath(dirname(__FILE__));
	include_once($filepath.'/../classes/Cart.php');
	$cart=new Cart();
	$fm=new format();
?>
<?php
	if (isset($_GET['shiftid'])) {
		$id=$_GET['shiftid'];
		$date=$_GET['date'];
		$price=$_GET['price'];
		$shift=$cart->productshifted($id,$date,$price);
	}
	if (isset($_GET['delshiftedpro'])) {
		$id=$_GET['delshiftedpro'];
		$date=$_GET['date'];
		$price=$_GET['price'];
		$delshiftedproduct=$cart->delshiftedproduct($id,$date,$price);
	}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Manage Orders</h2>
                <?php
                if (isset($shift)) {
                	echo $shift;
                }
                if (isset($delshiftedproduct)) {
                	echo $delshiftedproduct;
                }
                ?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Order_Id</th>
							<th>Order Time</th>
							<th>Invoice_No</th>
							<th>Product</th>
							<th>Quantity</th>
							<th>Price</th>
							<th>Customer ID</th>
							<th>Address</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$orderedproduct=$cart->getallorderedproducts();
						if ($orderedproduct) {
							while ($result=$orderedproduct->fetch_assoc()){
						?>
						<tr class="odd gradeX">
							<td><?php echo $result['id'];?></td>
							<td><?php echo $fm->formatdate($result['date']);?></td>
							<td><?php echo $result['invoice_no'];?></td>
							<td><?php echo $result['productname'];?></td>
							<td><?php echo $result['quantity'];?></td>
							<td><?php echo $result['price'];?></td>
							<td><?php echo $result['customerid'];?></td>
							<td>
							<a href="customerprofile.php?customerid=<?php echo $result['customerid'];?>">
							View Details
						</a>
							</td>
							<?php
							if ($result['status']=='0') { ?>
								<td>
									<a href="?shiftid=<?php echo $result['customerid'];?>& price=<?php echo $result['price'];?> & date=<?php echo $result['date'];?>">Shift Product</a>
								</td>
								<?php }else if($result['status']=='1'){?>
								<td>Pending</td>
							<?php } else{ ?>
								<td>
									<a href="?delshiftedpro=<?php echo $result['customerid'];?>& price=<?php echo $result['price'];?> & date=<?php echo $result['date'];?>">Remove</a>
								</td>
							<?php }  ?>
						</tr>
						<?php } } ?>
					</tbody>
				</table>
               </div>
            </div>
          </div> 
<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();

        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>

<!--
Coded by:
Name:Md.Mahmudul Hasan Robin;
ID:150201043;
Date:12.07.2019;
Last Updated:30.08.2019;
-->