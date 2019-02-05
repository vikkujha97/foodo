<?php
require 'database.php';
 $rec_limit = 10;
$query=mysql_query("SELECT count(name) from fitems ")
$row = mysql_fetch_array($retval, MYSQL_NUM );
$rec_count = $row[0];

if( isset($_GET['page'] ) ) 
         {
            $page = $_GET['page'] + 1;
            $offset = $rec_limit * $page ;
         }
else {
      $page = 0;
      $offset = 0;
     }
 $left_rec = $rec_count - ($page * $rec_limit);
?>