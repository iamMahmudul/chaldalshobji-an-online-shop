<?php include ('files/header.php');?>
<br>
<br>
<?php
  if(!isset($_GET['livesearch']) || $_GET['livesearch']==NULL){
  header("Location:404.php");
  }
  else{
    $livesearch=$_GET['livesearch'];
  }
?>

<!--<section class="displayedproducts">
  <div class="container">
    <div class="title">
      <br>
      <h1>Search Results</h1>
     </div>
        <div class="row" style="margin-top: 0px;">
          <?php 
      
      $query  ="select * from products_table where productname like '%$livesearch%'   or body like '%$livesearch%'   ";
            $getdata= $db->select($query);
            if($getdata){
              while($result=$getdata->fetch_assoc()){
           ?>
          
            <div class="col-md-3 col-sm-6 col-xs-6"style="margin-top:10px;">
              <div class="dispproducts">
              <div class="cimage">
                <a href="preview.php?proid=<?php echo $result['productid'];?>"><img src="admin/<?php echo $result['image'];?>"></a>
               </div>
              <div class="cdetails">
              <h3><?php echo $result['productname'];?></h3>
              <h5><span style="font-weight: bold;">Price:</span><?php echo $result['price'];?>Tk</h5>
              <p>Available in ST</p>
             <a href="preview.php?proid=<?php echo $result['productid'];?>">Add to Cart</a>
                </div>
              </div>
            </div>
           <?php } } else{

            header("Location:404.php");

           }?>

       </div>
      
        
       <br>
       <br>
  </div>
</section>
-->
<section class="categorialproducts">
  <div class="container">
    <div class="row">
      <?php include('filteringproducts.php') ?>
      <div class="col-md-10">
        <!--<div class="productshead">
          <a href="index.php"><span style="font-size: 15px;border-radius: 50px;background:transparent;margin: 5px;padding: 10px;border: 2px solid #EABEBE;">CD</span>ChalDalShobji</a>
          <h1>Quality and Freshness Guaranteed!</h1>
        </div>-->
 <div class="title2">
      <br>
      <h1>Search Results for <?php echo "'".$livesearch."'" ;?></h1>
     </div>

    <div class="row text-center" style="margin-top: 0px;">
    <?php 
    $query  ="select * from products_table where productname like '%$livesearch%'   or body like '%$livesearch%'    ";
            $getdata= $db->select($query);
            if($getdata){
              while($result=$getdata->fetch_assoc()){
           ?>

          <div class="col-md-3" style="margin-left: 0px;">
              <div class="detproducts">
              <div class="cimage">
                <a href="preview.php?proid=<?php echo $result['productid'];?>"><img src="admin/<?php echo $result['image'];?>"></a>
               </div>
              <div class="cdetails">
             <h3><?php echo $result['productname']; ?></h3>
            <!-- <h4><span style="font-weight: bold;">Category:</span><?php echo $result['catName']; ?></h4>-->
             <h5><span style="font-weight: bold;">Price:</span><?php echo $result['price']; ?></h5>
            <p><?php
            if ($result['status']==0) {
              echo "Available in ST";
             } else{
              echo "Not Available in ST";
             }
            ?></p>
            <br>
             <a href="preview.php?proid=<?php echo $result['productid'];?>">Add to Cart</a>
             
                </div>
              </div>
            </div>

         <?php } } else{

            header("Location:404.php");

           }?>
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
