<html>
<head>
<title> Worker </title>
</head>
<body>

<?php
   $dbhost = 'localhost:3306';
   $dbuser = 'root';
   $dbpass = 'nis_1809tk';
   $counter = 1;
   $var1 = 'Email ID';
   $var2 = 'Password';
   $var3 = 'Name';
   $var4 = 'Mobile';
   $var5 = 'Address';
   $var6 = 'Hire Date';
   $var7 = 'Fire Date';
   $var8 = 'Gender';
   $var9 = 'Age';
   $var10 = 'Salary';
   $var11 = 'SubArea Code';
   $var12 = 'Area Code';
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
   
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }
   
   $sql = 'SELECT * FROM worker';
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
		   echo '<td>'.$var7.'</td>';
		   echo '<td>'.$var8.'</td>';
		   echo '<td>'.$var9.'</td>';
		   echo '<td>'.$var10.'</td>';
		   echo '<td>'.$var11.'</td>';
		   echo '<td>'.$var12.'</td>';
		   $counter++;
	   }
	   
		echo '<tr>';
      echo '<td>'.$row['emailID'].'</td>';
	  echo '<td>'.$row['password'].'</td>';
	  echo '<td>'.$row['name'].'</td>';
	  echo '<td>'.$row['mobile_no'].'</td>';
	  echo '<td>'.$row['address'].'</td>';
	  echo '<td>'.$row['hire_date'].'</td>';
	  echo '<td>'.$row['fire_date'].'</td>';
	  echo '<td>'.$row['gender'].'</td>';
	  echo '<td>'.$row['age'].'</td>';
	  echo '<td>'.$row['salary'].'</td>';
	  echo '<td>'.$row['subarea_code'].'</td>';
	  echo '<td>'.$row['area_code'].'</td>';
		 echo '</tr>';
   }
   echo '</table>';
   
   mysql_close($conn);
?>

</body>
</html>