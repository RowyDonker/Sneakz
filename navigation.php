<?php
session_start();
include ('head.php');
?>
<div class="navigation">
    <ul>
        <img src="Images/logo.gif" alt="logo" class="logo">
        <a href="index.php" class="nodecorationbutton"><li>HOME</li></a>
        <a href="product.php" class="nodecorationbutton"><li>BESTELLEN</li></a>
        <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {?>
            
        <?php }else{ ?>
        <a href="login.php" class="nodecorationbutton"><li>LOGIN/REGISTER</li></a>
        <?php }?>
        <div class="icons">
        <a href="login.php" class="nodecorationbutton"> <img src="Images/profile.png" class="navbar-icons"></a>
        <a href="login.php" class="nodecorationbutton"> <img src="Images/cart.png" class="navbar-icons"> </a>
        </div>
    </ul>
</div>

<!-- Mobile nav -->
<div class="mobile-navigation">
<a href="index.php" class="nodecorationbutton"><li>HOME</li></a>
<a href="product.php" class="nodecorationbutton"><li>BESTELLEN</li></a>
<a href="login.php" class="nodecorationbutton"><li>LOGIN/REGISTER</li></a>
<div class="icons">
        <a href="login.php" class="nodecorationbutton"> <img src="Images/profile.png" class="navbar-icons"></a>
        <img src="Images/cart.png" class="navbar-icons">
</div>
</div>