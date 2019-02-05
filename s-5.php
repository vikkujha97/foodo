<?php
session_start();

include 'database.php';
//include'logout.php';
if ($_SESSION['logged']==true&& !is_null($_SESSION['resturant']))
 {
 	$email=$_SESSION['resturant'];
 	$q=mysql_query("select * from fitems where email='$email' order by food ASC");
	
}
else
{
	$q=mysql_query("select * from fitems order by food ASC");
}
$num=mysql_num_rows($q);

?>
<!DOCTYPE html>
<html>
<head>
	<!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.css"> -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="../../../../favicon.ico">
     
    <!-- <link href="../../dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="form-validation.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  	<style type="text/css">
			div.menu{
				width:50%;
				position:relative;
				top:40px;
				height:300px;
				left: 350px;
				
				margin:15px;
				z-index:-1;
				
				overflow:hidden;
		}</style>

</head>

<body >
<?php
if($num>0)
{
	while($row=mysql_fetch_assoc($q))
	{?>
		<div class="menu">
			<?php 
			$img=$row['pic'];
			$name=$row['name'];$food=$row['food'];
            // print_r($img);
			if(!empty($img))
			{
				echo "<img src='resturant/$name/$food/$img' height='250' width='250' class='img-rounded' style='position:relative;top:0px;left:50px;'>" ;echo "<br>";
			}
			?>
			<h1 style="position: relative;top:-250px;left:350px;"><?php echo $row['name'];?></h1>
			<h1 style="position: relative;top:-268px;left: 350px;"><?php echo $row['address']."<br>";?></h1>
			<h2 style="position: relative;top:-275px;left: 350px;"><?php echo $row['food']."<br>";?></h2>
			
			<button type="button" class="btn btn-primary" style="position: relative;top:-280px;left:350px;">Add to Cart</button>
			<a href="offer.php" class="btn" style="position: relative;top:-280px;left:350px;">Order Now</a>
			<h3 style="position: relative;top:-280px;left: 400px;"><?php echo "Rs".$row['price']."<br>";?></h3></div>
			<?php
			echo "<br><br><br><br>";
			}

	} 
?></br>	
			<div class="card w-75">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="#" class="btn btn-primary">Button</a>
  </div>
</div>

<div class="card w-50">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="#" class="btn btn-primary">Button</a>
  </div>
</div>
		


	<script type="text/javascript">
		// $(document).ready(function(){
		// 	$('.purchase').on('click', function(){
		// 		console.log("Clicked");
		// 		var x = $(this);
		// 		console.log(x);
		// 	});
		// });
	// function purchase(food)
	// {	console.log("Clicked");
	// 	var id= food.class;

	// 	console.log(food);

	// 	// window.location='/purchase.php?food='+food;
	// }
</script>
</body>
</html>