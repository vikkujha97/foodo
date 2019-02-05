<?php
	
	error_reporting(0);
	mysql_connect("localhost", "root","") or die("problem_conn");  //if error occurs thenmessage in die is printed
	mysql_select_db("database");
?>