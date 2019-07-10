<!DOCTYPE html>
<html>
<?php
include ('head.php');
?>
<body>
<?php
include ('navigation.php');
?>

<form action="" method="post" class="register-form">
<p class="registertitle">Aanmelden</p>
<label>Username :</label><br>
<input type="text" name="username" id="username" class="register-input" required="required" placeholder="Please Enter Username"/><br /><br />
<label>Voornaam :</label><br>
<input type="text" name="first_name" id="firstname" class="register-input" required="required" placeholder="Please Enter First Name"/><br /><br />
<label>Achternaam :</label><br>
<input type="text" name="last_name" id="lastname" class="register-input" required="required" placeholder="Please Enter Last Name"/><br /><br />
<label>Email :</label><br>
<input type="email" name="email" id="email" class="register-input" required="required" placeholder="john123@gmail.com"/><br/><br />
<label>Password :</label><br>
<input type="password" name="password" id="password" class="register-input" required="required" placeholder="Password"/><br/><br />
<label>Adres :</label><br>
<input type="text" name="adress" id="city" class="register-input" required="required" placeholder="Please Enter Your adress"/><br/><br />
<input type="submit" value="Aanmelden" name="submit" class="register-button"/><br />
</form>

<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    header("Location: profile.php");
} 
if(isset($_POST["submit"])){
    include 'db.php';
    $username = $_POST["username"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $adress = $_POST["adress"];

    $sql = "INSERT INTO users (username, fst_name, lst_name, email, password, adress)
    VALUES ('".$username."','".$first_name."','".$last_name."','".$email."', MD5('".$password."'),'".$adress."')";
    
    if ($con->query($sql) === TRUE) {
    echo "<script type= 'text/javascript'>alert('New record created successfully');</script>";
    header("Location: login.php");
die();
    } else {
    echo "<script type= 'text/javascript'>alert('Error: " . $sql . "<br>" . $con->error."');</script>";
    }
    
    $con->close();
    }
?>

<?php
include ('footer.php');
?>
</body>
</html>