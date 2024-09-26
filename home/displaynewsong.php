<link rel="stylesheet" href="../style/newsong.css"> 

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
    $sql = "SELECT songid, artist, songname, uploadedby,img FROM music ORDER BY songid DESC";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $i = 1;
        echo '<div class="homecontentcontainer">';
        while($i<=6 && $row = $result->fetch_assoc()) 
        {
            echo "<a class='homecontent' href='../music/detailpage.php?id=".$row['songid']."'>";
                echo'<div class="homecontentbox">';
                    echo'<div class="image-container">';
                        echo'<img class="left-image" src="data:image/jpeg;base64,'.base64_encode($row['img']).' "/>';
                    echo'</div>';
                    echo '<div class="text-content">';
                        echo '<p class="text-content">'   .$row['songname'].' - '.$row['artist'].'</p>';
                    echo '</div>';
                echo '</div>';
            echo '</a>';
            $i++;
        }
        echo '</div>';
    } else {
        echo "0 results";
    }
    
    $conn->close();
?>