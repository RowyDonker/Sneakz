<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require ('db.php');
include ('head.php');
$query = "SELECT id, fst_name, lst_name, email, adress, user_type FROM users WHERE username = '".$_SESSION['username']."'";
if($result = $con->query($query))
{
    while($row = $result->fetch_assoc())
    {
            if ($row['user_type']== 'user'){
                header("Location: profile.php");
            }
    }
}

if($result = $con->query($query))
{
    while($row = $result->fetch_assoc())
    {
            if ($row['user_type']== 'admin'){
            echo "<div class='admin-header'>";
            echo "<p>Hallo ". $row['fst_name']."</p>";
            echo "<p><a href='profile.php'>Go back to profile </a></p>";
            echo "<p><a href='logout.php'> Logout</a></p></div>";
            echo "</div>";
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
    $result = mysqli_query($con,"SELECT id, username,email,fst_name,lst_name,user_type FROM users WHERE user_type='user'");
    
    echo "<table border='1' class='admin-table'>
    <tr>
    <th>Username</th>
    <th>Email</th>
    <th>Voornaam</th>
    <th>Achternaam</th>
    <th>Verwijder account?</th>
    </tr>";
    while($row = mysqli_fetch_array($result))
    {
    echo "<tr>";
    echo "<td>" . $row['username'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td>" . $row['fst_name'] . "</td>";
    echo "<td>" . $row['lst_name'] . "</td>";
    ?>
    <td><a href="delete.php?id=<?php echo $row["id"];?>">Verwijderen</a></td>
    <?php
    echo "</tr>";
    }
    echo "</table>";

    mysqli_close($con);


    }
}
}
}else {
}
?>
