<?php include ('files/header.php');?>
<!--Bannersection-->
<section class="categorialproducts">
  <div class="container">
    <div class="row">
      <?php include('filteringproducts.php') ?>
      <div class="col-md-10">
        <div class="productshead">
          <a href="index.php"><span style="font-size: 15px;border-radius: 50px;background:transparent;margin: 5px;padding: 10px;border: 2px solid #EABEBE;">CD</span>চালডালসবজি</a>
          <h1>
একটি বিশ্বস্ততার প্রতীক!</h1>
        </div>
 
    <div id="product_loading">    
    <div class="row text-center" style="margin-top: 0px;">
      <?php
        $getdetailedProducts=$product->getdetailedProducts();
        if ($getdetailedProducts) {
          while ($result=$getdetailedProducts->fetch_assoc()) {
        ?>

          <div class="col-md-3 col-sm-6" style="margin-left: 0px;">
              <div class="detproducts">
              <div class="cimage">
                <a href="preview.php?proid=<?php echo $result['productid'];?>"><img src="admin/<?php echo $result['image'];?>"></a>
               </div>
              <div class="cdetails">
             <h3><?php echo $result['productname']; ?></h3>
            <!-- <h4><span style="font-weight: bold;">Category:</span><?php echo $result['catName']; ?></h4>-->
             <h5><span style="font-weight: bold;">Price: BDT </span><?php echo $result['price']; ?></h5>
             <div class="available">
              <!-- <h5><span style="font-weight: bold;">Items Available:</span>
                <?php echo $result['quantity']; ?>

              </h5>-->
             </div>
            <p>Available in ST</p>
            <br>
             <!--<a href="preview.php?proid=<?php echo $result['productid'];?>">Add to Cart</a>-->
             

                </div>
              </div>
            </div>

          <?php } }?>
        </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="demoimg">
  <img src="images/demo.png">
  <hr>
</section>


<script>
$(document).ready(function(){
  $('#min_price').change(function(){
    var price=$(this).val();
    $("#price_range").text("Products under price TK. "+price);
 
  $.ajax({
    url:"load_product.php",
    method:"POST",
    data:{price:price},
    success:function(data){
      $("#product_loading").fadeIn(500).html(data);
    }
  });
 });
});
</script>


<?php include ('contact.php');?>
<?php include ('files/footer.php');?>
<!--
Coded by:
Name:Md.Mahmudul Hasan Robin;
ID:150201043;
Date:24.07.2019;
Last Updated:15.08.2019;
-->

