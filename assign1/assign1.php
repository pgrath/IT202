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
mysql_select_db( $project );

$s="select * from registered";  
$grades="select * from grades";
print "<br>$s<br><br>";

//1. GET results of select and store them in $t
( $t = mysql_query ( $s  ) ) or die ( mysql_error() );
//get data from select grades and store it in $gdat
( $gdat = mysql_query ($grades)) or die ( mysql_error());

//print "Rows are:  "  .  mysql_num_rows ($t)  . "<br>" ;
print "<br>";
//2. GET the successive ROWS $r  in $t

$pwd = "2qaz";
$case=4;
$admin="admin";

//these might not be needeed, depending on what I do
$pwd = $_REQUEST["password"];
$adminVal = $_REQUEST["adminName"];
$usr = $_REQUEST["userName"];

//Code for cases
/*
if($password === $pwd ) {
	print"password is correct";
} else{
	die("password is incorrect");
} */
if ($admin === $adminVal and $pwd === $password and !isset(userName)){
	$case = 1;
	print"The case is case 1, selecting all from grades";
	
	//grab the info for the table. styling set up top
print "<table border=1>"; print"\n\r";
print"<tr>Number of rows: ". mysql_num_rows ($gdat) . "</tr>"; print"\n\r";
print "<tr> <td> User </td>	<td> Email </td>	<td> PWD </td>	</tr>"; print"\n\r";
 
while (   $r = mysql_fetch_array($gdat) )
{	//3. GET COLUMNS/CELLS OF ROW $r["---"]
	$user = $r["user"];
	$course = $r["course"];
	$a1  = $r["A1"];
	$a1s  = $r["A1S"];
	$a2  = $r["A2"];
	$a2s  = $r["A2S"];
	$part  = $r["part"];
	$total  = $r["total"];
	$percent  = $r["percent"];
	
	//print the table
	print"<tr>";
	
		print"<td>"	;	print $user	; 		print"</td>"	;	print"\n\r";
		print"<td>"	;	print $course	; 		print"</td>"	; print"\n\r";
		print"<td>"	;	print $a1	; 		print"</td>"	; print"\n\r";
		print"<td>"	;	print $a1s	; 		print"</td>"	; print"\n\r";
		print"<td>"	;	print $a2	; 		print"</td>"	; print"\n\r";
		print"<td>"	;	print $a2s	; 		print"</td>"	; print"\n\r";
		print"<td>"	;	print $part	; 		print"</td>"	; print"\n\r";
		print"<td>"	;	print $total	; 		print"</td>"	; print"\n\r";
		print"<td>"	;	print $percent	; 		print"</td>"	; print"\n\r";
	
	
	print"</tr>";
	
}

print "</table>";
//
	
}
if ($admin === $adminVal and $pwd === $password and isset(userName)){
	$case = 2;
	print"The case is case 2";	
}
if (!isset(adminName)){
	$case = 3;
	print"The case is case 3";
}
//end code for cases


//grab the info for the table. styling set up top
print "<table border=1>"; print"\n\r";
print"<tr>Number of rows: ". mysql_num_rows ($t) . "</tr>"; print"\n\r";
print "<tr> <td> User </td>	<td> Email </td>	<td> PWD </td>	</tr>"; print"\n\r";
 
while (   $r = mysql_fetch_array($t) )
{	//3. GET COLUMNS/CELLS OF ROW $r["---"]
	$user = $r["user"];
	$email = $r["email"];
	$pwd  = $r["pwd"];
	
	//print the table
	print"<tr>";
	
		print"<td>"	;	print $user	; 		print"</td>"	;	print"\n\r";
		print"<td>"	;	print $email	; 		print"</td>"	; print"\n\r";
		print"<td>"	;	print $pwd	; 		print"</td>"	; print"\n\r";
	
	
	print"</tr>";
	
}

print "</table>";

$USR = $_POST['user'];
echo "Select * from registered"

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

