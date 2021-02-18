<?php 
include 'inc/header.php';
include 'inc/sidebar.php';
include '../classes/Product.php';
include '../classes/Brand.php';
include '../classes/Category.php';
?>

<?php
    $product=new Product();
        if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
             $insertProduct= $product->insertProduct($_POST, $_FILES);
             $insertStock= $product->insertStock($_POST);
        
    }
?> 
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Product</h2>
        <div class="block">             
        <?php
        if (isset($insertProduct)) {
            echo $insertProduct;
        }
        ?>  
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" name="productname" placeholder="Enter Product Name..." class="medium" />
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
                             <option value="<?php echo $result['catid'];?>"><?php echo $result['catName'];?></option>
                            
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
                             <option value="<?php echo $result['brandid'];?>"><?php echo $result['brandname'];?>
                                 
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
                        <textarea class="tinymce" name="body"></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input type="text" name="price" placeholder="Enter Price..." class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
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
                            <option value="0">Featured</option>
                            <option value="1">General</option>
                            <option value="2">Special</option>
                            <option value="3">Offered</option>
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
                            <option value="0">Available</option>
                            <option value="1">Not Available</option>
                        </select>
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <label>Quantity</label>
                    </td>
                    <td>
                         <input type="number" name="quantity" />
                    </td>
                    </td>
                </tr>
				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Add Product" />
                    </td>
                </tr>
                
            </table>
            </form>
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


<!--
Coded by:
Name:Md.Mahmudul Hasan Robin;
ID:150201043;
Date:23.08.2019;
Last Updated:25.08.2019;
-->