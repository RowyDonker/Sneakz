<?php
include ('head.php');
    if(isset($_POST['update'])){
        include ('db.php');
        $value = $_POST['user_type'];
        $update = mysqli_query($con,"UPDATE users SET user_type = '$value' WHERE id=". $_GET['edit_id']);
        header("Location: admin.php");
    }
    ?>
<form method="post" action="" class='update-form'>
<p style="font-size:40px">Update</p>
<p style="font-size:20px">Verander hier de functie van de gebruiker:</p>
<select name="user_type" class="update-input">
<option value="user">
    user</option>
    <option value="admin">
    admin</option>
  </select><br>
  <br>
<input type="submit" name="update" value="update" class="update-button">
</form>