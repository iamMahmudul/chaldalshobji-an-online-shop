<?php include('../classes/AdminLogin.php');?>


<?php

$al=new AdminLogin();
if($_SERVER['REQUEST_METHOD']=='POST'){

$adminUser=$_POST['adminUser'];
$adminPass=md5($_POST['adminPass']);
$loginChk= $al->adminLogin($adminUser,$adminPass);

}
?>



<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<form action="login.php" method="post">
			<h1>Admin Login</h1>
				<span style="color:red;front-size:24px;font-weight: bold;line-height:45px;">
					<?php
						if(isset($loginChk)){
						 echo $loginChk;
					}
					?>
			<div>
				<input type="text" placeholder="Username" name="adminUser"/>
			</div>
			<div>
				<input type="password" placeholder="Password" name="adminPass"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="#">ChalDalShobji.com</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>


<!--
Coded by:
Name:Nazmul Alam Nowfel;
ID:150201043;
Date:24.07.2019;
Last Updated:24.07.2019;
-->
