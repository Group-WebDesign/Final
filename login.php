<?php

include 'connect.php';

$username = $_POST['inputUser'];
$password = $_POST['inputPassword'];

function LogIn() {
    session_start();
    if (empty($username) || empty($password)) {
        echo "Please make sure you fill all the field.";
        header ("Location: login.html");
    } else {
        $query = mysqli_query("SELECT * FROM `mcdoncam-db`.`User` where username = '$username' AND password = '$password'") 
        or die(mysqli_error()); 
        $result = mysqli_fetch_array($query) or die(mysqli_error()); 
        if(!empty($result['username']) AND !empty($result['password'])) { 
            session_regenerate_id();
            $_SESSION['username'] = $result['username'];
            $_SESSION['password'] = $result['password'] 
            echo "Login Success!";
            echo '<br> <a href=index2.html> Click here to proceed to the main page.</a>';
            session_write_close(); 
        } else { 
            echo "Sorry, you entered wrong Email AND Password.";
            echo '<br> <a href=login.html> Click here to retry. </a>'; 
        }
    }
}