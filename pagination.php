<?php
include'database.php';
$per_page=3;

$page_query=mysql_query("select count(*) from fitems");

$pages=ceil(mysql_result($page_query,0)/$per_page);
$page=(isset($_GET['page']))? (int)$_GET['page']:1;
$start=($page-1)*$per_page;

$query=mysql_query("select * from fitems  limit $start,$per_page");           //where limit 0,3"

while($row=mysql_fetch_assoc($query))
{
	echo $row['name']."<br>";
}
$prev=$page-1;
$next=$page+1;
echo "<a herf='pagi.php?page=$prev'>Prev </a>";

if($pages>=1&&$page<=$pages)
{
	for($x=1;$x<=$pages;$x++)
		echo '<a href="?page='.$x.'">'.$x.'</a> ';
}
echo "<a herf='pagi.php?page=$next'> Next</a>";
?>