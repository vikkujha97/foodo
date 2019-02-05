<?php
session_start();
include 'database.php';
include 'tabs.php';

$email=$_SESSION['customer'];	
// print_r($email);
$query=mysql_query("SELECT * FROM orders WHERE email='$email' and orderno='1'");
$num=mysql_num_rows($query);
// print_r($num);
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
         <li class="breadcrumb-item active" aria-current="page">Order history&nbsp;<i class="fas fa-shopping-cart"></i><span class="badge badge-light"><?php echo $n;?></span></li>
        </ol>
      </nav>
      <?php
	if ($num==0) {
		?>
		<div class="alert alert-dark" role="alert">
  			<center><p style="font-size:50px;">Your order history Is Empty</p></center>
		</div>
		<?php
                }?>
        <div class="container">
	<div class="row">
    <?php
	if($num>0)
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
			  Your order was Successful
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





