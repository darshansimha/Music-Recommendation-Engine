<?php

error_reporting(0);

include 'dbconn.php';


function songs_recommend($par)
{
	switch($par)
	{
	case 0:
	
	$sql="SELECT DISTINCT song.id, song.name,song.artist1,song.artist2,song.artist3,song.movie,song.md1,song.md2,song.md3 FROM song
			INNER JOIN song_ratings
				ON song.id=song_ratings.sid ORDER BY song_ratings.rating LIMIT 10";
				$result1=mysql_query($sql);

						echo "<table border='1'>
						<tr>
						<th>Song Name</th>
						<th>Artists</th>
						<th>Movie</th>
						<th>Music Director</th>
						<th>Options</th>
						</tr>";

						while($row=mysql_fetch_array($result1))
						  {
						  
						  echo "<tr>";
						  echo "<td>" . $row['name'] . "</td>";
						  echo "<td>" .$row['artist1']." ".$row['artist2']." ".$row['artist3']."</td>";
						  echo "<td>" . $row['movie'] . "</td>";
						  echo "<td>" . $row['md1']." ".$row['md2']." ".$row['md3']. "</td>";
						  echo "<td><a href=songpage.php?sid=".$row['id']."&recommend=TRUE><button>Listen</button></a><td>";
						  echo "</tr>";
						  }
						echo "</table>";
							break;
	
					case 1:
					//echo"I am here also";
			
					$sql1="select * from
					song where tag_type='$_SESSION[m1]' or tag_type='$_SESSION[m3]' or tag_type='$_SESSION[m4]' or 
					tag_mood='$_SESSION[m3]' or tag_mood='$_SESSION[m4]'or tag_type='$_SESSION[m2]' or tag_mood='$_SESSION[m1]' 
					or tag_mood='$_SESSION[m2]' limit 10";
					
					$q4=mysql_query($sql1) or die("q4");
				echo "<table border='1'>
						<tr>
						<th>Song Name</th>
						<th>Artists</th>
						<th>Movie</th>
						<th>Music Director</th>
						<th>Options</th>
						</tr>";

						while($row=mysql_fetch_array($q4))
						  {
						  
						  echo "<tr>";
						  echo "<td>" . $row['name'] . "</td>";
						  echo "<td>" .$row['artist1']." ".$row['artist2']." ".$row['artist3']."</td>";
						  echo "<td>" . $row['movie'] . "</td>";
						  echo "<td>" . $row['md1']." ".$row['md2']." ".$row['md3']. "</td>";
						  echo "<td><a href=songpage.php?sid=".$row['id']."&recommend=TRUE><button>Listen</button></a><td>";
						  echo "</tr>";
						  }
						echo "</table>";
					
					break;
					

					case 2:
					
					$rf=mysql_query("select * from users where username='$_SESSION[username]'");
					
					
					$ud=mysql_fetch_array($rf) or die("qoi1");
					
					$z1=mysql_query("select * from song_views where uid='$ud[uid]' order by view_counter desc limit 1") or die("q0");
					$row23=mysql_fetch_array($z1) or die("q1");
					$q5=mysql_query("select * from song where id='$row23[sid]'");
					
					$row1=mysql_fetch_array($q5) or die("q2");

	$c2=mysql_query("select * from song where md1='$row1[md1]'or artist1='$row1[artist1]' or year='$row1[year]' limit 7")
	or die("sdfds");

	
			echo "<table border='1'>
						<tr>
						<th>Song Name</th>
						<th>Artists</th>
						<th>Movie</th>
						<th>Music Director</th>
						<th>Options</th>
						</tr>";

						while($r23=mysql_fetch_array($c2))
						  {
						  
						  echo "<tr>";
						  echo "<td>" . $r23['name'] . "</td>";
						  echo "<td>" .$r23['artist1']." ".$row['artist2']." ".$row['artist3']."</td>";
						  echo "<td>" . $r23['movie'] . "</td>";
						  echo "<td>" . $r23['md1']." ".$row['md2']." ".$row['md3']. "</td>";
						  echo "<td><a href=songpage.php?sid=".$r23['id']."&recommend=TRUE><button>Listen</button></a><td>";
						  echo "</tr>";
						  }
						echo "</table>";
	
	
	/*$c3=mysql_query("SELECT song.name,song.artist1,song.artist2,song.artist3,song.movie,song.md1,song.md2,song.md3 FROM song
												INNER JOIN song_ratings
												ON song.id=song_ratings.sid ORDER BY song_ratings.rating LIMIT 3");

	 while($row=mysql_fetch_array($c3)){
												echo "<tr>";
												  echo "<td>" . $row['name'] . "</td>";
												  echo "<td>" .$row['artist1']." ".$row['artist2']." ".$row['artist3']."</td>";
												  echo "<td>" . $row['movie'] . "</td>";
												  echo "<td>" . $row['md1']." ".$row['md2']." ".$row['md3']. "</td>";
												   echo "<td><a href=songpage.php?sid=".$row['id']."&recommend=TRUE><button>Listen</button></a><td>";
												  echo "</tr>";
	  }
	 
	echo "</table>";*/
	 
	break;

	case 3:
			$z1=mysql_query("select sid from song_views where uid='$_SESSION[uid]' order by latest_date");
			$row=mysql_fetch_array($z1);

			$mood=explode(";",$row['tag_mood']);

			echo "<table border='1'>
			<tr>
			<th>Song Name</th>
			<th>Artists</th>
			<th>Movie</th>
			<th>Music Director</th>
			<th>Options</th>
			</tr>";
			$z2=mysql_query("select song.name,song.artist1,song.artist2,song.artist3,song.movie,song.md1,song.md2,song.md3 from
			 song where tag_mood='$mood[0]' or tag_mood='$mood[1]' or tag_mood='$mood[2]' or md1='$row[md1]' or artist1='$row[artist1]' or year='$row[year]' limit 7");
			while($row=mysql_fetch_array($z2)){
			 echo "<tr>";
			  echo "<td>" . $row['name'] . "</td>";
			  echo "<td>" .$row['artist1']." ".$row['artist2']." ".$row['artist3']."</td>";
			  echo "<td>" . $row['movie'] . "</td>";
			  echo "<td>" . $row['md1']." ".$row['md2']." ".$row['md3']. "</td>";
			  echo "<td><button>Listen</button></td>";
			  echo "</tr>";
			}
			$z3=mysql_query("SELECT song.name,song.artist1,song.artist2,song.artist3,song.movie,song.md1,song.md2,song.md3 FROM 
			song INNER JOIN song_ratings ON song.id=song_ratings.sid ORDER BY song_ratings.rating LIMIT 3");
			while($row=mysql_fetch_array($z3)){
											 echo "<tr>";
											  echo "<td>" . $row['name'] . "</td>";
											  echo "<td>" .$row['artist1']." ".$row['artist2']." ".$row['artist3']."</td>";
											  echo "<td>" . $row['movie'] . "</td>";
											  echo "<td>" . $row['md1']." ".$row['md2']." ".$row['md3']. "</td>";
											  echo "<td><a href=songpage.php?sid=".$row['id']."&recommend=TRUE><button>Listen</button></a><td>";
											  echo "</tr>";
  }
 
												echo "</table>";
												 
												break;

				case 4:
				
				$z4=mysql_query("select sid from song_views where uid='$_SESSION[uid]' order by latest_date limit 1");
				$row=mysql_fetch_array($z4);

				$mood=explode(";",$row['tag_mood']);

				echo "<table border='1'>
				<tr>
				<th>Song Name</th>
				<th>Artists</th>
				<th>Movie</th>
				<th>Music Director</th>
				<th>Options</th>
				</tr>";
				$z5=mysql_query("select song.name,song.artist1,song.artist2,song.artist3,song.movie,song.md1,song.md2,song.md3 from
				 song where tag_mood='$mood[0]' or tag_mood='$mood[1]' or tag_mood='$mood[2]' or md1='$row[md1]' or artist1='$row[artist1]' or year='$row[year]' limit 7");
				while($row=mysql_fetch_array($z5)){
				 echo "<tr>";
				  echo "<td>" . $row['name'] . "</td>";
				  echo "<td>" .$row['artist1']." ".$row['artist2']." ".$row['artist3']."</td>";
				  echo "<td>" . $row['movie'] . "</td>";
				  echo "<td>" . $row['md1']." ".$row['md2']." ".$row['md3']. "</td>";
				  echo "<td><a href=songpage.php?sid=".$row['id']."&recommend=TRUE><button>Listen</button></a><td>";
				  echo "</tr>";
				}
$z6=mysql_query("SELECT song.name,song.artist1,song.artist2,song.artist3,song.movie,song.md1,song.md2,song.md3 FROM song
											INNER JOIN song_ratings
											ON song.id=song_ratings.sid ORDER BY song_ratings.rating LIMIT 3");
 while($row=mysql_fetch_array($z6)){
											echo "<tr>";
											  echo "<td>" . $row['name'] . "</td>";
											  echo "<td>" .$row['artist1']." ".$row['artist2']." ".$row['artist3']."</td>";
											  echo "<td>" . $row['movie'] . "</td>";
											  echo "<td>" . $row['md1']." ".$row['md2']." ".$row['md3']. "</td>";
											  echo "<td><button>Listen</button></td>";
											  echo "</tr>";
  }
 
echo "</table>";
break; 

	default:
	echo "I dont think you belong on this planet! ";
	break;

}

}//end of function


?>
