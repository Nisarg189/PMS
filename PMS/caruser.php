<?php
  $hostname = 'localhost:3306';
  $username = 'root';
  $password = '';
  $dbname = 'pms';

  try {
    $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);

    $sql = $dbh->prepare("SELECT * FROM car_user");

    if($sql->execute()) {
       $sql->setFetchMode(PDO::FETCH_ASSOC);
    }
  }
  catch(Exception $error) {
      echo '<p>', $error->getMessage(), '</p>';
  }

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Car User</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Car User Table</h2>
  
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Mobile Number</th>
        <th>Car Number</th>
        <th>Car Type</th>
      </tr>
    </thead>
    <tbody>
	<?php while($row = $sql->fetch()) { ?>
      <tr>
        <td><?php echo $row['mobile_no']; ?></td>
        <td><?php echo $row['car_no']; ?></td>
        <td><?php echo $row['car_type']; ?></td>
      </tr>
	  <?php } ?>
    </tbody>
  </table>
</div>

</body>
</html>

















<!DOCTYPE html>

<html>
	<head>
		
		<!-- Website Title & Description for Search Engine purposes -->
		<title>Janmarg - Smart Parking Management System</title>
		<meta name="description" content="Learn how to code your first responsive website with the new Twitter Bootstrap 3.">
		
		<!-- Mobile viewport optimized -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		
		<!-- Bootstrap CSS -->
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="includes/css/bootstrap-glyphicons.css" rel="stylesheet">
		
		<!-- Custom CSS -->
		<link rel="stylesheet" href="includes/css/styles.css">
		
		<!-- Include Modernizr in the head, before any other Javascript -->
		<script src="includes/js/modernizr-2.6.2.min.js"></script>
		
	</head>
	<body>
	
		<div class="container" id="main">
		
			<div class="navbar navbar-fixed-top">
				<div class="container">
					
					<!-- .btn-navbar is used as the toggle for collapsed navbar content -->
					<button class="navbar-toggle" data-target=".navbar-responsive-collapse" data-toggle="collapse" type="button">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				
					<a class="navbar-brand" href="/"><img src="images/logo.png" alt="Your Logo"></a>
					
					<div class="nav-collapse collapse navbar-responsive-collapse">
						<ul class="nav navbar-nav">
							<li class="active">
								<a href="#">Home</a>
							</li>
							
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Master<strong class="caret"></strong></a>
								
								<ul class="dropdown-menu">
									<li>
										<a href="http://localhost/PMS/05%20-%20Final%20Website/PMS/caruser.php">User</a>
									</li>
									
									<li>
										<a href="#">Worker</a>
									</li>
									
									<li>
										<a href="#">Location</a>
									</li>
									
									<li>
										<a href="#">Fare</a>
									</li>
								</ul><!-- end dropdown-menu -->
							</li>
							
							<li class="inactive">
								<a href="#">Analysis</a>
							</li>
							
							<li class="inactive">
								<a href="#">Feedback</a>
							</li>
							
							<li class="inactive">
								<a href="#">Current Status</a>
							</li>
							
						</ul>
						
						<form class="navbar-form pull-right">
							<input type="text" class="form-control" placeholder="Search this site..." id="searchInput">
							<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
						</form><!-- end navbar-form -->
						
						<ul class="nav navbar-nav pull-right">
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> My Account <strong class="caret"></strong></a>
								
								<ul class="dropdown-menu">
									<li>
										<a href="#"><span class="glyphicon glyphicon-wrench"></span> Settings</a>
									</li>
									
									<li>
										<a href="#"><span class="glyphicon glyphicon-refresh"></span> Update Profile</a>
									</li>
									
									<li class="divider"></li>
									
									<li>
										<a href="#"><span class="glyphicon glyphicon-off"></span> Sign out</a>
									</li>
								</ul>
							</li>
						</ul><!-- end nav pull-right -->
					</div><!-- end nav-collapse -->
				
				</div><!-- end container -->
			</div><!-- end navbar -->
			
			
			
			<div class="container">
  <h2>Car User Table</h2>
  
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Mobile Number</th>
        <th>Car Number</th>
        <th>Car Type</th>
      </tr>
    </thead>
    <tbody>
	<?php while($row = $sql->fetch()) { ?>
      <tr>
        <td><?php echo $row['mobile_no']; ?></td>
        <td><?php echo $row['car_no']; ?></td>
        <td><?php echo $row['car_type']; ?></td>
      </tr>
	  <?php } ?>
    </tbody>
  </table>
</div>
			
			
			<div class="row" id="featuresHeading">
				<div class="col-12">
					<h2>More Features</h2>
					<p class="lead"> Welcome to the website</p>
				</div><!-- end col-12 -->
			</div><!-- end featuresHeading -->
			
			
		

	<!-- All Javascript at the bottom of the page for faster page loading -->
		
	<!-- First try for the online version of jQuery-->
	<script src="http://code.jquery.com/jquery.js"></script>
	
	<!-- If no online access, fallback to our hardcoded version of jQuery -->
	<script>window.jQuery || document.write('<script src="includes/js/jquery-1.8.2.min.js"><\/script>')</script>
	
	<!-- Bootstrap JS -->
	<script src="bootstrap/js/bootstrap.min.js"></script>
	
	<!-- Custom JS -->
	<script src="includes/js/script.js"></script>
	
	</body>
</html>

