<?php include('../includes/session.php')?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Music</title>
</head>
<style>
    <?php include('../style/style1.css')?>
    <?php include('../style/styleforform.css')?>
</style>
<body>
    <?php include('../includes/navigation.php');
        include('../music/processeditmusic.php');
    ?>
    <?php $id=$_GET['id'];?>
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
            $sql = "SELECT songid, artist, songname, uploadedby,img FROM music WHERE songid=$id";


        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $conn->close();
    ?>
    <div class="container">
        <h1>Edit Music <?php echo"$id"?></h1>
        <form method="post" enctype="multipart/form-data" class="add-music-form">
            <div class="form-group">
                <label for="artist">Artist:</label><br>
                <input type="text" name="artist" id="artist" value="<?php echo $row['artist'];?>">
            </div>
            <div class="form-group">
                <label for="songname">Song Name:</label><br>
                <input type="text" name="songname" id="songname" value="<?php echo $row['songname'];?>">
            </div>
            <input type="submit" value="Submit" name="chg1" class="submit-button">
        </form>
        
    </div>

    <form method="post" enctype="multipart/form-data" class="add-music-form">
            <div class="form-group">
                <label for="image">Image:</label><br>
                <input type="file" name="image" id="image" required>
            </div>
            <input type="submit" value="Submit" name="submitimage" class="submit-button">
    </form>
    <?php include('../includes/footer.php');?>


</body>
</html>
