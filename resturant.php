<?php

include 'database.php';
include 'header.php';
session_start();
if($_SESSION['logged']==true)
include'logout.php';
else include'button.php';
if(isset($_POST['log']));
{
  $email=$_SESSION['resturant']=$_POST['email'];
  $password=$_POST['password'];
  $q=mysql_query("select email,password from resturant  where email='$email'") or die(mysql_error());
  $r=mysql_num_rows($q);
    if($r==1)
    {
      $row=mysql_fetch_assoc($q);
      $passw=$row['password'];
      if ($passw==$password)
       {
         $_SESSION['logged']=true;
         $_SESSION['resturant']=$email;
         header("location:res_prof.php");
      }
      else
        {
          echo "INCORRECT PASSWORD";
          $_SESSION['logged']=false;
          header("refresh:2, location:resturant.php");
        }
  }
  else
  {
    echo "";
    header("refresh:3,location:res_prof.php");
  }
}

if(isset($_POST['sign']))
{
    $email=$_POST['email'];
    $password=$_POST['password'];
    $confirm=$_POST['confirm']; 
    if($password==$confirm)
    {
      $q=mysql_query("select email from resturant where email='$email'");
      $r=mysql_num_rows($q);
      if($r==0)
      {
        $querry=mysql_query("INSERT INTO resturant(email,password) values('$email','$password')")or die(mysql_error());

        if($querry)
        {
          $_SESSION['logged']=true;
         // $qs=mysql_query("INSERT INTO resprofile(email) values('$email')")or die(mysql_error());
          $_SESSION['resturant']=$email;
          header("location:res_prof.php");
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
<html lang="en">
<head>
	<title>foodo/Resturant</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1  shrink-to-fit=yes">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body class="text-center">
<div class="container">
  <h2 style="position: relative;left: 20px;">RESTURANT:LOGIN AND SIGNUP</h2>
	<div  id="log_r" style="position: absolute;right:200px;top:250px;width: 25%;">
  
   <form  method="post" class="form-signin" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <div class="form-group">
      <label for="email"></label>
      <input type="text" class="form-control" id="email"name="email" placeholder="Email" >
    </div>
    <div class="form-group">
      <label for="passwordd"></label>
      <input type="password" class="form-control" id="password" name="password" placeholder="password">
    </div>
    <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default" name="log">Login</button>
    </div>
  </form>
</div>
<div  id="sign_r" style="position: relative;width: 50%;">
  
   <form  method="post" class="form-signin" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <div class="form-group">
      <label for="email"></label>
      <input type="text" class="form-control" id="email"name="email" placeholder="Email" >
    </div>
    <div class="form-group">
      <label for="passwordd"></label>
      <input type="password" class="form-control" id="password" name="password" placeholder="password">
    </div>
    <div class="form-group">
    	 <label for="passwordd"></label>
      <input type="password" class="form-control" id="confirm" name="confirm" placeholder="confirm password">
    </div>
    <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default" name="sign">Signup</button>
      </div>
  </form>
    <div style="position: absolute;margin-left: 550px;top: 350px"><a class="btn btn-primary" href="index.php" role="button">Home</a></div>

</div>
</div>
</body>
</html>