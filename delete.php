<?php
session_start();
require ('db.php');

$id=$_REQUEST['id'];
$query = "DELETE FROM users WHERE id=$id"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: admin.php"); 
?>