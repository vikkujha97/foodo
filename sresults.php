<?php
session_start();
include 'database.php';
include 'tabs.php';

if ($_SESSION['logged']==true) {
	$email=$_SESSION['customer'];
	}

	$search=$_GET['stext'];
    	$query=mysql_query("SELECT * FROM fitems WHERE name like '%$search%' or food like '%$search%'");
    	$i=mysql_num_rows($query);
		?>		
		<!DOCTYPE html>
		<html>
		<head>
			<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		    <meta charset="utf-8">
		    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		    <meta name="description" content="">
		    <meta name="author" content="">
		    <link rel="icon" href="../../../../favicon.ico">
		    <!-- <link href="../../dist/css/bootstrap.min.css" rel="stylesheet"> -->
		    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		    <link href="form-validation.css" rel="stylesheet">
		    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
			<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
			<title></title>
		</head>
			<body>
			<div class="container">
			<div class="row">
			<?php
		while($row=mysql_fetch_assoc($query))
		{
          $img=$row['pic'];
		  $name = $row['name'];
		  $food = $row['food'];
		?>
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
							<a href="cart.php?food_id=<?=$row['food_id']?>" name="addcart" class="btn btn-primary">Add to Cart</a>
							<a href="purchase.php?food_id=<?=$row['food_id']?>" class="btn btn-primary" >Order Now</a>
						</div>
					</div>
				</div>
				<?php
			}
			if ($i==0) {?>
				<div class="alert alert-dark" role="alert">
  			<center><p style="font-size:50px;">No Search Result Found</p></center>
		</div>
	</div>
</div>
		
				
			<?php

		}
?>
</body>
		</html>