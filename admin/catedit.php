<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include('../classes/Category.php')?>

<?php
if (!isset($_GET['catid'])|| $_GET['catid']==NULL) {
    echo "<script>window.location='catlist.php'</script>";
}else{
    $id=$_GET['catid'];
}
?>

<?php

    $category=new Category();
    
    if($_SERVER['REQUEST_METHOD']=='POST'){

        $catName=$_POST['catName'];
        $updateCat= $category->updateCat($catName,$id);

}
?>


        <div class="grid_10">
            <div class="box round first grid">
                <h2>Update Category</h2>
               <div class="block copyblock"> 
                <?php
                if (isset($updateCat)) {
                    echo $updateCat;
                }
                ?>
                <?php
                    $getCat=$category->getCatById($id);
                    if ($getCat) {
                        while ($result=$getCat->fetch_assoc()) {
                     
                       
                ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $result['catName'];?>" name="catName" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>

                    <?php  } } ?>
                
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>
<!--
Coded by:
Name:Nazmul Alam Nowfel;
ID:150201043;
Date:18.08.2019;
Last Updated:18.08.2019;
-->