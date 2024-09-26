<?php
// Step 1: Establish a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "theworldmusic";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 2: Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $artist = $_POST['artist'];
    $songname = $_POST['songname'];
    $user_id = $_SESSION['user_id'];
    $image = file_get_contents($_FILES['image']['tmp_name']);
    $genre = $_POST['category'];
    // Step 3: Prepare SQL statement
    $sql = "INSERT INTO music (artist, songname,genre, uploadedby,img) VALUES (?, ?,?, ?,?)";
    
    // Step 4: Prepare statement
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Step 5: Bind parameters
        $stmt->bind_param("sssss", $artist, $songname,$genre, $user_id,$image);

        // Step 6: Execute statement
        if ($stmt->execute()) {
            echo "Record added successfully.";
        } else {
            echo "Error executing statement: " . $stmt->error;
        }

        // Step 7: Close statement
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }

    // Step 8: Close database connection
    $conn->close();
}
?>
