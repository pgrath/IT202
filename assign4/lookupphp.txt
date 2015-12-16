<?php
include ("account.php");
($dbh = mysql_connect ( $hostname, $username, $password ))  or die ( "Unable to connect to MySQL database" );
mysql_select_db( $project );

$userName = $_GET["user"];
$pwd = $_GET["pwd"];
$chatMsg = $_GET["chatMsg"];
//sanatize
$userName = mysql_real_escape_string($userName);
$pwd = mysql_real_escape_string($pwd);
$chatMsg = mysql_real_escape_string($chatMsg);

$pwChk = "SELECT * FROM chat WHERE user='$userName' AND pwd='$pwd'";
$t = mysql_query($pwChk) or print mysql_error();
if(mysql_num_rows($t) == 0){
  print"Password or username incorrect!";
}

//update the text in the chat field
$q = "UPDATE chat SET chat = '$chatMsg' WHERE user ='$userName' AND pwd = '$pwd' ";

( $updateMsg = mysql_query ( $q  ) ) or die ( mysql_error() );



 ?>
