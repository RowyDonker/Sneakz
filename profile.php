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
require('db.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
$query = "SELECT id, fst_name, lst_name, email, adress, user_type FROM users WHERE username = '".$_SESSION['username']."'";

if($result = $con->query($query))
{
    while($row = $result->fetch_assoc())
    {
        echo "<div class='profile'>";
        echo "<br /><b>Uw gegevens:</b><br />";
        echo "<p>Voornaam:</b> ". $row['fst_name'];
        echo "<br /><b>Achternaam:</b> ".$row['lst_name'];
        echo "<br /><b>Adres:</b> ".$row['adress'];
        echo "<br /><b>Email:</b> ".$row['email'];
        echo "<br /><b>Soort Gebruiker:</b> ".$row['user_type'];
        ?>
        <div>
            <td><a class='profilebuttons' href="deleteprofile.php?id=<?php echo $row["id"]; ?> ">Delete</a></td>
        <?php
        echo "<br><a href='logout.php' class='profilebuttons'>Logout</a>";
        if($result = $con->query($query))
{
    while($row = $result->fetch_assoc())
    {
            if ($row['user_type']== 'admin'){
                echo "<br><a href='admin.php' class='profilebuttons'>Go to admin page!</a>";
            }
    }
}
?>
</div>
<?php
        echo "</div>";
    }
    $result->free();
}
else
{
    echo "No results found";
}
}else{
    echo "<h2>Please login</h2>";
    echo "<a href='login.php'>Login here!</a>";
}
?>
<?php
include ('footer.php');
?>
</body>
</html>