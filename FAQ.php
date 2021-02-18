<?php include ('files/header.php');?>
<!--Bannersection-->
<section class="categorialproducts">
  <div class="container">
    <div class="row">
      <?php
        $db        =new Database();
        $fm        =new format();
        $product   =new Product();
        $cart        =new Cart();
        $customer    =new Customer();
        $category    =new Category();
        $brand    =new Brand();
      ?>
<div class="col-md-2">
  <div class="total-filter">
     
        <div class="accordion" id="accordionExample">
        <div class="card">
          <div class="card-header" id="headingOne">
            <h2 class="mb-0">
              <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Brand
              </button>
             </h2>
           </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="list-group" style="height:190px;overflow-y: auto;overflow-x: hidden;">
       <div ></div>
       <?php
            $getBrand=$brand->getallbrand();
            if ($getBrand) {
              $i=0;
              while ($result=$getBrand->fetch_assoc()) {
              $i++;
          
            ?>
        <div class="list-group-item checkbox">
          <label><a href="brandwiseproducts.php?brandid=<?php echo $result['brandid'];?>"><?php echo $result['brandname'];?></label></a>
        </div>
      <?php } } ?>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Category
        </button>
      </h2>
    </div>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="list-group" style="height:190px;overflow-y: auto;overflow-x: hidden;">
       <div ></div>
       <?php
            $getCategory=$category->getallcat();
            if ($getCategory) {
              $i=0;
              while ($result=$getCategory->fetch_assoc()) {
              $i++;
          
            ?>
        <div class="list-group-item checkbox">
         <label>
          <a href="categorialproducts.php?catid=<?php echo $result['catid'];?>"><?php echo $result['catName'];?></label></a>
        </div>
        <?php } } ?>
      </div>
    </div>
  </div>
</div>
</div>
</div>




      <div class="col-md-10">
        
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

