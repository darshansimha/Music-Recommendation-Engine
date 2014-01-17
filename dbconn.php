<?php

$host="localhost";
$password="";
$user="root";

$db="music";

$con=mysql_connect($host,$user,$password) or die("Could Not Connect To The Server");

if($con)
{
$dbconn=mysql_select_db($db,$con) or die("Could Not Connect To The Database");
}


?>
