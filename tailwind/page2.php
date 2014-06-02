<?php

session_start();
if ($_SESSION['loggedin'] !== TRUE) { 
   header("Location: index.php");
   echo 'You must log in first';
   exit();
} 
?>
<h1>Welcome back</h1>