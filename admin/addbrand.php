<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include('../classes/Brand.php')?>

<?php
    $brand=new Brand();
    if($_SERVER['REQUEST_METHOD']=='POST'){
    $brandname=$_POST['brandname'];
    $addbrand= $brand->addbrand($brandname);
    }
?>


        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Brand</h2>
               <div class="block copyblock"> 
                <?php
                if (isset($addbrand)) {
                    echo $addbrand;
                }
                ?>
                 <form action="addbrand.php" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" placeholder="Enter Brand Name..." name="brandname" class="medium" />
                            </td>
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
Name:Sadik Jabirul Hasan;
ID:150201047;
Date:16.08.2019;
Last Updated:23.08.2019;
-->