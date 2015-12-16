<?php
include ("account.php");
($dbh = mysql_connect ( $hostname, $username, $password ))  or die ( "Unable to connect to MySQL database" );
mysql_select_db( $project );

$addName = $_GET["addName"];
$addPass =$_GET["addPass"];
//sanitize
$addName = mysql_real_escape_string($addName);
$addPass = mysql_real_escape_string($addPass);

$q = "INSERT INTO chat VALUES ('$addName', '$addPass', '')";
( $t = mysql_query ( $q  ) ) or die ( mysql_error() );



 ?>
