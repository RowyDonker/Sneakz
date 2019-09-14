<!DOCTYPE html>
<html>
<?php
include ('head.php');
?>
<body>
<?php
include ('navigation.php');
?>
<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    header("Location: profile.php");
} 
require('db.php');
session_start();
if (isset($_POST['username'])){
    
$username = stripslashes($_REQUEST['username']);
$username = mysqli_real_escape_string($con,$username);
$password = stripslashes($_REQUEST['password']);
$password = mysqli_real_escape_string($con,$password);
$query = "SELECT * FROM `users` WHERE username='$username' and password='".md5($password)."'";
$result = mysqli_query($con,$query) or die(mysqli_error());
$rows = mysqli_num_rows($result);
if($rows==1){
$_SESSION['loggedin'] = true;
$_SESSION['username'] = $username;
header("Location: profile.php");
}else{
echo "<div class='form'><h3>Username/password is incorrect.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
}
}else{
?>

<form action="" method="post" class="login-form">
<p class="logintitle">Login</p>
<label>Username:</label><br>
<input type="text" name="username" id="username" required="required" placeholder="Please Enter Username" class="login-input"/><br /><br />
<label>Wachtwoord:</label><br>
<input type="password" name="password" id="password" required="required" placeholder="Password" class="login-input"/><br/><br />
<input type='submit' name='submit' value='Login' class="login-button" /><br>
<button class="passwordforgotbutton"><a href="forgotpassword.php" >Wachtwoord vergeten?</a></button>
<button class="registerlinkbutton"><a href="register.php" >Meld je hier aan!</a></button>

</form>
<?php
}
?>
<?php
include ('footer.php');
?>
</body>
</html>