<html>
<head>
<title> User </title>
</head>
<body>

<?php
   $dbhost = 'localhost:3306';
   $dbuser = 'root';
   $dbpass = 'nis_1809tk';
   $counter = 1;
   $var1 = 'plotID';
   $var2 = 'subarea_code';
   $var3 = 'area_code';
   $var4 = 'sensorID';
   $var5 = 'current_booking_status';
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
   
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }
   
   $sql = 'SELECT * FROM plot';
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
      echo '<td>'.$row['plotID'].'</td>';
	  echo '<td>'.$row['subarea_code'].'</td>';
	  echo '<td>'.$row['area_code'].'</td>';
	  echo '<td>'.$row['sensorID'].'</td>';
	  echo '<td>'.$row['current_booking_status'].'</td>';
		 echo '</tr>';
   }
   echo '</table>';
   
   mysql_close($conn);
?>

</body>
</html>