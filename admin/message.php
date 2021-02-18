<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
	$filepath=realpath(dirname(__FILE__));
	include_once($filepath.'/../classes/Cart.php');
	include_once($filepath.'/../classes/Product.php');
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
							<th>Serial_No</th>
							<th>Name</th>
							<th>Email</th>
							<th>Phone</th>
							<th>Body</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$product=new product();
						$getmessages=$product->getmessages();
						if ($getmessages) {
							while ($result=$getmessages->fetch_assoc()){
						?>
						<tr class="odd gradeX">
							<td><?php echo $result['id'];?></td>
							<td><?php echo $result['name'];?></td>
							<td><?php echo $result['email'];?></td>
							<td><?php echo $result['phone'];?></td>
							<td><?php echo $result['body'];?></td>
							<td><?php echo $fm->formatdate($result['date']);?></td>
							<td> <a onclick="return confirm('Are u sure to remove the message?');" href="?delmsg=<?php echo $result['id'];?>">Delete</a></td>
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