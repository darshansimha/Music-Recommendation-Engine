<?php
session_start();

error_reporting(0);

if($_SESSION['m1']!="" || $_SESSION['m2']!="" || $_SESSION['m3']!="" || $_SESSION['m4']!="")
{
$k=1;
}
else
{
$k=0;
}

$uname=$_SESSION['username'];

if(!isset($_SESSION['username']))
{
header("Location:index.php");
}

include 'dbconn.php';

include 'functions.php';

$sql="select visit_counter,strategy from users where username='$uname'";

$result=mysql_query($sql);

$row=mysql_fetch_array($result);

$str=$row['strategy'];


if($row['visit_counter']<10)
{
$p=0;
$p=(int)$p;
songs_recommend($p);
}

elseif($row['visit_counter']>10 && $k>0)
{
$p=1;
$p=(int)$p;
songs_recommend($p);
}

else
{
songs_recommend($str);
}
echo "<a href=logout.php>Logout</a>";

?>

<html>
<body>
<br/><br/>
<form method="post" action="search.php">
<input type="text" name="keyword" />
<input type="submit" value="search">
</form>
</body>
</html>