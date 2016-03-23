<?php

include 'account.php';
$dbh = mysql_connect( $hostname, $username, $password )
	        or die ( "Unable to connect to MySQL database" );
//echo "Connected to MySQL<br>";
mysql_select_db ( $project )   or die ( mysql_error (  ) ) ;

$v = $_GET["v"];
$w = $_GET["w"];
$y = $_GET["y"];

$s = "UPDATE USERS SET chat_content='$v' WHERE user='$y' and pwd=sha1('$w')";

(  mysql_query ( $s ) ) or    ( print   mysql_error( )   );

print $s;

?>
