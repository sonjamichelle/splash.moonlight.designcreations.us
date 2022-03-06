<?php

//database connection string
//$con = mysql_connect('192.187.114.14', 'inworldz', 'Monster1');
//database name
//$database = "inworldz";
$link = mysqli_connect("192.168.1.80", "halcyon", "PopeyeMonster1@", "mydata");
$database = "mydata";

//mysql_select_db($database, $con);
//if (!$con)
//  {
//  die('Could not connect: ' . mysql_error());
//  }
//

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

// Query the database and get the count

//$result2 = mysqli_query("SELECT COUNT(*) FROM regions");
//list($totalRegions) = mysql_fetch_row($result2);

/* Select queries return a resultset */

$result = $mysqli->query('SELECT COUNT (*) AS `r` FROM regions');
$count = $result->fetch_object()->r;
$result->free();
$mysqli->close();
echo "there are {$count} regions in the table";

?>
