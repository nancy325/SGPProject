<?php
var_dump($_POST);
  // Check if the form has been submitted
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve posted values
    $firstname = $_POST["firstname"];
    $secondname = $_POST["secondname"];
    $email = $_POST["Email"];
    $password1 = $_POST["pswd1"];
    $password2 = $_POST["pswd2"];

    // Check if passwords match
    if ($password1 != $password2) {
      echo "Passwords do not match";
    } else {
      // Validate the input data
      if (isset($firstname) && !empty($firstname) &&
          isset($secondname) && !empty($secondname) &&
          isset($email) && !empty($email) &&
          isset($password1) && !empty($password1)) {
        // Connect to database
        $con = mysqli_connect("localhost", "root", "", "bookmycelebration");

        // Check connection
        if (!$con) {
          die("Connection failed: " . mysqli_connect_error());
        }

        // Prepare and bind
        $stmt = $con->prepare("INSERT INTO users (firstname, secondname, email, password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $firstname, $secondname, $email, $password1);

        // Execute the query
        $stmt->execute();

        // Check if query was successful
        if ($stmt->affected_rows > 0) {
          // Set session variables
          session_start();
          $_SESSION["firstname"] = $firstname;
          $_SESSION["email"] = $email;

          // Set cookies
          setcookie("firstname", $firstname, time() + (86400 * 30)); // 30 days
          setcookie("email", $email, time() + (86400 * 30)); // 30 days

          // Redirect to homepage
          header('Location: http://localhost/BookmyCelebration-Copy/components/index.html');
        } else {
          echo "Error: " . $stmt->error;
        }

        // Close statement and database connection
        $stmt->close();
        mysqli_close($con);
      } else {
        echo "Please fill in all the required fields!";
      }
    }
  }
?>