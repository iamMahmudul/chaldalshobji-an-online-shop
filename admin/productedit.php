<!--
Coded by:
Name:Md.Mahmudul Hasan Robin;
ID:150201043;
Date:23.08.2019;
Last Updated:25.08.2019;
-->
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include('../classes/Product.php')?>
<?php include('../classes/Brand.php')?>
<?php include('../classes/Category.php')?>

<?php
if (!isset($_GET['productid'])|| $_GET['productid']==NULL) {
    echo "<script>window.location='productlist.php'</script>";
}else{
    $id=$_GET['productid'];
}
?>

<?php
    $product=new Product();
    
        if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
             $updateProduct= $product->updateProduct($_POST, $_FILES,$id);
             $insertStock= $product->insertStock($_POST);
        
        }
    ?> 
<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Products</h2>
        <div class="block">   

        <?php
        if (isset($updateProduct)) {
            echo $updateProduct;
        }
        ?>

        <?php
            $getproducts=$product->getProductsById($id);
             if ($getproducts) {
                while ($value=$getproducts->fetch_assoc()) {
               
        ?>

         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" name="productname" value="<?php echo $value['productname']; ?>" class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                        <select id="select" name="catid">
                           
                            <?php
                             $category=new Category();
                             $getCategory=$category->getallcat();
                             if ($getCategory) {
                                while( $result=$getCategory->fetch_assoc()){
                            ?>
                             <option 
                             <?php
                                if ($value['catid']==$result['catid']) { ?>
                                    selected="selected"
                                
                                <?php } ?>
                                
                                value="<?php echo $result['catid'];?>"><?php echo $result['catName'];?>
                                    
                                </option>
                            
                             <?php } } ?>
                        
                        </select>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Brand</label>
                    </td>
                    <td>
                        <select id="select" name="brandid">
                        
                        <?php
                             $brand=new Brand();
                             $getBrand=$brand->getallbrand();
                             if ($getBrand) {
                                while( $result=$getBrand->fetch_assoc()){
                            ?>
                        <option 
                             <?php
                                if ($value['brandid']==$result['brandid']) { ?>
                                    selected="selected"
                                
                                <?php } ?>
                                
                                value="<?php echo $result['brandid'];?>"><?php echo $result['brandname'];?>
                                    
                                </option>
                            
                             <?php } } ?>

                        </select>
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="body">
                        
                            <?php echo $value['body']; ?>
                                
                        </textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input type="text" name="price" value="<?php echo $value['price']; ?>" class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <img src="<?php echo $value['image'];?>" height="105px" width="170px" style="margin-top: 30px;">
                        <input type="file" name="image" />
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Product Type</label>
                    </td>
                    <td>
                        <select id="select" name="type">
                            <option>Select Type</option>
                           
                            <?php  if ($value['type']==0) {?>
                                <option selected="selected" value="0">Featured</option>
                                <option value="1">General</option>
                                <option value="2">Special</option>
                                <option value="3">Offered</option>

                            <?php } else if ($value['type']==1){ ?>  

                            <option value="0">Featured</option>
                            <option selected="selected" value="1">General</option>
                            <option value="2">Special</option>
                            <option value="3">Offered</option>
                            <?php } else if ($value['type']==2) { ?> 
                            <option value="0">Featured</option>
                            <option value="1">General</option>
                            <option  selected="selected"value="2">Special</option>
                            <option value="3">Offered</option>
                             <?php } else  { ?>  
                            <option value="0">Featured</option>
                            <option value="1">General</option>
                            <option value="2">Special</option>
                            <option  selected="selected" value="3">Offered</option>
                        <?php } ?>
                        </select>
                    </td>
                </tr>
                 <tr>
                    <td>
                        <label>Availability Status</label>
                    </td>
                    <td>
                        <select id="select" name="status">
                            <option>Select Type</option>
                            <?php  if ($value['status']==0) {?>
                            <option selected="selected" value="0">Available</option>
                            <option value="1">Not Available</option>
                            <?php } else  { ?>  
                            <option value="0">Available</option>
                            <option selected="selected" value="1">Not Available</option>
                            
                        <?php } ?>
                        </select>
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <label>Quantity</label>
                    </td>
                    <td>
                         <input type="number" name="quantity" value="<?php echo $value['quantity']; ?>" />
                    </td>
                    </td>
                </tr>
				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
            </table>
            </form>

        <?php } } ?>
        
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


