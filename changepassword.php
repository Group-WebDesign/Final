<!DOCTYPE html>
<html lang="en">
<head>
  <!--This website is inspired from the help of bootstrap template: http://getbootstrap.com/examples/signin/; -->

  <title>AskOregonState</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
session_start();
include 'connect.php';
//get the username
$username = "xian1";
$password = md5($_POST["originalPassword"]);
$newpassword = md5($_POST["inputPassword"]);
$newcpassword = md5($_POST["inputCPassword"]);
    if ($newcpassword != $newpassword) {
        echo "you entered your new password incorrectly.";
        echo '<div class="form-actions"><a href="login.html" role="button" class="btn btn-lg btn-danger"> Click here to retry</a></div>';
        break;
    }

    else if (!empty($newpassword) && !empty($password) && !empty($newcpassword)) {
        $input = "SELECT id FROM `mcdoncam-db`.`User` WHERE username = '$username' AND password = '$password'";
        $query = mysqli_query($conn, $input) or die(mysqli_error($conn));
        $count = mysqli_num_rows($query);
        $row = mysqli_fetch_array($query, MYSQLI_ASSOC);
        $sql = "UPDATE User SET password=$newpassword WHERE username=$username";
        
        if (mysqli_query($conn, $sql)) {
            echo "Password updated successfully";
        } else {
            echo "Error updating passowrd: " . mysqli_error($conn);
        }

}

//reference:http://www.w3schools.com/php/php_mysql_update.asp
    
mysqli_close($conn);
?>
<br>
</body>
</html>