<!DOCTYPE html>
<html>
<?php
include ('head.php');
?>
<body>
<?php
include ('navigation.php');
?>
<div class="login">
    <h1>AANMELDEN</h1>
    <div class="loginform">
    <form action="/action_page.php">

    <div class="container">
    <form action="/action_page.php">
    <div class="row">
        <div class="col-25">
        <label for="fname">E-mailadres</label>
        </div>
        <div class="col-75">
        <input type="text" id="e-mail" name="e-mail" placeholder="E-mail">
        </div>
    </div>
    <div class="row">
        <div class="col-25">
        <label for="lname">Wachtwoord</label>
        </div>
        <div class="col-75">
        <input type="text" id="wachtwoord" name="wachtwoord" placeholder="Wachtwoord">
        </div>
    </div>
    <div class="col-75">
    <p class="loginbutton"><a href="product.php" class="nodecorationbutton">INLOGGEN</a></p> 
    </div>
    <div class="col-75">
    <a class="sign-up" href="register.php">Registreren</a><br>
    <a class="forgot">Wachtwoord vergeten</a>
    </div>
    </form> 
    </div>
</div>
</div>
<?php
include ('footer.php');
?>
</body>
</html>