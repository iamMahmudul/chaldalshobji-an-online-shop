<?php include ('files/header.php');?>
<div class="container">
    <div class="title">
      <h1>Categories</h1>
    </div>
    <br>
    <div class="row text-center mt-2" style="background: #fff;">
      <?php
        $getallcategories=$category->getallcat();
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
<?php include ('files/footer.php');?>