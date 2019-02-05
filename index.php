<?php
session_start();
include 'tabs.php';
include 'database.php';

if ($_SESSION['logged']==true&& !is_null($_SESSION['resturant']))
 {
 	$email=$_SESSION['resturant'];
 	$q=mysql_query("SELECT * from fitems where email='$email' order by food ASC");
	
}
else
{
	$q=mysql_query("SELECT * from fitems order by food ASC");
}
$num=mysql_num_rows($q);

	?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<style type="text/css">
				.card-img-top 
				{
				    width: 100%;
				    height: 15vw;
				    object-fit: cover;
				}
				.offer2
				{
				    -webkit-transform:rotate(340deg);
					-moz-transform: rotate(340deg);
					-ms-transform: rotate(340deg);
					-o-transform: rotate(340deg);
					transform: rotate(340deg);
				}

			</style>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	    <meta name="description" content="">
	    <meta name="author" content="">
	    <link rel="icon" href="../../../../favicon.ico">
	    <!-- Referencing Online StyleSheets and API's -->
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	    <link href="form-validation.css" rel="stylesheet">
	    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<title>foodo</title>
	</head>
	<body>

		<!-- BootStrap Breadcrumb -->
		<nav aria-label="breadcrumb">
		  <ol class="breadcrumb">
		    <li class="breadcrumb-item active" aria-current="page">Home</li>
		  </ol>
		</nav>
		<div class="container">
		</br>

		<!-- Search Bar -->
		<div id="search" class="inline" style="z-index: -1;">
			<form  action="sresults.php" method="get">
				<label for="search"></label>
		    	<form class="form-inline my-2 my-lg-0 " method="get" action="sresults.php">
			      <input type="search" class="form-control mr-sm-2" type="search" style="width: 85%;height: 50px;display: inline;" id="search"  placeholder="Search Resturants or Food" name="stext">
			      <button  class="btn btn-outline-success my-2 my-sm-0" type="submit" action="sresults.php" style="width: 10%;height: 50px" name="submit">Search</button>
		    	</form>
			</form>
		</div>
		<br>
		<!-- BootStrap Carusel -->
		<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
		  <div class="carousel-inner">
		    <div class="carousel-item active">
		    	<img class="d-block w-100" src="http://www.clubnoor.com/uploads/recipes/7e20d8583a374b1490b859b8223f373e.png" alt="First slide" style="width: 200px;height: 450px;">
		    	<div class="carousel-caption d-none d-md-block">
			  		<img src="https://www.vpncompare.co.uk/wp-content/uploads/2017/07/50-percent-off.png" style="width: 200px;">
			  		<h3><p class="text-center text-light bg-dark"">Hurry!! Order Now and Get <strong>50% OFF</strong></p></h3>
			  	</div>
		    </div>
		    <div class="carousel-item">
		      <img class="d-block w-100" src="https://www.messforless.net/wp-content/uploads/2018/01/2-ingredient-pizza-dough-weight-watchers-9.jpg" alt="Second slide" style="height: 450px;">
			    <div class="carousel-caption d-none d-md-block">
				  	<img class="offer2" src="offer2.png" style="width: 200px;">
				  	<h3><p class="text-center text-light bg-dark"">Avail The Special Offer<strong>BUY 1 AND GET 1 FREE</strong></p></h3>
				</div>
		    </div>
		    <div class="carousel-item">
		      <img class="d-block w-100" src="https://assets.limetray.com/assets/image_manager/uploads/1672/Whopper-99.jpg" alt="Third slide" style="height: 450px;">
			    <div class="carousel-caption d-none d-md-block">
				  	<h3><p class="text-center text-light bg-dark""><strong>EXCLUSIVE OFFER</strong></p></h3>
				</div>
		    </div>
		  </div>
		  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
		    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		    <span class="sr-only">Previous</span>
		  </a>
		  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
		    <span class="carousel-control-next-icon" aria-hidden="true"></span>
		    <span class="sr-only">Next</span>
		  </a>
		</div>
		</div>

		<div class="container">
			<div class="row">
				<!-- Fetching The Food Items -->
				<?php
				if($num>0)
				{
					while($row=mysql_fetch_assoc($q))
					{	$img=$row['pic'];
						$name = $row['name'];
						$food = $row['food'];
				?>
				<!-- BootStrap Cards For Displaying Data -->
				<div class="col-md-4">
					<div class="card mt-5" style="width: 18rem;">
						<img class="card-img-top" src="resturant/<?=$name?>/<?=$food?>/<?=$img?>" alt="No Image Uploaded">
						<div class="card-body">
							<h5 class="card-title"><?=$row['name']?></h5>
							<p class="card-text"><?=$row['food']."<br>"	.$row['descr'];?></p>  
							<ul class="list-group list-group-flush">
							    <li class="list-group-item"><?=$row['address'];?></li>
							    <li class="list-group-item"><?=$row['phone'];?></li>
							    <li class="list-group-item"><?="Rs".$row['price'];?></li>
							</ul>
						 	<br>
							<a href="cart.php?food_id=<?=$row['food_id']?>" name="addcart" class="btn btn-danger">Add to Cart</a>
							<a href="purchase.php?food_id=<?=$row['food_id']?>" class="btn btn-primary" >Order Now</a>
						</div>
					</div>
				</div>
				<?php  
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
	<script type="text/javascript">
	</script>
</html>