<?php
session_start();
require ('db.php');

$id=$_REQUEST['id'];
$query = "DELETE FROM users WHERE id=$id"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
$_SESSION['loggedin'] = false;
header("Location: login.php"); 
?>