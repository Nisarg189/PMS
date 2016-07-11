<html>
<head>
<title> SubArea </title>
</head>
<body>

<?php
   $dbhost = 'localhost:3306';
   $dbuser = 'root';
   $dbpass = 'nis_1809tk';
   $counter = 1;
   $var1 = 'SubArea Code';
   $var2 = 'Area Code';
   $var3 = 'SubArea Name';
   $var4 = 'Latitude';
   $var5 = 'Longitude';
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
   
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }
   
   $sql = 'SELECT * FROM subarea';
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
      echo '<td>'.$row['subarea_code'].'</td>';
	  echo '<td>'.$row['area_code'].'</td>';
	  echo '<td>'.$row['subarea_name'].'</td>';
	  echo '<td>'.$row['latitude'].'</td>';
	  echo '<td>'.$row['longitude'].'</td>';
		 echo '</tr>';
   }
   echo '</table>';
   
   mysql_close($conn);
?>

</body>
</html>