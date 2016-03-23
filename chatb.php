<?php

include 'account.php';
$dbh = mysql_connect( $hostname, $username, $password )
	        or die ( "Unable to connect to MySQL database" );
//echo "Connected to MySQL<br>";
mysql_select_db ( $project )   or die ( mysql_error (  ) ) ;

$r = $_GET["r"];

$q = "SELECT chat_content FROM USERS WHERE user='$r'";

$k = ( mysql_query ( $q ) );

while($row = mysql_fetch_assoc($k)) 
{
    echo $row["chat_content"] . "<br>";
}

?>