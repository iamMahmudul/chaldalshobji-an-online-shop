<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "chaldalshobji");
$request = mysqli_real_escape_string($connect, $_POST["query"]);


$output='';
$query = "SELECT * FROM products_table WHERE productname LIKE '%".$_POST["search"]."%'";

$result = mysqli_query($connect, $query);

if(mysqli_num_rows($result) > 0)
{
 while($row = mysqli_fetch_array($result))
 {
 	$output.='


 	 <h3>'.$row["productname"].'</h3>


 	';
 }
 echo $output;
}else{
	echo "Data Not Found";
}

?>