<?php
    session_start();
	include('db.php');
	$id=$_GET['id'];
	$query=mysqli_query($conn,"SELECT * FROM `users` WHERE id='$id'");
	$row=mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html>
<head>
<title>Basic MySQLi Commands</title>
</head>
<body>
	<h2>Edit</h2>
	<form method="POST" action="update.php?id=<?php echo $id; ?>">
		<label>Firstname:</label><input type="text" value="<?php echo $row['fst_name']; ?>" name="fst_name">
		<label>Lastname:</label><input type="text" value="<?php echo $row['lst_name']; ?>" name="lst_name">
		<input type="submit" name="submit">
		<a href="index.php">Back</a>
	</form>
</body>
</html>