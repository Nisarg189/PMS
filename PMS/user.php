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
   $var1 = 'Mobile Number';
   $var2 = 'Email ID';
   $var3 = 'Password';
   $var4 = 'Name';
   $var5 = 'Address';
   $var6 = 'isAdult';
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
   
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }
   
   $sql = 'SELECT * FROM user';
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
      echo '<td>'.$row['mobile_no'].'</td>';
	  echo '<td>'.$row['emailID'].'</td>';
	  echo '<td>'.$row['password'].'</td>';
	  echo '<td>'.$row['name'].'</td>';
	  echo '<td>'.$row['address'].'</td>';
	  echo '<td>'.$row['isAdult'].'</td>';
		 echo '</tr>';
   }
   echo '</table>';
   
   mysql_close($conn);
?>

</body>
</html>