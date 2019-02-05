<?php
  include 'database.php';
  if(isset($_GET["log"]))
  { header("Refresh:1; url=log.php");}

  if(isset($_GET["sign"]))
    header("Refresh:1; url=signup.php");
  if(isset($_GET["resturant"]))
    header("Refresh:1; url=resturant.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1 ">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
  <a class="navbar-brand" href="index.php">foodo</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
     <?php
     if(isset($_SESSION['customer'])||$_SESSION['logged']==false)
      {?>
      <li class="nav-item">
        <a class="nav-link" href="profile.php">Account</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="history.php">History</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="cart.php">Cart&nbsp;<i class="fas fa-shopping-cart"></i><span class="badge badge-light"><?php echo $n;?></span></a>
      </li>
      <?php
    }?>
    </ul>
  </div>
   <?php
  if(isset($_SESSION['logged']) && $_SESSION['logged']==true)
    {include'logout.php';}
  else{?>
    <a class="btn btn-secondary" href="resturant.php" role="button">Resturant</a>&nbsp;
    <a class="btn btn-secondary" href="log.php" role="button">Login</a>&nbsp;
    <a class="btn btn-secondary" href="signup.php" role="button">Signup</a>&nbsp;
<?php
}
?>
</nav>
</body>
</html>