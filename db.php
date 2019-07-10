<?php
	// const DB_HOST = 'localhost';
	// const DB_USER = 'root';
	// const DB_PASS = 'root';
    // const DB_NAME = 'Sneakz';
	
	
	const DB_HOST = 'db.rowydonker.com';
	const DB_USER = 'md482832db478813';
	const DB_PASS = 'Pindakaas12';
	const DB_NAME = 'md482832db478813';
	
	$con = mysqli_connect("db.rowydonker.com","md482832db478813","Pindakaas12","md482832db478813");
	// $con = mysqli_connect("localhost","root","root","Sneakz");
		// Check connection
		if (mysqli_connect_errno())
		  {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		  }
?>