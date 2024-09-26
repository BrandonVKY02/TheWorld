
<?php
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
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
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['send'])) {
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];


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

    if (empty($nameErr) && empty($emailErr)) {
        $name = $conn->real_escape_string($name);
        $email = $conn->real_escape_string($email);



        $sql = "INSERT INTO contactus (email, name, messages) VALUES ('$email', '$name', '$message')";

        if ($conn->query($sql) === TRUE) {
            echo "Contact form send successful!";
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
    }
    $conn->close();
}
?>
