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

    $sql = "DELETE FROM favmusic WHERE id = '$user_id' AND songid = '$id';";
    if(mysqli_query($conn,$sql)){
        echo'<script>
        function success(){
            alert("Deleted to favourite");
        }</script>';
        header("Location:../music/favourite.php");
        exit();

    }else{
        echo"Error: ".mysqli_error($conn);
    }
    

    $conn->close();
    
?>
