<?php
// Include the database connection file

include 'db.php';
include 'session_check.php';
//session_start(); // Start the session to access session variables

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $user_id = $_SESSION['user_id']; // Assuming user_id is stored in the session during login
    $name = $_POST['firstname'];
    $contact_number = $_POST['contactnumber'];
    $event_type = $_POST['eventname'];
    $venue = $_POST['venue'];
    $event_date = $_POST['eventdate'];
    $event_time = $_POST['eventtime'];
    $package_type = $_POST['package_type'];
    $payment_mode = $_POST['payment_method'];

    // Validate inputs (optional)
    if (empty($name) || empty($contact_number) || empty($event_type) || empty($venue) || empty($event_date) || empty($event_time) || empty($package_type) || empty($payment_mode)) {
        echo "Please fill in all required fields.";
        exit;
    }

    // Prepare the SQL statement
    $sql = "INSERT INTO events (user_id, name, contact_number, event_type, venue, event_date, event_time, package_type, payment_mode) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare and bind the statement to avoid SQL injection
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("issssssss", $user_id, $name, $contact_number, $event_type, $venue, $event_date, $event_time, $package_type, $payment_mode);
        $booking_success = true;
        // Execute the query
        if ($stmt->execute()) {
            $booking_success = true;
        } else {
            echo "Error: " . $stmt->error;
            $booking_success = false;
        }
        if ($booking_success) {
            echo "<script type='text/javascript'>alert('Event booking was successful!');</script>";
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }

    // Close the connection
    $conn->close();
} else {
    echo "Invalid request method.";
}
?>
