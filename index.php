<?php include ('files/header.php');?>





<section class="navsection">
<div class="bd-example">
  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <a href="index.php"><img src="images/slider1.jpg" class="d-block w-100" alt="..."></a>

      </div>
      <div class="carousel-item">
        <a href="index.php"><img src="images/slider2.jpg" class="d-block w-100" alt="..."></a>

      </div>

    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
</section>


<section class="catlist">
  <div class="container">
    <div class="title">
      <h1>Categories</h1>
    </div>
    <br>
    <div class="row text-center mt-2" style="background: #fff;">
      <?php
        $getallcategories=$category->getallcategories();
        if ($getallcategories) {
          while ($result=$getallcategories->fetch_assoc()) {
        ?>
      <div class="col-md-2 col-sm-6 col-xs-6 center-responsive" style="border-bottom:1px solid #ddd;border-right: 1px solid #ddd;">
        <div class="cat">
          <a href="categorialproducts.php?catid=<?php echo $result['catid'];?>"><img src="admin/<?php echo $result['image'];?>" class=""></a>
          <p><?php echo $result['catName'];?></p>
        </div>
      </div>
       <?php } } ?>
    </div>
  </div>
  <br>
<br>
<div class="productsoffered text-center">
            <a href="allcategories.php">View More Categories</a>
         </div>
</section>


<br>
<br>

<section class="homeproducts">

  <div class="container">
      <div class="title">
      <h1>Offeres Available</h1>
     </div>
    <br>

  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
     <div class="row text-center" style="margin-left: 30px;margin-right: 30px;background: #fff;">
      <?php
        $getofferedproducts=$product->getOfferedProducts();
        if ($getofferedproducts) {
          while ($result=$getofferedproducts->fetch_assoc()) {
        ?>
     <div class="col-md-3 col-sm-6 offeredP" style="border:1px solid #ddd;">
        <div class="pimage">
          <a href="preview.php?proid=<?php echo $result['productid'];?>"><img src="admin/<?php echo $result['image']; ?>"></a>
        </div>
        <div class="pdetails">
          <h3><?php echo $result['productname']; ?></h3>
          <h4><span style="font-weight: bold;">Category:</span><?php echo $result['catName']; ?></h4>
          <h5><span style="font-weight: bold;">Price:</span><?php echo $result['price']; ?></h5>
          <p>Available in ST</p>
           <div class="available">
               <!--<h5><span style="font-weight: bold;">Items Available:</span><?php echo $result['quantity']; ?></h5>-->
             </div>
            
             <!--<a href="preview.php?proid=<?php echo $result['productid'];?>">Add to Cart</a>-->
          </div>
        
        </div>
        <?php } } ?>
    </div>
    <div class="productsoffered text-center">
      <a href="offeredproducts.php">View All Offered Products</a>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  </div>
</div>
</div>

<br>
<br>
</section>
<section class="advertisement">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="advimage">
         <a href=""><img src="images/slider3.jpg"></a>
        </div>
      </div>
       <div class="col-md-6">
        <div class="advimage2">
          <a href=""><img src="images/slider4.jpg"></a>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="displayedproducts">
  
  <div class="container">
    <div class="title">
      <br>
      <h1>Products Available</h1>
     </div>
        <div class="row text-center" style="margin-top: 0px;">
          <?php
          $getproducts=$product->getallProducts();
            if ($getproducts) {
            while ($result=$getproducts->fetch_assoc()) {
          ?>
            <div class="col-md-3 col-sm-6 col-xs-6"style="margin-top:10px;">
              <div class="dispproducts">
              <div class="cimage">
                <a href="preview.php?proid=<?php echo $result['productid'];?>"><img src="admin/<?php echo $result['image'];?>"></a>
               </div>
              <div class="cdetails">
              <h3><?php echo $result['productname'];?></h3>
              <h5><span style="font-weight: bold;">Price:</span><?php echo $result['price'];?>Tk</h5>
               <div class="available">
               <h5><span style="font-weight: bold;">Items Available:</span><?php echo $result['quantity']; ?></h5>
             </div>
              <p>Available in ST</p>
              <br>
             <a href="preview.php?proid=<?php echo $result['productid'];?>">Add to Cart</a>
                </div>
              </div>
            </div>
           <?php } } ?>
       </div>
      
         <div class="productsoffered text-center">
            <a href="allproducts.php">Load More Products</a>
         </div>
       <br>
       <br>
  </div>
</section>
<section class="demoimg">
  <img src="images/demo.png">
  <hr>
</section>


<!--Bannersection-->

<?php include ('contact.php');?>
<?php include ('files/footer.php');?>

<!--
Coded by:
Name:Md.Mahmudul Hasan Robin;
ID:150201043;
Date:24.07.2019;
Last Updated:15.08.2019;
-->
