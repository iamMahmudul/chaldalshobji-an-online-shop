<?php include ('files/header.php');?>
<?php
if (!isset($_GET['catid'])|| $_GET['catid']==NULL) {
    echo "<script>window.location='404.php'</script>";
}else{
    $id=$_GET['catid'];
}
?>
<!--Bannersection-->
<section class="categorialproducts">
  <div class="container">
    <div class="row">
      <?php include('filteringproducts.php') ?>
      <div class="col-md-10">
        <div class="productshead">
          <a href="index.php"><span style="font-size: 15px;border-radius: 50px;background:transparent;margin: 5px;padding: 10px;border: 2px solid #EABEBE;">CD</span>ChalDalShobji</a>
          <h1>Quality and Freshness Guaranteed!</h1>
        </div>
 

    <div class="row text-center" style="margin-top: 0px;">
      <?php
       $productsbycat=$product->getProductsByCat($id);
       if ($productsbycat) {
         while ($result=$productsbycat->fetch_assoc()) {
         ?>

          <div class="col-md-3" style="margin-left: 0px;">
              <div class="detproducts">
              <div class="cimage">
                <a href="preview.php?proid=<?php echo $result['productid'];?>"><img src="admin/<?php echo $result['image'];?>"></a>
               </div>
              <div class="cdetails">
             <h3><?php echo $result['productname']; ?></h3>
            <!--<h4><span style="font-weight: bold;">Category:</span><?php echo $result['catName']; ?></h4>-->
             <h5><span style="font-weight: bold;">Price:</span><?php echo $result['price']; ?></h5>
            <p>Available in ST</p>
            <br>
             <a href="preview.php?proid=<?php echo $result['productid'];?>">Add to Cart</a>
             
                </div>
              </div>
            </div>

          <?php } }?>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="demoimg">
  <img src="images/demo.png">
  <hr>
</section>





<?php include ('contact.php');?>
<?php include ('files/footer.php');?>
<!--
Coded by:
Name:Md.Mahmudul Hasan Robin;
ID:150201043;
Date:24.07.2019;
Last Updated:15.08.2019;
-->

