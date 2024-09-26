<?php
// Step 1: Establish a connection to the MySQL database
$servername = "localhost"; // Replace with your MySQL server name
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$dbname = "theworldmusic"; // Replace with your MySQL database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
    $sql = "SELECT songid, artist, songname, uploadedby FROM music WHERE songid=$id";

$result = $conn->query($sql);


// Close connection
$conn->close();
?>