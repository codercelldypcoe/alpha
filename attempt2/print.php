<?php

$link = mysqli_connect("localhost", "root", "1234", "attempt2");

if($link === false){
	die("ERROR : Could not connect. ".mysqli_connect_error());
}
$select = $_REQUEST['Select'];
$sql = "SELECT * FROM notice1 WHERE year = '$select'";
if($result = mysqli_query($link, $sql)){
	if(mysqli_num_rows($result)>0)
	{
		echo "<table>";
			echo "<tr>";
				echo "<th> Author</th>";
				echo "<th> Subject</th>";
				echo "<th> Notice</th>";
				echo "<th> Start Date</th>";
				echo "<th> Expiry Date</th>";
				echo "<th>Year</th>";
				echo "<th>Department</th>";
			echo "</tr>";
		while($row = mysqli_fetch_array($result))
		{
			echo "<tr>";
				echo "<td>".$row['author']."</td>";
				echo "<td>".$row['subject']."</td>";
				echo "<td>".$row['notice']."</td>";
				echo "<td>".$row['sdate']."</td>";
				echo "<td>".$row['edate']."</td>";
				echo "<td>".$row['year']."</td>";
				echo "<td>".$row['dept']."</td>";
			echo "</tr>";
		}
			echo "</table>";
			mysqli_free_result($result);
		}else
		{
			echo "No records matching your query";
		}
	}else{
		echo "ERROR : Could not able to execute $sql.".mysqli_error($link);
	}

mysqli_close($link);
?>