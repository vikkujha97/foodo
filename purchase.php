<?php
session_start();
include 'database.php';
include 'tabs.php';
$email=$_SESSION['customer'];
$food_id=$_GET['food_id'];

if($_SESSION['logged']==true)
{
$query=mysql_query("SELECT * FROM fitems where food_id='$food_id'");
$row=mysql_fetch_assoc($query);
if(mysql_num_rows(mysql_query("SELECT * FROM orders where email='$email' and foodid='$food_id'"))==0)
{
mysql_query("INSERT INTO `orders`(`foodid`, email, status, orderno) VALUES('$food_id', '$email', '1', '1') ");
}
else
{
  mysql_query("UPDATE `orders` set status='1',orderno='1' where email='$email' and foodid='$food_id' ");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>orders/foodo</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">
     
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="form-validation.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="cart.php">Cart&nbsp;<i class="fas fa-shopping-cart"></i><span class="badge badge-light"><?php echo $n;?></span></a></li>
        <li class="breadcrumb-item active" aria-current="page">Purchase</li>
      </ol>
    </nav>
	<?php
	$img=$row['pic'];
    $name = $row['name'];
    $food = $row['food'];
		?>
    <div class="container">
      <div class="row">
<div class="card mt-5" style="width: 20rem;">
  <img class="card-img-top" src="resturant/<?=$name?>/<?=$food?>/<?=$img?>" height="250" width="" alt="No Image Uploaded">
  <div class="card-body">
    <h5 class="card-title"><?=$row['name']?></h5>
    <p class="card-text"><?=$row['food']."<br>"	.$row['descr'];?></p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><?=$row['address'];?></li>
    <li class="list-group-item"><?=$row['phone'];?></li>
    <li class="list-group-item"><?="Rs".$row['price'];?></li>
  </ul>
  
   <a href="confirm.php?food_id=<?=$row['food_id']?>" class="btn btn-primary" id="" name="confirm" >Confirm order</a>
  </div>
</div>
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
<<?php 
}
else echo  "<script type='text/javascript'>alert('Login first');</script>";
header('refresh:01,url=index.php');
  ?>
</body>
</html>