<?php
session_start();
?>
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

    <title>AskOregonState</title>

    <!-- Bootstrap  CSS and FontAwesome too -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <!-- Custom styles for this template -->
    <link href="navbar.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">

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
            <a class="navbar-brand" href="index.php">AskOregonState</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <!--<li class="active"><a href="#">About</a></li>
              <li><a href="#">About</a></li>
              <li><a href="#">Contact</a></li> -->
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categories <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="category.php?category=Classes">Classes</a></li>
                  <li><a href="category.php?category=Events">Events</a></li>
                  <li><a href="category.php?category=Housing">Housing</a></li>
                  <li><a href="category.php?category=Food">Food</a></li>
                  <li><a href="category.php?category=Directions">Directions</a></li>
                  <li><a href="category.php?category=Other">Other</a></li>
                </ul>
              </li>
              <form class="navbar-form navbar-left" role="search" action="searchsess.php" method="post">
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

    <br><br>
    <div class="col-md-3 pull-left">
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">My Post</a></li>
        <li><a href="#">My Thread</a></li>
        <li><a href="changepassword.html">Change Password</a></li>
      </ul>
    </div>

    <?php
        //echo username
        include 'connect.php';
        
        //echo difault pic
        echo "<img width='100' height='100' src='pictures/default.png' alt='Default Profile Pic'>";
        if(isset($_POST['submit'])){
            move_uploaded_file($_FILES['file']['tmp_name'],"pictures/".$_FILES['file']['name']);
            $q = mysqli_query($conn,"UPDATE User SET imglink = '".$_FILES['file']['name']."' WHERE username = '".$_SESSION['username']."'");
        }
    ?>
    <!-- upload pictures, reference: pastebin.com/vJFUcvka -->
    <form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="file">
    <input type="submit" name="submit">
    </form>


    <?php
        $q = mysqli_query($conn,"SELECT * FROM User");
        while($row = mysqli_fetch_assoc($q)){
            echo $row['username'];
            if($row['imglink'] == ""){
                echo "<img width='100' height='100' src='pictures/default.png' alt='Default Profile Pic'>";
            } else {
                echo "<img src='pictures/".$row['imglink']."' alt='Profile Pic'>";
            }
            echo "<br>";
        }
    ?>

    

    

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    
  </body>
  
</html>
