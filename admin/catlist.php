<!--
Coded by:
Name:Nazmul Alam Nowfel;
ID:150201043;
Date:18.08.2019;
Last Updated:18.08.2019;
-->
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include('../classes/Category.php')?>

<?php
$category=new Category();
if (isset($_GET['delcat'])) {
	$id=$_GET['delcat'];
	$delcat=$category->delCatById($id);
}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <?php
                if (isset($delcat)) {
                	echo $delcat;
                }
                ?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Category Image</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$getCategory=$category->getallcat();
						if ($getCategory) {
							$i=0;
							while ($result=$getCategory->fetch_assoc()) {
							$i++;
					
						?>
						<tr class="odd gradeX">
							<td width="20%"><?php echo $i;?></td>
							<td width="30%"><?php echo $result['catName'];?></td>
							<td><img src="<?php echo $result['image'];?>" height="45px" width="60px" style="margin-top: 30px;"></td>
							<td>
							<a href="catedit.php?catid=<?php echo $result['catid'];?>">Edit
							</a> 
							||
							<a onclick="return confirm('Are you sure to delete?')" href="?delcat=<?php echo $result['catid'];?>">
							Delete
							</a>
						</td>
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

