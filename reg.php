<?php
session_start();
if(isset($_SESSION['username']))
{
header("Location:main.php");
}
include 'dbconn.php';
$uname=$_POST['uname'];
$pw=md5($_POST['pw']);
$email=$_POST['email'];
$phone=$_POST['phone'];
$dob=$_POST['dob'];
$favart=$_POST['favart'];
$favgen=$_POST['favgen'];
$mood=$_POST['mood'];

$art=explode(",",$favart);
$gen=explode(",",$favgen);

$sql="INSERT INTO users(username, password, email, phone, dob, pref_artist1, pref_artist2,pref_genere,pref_mood) 
VALUES('$uname','$pw','$email','$phone','$dob','$art[0]','$art[1]','$gen[0]','$mood')";

mysql_query($sql) or die("Could Not Execute Query");

header("Location:index.php");

?>