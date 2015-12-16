<?php
include ("account.php");
($dbh = mysql_connect ( $hostname, $username, $password ))  or die ( "Unable to connect to MySQL database" );
mysql_select_db( $project );

$names = $_GET["user"];
$names = mysql_real_escape_string($names);

$x = "SELECT user FROM chat WHERE user='$names'";
$c = (mysql_query($x)) or die(mysql_error()  );

$dat = mysql_fetch_array($c);
echo $dat['user'];


?>
