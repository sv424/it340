<?php

include ("account.php");
$dbh = mysql_connect ( $hostname, $username, $password )
	                    or die ( "Unable to connect to MySQL database" );
print "<br>Connected to MySQL!<br><br>";
mysql_select_db( $project );

$user      = mysql_real_escape_string($_GET["user"    ]);
$pwd       = mysql_real_escape_string($_GET["pwd"     ]);
$email     = mysql_real_escape_string($_GET["email"   ]);
$fullname  = mysql_real_escape_string($_GET["fullname"]);

include ("myfunctions.php");

$new = "INSERT INTO USERS (user,pwd,email,fullname) 
	    VALUES ('$user',sha1('$pwd'),'$email','$fullname')";

if (Rnum($user, $email) != 0) die ("Record already in system!");

if (Rnum($user, $email) == 0)
{
	echo ("<br><br>$new<br><br>");
	(mysql_query ( $new  ) ) or die ( mysql_error() );
	echo ("New record added into USERS TABLE!<br><br>");
		
	if( isset ( $_GET["mail"])) 
	{
		$to = "$email";
		$subject = "Registration Successful!";
		$message = "User: $user\n\r Email: $email\n\r Fullname: $fullname\n\r";
		mail ($to, $subject, $message);
		echo ("<br>The email you requested was sent to: $to<br><br>");
	}
	
	elseif( !isset ( $_GET["mail"])) 
	{
		echo ("Mail Copy Not Requested.<br><br>");
	}
}

echo ("Today is " . date("m/d/y") . "<br><br>");
echo ("The time is " . date("h:i:sa"));

?>
