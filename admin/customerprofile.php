<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
    $filepath=realpath(dirname(__FILE__));
    include_once($filepath.'/../classes/Customer.php');
?>

<?php
if (!isset($_GET['customerid'])|| $_GET['customerid']==NULL) {
    echo "<script>window.location='inbox.php'</script>";
}else{
    $id=$_GET['customerid'];
}
?>

<?php
     if($_SERVER['REQUEST_METHOD']=='POST'){
     echo "<script>window.location='inbox.php'</script>";
}
?>


        <div class="grid_10">
            <div class="box round first grid">
                <h2>Customer Details</h2>
               <div class="block copyblock"> 
                <?php
                    $customer=new Customer();
                    $getCustomer=$customer->getCustomerData($id);
                    if ($getCustomer) {
                        while ($result=$getCustomer->fetch_assoc()) {
                 ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>Name</td>
                            <td>
                                <input type="text" value="<?php echo $result['name'];?>" readonly="readonly" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>
                                <input type="text" value="<?php echo $result['address'];?>" readonly="readonly" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>City</td>
                            <td>
                                <input type="text" value="<?php echo $result['city'];?>" readonly="readonly" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>Zip</td>
                            <td>
                                <input type="text" value="<?php echo $result['zip'];?>" readonly="readonly" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>
                                <input type="text" value="<?php echo $result['email'];?>" readonly="readonly" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td>
                                <input type="text" value="<?php echo $result['phone'];?>" readonly="readonly" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Ok" />
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
Name:Mahmudul Hasan;
ID:150201043;
Date:18.08.2019;
Last Updated:18.08.2019;
-->