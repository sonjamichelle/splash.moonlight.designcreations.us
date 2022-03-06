<?php

$con = new mysqli("198.204.250.101", "opensimuser", "PopeyeMonster3$", "opensim");

/* check connection */
if ($con->connect_errno) {
    printf("Connect failed: %s\n", $con->connect_error);
    exit();
}

// Query the database and get the count

$result1 = mysqli_query($con, "SELECT COUNT(*) FROM agents WHERE agentOnline = 1");
list($totalUsers) = mysqli_fetch_row($result1);

$result2 = mysqli_query($con, "SELECT COUNT(*) FROM regions");
list($totalRegions) = mysqli_fetch_row($result2);

$result3 = mysqli_query($con, "SELECT COUNT(*) FROM users");
list($totalAccounts) = mysqli_fetch_row($result3);

$result4 = mysqli_query($con, "SELECT COUNT(*) FROM users WHERE lastlogin > (UNIX_TIMESTAMP() - (30*86400))");
list($activeUsers) = mysqli_fetch_row($result4);

$result5 = mysqli_query($con, "SELECT COUNT(*) FROM users WHERE lastlogin > (UNIX_TIMESTAMP() - (7*86400))");
list($activeUsers7) = mysqli_fetch_row($result5);

$result6 = mysqli_query($con, "SELECT COUNT(*) FROM users WHERE lastlogin > (UNIX_TIMESTAMP() - (1*86400))");
list($activeUsers24) = mysqli_fetch_row($result6);

// Display the results
echo "<div id='stats2'><b><font color=#FFFFFF>Users in world</font><font color=#b0c4de> : ". $totalUsers ."<font color=#b0c4de><br>";
echo "<font color=#FFFFFF>Total Regions</font> : ". $totalRegions ."<font #b0c4de><br>";
echo "<font color=#FFFFFF>Active users (last 30 days)</font> : ". $activeUsers ."<font color=#b0c4de><br>";
echo "<font color=#FFFFFF>Active users (last  7 days)</font> : ". $activeUsers7 ."<font color=#b0c4de><br>";
echo "<font color=#FFFFFF>Active users (last 24 hours)</font> : ". $activeUsers24 ."<font color=#b0c4de><br>";
echo "<font color=#FFFFFF>Total Registered Users</font> : ". $totalAccounts ."<font color=#b0c4de><br>";
if (file_get_contents("http://sonja.hopto.org:9500/simstatus/") == 'OK'){
	
	echo "<font color=#FFFFFF>Grid is</font> <font color=#00AA00>ONLINE</font></b><br></div>";
	
}else{
	
	echo "<font color=#FFFFFF>Grid is</font> <font color=#AA0000>OFFLINE</font></b><br></div>";
}

?>
