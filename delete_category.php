<?php
  
   include_once('resources\init.php');
   
   if(!isset($_GET['id']))
   {
	   Header("Location: index.php");
	   die();
   }
   
   del("categories", $_GET['id']);
   
    Header("Location: category_list.php");
	die();
   
?>