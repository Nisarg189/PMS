<html>


		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="includes/css/bootstrap-glyphicons.css" rel="stylesheet">
		
		<!-- Custom CSS -->
		<link rel="stylesheet" href="includes/css/styles.css">
		
		<!-- Include Modernizr in the head, before any other Javascript -->
		<script src="includes/js/modernizr-2.6.2.min.js"></script>
<?php 
	function foobar($tableName, $Array)
	{
	  $hostname = 'localhost:3306';
	  $username = 'root';
	  $password = '';
	  $dbname = 'pms';

	  try {
		$dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);

		$sql = $dbh->prepare("SELECT * FROM $tableName");

		if($sql->execute()) {
		   $sql->setFetchMode(PDO::FETCH_ASSOC);
		}
	  }
	  catch(Exception $error) {
		  echo '<p>', $error->getMessage(), '</p>';
	  }

?>
	<br>
	<br>
	<br>
	 <table class="table table-bordered">
		<thead>
		  <tr>
		  
		 <?php for($i=0;$i<count($Array);$i++) { ?>
		 <th><?php echo $Array[$i]; ?> </th><?php } ?>
		  </tr>
		</thead>
		<tbody>
		<?php while($row = $sql->fetch()) { ?> 
		  <tr>
		  <?php for($i=0;$i<count($Array);$i++) { ?>
		  <td><?php echo $row[$Array[$i]]; ?></td> <?php } ?>
		  </tr>
		  <?php } ?>
		</tbody>
	  </table>
	  
	
<?php	}








	if (isset($_GET['search']))
    {
        getData($_GET['search']);
    }

    function getData($tableSearch)
    {
        foobar($tableSearch, array("mobile_no", "car_no", "car_type")); 
    }
	?>
	
	
	<script src="http://code.jquery.com/jquery.js"></script>
	
	<!-- If no online access, fallback to our hardcoded version of jQuery -->
	<script>window.jQuery || document.write('<script src="includes/js/jquery-1.8.2.min.js"><\/script>')</script>
	
	<!-- Bootstrap JS -->
	<script src="bootstrap/js/bootstrap.min.js"></script>
	
	<!-- Custom JS -->
	<script src="includes/js/script.js"></script>
	
	
	</html>  