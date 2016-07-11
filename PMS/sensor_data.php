<html>
<head>
<title> Sensor Data </title>
</head>
<body>

<?php
   $dbhost = 'localhost:3306';
   $dbuser = 'root';
   $dbpass = 'nis_1809tk';
   $counter = 1;
   $var1 = 'sensorID';
   $var2 = 'time_stamp';
   $var3 = 'initial_state ';
   $var4 = 'final_state ';
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
   
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }
   
   $sql = 'SELECT * FROM sensor_data';
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
		   $counter++;
	   }
	   
		echo '<tr>';
      echo '<td>'.$row['sensorID'].'</td>';
	  echo '<td>'.$row['time_stamp'].'</td>';
	  echo '<td>'.$row['initial_state'].'</td>';
	  echo '<td>'.$row['final_state'].'</td>';
		 echo '</tr>';
   }
   echo '</table>';
   
   mysql_close($conn);
?>

</body>
</html>