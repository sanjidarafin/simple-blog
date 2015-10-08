<?php
  
   include_once('resources\init.php');
   
   if(!isset($_GET['id']))
   {
	   Header("Location: index.php");
	   die();
   }
   
   del("posts", $_GET['id']);
   
    Header("Location: index.php");
	die();
   
?>