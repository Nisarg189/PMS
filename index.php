<?php
ob_start(); /* This funtion is added to avoid Header Refresh error */
function fetch_edit($tableName, $Array, $lookupCheck)		/* tableName is the table in MySQL, Array is the array of field name, lookupCheck is boolean indicator*/
{
    $hostname = 'localhost:3306';
    $username = 'root';
    $password = '';
    $dbname = 'pms';
    try {
        $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
        if(!$lookupCheck)
            $sql = $dbh->prepare("SELECT * FROM Lookup");
        else
            $sql = $dbh->prepare("SELECT * FROM $tableName");
        if($sql->execute())
        {
            $sql->setFetchMode(PDO::FETCH_ASSOC);
        }
    }
    catch(Exception $error)
    {
        echo '<p>', $error->getMessage(), '</p>';
    }
    $actualTable = '1';
    $retval = null;
    if($lookupCheck)
    { ?>
        <br>
        <br>
        <br>

        <div class = "row">

            <div class = "col-sm-2">
            </div>

            <div class = "col-sm-2">
                    <button type="submit" class="btn btn-default btn-sm" name="AddButton" id="AddButton">
                        <span class="glyphicon glyphicon-plus"></span><a href="" id="alertMe"> New</a>
                    </button>
            </div>

            <div class = "col-sm-8">
                <button type="submit" class="btn btn-default btn-sm" name="searchButton" id="searchButton">
                    <span class="glyphicon glyphicon-search"></span><a href="" id="alertMe1">Search</a>
                </button>
            </div>

        </div>

        <br>
        <div class="container">

            <!-- ADD BLOCK  -->

            <div class="alert alert-success alert-block fade in" id="successAlert">
                <button type="button" class="close" data-hide="alert">&times;</button>


                <table class="table table-bordered" align="center" style="width:10%"> <?php
                    for($i=0;$i<count($Array);$i++) /*Following block displays the column field names in the add form */
                    { ?>
                        <th>
                            <div style="width: 250px">
                                <?php echo $Array[$i]; ?>
                            </div>
                        </th> <?php
                    }
                    /* Following block deals with form logic for add */
                    if(isset($_POST['add']))
                    {
                        $conn = mysql_connect($hostname, $username, $password);
                        if(! $conn )
                        {
                            die('Could not connect: ' . mysql_error());
                        }
                        if(! get_magic_quotes_gpc() )
                        {
                            for($i=0;$i<count($Array);$i++)
                            {
                                $addField[$i] = addslashes ($_POST["$Array[$i]"]);
                            }
                        }
                        else
                        {
                            for($i=0;$i<count($Array);$i++)
                            {
                                $addField[$i] = $_POST["$Array[$i]"];
                            }
                        }
                        $str = implode (", ", $Array);
                        $val = "'".implode ("','", $addField)."'";
                        $sql = "INSERT INTO $tableName ". "($str) ". "VALUES($val)";
                        mysql_select_db($dbname);
                        $retval = mysql_query( $sql, $conn );
                        if(! $retval )
                        {
                            die('Could not enter data: ' . mysql_error());
                        }
                        else
                            header("Refresh:0");
                        mysql_close($conn);
                    }
                    else
                    { ?>
                        <!-- Form for adding new data -->
                        <form method = "post" action = "<?php $_PHP_SELF ?>">
                            <tr> <?php
                                for($i=0;$i<count($Array);$i++)
                                { ?>
                                    <td>
                                        <input name = "<?php echo $Array[$i]; ?>" type = "text" id = "<?php echo $Array[$i]; ?>">
                                    </td> <?php
                                } ?>
                                <td>
                                    <button type="submit" id = "add" name="add">
                                        <span class="glyphicon glyphicon-plus"></span>
                                    </button>
                                </td>
                            </tr>
                        </form> <?php
                    } ?>

                </table>

            </div><!-- end alert -->

        </div><!-- End Container sucess alert  -->
















        <div class="container">

            <!-- EDIT BLOCK  -->

            <div class="alert alert-success alert-block fade in" id="successAlert2">
                <button type="button" class="close" data-hide="alert">&times;</button>


                <table class="table table-bordered" align="center" style="width:10%"> <?php
                    for($i=0;$i<count($Array);$i++) /*Following block displays the column field names in the add form */
                    { ?>
                        <th>
                            <div style="width: 250px">
                                <?php echo $Array[$i]; ?>
                            </div>
                        </th> <?php
                    }
                    /* Following block deals with form logic for add */
                    if(isset($_POST['edit']))
                    {
                        $conn = mysql_connect($hostname, $username, $password);
                        if(! $conn )
                        {
                            die('Could not connect: ' . mysql_error());
                        }
                        if(! get_magic_quotes_gpc() )
                        {
                            for($i=0;$i<count($Array);$i++)
                            {
                                $addField[$i] = addslashes ($_POST["$Array[$i]"]);
                            }
                        }
                        else
                        {
                            for($i=0;$i<count($Array);$i++)
                            {
                                $addField[$i] = $_POST["$Array[$i]"];
                            }
                        }
                        $str = implode (", ", $Array);
                        $val = "'".implode ("','", $addField)."'";
                        $sql = "INSERT INTO $tableName ". "($str) ". "VALUES($val)";
                        mysql_select_db($dbname);
                        $retval = mysql_query( $sql, $conn );
                        if(! $retval )
                        {
                            die('Could not enter data: ' . mysql_error());
                        }
                        else
                            header("Refresh:0");
                        mysql_close($conn);
                    }
                    else
                    { ?>
                        <!-- Form for adding new data -->
                        <a href="#" target="_blank" id="alertMe2" onclick="javascript:Test('Test');">Google Chrome</a>
                        <script type="text/javascript">
                            function sendID(clicked_id)
                            {
                                var l = document.getElementById('my-link');
                                l.click();
                                alert(clicked_id);
                            }
                        </script>
                        <form method = "post" action = "<?php $_PHP_SELF ?>">
                            <tr> <?php
                                for($i=0;$i<count($Array);$i++)
                                { ?>
                                    <td>
                                        <input value = "1" name = "<?php echo $Array[$i]; ?>" type = "text" id = "<?php echo $Array[$i]; ?>">
                                    </td> <?php
                                } ?>
                                <td>
                                    <button type="submit" id = "editCnf" name="editCnf">
                                        <span class="glyphicon glyphicon-ok"></span>
                                    </button>
                                </td>
                                <td>
                                    <button type="submit" id = "editCancel" name="editCancel">
                                        <span class="glyphicon glyphicon-remove"></span>
                                    </button>
                                </td>
                            </tr>
                        </form> <?php
                    } ?>

                </table>

            </div><!-- end alert -->

        </div><!-- End Container sucess alert  -->






























        <div class="container">

            <!-- SEARCH BLOCK  -->

            <div class="alert alert-success alert-block fade in" id="successAlert1">
                <button type="button" class="close" data-hide="alert">&times;</button>


                <table class="table table-bordered" align="center" style="width:10%"> <?php
                    for($i=0;$i<count($Array);$i++) /*Following block displays the column field names in the search form */
                    { ?>
                        <th>
                            <div style="width: 250px">
                                <?php echo $Array[$i]; ?>
                            </div>
                        </th> <?php
                    }
                    /* Following block deals with form logic for search */
                    if(isset($_POST['searchInfo']))
                    {
                        $conn = mysql_connect($hostname, $username, $password);
                        if(! $conn )
                        {
                            die('Could not connect: ' . mysql_error());
                        }
                        if(! get_magic_quotes_gpc() )
                        {
                            for($i=0;$i<count($Array);$i++)
                            {
                                $addField1[$i] = addslashes ($_POST["$Array[$i]"]);
                            }
                        }
                        else
                        {
                            for($i=0;$i<count($Array);$i++)
                            {
                                $addField1[$i] = $_POST["$Array[$i]"];
                            }
                        }
                        $str = "(".implode (", ", $Array).")";
                        $val = "('".implode ("','", $addField1)."')";
                        $sql = "SELECT * FROM $tableName WHERE $str = $val";
                        mysql_select_db($dbname);
                        $retval = mysql_query( $sql, $conn );
                        if(! $retval )
                        {
                            die('Could not search data: ' . mysql_error());
                        }
                        else
                        {
                            echo "<table align='center' border='1'>";
                            echo "<tr>";
                            for($i=0;$i<count($Array);$i++)
                            {
                                echo "<td width='100px' align='center'>" . $Array[$i] . "</td>";
                            }
                            echo "</tr>";
                            while($rowFetch=mysql_fetch_array($retval)) {
                                echo "<tr>";
                                for($i=0;$i<count($Array);$i++)
                                {
                                    $var[$i] = $rowFetch[$Array[$i]];
                                    echo "<td width='200px' align='center'>" . $var[$i] . "</td>";
                                }
                                echo "</tr>";
                            }
                            echo "</table>";
                            /*header("Refresh:0");*/
                        }
                        mysql_close($conn);
                    }
                    else
                    { ?>
                        <!-- Form for adding new data -->

                        <form method = "post" action = "<?php $_PHP_SELF ?>">
                            <tr> <?php
                                for($i=0;$i<count($Array);$i++)
                                { ?>
                                    <td>
                                        <input name = "<?php echo $Array[$i]; ?>" type = "text" id = "<?php echo $Array[$i]; ?>">
                                    </td> <?php
                                } ?>
                                <td>
                                    <button type="submit" id = "searchInfo" name="searchInfo">
                                        <span class="glyphicon glyphicon-search"></span>
                                    </button>
                                </td>
                            </tr>
                        </form> <?php
                    } ?>

                </table>

            </div><!-- end alert -->


        </div><!-- End Container sucess alert  -->





















        <br>













        <table class="table table-bordered" align="center" style="width:10%">
            <thead>
            <tr>
                <th>
                    Sr. No.
                </th>

                <th>
                    <div  style="width: 80px">Action</div>
                </th>
                <?php
                for($i=0;$i<count($Array);$i++)
                { ?>
                    <th>
                        <div style="width: 250px">
                            <?php echo $Array[$i]; ?>
                        </div>
                    </th> <?php
                } ?>
            </tr>
            </thead>
            <tbody> <?php
            $counter = 0;
            while($row = $sql->fetch())
            {
                $counter++;

                echo '<tr id= row_'.$counter. ' name= '.$counter.'>';
                    echo '<td>'.$counter.'</td>';

                if(isset($_POST["delete_".$counter]))
                {
                    $conn = mysql_connect($hostname, $username, $password);
                    if(! $conn )
                    {
                        die('Could not connect: ' . mysql_error());
                    }
                    $value = trim($row[$Array[0]],'"');
                    $sql = "DELETE FROM $tableName WHERE $Array[0] = $value";
                    mysql_select_db($dbname);
                    $retval = mysql_query( $sql, $conn );
                    if(! $retval )
                    {
                        die('Could not delete data: ' . mysql_error());
                    }
                    else
                        header("Refresh:0");
                    mysql_close($conn);
                } ?>

                <form method = "post" action = "<?php $_PHP_SELF ?>">
                    <td>
                        <button type="submit" id = "<?php echo "delete_".$counter; ?>" name="<?php echo "delete_".$counter; ?>">
                            <span class="glyphicon glyphicon-trash"></span>
                        </button>
                </form> <?php
                    echo '<button id="editAccessBtn_'.$counter.'">'; ?>
                        <span class="glyphicon glyphicon-pencil"></span>
                    </button>
                </td><?php

                for($i=0;$i<count($Array);$i++)
                { ?>
                    <td><?php echo $row[$Array[$i]]; ?></td> <?php
                }

                echo '<td id="okBtn_'.$counter.'" style="visibility: hidden">';?>
                    <button>
                        <span class="glyphicon glyphicon-ok"></span>
                    </button>
                </td> <?php

                echo '<td id="removeBtn_'.$counter.'" onclick= cancelEdit('.$counter.') style="visibility: hidden">';?>
                <button>
                    <span class="glyphicon glyphicon-remove"></span>
                </button>
                </td>

                </tr> <?php
            }
            ?>
            </tbody>
        </table> <?php
    }
    else
    {
        while($row = $sql->fetch())
        {
            if($row[$Array[0]]==$tableName && $row[$Array[2]]=='1')
                $actualTable = $row[$Array[1]];
        }
    }
    return $actualTable;
}
if (isset($_GET['search']))
{
    sendData($_GET['search']);
}
function sendData($tableSearchSend)
{
    $actualTableName = getData($tableSearchSend, false);
    if($actualTableName=='1')
    {
        ?> <br><br><br> <?php
        echo "Access Denied";
    }
    else
        $dummyData = getData($actualTableName, true);
}
function getData($tableSearch, $check)
{
    $conn = mysql_connect('localhost:3306', 'root', '');
    if (!$conn) {
        die('Could not connect: ' . mysql_error());
    }
    mysql_select_db('pms');
    if(!$check)
        $query = "select * from Lookup";
    else
        $query = "select * from $tableSearch";
    $result = mysql_query($query);
    if (!$result)
    {
        die('Query failed: ' . mysql_error());
    }
    $i = 0;
    while ($i < mysql_num_fields($result))
    {
        $meta = mysql_fetch_field($result, $i);
        $output[$i] = $meta->name;
        $i++;
    }
    $returnTableName = fetch_edit($tableSearch, $output, $check);
    return $returnTableName;
} ?>

