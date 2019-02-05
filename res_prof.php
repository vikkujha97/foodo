<?php
session_start();
// include 'header.php';
include'database.php';
if($_SESSION['logged']==true)
include'logout.php';
$email=$_SESSION['resturant'];
//extract($_POST);
if (isset($_POST['post_food'])&&$_SESSION['logged']==true) {
$name=$_POST['name'];
$food=$_POST['food'];
$phone=$_POST['phone'];
$address=$_POST['address'];
$description=$_POST['description'];
$price=$_POST['price'];
$foodpic=$_FILES['pic']['name'];
 if(!empty($foodpic)){
    $temp=$_FILES['pic']['tmp_name'];
    print_r($foodpic);
print_r($_FILES['pic']['error']);
$query=mysql_query("INSERT INTO fitems(name,food,phone,address,descr,price,email,pic) VALUES('$name','$food','$phone','$address','$description','$price','$email','$foodpic')");
print_r($query);
if($query)
{
   $dir="./resturant/$name/$food/";
  mkdir($dir,0777,true);
  move_uploaded_file($temp,"./resturant/$name/$food/$foodpic");
  echo "posted successfully";
}
else
  {echo "failed";}
}}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Referencing Online StyleSheets and API's -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="form-validation.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>foodo/resturant/profile</title>
    <link href="form-validation.css" rel="stylesheet">
  </head>
  <body class="bg-light">
    <div class="container">
      <div class="py-5 text-center">
        <h2>FOOD DETAILS</h2>
        <p class="lead">Some information</p>
      </div>
      <div class="row">
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Restaurant information</h4>
          <form class="needs-validation" novalidate method="post"  enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'];?>">
            <div class="mb-3">
              <label for="firstName">Name</label>
              <input type="text" class="form-control" id="firstName" name="name" placeholder="" value="" required>
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>
            <div>
              <div class="mb-3">
                <label for="firstName">Food</label>
                <input type="text" class="form-control" id="firstName" name="food" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid food name is required.
                </div>
              </div>
            </div>
            <div class="mb-3">
              <label for="email">Phone No.</label>
              <input type="text" class="form-control" id="phone" name="phone" placeholder="+911234567890">
              <div class="invalid-feedback">
                Please enter a valid Phone No..
              </div>
            </div>
            <div class="mb-3">
              <label for="address">Address</label>
              <input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St" required>
              <div class="invalid-feedback">
                Please enter your address.
              </div>
            </div>
            <div class="mb-3">
              <label for="address2">food description <span class="text-muted">(Optional)</span></label>
              <input type="text" class="form-control" id="address2" name="description" placeholder="enter food details">
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="cc-name">Price</label>
                <input type="text" class="form-control" id="price" name="price" placeholder="" required>
                <div class="invalid-feedback">
                  Enter valid price.
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
            <div class="input-group-prepend">
            <!-- <span class="input-group-text" id="inputGroupFileAddon01">Upload</span> -->
            </div>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="pic" id="upl_file" accept="image/*">
              <label class="custom-file-label" for="inputGroupFile01">Please Select the File</label>
            </div>
          </div>
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" name="post_food" type="submit">Post</button><br>
            <a class="btn btn-primary" href="index.php" role="button" style="padding-top: 10px;">Home</a>
          </form>
        </div>
      </div>
      <!-- Footer -->
      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2017-2018 Foodo</p>
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
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';
        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');

          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>
  </body>
</html>
