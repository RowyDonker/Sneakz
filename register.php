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
<button class="loginlinkbutton"><a href="login.php" >Terug naar login</a></button>
<p class="registertitle">Aanmelden</p>
<label>Gebruikersnaam :</label><br>
<input type="text" name="username" id="username" class="register-input" required="required" placeholder="Vul een gebruikersnaam in:"/><br /><br />
<label>Voornaam :</label><br>
<input type="text" name="first_name" id="firstname" class="register-input" required="required" placeholder="Vul uw voornaam in:"/><br /><br />
<label>Achternaam :</label><br>
<input type="text" name="last_name" id="lastname" class="register-input" required="required" placeholder="Vul uw achternaam in:"/><br /><br />
<label>Email :</label><br>
<input type="email" name="email" id="email" class="register-input" required="required" placeholder="Vul uw email in:"/><br/><br />
<label>Wachtwoord :</label><br>
<input type="password" name="password" id="password" class="register-input" required="required" placeholder="Vul een wachtwoord in:"/><br/><br />
<label>Adres :</label><br>
<input type="text" name="adress" id="city" class="register-input" required="required" placeholder="Vul uw adres in:"/><br/><br />
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
    
$check="SELECT * FROM users WHERE email = '$_POST[email]'";
$check2="SELECT * FROM users WHERE username = '$_POST[username]'";
$rs = mysqli_query($con,$check);
$data = mysqli_fetch_array($rs, MYSQLI_NUM);
$rs2 = mysqli_query($con,$check2);
$data2 = mysqli_fetch_array($rs2, MYSQLI_NUM);
if($data[0] > 1) {
    echo '<script type="text/javascript">alert("De email die u heeft ingevuld is al in gebruik");</script>';
    die();
}
if($data2[0] > 1) {
    echo '<script type="text/javascript">alert("De username die u heeft ingevuld is al in gebruik");</script>';
    die();
}
else
{

    $sql = "INSERT INTO users (username, fst_name, lst_name, email, password, adress)
    VALUES ('".$username."','".$first_name."','".$last_name."','".$email."', MD5('".$password."'),'".$adress."')";
    
    if ($con->query($sql) === TRUE) {
        $to = $email;
        $subject = "HTML email";
        
        $message = "
        <html>
        <head>
        <title>Welkom bij Sneakz</title>
        </head>
        <body>
        <h1>Bedankt voor uw registratie!</h1><br>
        <p>Dit zijn uw opgegeven gegevens.</p>
        <table>
        <tr>
        <th>Gebruikersnaam</th>
        </tr>
        <tr>
        <td>$username</td>
        </tr>
        <tr>
        <th>Voornaam</th>
        </tr>
        <tr>
        <td>$first_name</td>
        </tr>
        <tr>
        <th>Achternaam</th>
        </tr>
        <tr>
        <td>$last_name</td>
        </tr>
        <tr>
        <th>Adres</th>
        </tr>
        <tr>
        <td>$adress</td>
        </tr>
        </table>
        <p>Als deze ingevulde gegevens niet kloppen kunt u deze veranderen via de profiel pagina.</p>
        <p>https://rowydonker.com/Sneakz/profile.php</p><br>
        </body>
        </html>
        ";
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: <Register@Sneakz.com>' . "\r\n";
        mail($to,$subject,$message,$headers);

        header("Location: login.php");
    } else {
    echo "<script type= 'text/javascript'>alert('Error: " . $sql . "<br>" . $con->error."');</script>";
    }
}
}
    $con->close();
?>
<?php
include ('footer.php');
?>
</body>
</html>