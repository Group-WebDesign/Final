<?php
include 'connect.php';
require 'register.html';
// If the values are posted, insert them into the database.
if (isset($_POST['inputUser']) && isset($_POST['inputPassword'])){
    $username = $_POST['inputUser'];
    $password = $_POST['inputPassword'];
    $cpassword = $_POST['inputCPassword'];
    $slquery = "SELECT 1 FROM `mcdoncam-db`.`User` WHERE username = '$username'";
    $selectresult = mysqli_query($slquery);
    if(mysqli_num_rows($selectresult)>0)
    {
         $errorMessage = 'Sorry, but current username already exists.';
    }
    elseif($password != $cpassword){
         $errorMessage = "Password doesn't match.";
    } 
    else{
          $query = "INSERT INTO `mcdoncam-db`.`User` (username, password) 
          VALUES ('$username', '$password')";
          $result = mysql_query($query);
          if($result){
             $msg = "User Created Successfully.";
          }
    }
}
else {
    echo "Something is wrong during registration process, please retry.";
    echo "<br>";
    header("Location: register.html");
}
?>