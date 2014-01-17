<?php

session_start();

error_reporting(0);

include 'dbconn.php';

if(isset($_POST['myusername'])){
$myusername=$_POST['myusername'];
$mypassword=md5($_POST['mypassword']);


$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);

$sql="SELECT * FROM users WHERE username='$myusername' and password='$mypassword'";
$result=mysql_query($sql,$con);


$count=mysql_num_rows($result);



if($count==1){

$_SESSION['username']=$myusername;
$_SESSION['password']=$mypassword;

$s="select visit_counter from users where username='$myusername'";
$r=mysql_query($s);
$rc=mysql_fetch_array($r);
$_SESSION['uid']=$rc['uid'];
$rc['visit_counter']++;
$vc=$rc['visit_counter'];
$s="UPDATE users SET visit_counter='$vc' WHERE username='$myusername'";
mysql_query($s) or die("visit counter error");
header("Location:moodpage.php");
}
else {
echo "Wrong Username or Password";
}

}
?>




<!Doctype HTML>
<html lang="en">

<head>
<title>R</title>
<meta charset="utf-8" />

 <link rel="stylesheet" href="css/jquery-ui.css" />
<script src="js/jquery-1.9.1.js"></script>
<script src="js/jquery-ui.js"></script>
 <script>
$(function() {
$( "#datepicker" ).datepicker();
});
</script>

<script>
$(function() {
var availableTags[
"arijit singh",
"benny dayal",
"vishal dadlani",
"mohit chauhan",
"jaswinder singh",
"javed ali",
"monali thakur",
"amitabh bhattacharya",
"atif aslam",
"kk",
"yo yo honey singh",
"shafqat amanat ali",
"amit trivedi",
"ayushmann khurrana",
"falak shabir",
"papon",
"siddharth mahadevan",
"sukhwinder singh",
"mika singh",
"shree d",
"neeraj shridhar",
"shreya ghoshal",
"mahalakshmi iyer",
"usha uthup",
"vishal bharadwaj",
"lehmber hussainpuri",
"hard kaur",
"anushka manchanda",
"sunidhi chauhan",
"neeraj shridar"
];

 $( "#tags" ).autocomplete({
source: availableTags
});
});
</script>

</head>
<body>
<table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<form name="form1" method="post" action="index.php">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td colspan="3"><strong>Member Login </strong></td>
</tr>
<tr>
<td width="78">Username</td>
<td width="6">:</td>
<td width="294"><input name="myusername" type="text" id="myusername"></td>
</tr>
<tr>
<td>Password</td>
<td>:</td>
<td><input name="mypassword" type="password" id="mypassword"></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><input type="submit" name="Submit" value="Login"></td>
</tr>
</table>
</td>
</form>
</tr>
</table>
<br/><br/>
<br/><table width="413" border="1" align="center">
<form name="reg" action="reg.php" method="post">
  <tr>
    <td colspan="2"><h2 align="center">Registration!</h2></td>
    </tr>
  <tr>
    <td width="260">Username*:</td>
    <td width="163"><input type="text" name="uname"></td>
  </tr>
  <tr>
    <td>Password*:</td>
    <td><input type="password" name="pw"></td>
  </tr>
  <tr>
    <td>Email*:</td>
    <td><input type="text" name="email"></td>
  </tr>
  <tr>
    <td>Phone*:</td>
    <td><input type="text" name="phone"></td>
  </tr>
  <tr>
    <td>DOB*:</td>
    <td><input type="text" id="datepicker" name="dob"></td>
  </tr>
  <tr>
  <div class="ui-widget">

    <td><label for="tags">Favorite Artists<br/>(seperate by comma):</label></td>
    <td><textarea name="favart"></textarea></td>
  </tr>
  <tr>
    <td>Favorite Genere<br/>(seperate by comma):</td>
    <td><textarea name="favgen"></textarea></td>
  </tr>
  <tr>
    <td>General Mood:</td>
    <td><input type="text" name="mood"></td>
  </tr>
  <tr>
    <td colspan=2><input type="submit" value="register"></td>
  </tr>
  </form>
</table>

</body>
</html>
