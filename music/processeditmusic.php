<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "theworldmusic";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['chg1'])) {
    $artist = $_POST['artist'];
    $songname = $_POST['songname'];
    $user_id = $_SESSION['user_id'];

    $id=$_GET["id"];

    $sql = "UPDATE music
    SET artist = ?, songname = ?
    WHERE songid=?";
    
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("sss", $artist, $songname,$id);

        if ($stmt->execute()) {
            echo "Record added successfully.";
        } else {
            echo "Error executing statement: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }

    $conn->close();

};
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submitimage'])) {
    
    $image = file_get_contents($_FILES['image']['tmp_name']);
    // Prepare SQL statement
    $sql = "UPDATE music SET img = ? WHERE songid = ?";

    $id=$_GET["id"];
    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $image, $id);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Image uploaded successfully.";
    } else {
        echo "Error uploading image: " . $conn->error;
    }

    // Close statement
    $stmt->close();
}
?>