<?php
   include_once('config.php');
   
   mysql_connect("localhost","root","");
   mysql_select_db("blog");
 
  include_once('func\blog.php');

?>