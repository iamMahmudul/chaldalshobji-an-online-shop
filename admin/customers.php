<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
	$filepath=realpath(dirname(__FILE__));
	include_once($filepath.'/../classes/Cart.php');
	include_once($filepath.'/../classes/Product.php');
	include_once($filepath.'/../classes/Customer.php');
	$cart=new Cart();
	$fm=new format();
	$product=new Product();
?>
<?php
  if (isset($_GET['delmsg'])) {
      $id=$_GET['delmsg'];
      $delmsg=$product->delmsg($id);
  }
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
               	 <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Customer Id</th>
							<th>Name</th>
							<th>Address</th>
							<th>City</th>
							<th>Country</th>
							<th>Zip</th>
							<th>Phone</th>
							<th>Email</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$customer=new Customer();
						$getCustomer=$customer->getCustomer();
						if ($getCustomer) {
							while ($result=$getCustomer->fetch_assoc()){
						?>
						<tr class="odd gradeX">
							<td><?php echo $result['id'];?></td>
							<td><?php echo $result['name'];?></td>
							<td><?php echo $result['address'];?></td>
							<td><?php echo $result['city'];?></td>
							<td><?php echo $result['country'];?></td>
							<td><?php echo $result['zip'];?></td>
							<td><?php echo $result['phone'];?></td>
							<td><?php echo $result['email'];?></td>
							
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

-->