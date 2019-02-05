<?php
session_start();
include 'tabs.php';
include 'database.php';
$email=$_SESSION['customer'];
$food_id=$_GET['food_id'];
$query=mysql_query("SELECT * FROM orders where email='$email' and foodid='$food_id'");
$q=mysql_fetch_assoc($query);
{
$fkey=$q['fkey'];	
$qu=mysql_query("UPDATE orders set status='1' where fkey=$fkey ");
if($qu)
{
	header("location:cart.php");
}
}
?>