<?php

include ("account.php");
include ("myfunctions.php");

($dbh = mysql_connect ( $hostname, $username, $password ))
	or die ( "Unable to connect to MySQL database" );
print "Connected to MySQL <br>";
mysql_select_db( $project );

//get data from html form
$username = $_GET ["user"];
$password = $_GET ["userPass"];
$email = $_GET ["email"];
$fullname = $_GET ["fullname"];
$major = $_GET ["major"];
$cell = $_GET ["cell"];

//start to get parts of address field
$towns = $_GET ["towns"];
$address = $_GET ["address"];
$states = $_GET ["states"];
$zip = $_GET ["zipcode"];

//put em together
$addressFinal = $towns . $address . $states . $zip;

//use RES to sanitize input
$password = mysql_real_escape_string($password);
$username = mysql_real_escape_string($username);
$email = mysql_real_escape_string($email);
$fullname = mysql_real_escape_string($fullname);
$major = mysql_real_escape_string($major);
$cell = mysql_real_escape_string($cell);
$addressFinal = mysql_real_escape_string($addressFinal);

//sha1 $password, if needed later. remove before submitting if you dont
$hashpw = sha1($password);


//check if the user is already in the registered table. if they are, quit
if ( Rnum($username, $email) > 0)
{
	die ( "$username and $email are already in the database! Ending. <br><br>  Bye!" );
};
//if it isnt, add it
$s = "insert into registered values ( '$username', '$email', '$hashpw', '$fullname', '$cell', '$addressFinal', NOW(), '$major', 0 ) ";
( $t = mysql_query ( $s  ) ) or die ( mysql_error() );

print "$username was added to registered! <br><br> ";

//get info that was just added, since it will match username
$l = "select * from registered where user='$username' ";
( $x = mysql_query ( $l  ) ) or die ( mysql_error() );

//start table row
$table = "<table> <tr> <td> <b> Username </b> </td>  <td> <b> Email </b> </td>  <td> <b> Full Name </b> </td>  <td> <b> cell </b> </td>  <td> <b> Address </b> </td>  <td> <b> Registered </b> </td>  <td> <b> Major </b> </td> </tr>";

while (   $r = mysql_fetch_array($x) )
	{
		//get data to print into table
    	$username = $r["user"];
		$email  = $r["email"];
		$fullname = $r["fullname"];
		$cell = $r["cell"];
		$address = $r["address"];
		$registTime = $r["regist_datetime"];
		$major = $r["major"];

		//properly formatted table now
		$table .= " <tr>  <td> $username </td>  <td> $email </td>  <td> $fullname </td>  <td> $cell </td>  <td> $address </td>  <td> $registTime </td>  <td> $major </td>  </tr> ";


	}

$table .= "\n\r </table>";

print "$table";
?>
