<?php include ('files/header.php');?>
<?php
  $login=Session::get("customerLogin");
  if ($login==false) {
    echo"<script>location.href=login.php;</script>";
  }
?>
<?php
      $customerId=Session::get("customerId");
      if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
      $customerupdate= $customer->customerupdate($_POST,$customerId);
    }
?>
<section class="profilesection">
  <div class="container">
  <div class="row">
    <div class="col-md-3">
      <div class="profile">
        <h3><i class="fa fa-user"></i>Hello <span style="color: #E96125;font-weight: bold;font-size: 18px;"><?php echo Session::get('customerName');?>!</span></h3>
       
      </div>
      <div class="datalist">
        <div class="list-group">
          <a href="customerprofile.php" class="list-group-item list-group-item-action active">
           <i class="fa fa-user"style="margin: 5px;"></i> My Profile
          </a>
          <a href="compare.php" class="list-group-item list-group-item-action"><i class="fa fa-cog"style="margin: 5px;color: red;"></i>Compared Products</a>
          <a href="wishlist.php" class="list-group-item list-group-item-action"><i class="fa fa-heart" style="margin: 5px;color: red;"></i>Wishlist</a>
          <a href="order.php" class="list-group-item list-group-item-action"><i class="fa fa-list"style="margin: 5px;color: red;"></i>Order List</a>
          <a href="index.php" class="list-group-item list-group-item-action"><i class="fa fa-sign-out"style="margin: 5px;color: red;"></i>Log Out</a>
         
        </div>
      </div>
    </div>
    <div class="col-md-9"id="one">
      <div class="profiledetails">
        <h5><i class="fa fa-user"style="margin: 5px;color: red;"></i>My Profile</h5>
        <?php
        if (isset($customerupdate)) {
          echo $customerupdate;
        }
        ?>
        <?php
        $id=Session::get("customerId");
        $getcustomerdata=$customer->getCustomerData($id);
        if ($getcustomerdata) {
          while ($result=$getcustomerdata->fetch_assoc()) {
          
        ?>
        <form action="" method="post">
        <table>
          <tr>
            <td>Name*</td>
            <td><input type="text" name="name" value="<?php echo $result['name'];?>"></td>
            <td>Email*</td>
            <td><input type="text" name="email" value="<?php echo $result['email'];?>"></td>
          </tr>
          <tr>
            <td>Phone*</td>
            <td><input type="text" name="phone" value="<?php echo $result['phone'];?>"></td>
            <td>Zip*</td>
            <td><input type="number" name="zip" value="<?php echo $result['zip'];?>"></td>
          </tr>
          <tr>
            <td>Country*</td>
            <td><input type="text" name="country" value="<?php echo $result['country'];?>"></td>
            <td>City*</td>
            <td><input type="text" name="city" value="<?php echo $result['city'];?>"></td>
          </tr>
          <tr>
            <td>Address*</td>
            <td>
              <textarea name="address">
                <?php echo $result['address'];?>
            </textarea>
          </td>
          </tr>
          
          <tr>
            <td></td>
         
           <td> <input type="submit" name="submit" value="Update"></td>
          </td>
          </tr>
        </table>
      <?php } } ?>
    </form>
      </div>
    </div>
  </div>
  </div>
</section>


<?php include ('files/footer.php');?>

<!--
Coded by:
Name:Md.Mahmudul Hasan Robin;
ID:150201043;
Date:24.07.2019;
Last Updated:15.08.2019;
-->

