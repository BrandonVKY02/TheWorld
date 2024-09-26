
<?php

$loggedin = false;
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'theworldmusic';

$conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST"&& isset($_POST["login"])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

    $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $user = mysqli_fetch_assoc($result);

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['loggedin'] = true;
            $_SESSION['user_name'] =$user['name'];
            header("Location: ../home/home.php");
            exit();
        } else {
            $error = "Invalid email or password.";
            echo $error;
        }
    } else {
        $error = "Oops! Something went wrong. Please try again later.";
        echo $error;
    }
}
?>