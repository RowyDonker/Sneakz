<footer class="footer">
 <div class="footercontent">
     <div class="footermenu">
        <ul>
        <a href="index.php" class="nodecorationbutton"><li>HOME</li></a>
        <a href="product.php" class="nodecorationbutton"><li>BESTELLEN</li></a>
        <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {?>
            
            <?php }else{ ?>
            <a href="login.php" class="nodecorationbutton"><li>LOGIN</li></a>
            <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {?>
            
            <?php }else{ ?>
            <a href="Registreren.php" class="nodecorationbutton"><li>REGISTREREN</li></a>
            <?php }?>
            <?php }?>
        </ul>
     </div>
<div class="contacts">
<p>Contact:</p>
<p>Sneak.nl<p>
<p>Haparandaweg 842</p>
<p>1013BD, Amsterdam</p>
<p>+31612345678</p>
<p>info@sneak.nl</p>
    </div>
     <div class="copyright">
         <p class="copyrightnl">Nederland</p> <p class="copyrightinfo">Â© 2018 Sneak, Inc. Alle rechten voorbehouden</p>
     </div>
 </div>
</footer>