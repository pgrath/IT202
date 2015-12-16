<?php

include ("account.php");
$dbh = mysql_connect ( $hostname, $username, $password )
	                    or die ( "Unable to connect to MySQL database" );
print "Connected to MySQL<br>";
mysql_select_db( $grades );

$s="select * from secret";  
// print "<br>$s<br><br>";

//1. GET results of select and store them in $t
//( $t = mysql_query ( $s  ) ) or die ( mysql_error() );

//print "Rows are:  "  .  mysql_num_rows ($t)  . "<br>" ;
//2. GET the successive ROWS $r  in $t

//get text pass and sha1 it, to insert it into table

$pwd = $_GET["password"];
$user = $_GET["user"];
$course = $_GET["course"];
$a1 = $_GET["a1"];
$a1s = $_GET["a1s"];
$a2 = $_GET["a2"];
$a2s = $_GET["a2s"];


$ins = "insert into GRADES values $user, $course, $a1, $a1s, $a2, $a2s";
mysql_query($ins);


print "<br><br>End PHP";
?>
