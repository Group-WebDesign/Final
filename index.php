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
              <form class="navbar-form navbar-left" role="search" action="searchnon.php" method="post">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Search..." id="search" name="search">
                </div>
                <button class="btn btn-info" type="submit">
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
	   if ($conn1->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      } 
	        if ($conn2->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      } 
	  //Thread row
		$sql = "SELECT id, title, datecreated, category, creatorid, content FROM `mcdoncam-db`.`Thread`";
		$result = $conn->query($sql);
		//Message row1
		$sql1 = "SELECT id, userid, content, datecreated, datemodified, threadid FROM `mcdoncam-db`.`Message`";
		$result1 = $conn->query($sql1);
		//User row2
		$sql2 = "SELECT id, username, joindate, imglink FROM `mcdoncam-db`.`User`";
		$result2 = $conn->query($sql2);
	 
	if ($result->num_rows > 0 ) {
		$counter = 0;
		$threadidArray;
		$threadtitleArray;
		$threadcreatoridArray;
		$threadcontentArray;
		$threadcategoryArray;
		$threaddatecreatedArray;
		while($row = $result->fetch_assoc()){
			
			 $threadidArray[$counter] =  $row["id"];
			 $threadtitleArray[$counter] = $row["title"];
			 $threadcreatoridArray[$counter] = $row["creatorid"];
			 $threadcontentArray[$counter] = $row["content"];
			 $threadcategoryArray[$counter] = $row["category"];
			 $threaddatecreatedArray[$counter] = $row["datecreated"];
			
			 $counter++; 
	
		}

	} else {
           echo "0 results: Threads ";
      }
	if ($result1->num_rows > 0 ) {
		$counter = 0;
		$messageidArray;
		$messagethreadidArray;
		$messageuseridArray;
		$messagecontentArray;
		$messagedatemodifiedArray;
		$messagedatecreatedArray;
		while($row1 = $result1->fetch_assoc()){
			
			 $messageidArray[$counter] =  $row1["id"];
			 $messagethreadidArray[$counter] = $row1["threadid"];
			 $messageuseridArray[$counter] = $row1["userid"];
			 $messagecontentArray[$counter] = $row1["content"];
			 $messagedatemodifiedArray[$counter] = $row1["datemodified"];
			 $messagedatecreatedArray[$counter] = $row1["datecreated"];
			
			 $counter++; 
	
		}

	} else {
           echo "0 results: Messages ";
      }
	if ($result2->num_rows > 0 ) {
		$counter = 0;
		$useridArray;
		$userusernameArray;
		$userjoindateArray;
		$userimglinkArray;
		while($row2 = $result2->fetch_assoc()){
			
			 $useridArray[$counter] =  $row2["id"];
			 $userusernameArray[$counter] = $row2["username"];
			 $userjoindateArray[$counter] = $row2["joindate"];
			 $userimglinkArray[$counter] = $row2["imglink"];
			
			 $counter++; 
	
		}

	} else {
           echo "0 results: Users ";
      }  
	  
	  	for($i =  (count($threadidArray) - 1); $i >= 0; $i-- ){
				echo "<table border='1' style='width:100%'>";
				echo "<tr><th>#</th><th>User</th><th>Title:&nbsp". $threadtitleArray[$i]. "</th><th>Category</th><th>Date Created</th></tr>";
				echo "<tr>";
				echo "<td>". $threadidArray[$i]. "</td>";
				echo "<td>". $userusernameArray[$threadcreatoridArray[$i]]. "<br>";
				echo "</br> Joined:" . $userjoindateArray[$threadcreatoridArray[$i]]. "</td>";
				echo "<td>". $threadcontentArray[$i]. "</td>";
				echo "<td>". $threadcategoryArray[$i]. "</td>";
				echo "<td>". $threaddatecreatedArray[$i]. "</td>";
				echo "</tr>";
				echo "</table>";
				
				echo "<br></br>";
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