<!DOCTYPE html>

<html>
<head>

    <!-- Website Title & Description for Search Engine purposes -->
    <title>Janmarg - Smart Parking Management System</title>
    <meta name="description" content="Learn how to code your first responsive website with the new Twitter Bootstrap 3.">

    <!-- Mobile viewport optimized -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="includes/css/bootstrap-glyphicons.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="includes/css/styles.css">

    <!-- Include Modernizr in the head, before any other Javascript -->
    <script src="includes/js/modernizr-2.6.2.min.js"></script>

</head>
<body>

<div class="container" id="main">

    <div class="navbar navbar-fixed-top">
        <div class="container">

            <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
            <button class="navbar-toggle" data-target=".navbar-responsive-collapse" data-toggle="collapse" type="button">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="/"><img src="images/logo.png" alt="Your Logo"></a>

            <div class="nav-collapse collapse navbar-responsive-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="index.php">Home</a>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Master<strong class="caret"></strong></a>

                        <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">

                            <li><a href="?search=CarUser">User</a></li>

                            <li><a href="?search=Worker">Worker</a></li>
                            <li class="dropdown-submenu">
                                <a tabindex="-1" href="#">Location</a>
                                <ul class="dropdown-menu">
                                    <li><a tabindex="-1" href="?search=Plot">Plot</a></li>
                                    <li><a tabindex="-1" href="?search=Subarea">Subarea</a></li>
                                    <li><a href="?search=Area">Area</a></li>
                                    <li><a href="?search=City">City</a></li>
                                </ul>
                            </li>

                            <li><a href="?search=Fare">Fare</a></li>
                        </ul><!-- end dropdown-menu -->
                    </li>

                    <li class="inactive">
                        <a href="#">Analysis</a>
                    </li>

                    <li class="inactive">
                        <a href="#">Feedback</a>
                    </li>

                    <li class="inactive">
                        <a href="#">Current Status</a>
                    </li>

                </ul>

                <form class="navbar-form pull-right">
                    <input type="text" class="form-control" placeholder="Search this site..." id="searchInput">
                    <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
                </form><!-- end navbar-form -->

                <ul class="nav navbar-nav pull-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> My Account <strong class="caret"></strong></a>

                        <ul class="dropdown-menu">
                            <li>
                                <a href="#"><span class="glyphicon glyphicon-wrench"></span> Settings</a>
                            </li>

                            <li>
                                <a href="#"><span class="glyphicon glyphicon-refresh"></span> Update Profile</a>
                            </li>

                            <li class="divider"></li>

                            <li>
                                <a href="#"><span class="glyphicon glyphicon-off"></span> Sign out</a>
                            </li>
                        </ul>
                    </li>
                </ul><!-- end nav pull-right -->
            </div><!-- end nav-collapse -->

        </div><!-- end container -->
    </div><!-- end navbar -->





    <!-- All Javascript at the bottom of the page for faster page loading -->

    <!-- First try for the online version of jQuery-->
    <script src="C:\xampp\htdocs\PMS_Repo\includes\js"></script>

    <!-- If no online access, fallback to our hardcoded version of jQuery -->
    <script>window.jQuery || document.write('<script src="includes/js/jquery-1.8.2.min.js"><\/script>')</script>

    <!-- Bootstrap JS -->
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <!-- Custom JS -->
    <script src="includes/js/script.js"></script>


</body>
</html>