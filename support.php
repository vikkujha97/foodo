<?php
session_start();
include 'tabs.php';
?>
<!DOCTYPE html>
<html>
<head>
	<!-- Referencing Online StyleSheets and API's -->
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	    <meta name="description" content="">
	    <meta name="author" content="">
	    <link rel="icon" href="../../../../favicon.ico">
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	    <link href="form-validation.css" rel="stylesheet">
	    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<title>Support Page</title>
</head>
<body>
	<nav aria-label="breadcrumb">
		  <ol class="breadcrumb">
		    <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
		  </ol>
		</nav>
		<div class="container">
		<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
		  <div class="carousel-inner">
		    <div class="carousel-item active">
		    	<img class="d-block w-100 rounded" src="support.jpg" alt="First slide" style="width: 200px;height: 350px;">
		    	<div class="carousel-caption d-none d-md-block">
			  		<h1><p class="text-center text-light">We would love to hear from you!</p></h1>
			  	</div>
		    </div>
		</div><br><br><br><br>
		<form>
			<div class="form-group">
			    <label for="exampleInputEmail1">Name</label>
			    <input type="text" class="form-control" id="exampleInputName1" aria-describedby="emailHelp" placeholder="Enter Your Name">
			</div>
		  	<div class="form-group">
		    	<label for="exampleInputEmail1">Email address</label>
		    	<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
		    	<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
		  	</div>
		  	<div class="form-group">
		    	<label for="exampleInputPassword1">Phone No.</label>
		    	<input type="text" class="form-control" id="exampleInputPhone1" placeholder="Phone No.(Optional)">
		    	<small id="emailHelp" class="form-text text-muted">We'll never share your Phone No. with anyone else.</small>
		  	</div>
		  	<div class="form-group">
		    	<label for="exampleFormControlTextarea1">Details</label>
		    	<textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Message*" rows="3"></textarea>
		  	</div>
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
				Submit
			</button>
		</form>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Thank You</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        For Sharing
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
	      </div>
	    </div>
	  </div>
	</div>
</body>
</html>