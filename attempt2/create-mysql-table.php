<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "1234", "attempt2");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt create table query execution
$sql = "CREATE TABLE notice1
    (
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        author VARCHAR(30) NOT NULL,
        subject VARCHAR(300) NOT NULL,
        notice VARCHAR(300) NOT NULL,
        sdate DATE NOT NULL,
        edate DATE NOT NULL,
        year TEXT NOT NULL,
        dept TEXT NOT NULL
    )";
if(mysqli_query($link, $sql))
    {
        echo "Table created successfully.";
    } else
        {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
 
// Close connection
mysqli_close($link);
?>