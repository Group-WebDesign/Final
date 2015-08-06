<<<<<<< HEAD
<?php
include 'connect.php';
require 'register.html';
// If the values are posted, insert them into the database.
if (isset($_POST['inputUser']) && isset($_POST['inputPassword'])){
    $username = $_POST['inputUser'];
    $email = $_POST['inputEmail'];
    $password = $_POST['inputPassword'];
    $cpassword = $_POST['inputCPassword'];
    $slquery = "SELECT 1 FROM register WHERE email = '$email'";
    $selectresult = mysqli_query($slquery);
    if(mysqli_num_rows($selectresult)>0)
    {
         $errorMessage = 'Sorry, but current email already exists.';
    }
    elseif($password != $cpassword){
         $errorMessage = "Password doesn't match.";
    } 
    else{
          $query = "INSERT INTO `mcdoncam-db`.`User` (username, password,confirmpassword, email) 
          VALUES ('$username', '$password', '$cpassword', '$email')";
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
=======
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <!-- Custom styles for this template -->
    <link href="register.css" rel="stylesheet">

  </head>

  <body>

    <div class="container">

      <form class="form-signin">
        <h2 class="form-signin-heading" align="center"><b>Create an account: </b></h2>
      

        <label for="inputUser" class="sr-only">Username</label>
        <input type="text" id="inputUser" class="form-control" placeholder="Username" required autofocus>
        <br>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <br>
		 <label for="inputPassword" class="sr-only">Confirm Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Confirm Password" required>
        <br>
        <button class="btn btn-lg btn-success btn-block" type="submit">Sign up</button>
        <a href="index.php" class="btn btn-lg btn-danger btn-block" type="submit">Home</a> <br>
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
>>>>>>> origin/master
