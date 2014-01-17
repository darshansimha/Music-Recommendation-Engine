<?php

session_start();

error_reporting(0);

include 'dbconn.php';
$sid=$_GET['sid'];
$rec=$_GET['recommend'];

$u="select uid from users where username='$_SESSION[username]'";
$r=mysql_query($u) or die("1");
$ro=mysql_fetch_array($r);

$uid=$ro['uid'];

$q1="select view_counter from song_views where sid='$sid' and uid='$uid'";
$r1=mysql_query($q1);
$num=mysql_num_rows($r1);

if($num==0)
{
$q2="insert into song_views(sid,uid,view_counter) values ('$sid','$uid',1)";
$r2=mysql_query($q2) or die("new failed");
}

elseif($num>0){
$r3=mysql_query("select * from song_views where sid='$sid' and uid='$uid'") or die("e fail");
$ro1=mysql_fetch_array($r3);

$ro1['view_counter']++;

$rt=$ro1['view_counter'];
mysql_query("UPDATE song_views SET view_counter='$rt' WHERE sid='$sid' and uid='$uid'") or die("update fail");


}




?>
<html>
<body>
<form method="post" action="search.php">
<input type="text" name="keyword" />
<input type="submit" value="search">
</form>
</body>
</html>
