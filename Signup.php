<?php
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'BookmyCelebration';

$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $FName = $_POST["firstname"]; 
  $SName = $_POST["secondname"];
  $email = $_POST["Email"];
  $password = $_POST["pswd2"];

  if (filter_var($email, FILTER_VALIDATE_EMAIL) && strlen($password) >= 8) {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO User (FirstName, LastName, Email, Password) VALUES ('$FName','$SName','$email', '$hashed_password')";
    $result = $conn->query($query);
    session_start();
    $_SESSION["email"] = $email;
    setcookie("email", $email, time() + (86400 * 30)); // 30 days
    header("Location: Signup.html");
    exit;
  } else {
    if (!$conn->query($query)) {
      echo "Error: " . $query . "<br>" . $conn->error;
    } else {
      echo "Invalid email or password";
    }
  }
}

$conn->close();
?>