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
                <h2>Stock In Details</h2>
               	 <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial_No</th>
							<th>Product Name</th>
							<th>Price</th>
							<th>Quantity</th>
							<th>Date</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$stockInItems=$cart->getStockInDetails();
						if ($stockInItems) {
							while ($result=$stockInItems->fetch_assoc()){
						?>
						<tr class="odd gradeX">
							<td><?php echo $result['serialNo'];?></td>
							<td><?php echo $result['productname'];?></td>
							<td><?php echo $result['price'];?></td>
							<td><?php echo $result['quantity'];?></td>
							<td><?php echo $fm->formatdate($result['date']);?></td>
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