<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "1234", "attempt2");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Escape user inputs for security
$auth = mysqli_real_escape_string($link, $_REQUEST['author']);
$sub = mysqli_real_escape_string($link, $_REQUEST['subject']);
$notice = mysqli_real_escape_string($link, $_REQUEST['notice']);
$startdate = mysqli_real_escape_string($link, $_REQUEST['sdate']);
$expdate = mysqli_real_escape_string($link, $_REQUEST['edate']);
$year = mysqli_real_escape_string($link, $_REQUEST['year']);
$dept = mysqli_real_escape_string($link, $_REQUEST['dept']);
$sql = "INSERT INTO notice1(author, subject, notice, sdate, edate, year, dept) VALUES ('$auth', '$sub', '$notice', '$startdate', '$expdate', '$year', '$dept')";
    if(mysqli_query($link, $sql)){
        echo "Records added successfully.";
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
// close connection
mysqli_close($link);
?>