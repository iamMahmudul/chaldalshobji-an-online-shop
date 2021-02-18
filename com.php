<?php include ('files/header.php');?>
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
          <a href="compare.php" class="list-group-item list-group-item-action active"><i class="fa fa-cog"style="margin: 5px;color: red;"></i>Compared Products</a>
          <a href="wishlist.php" class="list-group-item list-group-item-action"><i class="fa fa-heart" style="margin: 5px;color: red;"></i>Wishlist</a>
          <a href="order.php" class="list-group-item list-group-item-action "><i class="fa fa-list"style="margin: 5px;color: red;"></i>Order List</a>
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
        <table class="table table-striped table-responsive-md">
              <tr>
                <th width="20%">Serial No</th>
                <th width="20%">Product Name</th>
                <th width="20%">Price</th>
                <th width="20%">Image</th>
                <th width="20%">Action</th>
              </tr>
              <?php
              $customerId=Session::get("customerId");
              $getCProdcut=$product->getComparedProduct($customerId);
              if ($getCProdcut) {
    
                $i=0;
                while ($result=$getCProdcut->fetch_assoc()) {
                  $i++;
              ?>
              <tr>
                <td width="20%"><?php echo $i;?></td>
                <td width="20%"><?php echo $result['productname'];?></td>
                
                <td width="20%"><?php echo $result['price'];?></td>
                <td width="20%"><img src="admin/<?php echo $result['image'];?>"  height="45px" width="60px" style="margin-top: 0px;"alt=""/></td>
                <td width="20%"><a href="preview.php?proid=<?php echo $result['productid'];?>">View</a></td>
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

