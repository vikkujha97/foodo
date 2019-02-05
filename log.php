<!-- Login Page -->
<?php
include 'database.php';
if($_SESSION['logged']==true)
include'logout.php';
else include'button.php';
include 'header.php';
session_start();
if(isset($_POST['log']))
{
  $email=$_POST['email'];
  $password=$_POST['password'];
  $q=mysql_query("select email,password from customers where email='$email'") or die(mysql_error());
  $r=mysql_num_rows($q);
    if($r==1)
    {
      $row=mysql_fetch_assoc($q);
      $passw=$row['password'];
      if ($passw==$password)
       {
        session_start();
         $_SESSION['logged']=true;
         $_SESSION['customer']=$email;
         header("location:index.php");
      }
      else
        {
          echo "<div class='alert alert-danger' role='alert' style='position:fixed;top:50px;'>INCORRECT PASSWORD</div>";
          $_SESSION['logged']=false;
          header("refresh:3, location:log.php");
        }
  }
  else
  {
    echo "";
    header("refresh:1,location:index.php");
  }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>log in</title>
  <!-- Referencing Online StyleSheets and API's -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- <link href="../../dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="signin.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body class="text-center">
	<form class="form-signin" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
      <h1 class="h3 mb-3 font-weight-normal">Please log in.</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus><br>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="log" >log in</button><br>
      <a class="btn btn-outline-light" href="index.php" role="button" style="position: fixed;left: 635px;top:415px;width: 50px">Home</a>
      <p class="mt-5 mb-3 text-muted">&copy; 2018-2019</p>
    </form>

	<script src="https://code.jquery.com/jquery-1.12.4.js" integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU=" crossorigin="anonymous">
	</script>
	<script type="js/bootstrap.js"></script>
</body>
</html>


