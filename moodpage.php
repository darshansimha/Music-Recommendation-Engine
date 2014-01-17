<?php

session_start();

error_reporting(0);

if(isset($_POST['m1']) || isset($_POST['m2']) || isset($_POST['m3']) ||isset($_POST['m4']))
{
$_SESSION['m1']=$_POST['m1'];
$_SESSION['m2']=$_POST['m2'];
$_SESSION['m3']=$_POST['m3'];
$_SESSION['m4']=$_POST['m4'];


header("Location:main.php");


}

else
{
echo "Please let us help you better!";
}



?>

<!Doctype HTML>
<html lang="en">

<head>
<title>Beta</title>
<meta charset="utf-8" />

</head>
<body>

<form name="f2" method="post" action="moodpage.php">

How are You Feeling Today??<br/>

Senti<input type="checkbox" name="m1" value="senti"><br/>
Happy<input type="checkbox" name="m2" value="happy"><br/>
Wanna Party?<input type="checkbox" name="m3" value="party"><br/>
Romantic?? <input type="checkbox" name="m4" value="romantic"><br/><br/>



<input type="submit" value="Lets Rock 'n' Roll Baby"><br/><br/>

<a href="main.php">I don't wanna tell you how I am feeling :P, proceed >> </a>





</form>

<form method="post" action="search.php"><br/><br/>
<input type="text" name="keyword" />
<input type="submit" value="search">
</form>
</body>

</html>

