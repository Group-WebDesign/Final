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
              <div class="navbar-form form-inline">
                <form method="post" action="category.php">
                  <select class="form-control" name="category">
                    <option selected>--CATEGORIES--</option>
                    <option value="Classes">Classes</option>
                    <option value="Events">Events</option>
                    <option value="Housing">Housing</option>
                    <option value="Food" name="Food">Food</option>
                    <option value="Directions">Directions</option>
                    <option value="Other">Other</option>
                  </select>
                  <input type="submit" value="submit" name="submit"/>
                </form>
              </div>
            </ul>
            <?php 
            if(!empty($_SESSION["username"])){
           	?>
           	<ul class="nav navbar-nav navbar-right">
              <li><a href="profile.php"><i class="fa fa-user"></i>&nbsp Hello,
                <b><?php session_start(); echo $_SESSION["username"];?></b></a></li>
              <li><a href="logout.php">Logout</a></li>
            </ul>
            </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
           	<?php
           	} else {
           	?>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="register.html">Register</a></li>
              <li><a href="login.html">Login</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav> <?php } ?>

  <!-- Main component for a primary marketing message or call to action -->
    <form role="search" action="searchnon.php" method="post">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search Title Here..." id="search" name="search">
        <span class="input-group-btn">
          <button class="btn btn-info" type="submit"><i class="glyphicon glyphicon-search"></i></button>
        </span>
      </div>
    </form>
    <br>
    <div class="panel panel-default pull-left">
      <div class="panel-heading"><font size="5">Most Recent Messages: </font>
      <?php 
      if(!empty($_SESSION["username"])){
        echo '<a href="mythread.php" role="button" class="btn btn-sm btn-danger pull-right"><b>Remove MY Thread</b></a>';
        echo '&nbsp &nbsp';
        echo '<a href="newthread.html" role="button" class="btn btn-sm btn-success pull-right"><b>Create New Thread</b></a>';
      }
      ?>
      </div>

      <div class="panel-body">

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
    		$counter = 1;
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
    		echo "<div class='table-responsive'><table class='table table-bordered'>";
    		echo "<thead><tr><th>#</th><th>User</th><th>Title:<a href=view.php?threadid=". $threadidArray[$i] .">". $threadtitleArray[$i]. "</a> </th><th>Category</th><th>Date Created</th></tr></thead>";
    		echo "<tbody><tr>";
    		echo "<td>". $threadidArray[$i]. "</td>";
    		echo "<td>". $userusernameArray[$threadcreatoridArray[$i]]. "<br>";
    		echo "</br> Joined:" . $userjoindateArray[$threadcreatoridArray[$i]]. "</td>";
    		echo "<td>". $threadcontentArray[$i]. "</td>";
    		echo "<td>". $threadcategoryArray[$i]. "</td>";
    		echo "<td>". $threaddatecreatedArray[$i]. "</td>";
    		echo "</tr></tbody>";
    		echo "</table></div>";
    		echo "<br></br>";
    		}
      ?>
      <br>  
      </div>
    </div>
    <br>
    <footer align="center">
        <h4>Template inspired from <a href="http://getbootstrap.com/getting-started/">
        <img border="0" alt="bootstrap logo" src="http://cnnphilippines.com/static/theme/default/base/ico/apple-touch-icon-144-precomposed.png" width="15" height="15"></h4></a>
        <h5>&copy Created by Jonathan, Cameron, and Xian</h5>
      </footer>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    
  </body>
  
</html>
