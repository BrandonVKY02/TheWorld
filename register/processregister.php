<script>
    function gotohome(){
        window.location.href="../home/home";
    }
</script>
<?php

function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "theworldmusic"; 

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$nameErr = $emailErr = $passwordErr = "";
$name = $email = $password = "";


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {


    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = sanitizeInput($_POST["name"]);

        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
        }
    }


    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = sanitizeInput($_POST["email"]);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } else {
        $password = sanitizeInput($_POST["password"]);
    }


    if (empty($nameErr) && empty($emailErr) && empty($passwordErr)) {
        $name = $conn->real_escape_string($name);
        $email = $conn->real_escape_string($email);
        $password = $conn->real_escape_string($password);



        $sql = "INSERT INTO users (email, name, password) VALUES ('$email', '$name', '$password')";

        if ($conn->query($sql) === TRUE) {
            echo '<script>alert("Registration successful!");</script>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }else{
        if(!empty($nameErr)){
            echo "<br>". $nameErr ."<br>";
        }
        if(!empty($emailErr)){
            echo "<br>". $emailErr ."<br>";
        }
        if(!empty($passwordErr)){
            echo "<br>". $passwordErr ."<br>";
        }
    }
}

$conn->close();
?>