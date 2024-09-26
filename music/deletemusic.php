<?php
include('../includes/session.php');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "theworldmusic";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

    $user_id = $_SESSION['user_id'];
    $id=$_GET["id"];

    $sql = "DELETE FROM music WHERE uploadedby = '$user_id' AND songid = '$id';";
    if(mysqli_query($conn,$sql)){
        echo'<script>
        function success(){
            alert("Music successful deleted");
        }</script>';
        header("Location:../music/yourmusic.php");
        exit();

    }else{
        echo"Error: ".mysqli_error($conn);
    }
    

    $conn->close();
    
?>
