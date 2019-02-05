  <?php
session_start();
include'database.php';
include'tabs.php';
if($_SESSION['logged']==true && is_null($_SESSION['customer'])==false)
{
  $email=$_SESSION['customer'];
  if(isset($_POST['submit']))
  {
    $mypic=$_FILES['upload']['name'];
    $firstn=$_POST['firstn'];
    $lastn=$_POST['lastn'];
    $usern=$_POST['usern'];
    $add1=$_POST['add1'];
    $add2=$_POST['add2'];
    $state=$_POST['state'];
    $zip=$_POST['zip'];
    $q=mysql_query("SELECT email FROM bio WHERE email='$email'");
    $r=mysql_num_rows($q);
    if($r == 1)
    { 
      $temp=$_FILES['upload']['tmp_name'];
      if(!empty($mypic)){
      $query=mysql_query("UPDATE bio set pickpath='$mypic' where email='$email'")or die (mysql_error());
      if($query)
      {
      move_uploaded_file($temp,"./profiles/$email/images/$mypic");
      }
      }
      $querry=mysql_query("UPDATE bio  SET firstn='$firstn',lastn='$lastn',usern='$usern',add1='$add1',add2='$add2', state='$state',zip='$zip' WHERE email='$email'")or die(mysql_error());
      if($querry)
      {
      }
      else
      echo "failure";
    }
    else
    {
      if(!empty($mypic))
      {
        $temp=$_FILES['upload']['tmp_name'];
        $qq=mysql_query("INSERT INTO bio(email,firstn,lastn,usern,add1,add2,state,zip,pickpath) values('$email','$firstn','$lastn','$usern','$add1','$add2','$state','$zip','$mypic')")or die(mysql_error());
        if($qq)
          { 
            $dir="./profiles/$email/images/";
            mkdir($dir,0777,true);
            move_uploaded_file($temp,"./profiles/$email/images/$mypic");
            header("refresh:02, location:profile.php");
            echo "<script type='text/javascript'>alert('successfully saved your details');</script>";
          }
      }
      else
        echo "failure";

    }
}
}
else
header("location:log.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="form-validation.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <title>foodo/user info</title>
    <link href="form-validation.css" rel="stylesheet">
  </head>
  <body class="bg-light" >
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
       <li class="breadcrumb-item active" aria-current="page">Account</li>
      </ol>
    </nav>
    <div class="container">
      <div class="py-5 text-center">
        <h2>User Profile</h2>
      </div>
      <div class="row">
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">User Info</h4>
          <form class="needs-validation"  novalidate enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
            <div id="mypic" class="SM-4">
          <?php
          $q=mysql_query("SELECT * FROM bio where email='$email'");
          if($q)
          { $qu=mysql_fetch_assoc($q);

            $mypic=$qu['pickpath'];
            if(!empty($mypic))
            {
              echo "<img src='profiles/$email/images/$mypic' class='rounded-circle'  height='250' width='250' style='position: fixed;right: 50px;top: 75px;z-index: 1;'>";
            }
            else{
              echo '<img src="pic.png" class="rounded-circle"  height="250" width="250" style="position:fixed;right:50px;top:75px;z-index:0;">';
            }
          }
          ?>
          <script type="text/javascript">
            $(document).ready(function(){
              $("#state").val('<?=$qu['state']?>');
            });
          </script>
          <div class="input-group mb-3" style="position: fixed;left: 990px;top:350px;width: 350px">
            <div class="input-group-prepend">
            </div>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="upload" id="upl_file" accept="image/*">
              <label class="custom-file-label" for="inputGroupFile01">Please Select the File</label>
            </div>
          </div>
        </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">First name</label>
                <input type="text" class="form-control"  name="firstn" id="firstName" placeholder="" value="<?php echo($qu['firstn']);?>" required>
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Last name</label>
                <input type="text" class="form-control" name="lastn" id="lastName" placeholder="" value="<?php echo($qu['lastn']);?>" required>
                <div class="invalid-feedback">
                  Valid last name is required.
                </div>
              </div>
            </div></br>

            <div class="mb-3">
              <label for="username">Username</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">@</span>
                </div>
                <input type="text" class="form-control" id="username" name="usern"placeholder="Username"  value="<?php echo($qu['usern']);?>" required>
                <div class="invalid-feedback" style="width: 100%;">
                  Your username is required.
                </div>
              </div>
            </div></br>
            <div class="mb-3">
              <label for="address">Address</label>
              <input type="text" class="form-control" id="address" name="add1"  placeholder="1234 Main St" value="<?php echo($qu['add1']);?>" required>
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div></br>
            <div class="mb-3">
              <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
              <input type="text" name="add2" class="form-control" id="address2" placeholder="Apartment or suite" value="<?php echo($qu['add2']);?>">
            </div></br>
            <div class="row">
             
              <div class="col-md-4 mb-3">
                <label for="state">State</label>
                <select class="custom-select d-block w-100" name="state" id="state"   required>
                  <option value="">Choose...</option>
                  <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                  <option value="Andhra Pradesh">Andhra Pradesh</option>
                  <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                  <option value="Assam">Assam</option>
                  <option value="Bihar">Bihar</option>
                  <option value="Chandigarh">Chandigarh</option>
                  <option value="Chhattisgarh">Chhattisgarh</option>
                  <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                  <option value="Daman and Diu">Daman and Diu</option>
                  <option value="Delhi">Delhi</option>
                  <option value="Goa">Goa</option>
                  <option value="Gujarat">Gujarat</option>
                  <option value="Haryana">Haryana</option>
                  <option value="Himachal Pradesh">Himachal Pradesh</option>
                  <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                  <option value="Jharkhand">Jharkhand</option>
                  <option value="Karnataka">Karnataka</option>
                  <option value="Kerala">Kerala</option>
                  <option value="Lakshadweep">Lakshadweep</option>
                  <option value="Madhya Pradesh">Madhya Pradesh</option>
                  <option value="Maharashtra">Maharashtra</option>
                  <option value="Manipur">Manipur</option>
                  <option value="Meghalaya">Meghalaya</option>
                  <option value="Mizoram">Mizoram</option>
                  <option value="Nagaland">Nagaland</option>
                  <option value="Orissa">Orissa</option>
                  <option value="Pondicherry">Pondicherry</option>
                  <option value="Punjab">Punjab</option>
                  <option value="Rajasthan">Rajasthan</option>
                  <option value="Sikkim">Sikkim</option>
                  <option value="Tamil Nadu">Tamil Nadu</option>
                  <option value="Tripura">Tripura</option>
                  <option value="Uttaranchal">Uttaranchal</option>
                  <option value="Uttar Pradesh">Uttar Pradesh</option>
                  <option value="West Bengal">West Bengal</option>
                </select>
                <div class="invalid-feedback">
                  Please provide a valid state.
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="zip">Zip</label>
                <input type="text" name="zip" class="form-control" id="zip" placeholder="" value="<?php echo($qu['zip']);?>" required>
                <div class="invalid-feedback">
                  Zip code required.
                </div>
              </div>
            </div>
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" name="submit" type="submit">Save Info</button>
          </form>
        </div>
      </div>
      </br>
      <!-- Footer -->
      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2018-2019 Foodo</p>
        <ul class="list-inline">
          <li class="list-inline-item"><a href="privacy.php">Privacy</a></li>
          <li class="list-inline-item"><a href="about.php">About</a></li>
          <li class="list-inline-item"><a href="support.php">Support</a></li>
        </ul>
      </footer>
    </div>
     

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <script>
      (function() {
        'use strict';

        window.addEventListener('load', function() {
          var forms = document.getElementsByClassName('needs-validation');
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

      function pic()
      {
        $("#upl_file").click();
      }
    </script>
  </body>
</html> 