<?php
session_start();
include'database.php';
include'tabs.php';
$email=$_SESSION['customer'];
$food_id=$_GET['food_id'];
if($food_id==-1)
{
  $query=mysql_query("UPDATE orders set status='1',orderno='1' where email='$email'and status='0'");
}
else
$query=mysql_query("UPDATE orders set status='1',orderno='1' where email='$email' and foodid='$food_id'");
?>
<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		.body{font-family: "Times New Roman", Times, sans-serif;
		top: 250px;

		}
	</style>
	<title>confirmed order/foodo</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>
	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="cart.php">Cart&nbsp;<i class="fas fa-shopping-cart"></i><span class="badge badge-light"><?php echo $n;?></span></a></li>
	    <li class="breadcrumb-item"><a href="#">Purchase</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Order Confirmed</li>
	  </ol>
	</nav>
	<div class="container">
<h3><p class="text-center" style="padding-top: 100px"><i>HAVE A FOOD DAY</i></p></h3>
<p class="text-center" style="padding-top: 50px"><a href="index.php" class="btn btn-primary">Continue Ordering</a></p>
      <!-- Footer -->
      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2018-2019 Foodo</p>
        <ul class="list-inline">
          <li class="list-inline-item"><a href="privacy.php">Privacy</a></li>
          <li class="list-inline-item"><a href="about.php">About</a></li>
          <li class="list-inline-item"><a href="support.php">Support</a></li>
        </ul>
        <i class="fab fa-facebook-f"></i>&nbsp;&nbsp;&nbsp;
	    <i class="fab fa-instagram">&nbsp;&nbsp;&nbsp;
	    </i><i class="fab fa-twitter"></i>
      </footer>
    </div>
</body>
</html>