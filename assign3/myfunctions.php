<?php
//explains itself. 
function Rnum ( $username , $email ){
	$getRow = "select * FROM registered where user = '$username' or email = '$email'";
	$t = mysql_query($getRow) or print mysql_error();
	return mysql_num_rows($t);
}
//same as rnum, just with grades table. Dont misuse!
function Gnum ( $username , $course ){
	$getGr = "select * FROM grades where user = '$username' and course = '$course'";
	$t = mysql_query($getGr) or print mysql_error();
	return mysql_num_rows($t);
}

?>