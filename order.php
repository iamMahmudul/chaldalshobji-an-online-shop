<?php include ('files/header.php');?>
<?php
  $login=Session::get("customerLogin");
  if ($login==false) {
     header("Location:login.php");
  }
?>
<?php

if (isset($_GET['custid'])) {
    $id=$_GET['custid'];
    $date=$_GET['date'];
    $price=$_GET['price'];
    $confirmproduct=$cart->confirmproduct($id,$date,$price);
  }

  if (isset($_GET['delshiftedpro'])) {
    $id=$_GET['delshiftedpro'];
    $date=$_GET['date'];
    $price=$_GET['price'];
    $delshiftedproduct=$cart->delshiftedproduct($id,$date,$price);
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
          <a href="customerprofile.php" class="list-group-item list-group-item-action ">
           <i class="fa fa-user"style="margin: 5px;"></i> My Profile
          </a>
          <a href="compare.php" class="list-group-item list-group-item-action"><i class="fa fa-cog"style="margin: 5px;color: red;"></i>Compared Products</a>
          <a href="wishlist.php" class="list-group-item list-group-item-action"><i class="fa fa-heart" style="margin: 5px;color: red;"></i>Wishlist</a>
          <a href="order.php" class="list-group-item list-group-item-action active"><i class="fa fa-list"style="margin: 5px;color: red;"></i>Order List</a>
          <?php
            if (isset($_GET['cid'])) {
              Session::destroy();
          }?>
          <?php
          $login=Session::get("customerLogin");
          if($login==true){?>
          <a href="?cid=<?php Session::get("customerId")?>" class="list-group-item list-group-item-action"><i class="fa fa-sign-out"style="margin: 5px;color: red;"></i>Log Out</a>
        <?php }?>


         
        </div>
      </div>
    </div>
    <div class="col-md-9">
      <div class="profiledetails">
        <h5><i class="fa fa-list"style="margin: 5px;color: red;"></i>Order List</h5>
        <table class="table table-striped">
          <tr>
            <th>Serial</th>
            <th>Name</th>
            <th>Invoice No</th>
            <th>Image</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Date</th>
            <th>Status</th>
            <th>Action</th>
           
          </tr>
          <?php
              $customerId=Session::get("customerId");
              $getorderedProdcut=$cart->getorderedProdcut($customerId);
              if ($getorderedProdcut) {
                $sum=0;
                $i=0;
                while ($result=$getorderedProdcut->fetch_assoc()) {
                  $i++;
              ?>
              <tr>
                <td width="5%"><?php echo $i;?></td>
                <td width="15%"><?><?php echo $result['productname'];?></td>
                <td width="10%"><?><?php echo $result['invoice_no'];?></td>
                <td width="10%"><img src="admin/<?php echo $result['image'];?>" height="45px" width="60px" style="margin-top: 0px;"alt=""/></td>
                <td width="10%"><?php echo $result['quantity'];?></td>
                <td width="5%"><?php echo $result['price'];?></td>
                <td width="10%"><?php echo $fm->formatdate($result['date']); ?></td>
                <td width="25%">
                  <?php 
                  if ($result['status']=='0') {
                    echo "Pending";
                  }elseif($result['status']=='1'){?>
                   <a href="?custid=<?php echo $customerId;?>& price=<?php echo $result['price'];?> & date=<?php echo $result['date'];?>">Return Product</a>
                  <?php }else{
                    echo "Returned";
                  }
                  ?>
                </td>
                <?php if ($result['status']=='2') { ?>
                  <td>N/A</td>
                <?php }else{?>
                <td width="10%">
            <a href="?delshiftedpro=<?php echo $result['customerid'];?>& price=<?php echo $result['price'];?> & date=<?php echo $result['date'];?>">X</a>
                </td>
              <?php } ?>
              </tr>
            
            <?php } } ?>  
          

        </table>
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

