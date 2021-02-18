<?php
  $db        = new Database();
  $fm        = new format();
  $product   = new Product();
  $cart      = new Cart();
  $customer  = new Customer();
  $category  = new Category();
  $brand     = new Brand();
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




