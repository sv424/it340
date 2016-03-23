<?php

function Rnum ( $user , $email) 
    {   
    //Detects user or email is USERS
    $s1   =  "select * from USERS where user='$user' or email='$email'"; 
    $t1   =  mysql_query($s1); 
    return mysql_num_rows($t1);
    //If $user or $email is in USERS a non-zero number is returned, else zero is returned.
    }

function Gnum ( $user , $course)
	{
	$s2  =  "select * from GRADES where user='$user' and course='$course'";
	$t2  =  mysql_query($s2);
	return mysql_num_rows($t2);
	}	
?>
