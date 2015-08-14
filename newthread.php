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


include 'connect.php';

// If the values are posted, insert them into the database.

$null =null;
if (!empty($_POST['title']) && !empty($_POST['content']) && !empty($_POST['category'])){
 
    $username = $_SESSION["username"];
	$title = $_POST["title"];
    $content = $_POST["content"];
	$category = $_POST["category"];
    $date = Date("Y/m/d");
   
    $stmt = $conn->prepare("SELECT id FROM `mcdoncam-db`.`User` WHERE username = ?");
    $stmt->bind_param("s", $username);
	$stmt->execute();
	$selectresult = mysqli_stmt_get_result($stmt);
	//$selectresult = mysqli_query($conn, $slquery);
		$row = mysqli_fetch_assoc($selectresult);
       $creatorid = $row["id"];
	   
	   
         $query = $conn->prepare("INSERT INTO `mcdoncam-db`.`Thread` (id,creatorid,category,title,content,datecreated) 
          VALUES (?, ?, ?, ?, ?, ?)");
		$query->bind_param("siisss", $null, $creatorid, $title, $content, $category, $date);
		$query->execute();
		 
		 $result = mysqli_stmt_get_result($query);
		  $row1 = mysqli_fetch_assoc($result);
		

             $msg = "<p align=center>Thread Created Successfully.</p>";
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