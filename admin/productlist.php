<?php 

$con = mysqli_connect("localhost","root","","chaldalshobji");

?>
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include('../classes/Product.php')?>
<?php include_once('../library/format.php');?>

<?php
	$product=new Product();
	$fm=new format();
?>

<?php

if (isset($_GET['delproduct'])) {
	$id=$_GET['delproduct'];
	$delproduct=$product->delProductById($id);
}
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Products List</h2>
         <?php
                if (isset($delproduct)) {
                	echo $delproduct;
                }
           ?>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					
					<th>Serial</th>
					<th>Name</th>
					<th>Category</th>
					<th>Brand</th>
					<th>Description</th>
					<th>Price</th>
					
					<th>Image</th>
					<th>Type</th>
					<th>Status</th>
					
					<th>Action</th>
					<th>Total Sold</th>
					
				</tr>
			</thead>
			<tbody>
				<?php
					$getproducts=$product->getallProductsinadmin();
					if ($getproducts) {
					$i=0;
					while ($result=$getproducts->fetch_assoc()) {
					$i++;
				?>
				<tr class="odd gradeX">
					<td ><?php echo $i;?></td>
					<td width="10%"><?php echo $result['productname'];?></td>
					<td width="10%"><?php echo $result['catName'];?></td>
					<td width="10%"><?php echo $result['brandname'];?></td>
					<td width="10%"><?php echo $fm->textshorten($result['body'],20);?></td>
					<td width="10%">BDT <?php echo $result['price'];?></td>

					




					<td width="10%"><img src="<?php echo $result['image'];?>" height="45px" width="60px" style="margin-top: 30px;"></td>
					<td>
						<?php
						if ($result['type']==0) {
						 	echo "Featured";
						 } elseif ($result['type']==1) {
						 	echo "General";
						 }elseif ($result['type']==2) {
						 	echo "Special";
						 }else{
						 	echo "Offered";
						 }
						?>
						
					</td>
					<td width="10%">
						<?php
						if ($result['status']==0) {
						 	echo "Available";
						 } else{
						 	echo "Not Available";
						 }
						?>
						
					</td>
					
					<td width="10%">
						<a href="productedit.php?productid=<?php echo $result['productid'];?>">Edit
						</a> 
						||
						<a onclick="return confirm('Are you sure to delete?')" href="?delproduct=<?php echo $result['productid'];?>">
						Delete
						</a>
					</td>
					<td>
						<?php
						

						  $productid	=$result['productid'];
						  $sql = "select sum(quantity) as Count from stock_out_table
						  where productid='$productid'";
						  $result = $con->query($sql);
						  $row = $result->fetch_assoc();
						  echo $row['Count'];
						  
						?>
					</td>

						<td>
						
					</td>


				</tr>
				<?php }  }?>
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
Date:23.08.2019;
Last Updated:25.08.2019;
-->