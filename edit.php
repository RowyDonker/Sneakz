<?php
    session_start();
    echo 'PHP version is: ' . phpversion();
    echo 'PHP version is: ' . PHP_VERSION;
    include ('db.php');
    $id = $_GET['id'];
    $sql = "SELECT * FROM users WHERE id = $id";
    $result = $con->query($sql);
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "id: " . $row["id"]. " - Name: " . $row["fst_name"]. " " . $row["lst_name"]. "<br>";
        }
    } else {
        echo "0 results";
    }
    $con->close();
?>