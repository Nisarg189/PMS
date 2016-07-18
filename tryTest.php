<html>
   
   <head>
      <title>Add New Record in MySQL Database</title>
   </head>
   
   <body>
      <?php
         if(isset($_POST['add'])) {
            $dbhost = 'localhost:3306';
            $dbuser = 'root';
            $dbpass = '';
            $conn = mysql_connect($dbhost, $dbuser, $dbpass);
            
            if(! $conn ) {
               die('Could not connect: ' . mysql_error());
            }
            
            if(! get_magic_quotes_gpc() ) {
               $mobile_no = addslashes ($_POST['mobile_no']);
               $car_no = addslashes ($_POST['car_no']);
            }else {
               $mobile_no = $_POST['mobile_no'];
               $car_no = $_POST['car_no'];
            }
            
            $sql = "INSERT INTO car_user ". "(mobile_no, car_no) ". "VALUES('$mobile_no','$car_no')";
               
            mysql_select_db('pms');
            $retval = mysql_query( $sql, $conn );
            
            if(! $retval ) {
               die('Could not enter data: ' . mysql_error());
            }
            
            echo "Entered data successfully\n";
            
            mysql_close($conn);
         }else {
            ?>
            
               <form method = "post" action = "<?php $_PHP_SELF ?>">
                  <table width = "400" border = "0" cellspacing = "1" 
                     cellpadding = "2" >
                  
                     <tr>
                        <td width = "100">Mobile Numbers</td>
                        <td><input name = "mobile_no" type = "text" 
                           id = "mobile_no"></td>
                     </tr>
                  
                     <tr>
                        <td width = "100">Car Number</td>
                        <td><input name = "car_no" type = "text" 
                           id = "car_no"></td>
                     </tr>
                  
                     <tr>
                        <td width = "100"> </td>
                        <td> </td>
                     </tr>
                  
                     <tr>
                        <td width = "100"> </td>
                        <td>
                           <input name = "add" type = "submit" id = "add" 
                              value = "Add Employee">
                        </td>
                     </tr>
                  
                  </table>
               </form>
            
            <?php
         }
      ?>
   
   </body>
</html>