

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
print "<br>$s<br><br>";

//1. GET results of select and store them in $t
( $t = mysql_query ( $s  ) ) or die ( mysql_error() );

//print "Rows are:  "  .  mysql_num_rows ($t)  . "<br>" ;
print "<br>";
//2. GET the successive ROWS $r  in $t


print "<table border=1>"; print"\n\r";
print"<tr>Number of rows: ". mysql_num_rows ($t) . "</tr>"; print"\n\r";
print "<tr> <td> User </td>	<td> Email </td>	<td> PWD </td>	</tr>"; print"\n\r";
 
while (   $r = mysql_fetch_array($t) )
{	//3. GET COLUMNS/CELLS OF ROW $r["---"]
	$user = $r["user"];
	$email = $r["email"];
	$pwd  = $r["pwd"];
	
	print"<tr>";
	
		print"<td>"	;	print $user	; 		print"</td>"	;	print"\n\r";
		print"<td>"	;	print $email	; 		print"</td>"	; print"\n\r";
		print"<td>"	;	print $pwd	; 		print"</td>"	; print"\n\r";
	
	
	print"</tr>";
	//print "<br> Name is: $name <br>Age is: $age <br>SSN is: $ssn<br><br>";
}



print "</table>";

if (isset($_POST['mail'])){
	echo "Mail copy has been checked";
	
}

print "<br><br>End PHP";
?>

