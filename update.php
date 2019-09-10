<?php
	session_start();
	include('db.php');
	$id=$_GET['id'];
 
	$firstname=$_POST['fst_name'];
	$lastname=$_POST['lst_name'];
 
	mysqli_query($conn,"UPDATE `users` SET fst_name='$firstname', lst_name='$lastname' WHERE id='$id'");
	header('location:index.php');
?>