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
   $var1 = 'car_no';
   $var2 = 'mobile_no';
   $var3 = 'entry_time ';
   $var4 = 'exit_time ';
   $var5 = 'fine_amount ';
   $var6 = 'fine_amount_collection ';
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
   
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }
   
   $sql = 'SELECT * FROM pending';
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
		   echo '<td>'.$var6.'</td>';
		   $counter++;
	   }
	   
		echo '<tr>';
      echo '<td>'.$row['car_no'].'</td>';
	  echo '<td>'.$row['mobile_no'].'</td>';
	  echo '<td>'.$row['entry_time'].'</td>';
	  echo '<td>'.$row['exit_time'].'</td>';
	  echo '<td>'.$row['fine_amount'].'</td>';
	  echo '<td>'.$row['fine_amount_collection'].'</td>';
		 echo '</tr>';
   }
   echo '</table>';
   
   mysql_close($conn);
?>

</body>
</html>
