<?php
session_start();
//require 'header.php';
require 'tabs.php';
require 'database.php';
if(isset($_POST['redeem'])&&$_SESSION['logged']==true)
{
  $email=$_SESSION['resturant'];
  $promo=$_POST['promo'];
  $query=mysql_query("INSERT INTO offer(email,offer) VALUES('$email','$promo')")or die(mysql_error());
  if($query)
    {echo"offer posted";}
  else
    echo mysql_error();
}
$q=mysql_query("select * from offer order by offer ASC");
$n=mysql_num_rows($q);
?>
<!DOCTYPE html>
<html>
<head>
	<title>foodo/offers</title>
	<style type="text/css">
	div.menu{
				width:50%;
				position:relative;
				top:40px;
				height:50px;
				left: 100px;
				
				margin:15px;
				z-index:0;
				
				
				}</style>
</head>
<body>
	<?php
	if($n>0)
{
	while ($row=mysql_fetch_assoc($q)) {
	?>
	<div class="menu">
		<h1 style="position: relative;top:10px;left:100px;"><?php echo $row['offer'];?></h1>&nbsp;
		<button type="button" class="btn btn-primary" style="position: relative;top:0px;left:100px;">APPLY</button>
	</div>
<?php
}}
echo"<br><br><br><br><br><br><br><br><br><br>";
?>

</body>
</html>
