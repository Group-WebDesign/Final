<?php
session_start();
    if(!empty($_SESSION["username"])) {

?>
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

$threadid = $_SESSION["threadid"];
include 'connect.php';

// If the values are posted, insert them into the database.

$null = null;
if (!empty($_POST['reply'])){
 
    $username = $_SESSION["username"];
	$reply = $_POST["reply"];
  
    $date = Date("Y/m/d");
   
    $stmt = $conn->prepare("SELECT id FROM `mcdoncam-db`.`User` WHERE username = ?");
    $stmt->bind_param("s", $username);
	$stmt->execute();
	$selectresult = mysqli_stmt_get_result($stmt);
	//$selectresult = mysqli_query($conn, $slquery);
		$row = mysqli_fetch_assoc($selectresult);
       $creatorid = $row["id"];
		
		
         $query = $conn->prepare("INSERT INTO `mcdoncam-db`.`Message` (id, userid,threadid,content,datecreated, datemodified) 
          VALUES (?, ?, ?, ?, ?, ?)");
		$query->bind_param("siisss", $null, $creatorid, $threadid, $reply, $date, $date);
		$query->execute();
		
		  $result = mysqli_stmt_get_result($query);
		  $row1 = mysqli_fetch_assoc($result);
		

             $msg = "<p align=center>Reply Created Successfully.</p>";
             echo $msg . "<br>";
             echo '<div class="form-actions"><a href="index.php" role="button" class="btn btn-lg btn-success"> Click here to return to the main page</a></div>';

		
    } 
 
mysqli_close($conn); 
?> 
<br>
</body>
</html>
<?php 
} else {
    header("Location: login.html");
} ?>