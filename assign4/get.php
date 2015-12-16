<?php
include ("account.php");
($dbh = mysql_connect ( $hostname, $username, $password ))  or die ( "Unable to connect to MySQL database" );
mysql_select_db( $project );

$user2 = $_GET["user2"];
$user2 = mysql_real_escape_string($user2);

$user2Query = "SELECT chat FROM chat WHERE user ='$user2'";

$x = (mysql_query($user2Query)) or die(mysql_error()  );

$var = mysql_fetch_array($x);
echo $var['chat'];
//print $x;

?>
