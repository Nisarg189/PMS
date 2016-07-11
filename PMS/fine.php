<html>
<head>
<title> Fine </title>
</head>
<body>

<?php
   $dbhost = 'localhost:3306';
   $dbuser = 'root';
   $dbpass = 'nis_1809tk';
   $counter = 1;
   $var1 = 'fineID';
   $var2 = 'mobile_user';
   $var3 = 'emailID_worker';
   $var4 = 'plotID';
   $var5 = 'subarea_code';
   $var6 = 'area_code';
   $var7 = 'fine_amount';
   $var8 = 'payer_name';
   $var9 = 'offence_time';
   $var10 = 'offence_detail';
   
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
   
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }
   
   $sql = 'SELECT * FROM fine';
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
		   
		   $counter++;
	   }
	   
		echo '<tr>';
	  echo '<td>'.$row['fineID'].'</td>';
      echo '<td>'.$row['mobile_user'].'</td>';
	  echo '<td>'.$row['emailID_worker'].'</td>';
	  echo '<td>'.$row['plotID'].'</td>';
	  echo '<td>'.$row['subarea_code'].'</td>';
	  echo '<td>'.$row['area_code'].'</td>';
	  echo '<td>'.$row['fine_amount'].'</td>';
	  echo '<td>'.$row['payer_name'].'</td>';
	  echo '<td>'.$row['offence_time'].'</td>';
	  echo '<td>'.$row['offence_detail'].'</td>';	 
	  
		 echo '</tr>';
   }
   echo '</table>';
   
   mysql_close($conn);
?>

</body>
</html>