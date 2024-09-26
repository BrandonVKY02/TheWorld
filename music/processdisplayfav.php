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
$iduser = $_SESSION["user_id"];

$sql = "SELECT m.songid,m.songname,m.artist,m.genre FROM favmusic f
        INNER JOIN music m ON f.songid = m.songid
        INNER JOIN users u ON f.id = u.id
        WHERE f.id = $iduser;";
$result = $conn->query($sql);

// Step 3: Display the song information
if ($result->num_rows > 0) {
    $i = 1;
    while($row = $result->fetch_assoc()) 
    {    
        echo "<tr><td>"
        .$row["songname"]."</td><td>"
        .$row["artist"]."</td><td>"
        .$row["genre"]."</td>
        <td><a href='../music/detailpage.php?id=".$row['songid']."'>
        <img src='../images/detail.png' style='height:30px'></a></td>
        <td><a href='../music/deletefromfav.php?id=".$row['songid']."'>
        <img src='../images/minus.png' style='height:30px;'></a></td></tr>";
        $i++;
    }
    echo "</table>";
} else {
    echo "0 results";
}

// Close connection
$conn->close();
?>