<html>
<head>
<title> Sensor </title>
</head>
<body>

<?php
   $dbhost = 'localhost:3306';
   $dbuser = 'root';
   $dbpass = 'nis_1809tk';
   $counter = 1;
   $var1 = 'sensorID';
   $var2 = 'model_no';
   $var3 = 'date_of_installation';
   $var4 = 'working_state';
   $var5 = 'expiry_date';
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
   
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }
   
   $sql = 'SELECT * FROM sensor';
   mysql_select_db('pms');
   $retval = mysql_query( $sql, $conn );
   
   if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }
   echo '<table border=1>';
   while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
	   
	   if($counter==1)
	   {
		   echo '<td>'.$var1.'</td>';
		   echo '<td>'.$var2.'</td>';
		   echo '<td>'.$var3.'</td>';
		   echo '<td>'.$var4.'</td>';
		   echo '<td>'.$var5.'</td>';
		   $counter++;
	   }
	   
		echo '<tr>';
      echo '<td>'.$row['sensorID'].'</td>';
	  echo '<td>'.$row['model_no'].'</td>';
	  echo '<td>'.$row['date_of_installation'].'</td>';
	  echo '<td>'.$row['working_state'].'</td>';
	  echo '<td>'.$row['expiry_date'].'</td>';
		 echo '</tr>';
   }
   echo '</table>';
   
   mysql_close($conn);
?>

</body>
</html>