<?php include ('files/header.php');?>
<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$livesearch=$_POST['livesearch'];
        $livesearch= $search->livesearch($livesearch);
       }
?>