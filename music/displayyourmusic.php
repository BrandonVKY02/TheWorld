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
$userid = $_SESSION["user_id"];

if(isset($_POST['Search']) && !empty($_POST['content'])) {
    $searchTerm = $_POST['content'];
    $searchTerm = mysqli_real_escape_string($conn, $searchTerm); // Sanitize user input

    switch($_POST['categories']) {
        case "songname":
            $sql = "SELECT songid, artist, songname, genre, uploadedby FROM music
                    WHERE songname LIKE '%$searchTerm%'";
            break;
        default:
            $sql = "SELECT songid, artist, songname, genre, uploadedby FROM music
                    WHERE artist LIKE '%$searchTerm%'";
            break;
    }
} else {
    $sql = "SELECT songid, artist, songname, genre, uploadedby FROM music WHERE uploadedby = $userid";
}

$result = $conn->query($sql);
// Step 3: Display the song information
if ($result->num_rows > 0) {
    $i = 1;
    while($row = $result->fetch_assoc()) {
        ${"songid$i"}=$row["songid"];
        echo "<tr><td>".$i."</td><td id='s$i'>"
        .$row["songname"]."</td><td>"
        .$row["artist"]."</td><td>"
        .$row["genre"]."</td>
        <td><a href='../music/deletemusic.php?id=".$row['songid']."'>
        <img src='../images/minus.png' style='height:30px'></a></td>
        <td><a href='../music/editmusic.php?id=".$row['songid']."'>
        <img src='../images/edit.png' style='height:30px'></a></td></tr>";
        
        $i++;
    }
} else {
    echo "0 results";
}

// Close connection
$conn->close();
?>