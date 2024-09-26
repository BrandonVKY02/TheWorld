<link rel="stylesheet" href="../style/style1.css">

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
$id = $_GET['id'];
$sql = "SELECT songid, artist, songname, genre,img FROM music WHERE songid = '$id';";


$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    ?>

    <div class="song-container">
        <img src="data:image/jpeg;base64,<?= base64_encode($row['img']) ?>" class="song-image" alt="Song Image">
        <div class="song-details">
            <p>
                <strong>Song Name:</strong> <?= $row['songname'] ?><br>
                <strong>Artist:</strong> <?= $row['artist'] ?><br>
                <strong>Genre:</strong> <?= $row['genre'] ?>
            </p>
        </div>
    </div>

    <!-- <div class="contentbox">
        <img src="data:image/jpeg;base64,<?= base64_encode($row['img']) ?>" width="300px" alt="Song Image">
        <p>
            <strong>Song Name:</strong> <?= $row['songname'] ?><br>
            <strong>Artist:</strong> <?= $row['artist'] ?><br>
            <strong>Genre:</strong> <?= $row['genre'] ?>
        </p>
    </div> -->
    <?php
} else {
    echo "0 results";
}
$conn->close();
?>
