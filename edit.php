<?php
session_start();
include 'db.php';
include 'head.php';
include 'navigation.php';

if(isset($_GET['edit_id'])){
 $sql = "SELECT * FROM users WHERE id =" .$_GET['edit_id'];
 $result = mysqli_query($con, $sql);
 $row = mysqli_fetch_array($result);
}

if(isset($_POST['update-button'])){
 $Firstname = $_POST['Firstname'];
 $Lastname = $_POST['Achternaam'];
 $adres = $_POST['Adress'];
 $email = $_POST['Email'];
 $update = "UPDATE users SET fst_name='$Firstname', lst_name='$Lastname',adress='$adres',email='$email' WHERE id=". $_GET['edit_id'];
 $up = mysqli_query($con, $update);
 if(!isset($sql)){
 die ("Error $sql" .mysqli_connect_error());
 }
 else{
 header("location: profile.php");
 }
}
?>

<!doctype html>
<html>
<body>
<form method="post" class="update-form">
<p class="profilelinkbutton"><a href='profile.php'>Go back to profile </a></p>
<p style="font-size:40px">Update</p>
<p style="font-size:20px">Update hier uw gegevens:</p>
<label>Voornaam:</label><br>
<input type="text" name="Firstname" class="update-input" required="required" value="<?php echo $row['fst_name']?>" placeholder="Voornaam"/><br/><br/>
<label>Achternaam:</label><br>
<input type="text" name="Achternaam" class="update-input" required="required" value="<?php echo $row['lst_name']?>" placeholder="Achternaam"/><br/><br/>
<label>Adres:</label><br>
<input type="text" name="Adress" class="update-input" required="required" value="<?php echo $row['adress']?>" placeholder="Adres"/><br/><br/>
<label>Email:</label><br>
<input type="text" name="Email" class="update-input" required="required" value="<?php echo $row['email']?>" placeholder="Email"/><br/><br/>
<button type="submit" name="update-button" class="update-button"><strong>Update</strong></button>
</form>

<?php
include 'footer.php';
?>
</body>
</html>