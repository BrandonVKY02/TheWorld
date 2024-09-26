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
    $sql = "SELECT songid, artist, songname, genre, uploadedby FROM music";
}

$result = $conn->query($sql);

// Step 3: Display the song information
if ($result->num_rows > 0) {
    $i = 1;
    while($row = $result->fetch_assoc()) {
        ${"songid$i"} = $row["songid"];
        echo "<tr><td>".$i."</td><td id='s$i'>"
            .$row["songname"]."</td><td>"
            .$row["artist"]."</td><td>";
        
        // Check if the 'genre' key exists in the $row array
        if(isset($row["genre"])) {
            echo $row["genre"]; // Display the genre if it exists
        } else {
            echo "N/A"; // Display "N/A" if the genre is not available
        }

        echo "</td><td><a href='../music/addtofav.php?id=".$row['songid']."'>
            <img src='../images/plus.png' style='height:30px'></a></td>";
        $i++;
    }
} else {
    echo "0 results";
}

// Close connection
$conn->close();
?>