<?php
session_start();

include 'dbconn.php';

$search=$_POST['keyword'];
$ab="select * from song where song.artist1='$search' or song.md1='$search' or song.name='$search'";
$res=mysql_query($ab);
echo "<table border='1'>
						<tr>
						<th>Song Name</th>
						<th>Artists</th>
						<th>Movie</th>
						<th>Music Director</th>
						<th>Options</th>
						</tr>";

						while($row=mysql_fetch_array($res))
						  {
						  
						  echo "<tr>";
						  echo "<td>" . $row['name'] . "</td>";
						  echo "<td>" .$row['artist1']." ".$row['artist2']." ".$row['artist3']."</td>";
						  echo "<td>" . $row['movie'] . "</td>";
						  echo "<td>" . $row['md1']." ".$row['md2']." ".$row['md3']. "</td>";
						  echo "<td><a href=songpage.php?sid=".$row['id']."&recommend=FALSE><button>Listen</button></a><td>";
						  echo "</tr>";
						  }
						echo "</table>";
?>