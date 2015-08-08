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
			        	  <li><a href="#">Events</a></li>
				          <li><a href="#">Housing</a></li>
				          <li><a href="#">Food</a></li>
			        	  <li><a href="#">Directions</a></li>
                  <li><a href="#">Other</a></li>
                </ul>
              </li>
              <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Search...">
                </div>
                <button class="btn btn-info" type="button">
                  <i class="glyphicon glyphicon-search"></i>
                </button>
              </form>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="register.html">Register</a></li>
              <li><a href="login.html">Login</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>

  <!-- Main component for a primary marketing message or call to action -->
          <br><br>

    <div class="panel panel-default pull-left">
      <div class="panel-heading"><font size="5">Most Recent Messages: </font></div>
      <div class="panel-body">
      <style>
      table, th, td {
           border: 1px solid black;
           text-align: center;
      }
      </style>

      <?php
      $dbhost = "oniddb.cws.oregonstate.edu";
      $dbname = "mcdoncam-db";
      $dbuser = "mcdoncam-db";
      $dbpass = "xOwqKHjWfOFiJdfA";

      
      $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
      
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      } 

      $sql = "SELECT user, category, content, datecreated, datemodified FROM `mcdoncam-db`.`Message`";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
           echo "<table><tr><th>User</th><th>Category</th><th></th><th>Date Created</th><th>Date Modified</th></tr>";
           // output data of each row
           while($row = $result->fetch_assoc()) {
				
					echo "<tr><td>" . $row["user"]. "</td><td>" . $row["category"]. "</td><td>". $row["content"]. "</td><td>" . $row["datecreated"]. "</td><td>" . $row["datemodified"]. "</td></tr>";
					
			}
           echo "</table>";
      } else {
           echo "0 results";
      }


      ?>  
      </div>
    </div>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    
  </body>
  
</html>
