<?php
// Configuration
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'BookmyCelebration';

// Create connection
$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Query database for user
    $query = "SELECT password FROM User WHERE Email = '$email'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashed_password = $row["password"];

        // Verify password
        if (password_verify($password, $hashed_password)) {
            // Set session and cookie
            session_start();
            $_SESSION["email"] = $email;
            setcookie("email", $email, time() + (86400 * 30)); // 30 days

            header("Location: index.html");
            exit;
        } else {
            echo "Invalid password";
        }
    } else {
        echo "User not found";
    }
}

// Close connection
$conn->close();
?>
