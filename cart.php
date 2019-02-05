<?php
session_start();
include 'tabs.php';
include 'database.php';
if($_SESSION['logged']==false)
{
	echo  "<script type='text/javascript'>alert('Login first');</script>";
	header("refresh:0.5 ,url=log.php");
}

if(isset($_GET['food_id'])&& !is_null($_SESSION['customer']))
{
	$food_id=$_GET['food_id'];
	$email=$_SESSION['customer'];
	$status=0; //0-added to cart and 1 for confirmed orders
	$order=0;
	$q=mysql_query("SELECT * FROM orders where email='$email' AND foodid='$food_id'");
	$num=mysql_num_rows($q);

if($num==0)
{
	$sql=mysql_query("INSERT into orders(foodid,email,status,orderno) values('$food_id','$email','$status','$order') ");
	// echo $mysql_error($sql);
}
if($num>0)
    {
	$p=mysql_query("UPDATE orders set status='$status' where email='$email' AND foodid='$food_id' ") or die(mysql_error());	
	}
}

	$email=$_SESSION['customer'];
$query=mysql_query("SELECT * FROM orders WHERE email='$email' and status='0'");
$n=mysql_num_rows($query);
?>
<!DOCTYPE html>
<html>
<head>
	<!-- Referencing Online StyleSheets and API's -->
	<style type="text/css">
		.card-img-top 
		{
		    width: 100%;
		    height: 15vw;
		    object-fit: cover;
		}
	</style>
	<title>Cart/foodo</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <meta charset="utf-8">
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
         <li class="breadcrumb-item active" aria-current="page">Cart&nbsp;<i class="fas fa-shopping-cart"></i><span class="badge badge-light"><?php echo $n;?></span></li>
        </ol>
      </nav>
	<?php
	if ($n==0) {?>
		<div class="alert alert-dark" role="alert">
  			<center><p style="font-size:50px;">Your Cart Is Empty</p></center>
		</div>
	<?php
                }?>
    <div class="container">
	<div class="row">
    <?php
	if($n>0)
	{ while($a=mysql_fetch_assoc($query))
		{
			$food_id=$a['foodid'];
{    $qu=mysql_query("SELECT * FROM fitems where food_id='$food_id'");
	while($r=mysql_fetch_assoc($qu))
	{	$img=$r['pic'];
		$name = $r['name'];
		$food = $r['food'];
		?>

		<div class="col-md-4">
			<div class="card mt-5" style="width: 20rem;">
			  <img class="card-img-top" src="resturant/<?=$name?>/<?=$food?>/<?=$img?>" alt="No Image Uploaded">
			  <div class="card-body">
			    <h5 class="card-title"><?=$r['name']?></h5>
			    <p class="card-text"><?=$r['food']."<br>" .$r['descr'];?></p>
			  <ul class="list-group list-group-flush">
			    <li class="list-group-item"><?=$r['address'];?></li>
			    <li class="list-group-item"><?=$r['phone'];?></li>
			    <li class="list-group-item"><?="Rs".$r['price'];?></li>
			  </ul>
			  <br>
			   <a href="removecart.php?food_id=<?=$r['food_id']?>" name="removecart" class="btn btn-danger">Remove</a>
			   <a href="purchase.php?food_id=<?=$r['food_id']?>" class="btn btn-primary">Confirm</a>
			   </div>
			</div>
		</div>
<?php
		}
	}
	} 
}
?>
</div>
<?php
if($n!=0)
{
?>
<div class="pt-5">
	   <p class="text-center"><a href="confirm.php?food_id=<?='-1'?>" class="btn btn-primary" id="" name="confirm" >Confirm All</a></p>
	</div>
	<?php
}
    ?>
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