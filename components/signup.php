<?php
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = test_input($_POST["firstname"]);
    $secondname = test_input($_POST["secondname"]);
    $email = test_input($_POST["Email"]);
    $password1 = test_input($_POST["pswd1"]);
    $password2 = test_input($_POST["pswd2"]);

    // Validate first name and second name
    if (!preg_match("/^[a-zA-Z-' ]*$/", $firstname) || !preg_match("/^[a-zA-Z-' ]*$/", $secondname)) {
        echo "Only letters and white space allowed in names.";
    } else {
        // Check if email is valid
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Invalid email format.";
        } else {
            // Check if passwords match
            if ($password1 !== $password2) {
                echo "Passwords do not match.";
            } else {
                // Hash the password
                $hashed_password = password_hash($password1, PASSWORD_DEFAULT);

                // Insert into database
                $sql = "INSERT INTO user (Firstname, Lastname, Email, Password) VALUES ('$firstname', '$secondname', '$email', '$hashed_password')";
                if ($conn->query($sql) === TRUE) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
        }
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
