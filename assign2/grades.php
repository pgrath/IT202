<style>
table, tr { border:2px solid red;}
</style>

<?php
//
include ("account.php");
include ("myfunctions.php");

($dbh = mysql_connect ( $hostname, $username, $password ))  or die ( "Unable to connect to MySQL database" );

print "Connected to MySQL <br>";
mysql_select_db( $project );

//get password then hash to to compare
$password = $_GET ["password"];
$password = mysql_real_escape_string($password);
$hashed = sha1($password);
//check hashed password from table with hashed pwds
$checkPW = "select * from encrypt where pwd = '$hashed'";
$PwdChk = mysql_query($checkPW);
//if the password matches, continue, if not , die
(mysql_num_rows($PwdChk) != 0) or die ("Incorrect Password!");

//get user and course from form
$username = $_GET ["user"];
$course = $_GET ["course"];
//prevent xss
$username = mysql_real_escape_string($username);
$course = mysql_real_escape_string($course);
//same deal, get extra points and sanitize it
$expts = $_GET ["expts"];
$expts = mysql_real_escape_string($expts);

//make sure user is not already in registered. leave email field blank
if ( Rnum($username , "" ) == 0) {
	die ( "$username is in db already <br><br> Exiting." );
};
//make sure the same user is not already in grades
if ( Gnum($username , $course ) == 0 ){
//insert the userdata into grades, exclude the other stuff
	$insGrades = "insert into grades values ( '$username', '$course', '', '', '', '', '', '', '' ) ";
	( $ins = mysql_query ( $insGrades  ) ) or die ( mysql_error() );
	print "$username was added to grades  <br>";
};
//now to add values to newly added user, make sure it exists first.
if ( Gnum($username , $course ) > 0 ){
//if the boxes are set, get the a data
	if ( isset( $_GET [ "usea1" ] ) ){
		$A1 = $_GET ["a1"];
		$A1S = $_GET ["a1s"];
		//prevent xss
		$A1 = mysql_real_escape_string($A1);
		$A1S = mysql_real_escape_string($A1S);
		//update a1 section of $username
		$updateA1 = "update grades set A1 = '$A1', A1S = '$A1S' where user = '$username' and course = '$course' ";
		( $A1update = mysql_query ( $updateA1  ) ) or die ( mysql_error() );
	};
//moving on to a2, mostly same as above
	if ( isset( $_GET [ "usea2" ] ) ){
		$A2 = $_GET ["a2"];
		$A2S = $_GET ["a2s"];
		//also prevent xss
		$A2 = mysql_real_escape_string($A2);
		$A2S = mysql_real_escape_string($A2S);
		//update a2 section of $username
		$updateA2 = "update grades set A2 = '$A2', A2S = '$A2S' where user = '$username' and course = '$course' ";
		( $A2update = mysql_query ( $updateA2  ) ) or die ( mysql_error() );
	};
	//time to do extrapts from above.
	$updateExpts = "update grades set part = part + '$expts', total = A1 + A2 + expts, percent = (total/150) * 100 where user = '$username' and course = '$course' ";
	( $qupdateExtra = mysql_query ( $updateExpts  ) ) or die ( mysql_error() );
	print "$username updated in grades  <br><br>    ";
};


//maknig sure only the admin sees all grades
if($username == "admin" and $password == "009"){
	//get ALL data, and ready to print table showing all of it
$j="select * from grades where user = '$username' and course = '$course'";
( $k = mysql_query ( $j ) ) or die ( mysql_error() );
while (   $r = mysql_fetch_array($k) ){
    	$A1 = $r["A1"];
    	$A1S = $r["A1S"];
    	$A2 = $r["A2"];
    	$A2S = $r["A2S"];
    	$expts = $r["expts"];
    	$total = $r["total"];
    	$percent = $r["percent"];
}
//print the table.
$table = "  <table>     <tr>   <td> <b> User </b> </td>   <td> <b> Course </b> </td>   <td> <b> A1 </b> </td>   <td> <b> A1S </b> </td>   <td> <b> A2 </b> </td>   <td> <b> A2S </b> </td>   <td> <b> Part </b> </td>   <td> <b> Total </b> </td>   <td> <b> percent </b> </td>   </tr>    ";
$table .= "<tr>   <td> $username </td>   <td> $course </td>   <td> $A1 </td>   <td> $A1S </td>   <td> $A2 </td>   <td> $A2S </td>   <td> $expts </td>   <td> $total </td>   <td> $percent </td>   </tr>    ";
$table .= "</table>    ";
print "$table";
	
}
//end php
?>