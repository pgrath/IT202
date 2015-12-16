

<style>

table { border: 2px solid red; padding: 10px;}

td {padding: 5px;}

</style>

<?php
//possibily use th cells for making background bifferent color, apply grey background to th
include ("account.php");
$dbh = mysql_connect ( $hostname, $username, $password )
	                    or die ( "Unable to connect to MySQL database" );
print "Connected to MySQL<br>";
mysql_select_db( $secret );

$s="select * from secret";  
// print "<br>$s<br><br>";

//1. GET results of select and store them in $t
( $t = mysql_query ( $s  ) ) or die ( mysql_error() );

//print "Rows are:  "  .  mysql_num_rows ($t)  . "<br>" ;
print "<br>";
//2. GET the successive ROWS $r  in $t

//get text pass and sha1 it, to insert it into table
$password = $_GET["password"];
$ins = "insert into SECRET values sha1('$password')";
mysql_query($ins);


//time to check password integrity
$sel = "select * from SECRET where sha1('$password')=password";
//run it 
$r = mysql_query($sel) or die (mysql_error());
	if(mysql_num_rows($r)==0) {die ("password not in DB");};


if (isset($_POST['mail'])){
	$x = mysql_fetch_array($t);
	$user = $x["user"];
	$email = $x["email"];
	
	echo "Mail copy has been checked";	
	$to = "dotslash@mailinator.com";
	$subject = "SQL email success";
	
//	mail($to, $subject, 'User = ';$user; 'email = ';$email);
}
else{
	echo "Mail will not be sent."
	}

print "<br><br>End PHP";
?>

