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

    <title>Navbar Template for Bootstrap</title>

    <!-- Bootstrap  CSS and FontAwesome too -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <!-- Custom styles for this template -->
    <link href="navbar.css" rel="stylesheet">
    
  </head>

  <body>

    <div class="container">

      <!-- Static navbar -->
      <nav class="navbar navbar-default ">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Project name</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <!--<li class="active"><a href="#">About</a></li>
              <li><a href="#">About</a></li>
              <li><a href="#">Contact</a></li> -->
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categories <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Classes</a></li>
                  <li><a href="#">General</a></li>
                  <li><a href="#">Food (maybe)</a></li>
                </ul>
              </li>
              <form class="navbar-form navbar-left" role="search" action="searchbar.php" method="post">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Search..." id="search" name="search">
                </div>
                <button class="btn btn-info" type="submit">
                  <i class="glyphicon glyphicon-search"></i>
                </button>
              </form>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="profile.php"><i class="fa fa-user"></i>&nbsp Hello,
                <b><?php session_start(); echo $_SESSION["username"];?></b></a></li>
              <li><a href="logout.php"><b>Logout</b></a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
	<div class="jumbotron">
	<?php
  session_start();
	include 'connect.php';
	//$searchtag = explode(" ", $_POST["search"]);
	$searchtag = trim($_POST["search"]);
	//foreach ($searchtag as $value) {
	$input = "SELECT id, title, category, datecreated FROM `mcdoncam-db`.`Thread` WHERE title LIKE '%$searchtag%'";		$query = mysqli_query($conn, $sql);
	$query = mysqli_query($conn, $input) or die(mysqli_error($conn));
  $count = mysqli_num_rows($query);
  if ($count != 0) {
  	echo "<table border='2' style='width:100%'>";
  	echo "<tr><th align='justify'>Title</th><th align='right'>Category</th><th align='center'>Date</th></tr>";
  	while ($result = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
      echo "<tr>";
  		echo "<td align='justify'>". $result["title"] . "</td>";
      echo "&nbsp &nbsp &nbsp";
  		echo "<td align='justify'>". $result["category"] . "</td>";
      echo "&nbsp &nbsp &nbsp";
  		echo "<td align='justify'>". $result["datecreated"] . "</td>";
  		echo "</tr>";
  	}
  	echo "</table>";
  	echo "<br></br>";
  } else {
    echo "No results found.";
  }
	mysqli_close($conn);
	?>
	</div>
</body>
</html>