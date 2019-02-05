<?php
include 'database.php';
session_start();
if(isset($_SESSION['customer']))
	 $user=$_SESSION['customer'];
	else
		$user=$_SESSION['resturant'];
	if($_SESSION['logged']==true && isset($_GET['logout'])){
		$_SESSION['logged']=false;
		
		if(isset($_SESSION['customer'])) $_SESSION['customer']=null;
		else $_SESSION['resturant']=null;
		
		header("Location: index.php");
	}
	
	$_GET['logout']=null;

?>
<!DOCTYPE html>
<html>
	<head>
	</head>
	<body>
		<p class="text-light" style="top:-40px; left:0; margin-right:10px;">Hi, <?php echo $user; ?></p>
		<a class="btn btn-secondary" href="?logout=1" role="button">LogOut</a>
		<!-- <input type="button" onclick='location.href="?logout=1"' class="btn btn-secondary" value="LogOut" /> -->
	</body>
</html>