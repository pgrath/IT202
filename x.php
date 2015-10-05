<?php
print "Welcome";
<br>
$password="123345";
$case=4;
$admin="admin";

$pwd = $_REQUEST["password"];
$adminVal = $_REQUEST["adminName"];
$usr = $_REQUEST["userName"];

if($password === $pwd ) {
	print"password is correct";
} else{
	die("password is incorrect");
}
if ($admin === $adminVal and $pwd === $password and !isset(userName)){
	$case = 1;
	print"The case is case 1";
}
if ($admin === $adminVal and $pwd === $password and isset(userName)){
	$case = 2;
	print"The case is case 2";	
}
if (!isset(adminName)){
	$case = 3;
	print"The case is case 3";
}

if (isset($_POST[checkMail])){
	print"Mail box has been checked";
	//bonus stuff
	mail(schooltestacct@mailinator.com,"TEST","This is a test message!");
}
?>