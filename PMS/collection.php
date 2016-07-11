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
   $var1 = 'emailID_worker';
   $var2 = 'collection_date';
   $var3 = 'amount';
   $var4 = 'collection';
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
   
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }
   
   $sql = 'SELECT * FROM collection';
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
      echo '<td>'.$row['emailID_worker'].'</td>';
	  echo '<td>'.$row['collection_date'].'</td>';
	  echo '<td>'.$row['amount'].'</td>';
	  echo '<td>'.$row['collection'].'</td>';
		 echo '</tr>';
   }
   echo '</table>';
   
   mysql_close($conn);
?>

</body>
</html>