<html>
<head>
<title> Booking </title>
</head>
<body>

<?php
   $dbhost = 'localhost:3306';
   $dbuser = 'root';
   $dbpass = 'nis_1809tk';
   $counter = 1;
   $var1 = 'BookingID';
   $var2 = 'Mobile User';
   $var3 = 'EmailID Worker';
   $var4 = 'Amount';
   $var5 = 'Fine Amount';
   $var6 = 'Amount Collection';
   $var7 = 'Fine Amount Collection';
   $var8 = 'Car No';
   $var9 = 'Area Code';
   $var10 = 'SubArea Code';
   $var11 = 'PlotID';
   $var12 = 'Time of Booking';
   $var13 = 'Payment Time';
   $var14 = 'Payment Mode';
   $var15 = 'Duration';
   $var16 = 'Time of Parking';
   $var17 = 'Actual Time of Parking';
   $var18 = 'Actual Time of Leaving';
   $var19 = 'Confirmation Code';
   
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
   
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }
   
   $sql = 'SELECT * FROM booking';
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
		   echo '<td>'.$var13.'</td>';
		   echo '<td>'.$var14.'</td>';
		   echo '<td>'.$var15.'</td>';
		   echo '<td>'.$var16.'</td>';
		   echo '<td>'.$var17.'</td>';
		   echo '<td>'.$var18.'</td>';
		   echo '<td>'.$var19.'</td>';
		   
		   $counter++;
	   }
	   
		echo '<tr>';
      echo '<td>'.$row['bookingID'].'</td>';
	  echo '<td>'.$row['mobile_user'].'</td>';
	  echo '<td>'.$row['emailID_worker'].'</td>';
	  echo '<td>'.$row['amount'].'</td>';
	  echo '<td>'.$row['fine_amount'].'</td>';
	  echo '<td>'.$row['amount_collection'].'</td>';
	  echo '<td>'.$row['fine_amount_collection'].'</td>';
	  echo '<td>'.$row['car_no'].'</td>';
	  echo '<td>'.$row['area_code'].'</td>';
	  echo '<td>'.$row['subarea_code'].'</td>';
	  echo '<td>'.$row['plotID'].'</td>';
	  echo '<td>'.$row['time_of_booking'].'</td>';
	  echo '<td>'.$row['payment_time'].'</td>';
	  echo '<td>'.$row['payment_mode'].'</td>';
	  echo '<td>'.$row['duration'].'</td>';
	  echo '<td>'.$row['time_of_parking'].'</td>';
	  echo '<td>'.$row['actual_time_of_parking'].'</td>';
	  echo '<td>'.$row['actual_time_of_leaving'].'</td>';
	  echo '<td>'.$row['confirmation_code'].'</td>';
		 echo '</tr>';
   }
   echo '</table>';
   
   mysql_close($conn);
?>

</body>
</html>