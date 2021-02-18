<?php include ('files/header.php');?>
<?php
  $login=Session::get("customerLogin");
  if ($login==false) {
    header("Location:login.php");
  }
?>
<?php
  $deletedata=Session::get('customerEmail');
  if (isset($_POST['yes'])) {
    $delcustomer="delete from customer_table where email='$deletedata'";
    $deldata=$db->delete($delcustomer);
    if ($deldata) {
      session_destroy();
      echo "<script>alert('Your account has been deleted!')</script>";
      header("Location:login.php");
    }

  }
  if (isset($_POST['no'])) {
     header("Location:customerprofile.php");
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
          <a href="customerprofile.php" class="list-group-item list-group-item-action">
           <i class="fa fa-user"style="margin: 5px;"></i> My Profile
          </a>
          <a href="compare.php" class="list-group-item list-group-item-action"><i class="fa fa-cog"style="margin: 5px;color: red;"></i>Compared Products</a>
          <a href="wishlist.php" class="list-group-item list-group-item-action"><i class="fa fa-heart" style="margin: 5px;color: red;"></i>Wishlist</a>
          <a href="order.php" class="list-group-item list-group-item-action"><i class="fa fa-list"style="margin: 5px;color: red;"></i>Order List</a>
          <?php
            if (isset($_GET['cid'])) {
              Session::destroy();
          }?>
          <?php
          $login=Session::get("customerLogin");
          if($login==true){?>
          <a href="?cid=<?php Session::get("customerId")?>" class="list-group-item list-group-item-action"><i class="fa fa-sign-out"style="margin: 5px;color: red;"></i>Log Out</a>
          <a href="deleteprofile.php" class="list-group-item list-group-item-action active">
           <i class="fa fa-trash"style="margin: 5px;"></i>Delete Account
          </a>
        <?php }?>
         
        </div>
      </div>
    </div>
    <div class="col-md-9"id="one">
      <div class="profiledetails">
        <div class="delprofile text-center">
          <div class="delheader text-center">
            <h3 class="" style="color: red;font-weight: bold;">Account Deletion</h3>
          </div>
          <form action="" method="post">
            <table class="">
              <tr align="text-center">
                <h4>Do you really Want to Delete your account?</h4>
              </tr>
              <tr>
                <input type="submit" name="yes" value="Yes,I want To Delete">
                <input type="submit" name="no" value="No,I don't want To Delete">
              </tr>
            </table>
          </form>
        </div>
        
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

