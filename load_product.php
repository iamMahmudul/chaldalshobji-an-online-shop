<?php 
include 'library/Database.php'; 
$db=new Database();
?>
<?php
if (isset($_POST["price"])) {
	$output='';
	$query="select * from products_table where price <=".$_POST['price']." order by price desc";

	$post=$db->select($query);
	if($post){
	while($result=$post->fetch_assoc()){
		$output .='<div class="col-md-3 col-sm-6 text-center">
              <div class="detproducts">
              <div class="cimage">
                <a href=""><img src="admin/'.$result["image"].'"></a>
               </div>
              <div class="cdetails">
             <h3>'.$result["productname"].'</h3>
             <h5>
             <span style="font-weight: bold;">Price:</span>'.$result["price"].'
             </h5>
            <p>Available in ST</p>
            <br>
             
             
                </div>
              </div>
            </div>';
		}
	}else{
		$output="No Products Found!";
	}
	echo $output;
}
?>