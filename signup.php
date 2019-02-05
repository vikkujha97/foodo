<?php
session_start();
include'database.php';
include'header.php';
if(isset($_POST['signup']))
{
    $email=$_POST['email'];
    $password=$_POST['password'];
    $confirm=$_POST['confirm']; 
    if($password==$confirm)
    {
      $q=mysql_query("select email from customers where email='$email'");
      $r=mysql_num_rows($q);
      if($r==0)
      {
        $querry=mysql_query("INSERT INTO customers(email,password) values('$email','$password')")or die(mysql_error());

        if($querry)
        {
          $_SESSION['logged']=true;
          $_SESSION['customer']=$email;
          header("location:profile.php");
        }else{
          echo "Failure";
        }
      }else
      { $_SESSION['logged']=false;
        echo "Email Already Exists";
      }
    }else
      echo "Password Does Not Match";
    }

?>
<!DOCTYPE html>
<html>
<head>
	<title>Sign In</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="signin.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body class="text-center">
	<form class="form-signin" method="post" style="top:px;" action="<?php echo $_SERVER['PHP_SELF'];?>">
      <img class="mb-4" src="../../assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">SIGN UP</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus><br>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name="password" minlength="6" maxlength="20" id="inputPassword" class="form-control" placeholder="Password (at least 6 characters)" required>
       <label for="confirmPassword" class="sr-only">Confirm Password</label>
      <input type="password" name="confirm" id="inputPassword" class="form-control" placeholder="Confirm Password" required>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="signup" >signup</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2018-2019</p>
    </form>

	<script src="https://code.jquery.com/jquery-1.12.4.js" integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU=" crossorigin="anonymous">
	</script>
	<script type="js/bootstrap.js"></script>
</body>
</html>
