<?php include('../includes/session.php')?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Music</title>
</head>
<style>
    <?php include('../style/style1.css')?>
    <?php include('../style/styleforform.css')?>
</style>
<body>
    <?php include('../includes/navigation.php')?>
    <?php include('../music/processaddmusic.php')?>

    <div class="container">
        <h1>Add Music</h1>
        <form method="post" enctype="multipart/form-data" class="add-music-form">
            <div class="form-group">
                <label for="artist">Artist:</label><br>
                <input type="text" name="artist" id="artist" placeholder="Rick Astley">
            </div>
            <div class="form-group">
                <label for="songname">Song Name:</label><br>
                <input type="text" name="songname" id="songname" placeholder="Never Gonna Give You Up">
            </div>
            <div class="form-group">
                <label for="image">Image:</label><br>
                <input type="file" name="image" id="image" required>
            </div>
            <div class="form-group">
            <label for="category">Category:</label><br>
            <select name="category" id="category">
                <option value="pop">Pop</option>
                <option value="rock">Rock</option>
                <option value="hip-hop">Hip Hop</option>
                <option value="classical">Classical</option>
                <option value="jazz">Jazz</option>
                <option value="country">Country</option>
            </select>
        </div>
            <input type="submit" value="Submit" name="submit" class="submit-button">
        </form>
    </div>

    <?php include('../includes/footer.php');?>
</body>
</html>
