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
    <link href="profile.css" rel="stylesheet">

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
            <a class="navbar-brand" href="#">Project name</a>
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

      Username
      <div class="container">
      <li> Questions</li>
      <li>Replies</li>
      </div>
    <div class="container">
      <form class="form-signin" method="post" action="changepassword.php">
          <h2 class="form-signin-heading" align="center"><b>Change Your Password: </b></h2>
              <label for="inputPassword" class="sr-only">Password</label>
              <input type="text" id="inputPassword" class="form-control" placeholder="Original Password" required autofocus>
                  <br>

            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" class="form-control" placeholder="New Password" required>
            <label for="inputCPassword" class="sr-only">CPassword</label>
            <input type="password" id="inputCPassword" class="form-control" placeholder="Confirm New Password" required>
            <button class="btn btn-lg btn-success btn-block" type="submit">Submit</button>
        </form>
    </div>

      <button>Upload Profile Pictures</button>
      <button>Submit</button>

    </div> <!-- /container -->
    
    
    

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    
  </body>
  
</html>
