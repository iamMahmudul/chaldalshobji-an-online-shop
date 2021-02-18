<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
	$filepath=realpath(dirname(__FILE__));
	include_once($filepath.'/../classes/Cart.php');
	$cart=new Cart();
	$fm=new format();
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Stock Out Details</h2>
               	 <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial_No</th>
							<th>Time</th>
							<th>Invoice_No</th>
							<th>Product</th>
							<th>Quantity</th>
							<th>Customer ID</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$stockoutitems=$cart->getstockoutdetails();
						if ($stockoutitems) {
							while ($result=$stockoutitems->fetch_assoc()){
						?>
						<tr class="odd gradeX">
							<td><?php echo $result['id'];?></td>
							<td><?php echo $fm->formatdate($result['Date']);?></td>
							<td><?php echo $result['invoice_no'];?></td>
							<td><?php echo $result['productname'];?></td>
							<td><?php echo $result['quantity'];?></td>
							<td><?php echo $result['customerid'];?></td>
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