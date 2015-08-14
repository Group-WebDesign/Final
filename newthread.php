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


if (!empty($_POST['title']) && !empty($_POST['content']) && !empty($_POST['category'])){
 
    $username = $_SESSION["username"];
	$title = $_POST["title"];
    $content = $_POST["content"];
	$category = $_POST["category"];
    $date = Date("Y/m/d");
   
    $slquery = "SELECT id FROM `mcdoncam-db`.`User` WHERE username = '$username'";
    $selectresult = mysqli_query($conn, $slquery);
		$row = $selectresult->fetch_assoc();
       $creatorid = $row["id"];
         $query = "INSERT INTO `mcdoncam-db`.`Thread` (id,creatorid,category,title,content,datecreated) 
          VALUES (NULL,'$creatorid','$category','$title','$content','$date')";
		
		  $result = mysqli_query($conn,$query);
		
          if($result){
             $msg = "<p align=center>Thread Created Successfully.</p>";
             echo $msg . "<br>";
             echo '<div class="form-actions"><a href="index.php" role="button" class="btn btn-lg btn-success"> Click here to return to the main page</a></div>';
          } else{
            echo "Failure!";
          }
		
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