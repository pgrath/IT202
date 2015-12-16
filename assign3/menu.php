<?php

include ("account.php");

($dbh = mysql_connect ( $hostname, $username, $password ))  or die ( "Unable to connect to MySQL database" );
mysql_select_db( $project );
//$query = $_GET ["state"]

print "<select  name = \"towns\" id = \"towns\"  >"; //Start the menu element


$t= "select * from towns";
$x = mysql_query($t);

while  (   $r  =   mysql_fetch_array ( $x )  ) //Loop over the rows $r of results $t
{
    $town = $r[ "town"];
    $state = $r["state"];

    $glue = $town . $state;
    print   "<option  value =\"$glue\" >"; //Define value for menu choice
    print   "$glue" ;    //Define visible menu choice
    print   "</option>"  ; //End option tag

}

print "</select>";

?>
