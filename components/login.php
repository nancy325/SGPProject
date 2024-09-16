<?php
  // Check if the form has been submitted
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve posted values
    $email = $_POST["Email"];
    if (isset($_POST["password"])) {
        $password = $_POST["password"];
    } else {
        echo "Password field is required";
    }

    // Validate the input data
    if (isset($email) && !empty($email) &&
        isset($password) && !empty($password)) {
      // Connect to database
      $con = mysqli_connect("localhost", "root", "", "bookmycelebration");

      // Check connection
      if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
      }

      // Prepare and bind
      $stmt = $con->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
      $stmt->bind_param("ss", $email, $password);

      // Execute the query
      $stmt->execute();

      // Get the result
      $result = $stmt->get_result();

      // Check if user exists
      if ($result->num_rows > 0) {
        // Set session variables
        session_start();
        $row = $result->fetch_assoc();
        $_SESSION["firstname"] = $row["firstname"];
        $_SESSION["email"] = $row["email"];

        // Set cookies
        setcookie("firstname", $row["firstname"], time() + (86400 * 30)); // 30 days
        setcookie("email", $row["email"], time() + (86400 * 30)); // 30 days

        // Redirect to homepage
        header('Location: http://localhost/BookmyCelebration/components/index.html');
      } else {
        echo "Invalid email or password";
      }

      // Close statement and database connection
      $stmt->close();
      mysqli_close($con);
    } else {
      echo "Please fill in all the required fields!";
    }
  }
?>