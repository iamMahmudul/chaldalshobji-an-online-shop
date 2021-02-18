<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include('../classes/Category.php')?>
<?php
    $category=new Category();
        if($_SERVER['REQUEST_METHOD']=='POST'){
        $catName=$_POST['catName'];
        $insertCat= $category->catInsert($catName);
        
        }
    ?>  


        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock"> 
                <?php
                if (isset($insertCat)) {
                    echo $insertCat;
                }
                ?>
                 <form action="catadd.php" method="post" enctype="multipart/form-data">
                    <table class="form">                    
                        <tr>
                            <td>Name</td>
                            <td>
                                <input type="text" placeholder="Enter Category Name..." name="catName" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td><label>Image</label></td>
                            <td><input type="file" name="image"></td>
                        </tr>
                        <tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
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