<style>
table, tr 
	{ border:2px solid red;}
</style>

<?php

include ("account.php");
include ("myfunctions.php");

( $dbh = mysql_connect ( $hostname, $username, $password ) )
	        or die ( "Unable to connect to MySQL database" );
print "Connected to MySQL <br>";
mysql_select_db( $project );

$username = $_GET ["user"];
$password = $_GET ["userPass"];
$email = $_GET ["email"];
$fullname = $_GET ["fullname"];
$address = $_GET ["address"];
$major = $_GET ["major"];
$cell = $_GET ["cell"];

$username = mysql_real_escape_string($username);
$email = mysql_real_escape_string($email);
$fullname = mysql_real_escape_string($fullname);
$address = mysql_real_escape_string($address);
$major = mysql_real_escape_string($major);
$cell = mysql_real_escape_string($cell);


$hashed = sha1($password);
$check = "select * from secret where hashed = '$hashed'";
$qk = mysql_query($check);
(mysql_num_rows($qk) != 0) or die ("Incorrect Password!");

if ( REGISTERED_count($username) > 0) 
{
	die ( "$username is already in the database! \n\r \n\r <br><br> \n\r \n\r Bye!" );
};

$s = "insert into REGISTERED values ( '$username', '$email', '$fullname', '$cell', '$address', NOW(), '$major' ) ";
( $t = mysql_query ( $s  ) ) or die ( mysql_error() );

print "$username was added to the REGISTERED database \n\r \n\r <br><br> \n\r \n\r";

$l = "select * from REGISTERED where username='$username' ";
( $x = mysql_query ( $l  ) ) or die ( mysql_error() );


$table = "<table> \n\r \n\r <tr> \n\r <td> <b> Username </b> </td> \n\r <td> <b> Email </b> </td> \n\r <td> <b> Full Name </b> </td> \n\r <td> <b> cell </b> </td> \n\r <td> <b> Address </b> </td> \n\r <td> <b> Registered </b> </td> \n\r <td> <b> Major </b> </td> \n\r </tr> \n\r ";

while (   $r = mysql_fetch_array($x) )
	{
    	$username = $r["username"];
		$email  = $r["email"];
		$fullname = $r["fullname"];
		$cell = $r["cell"];
		$address = $r["address"];
		$registered = $r["registration-datetime"];
		$major = $r["major"];
		
		$table .= "\n\r <tr> \n\r <td> $username </td> \n\r <td> $email </td> \n\r <td> $fullname </td> \n\r <td> $cell </td> \n\r <td> $address </td> \n\r <td> $registered </td> \n\r <td> $major </td> \n\r </tr> \n\r";
	}

$table .= "\n\r </table>";

print "$table";


if ( isset( $_GET [ "sendEmail" ] ) ) 
{
	$to = $email;
	$subject = "Registration for $username";
	$message = "Username: $username \n\r Email: $email \n\r Full Name: $fullname \n\r cell: $cell \n\r Address: $address \n\r Registration Date: $registered \n\r Major: $major \n\r";
	mail ($to, $subject, $message);

	print "\n\r \n\r <br><br> \n\r \n\r Registration information was e-mailed to $email \n\r \n\r <br><br> \n\r \n\r";
};

?>