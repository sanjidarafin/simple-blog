<?php
session_start();
session_unset();
setcookie('username',"");
session_destroy();
header("Location:home.php");
?>