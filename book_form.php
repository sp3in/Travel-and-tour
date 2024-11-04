<?php
// Database connection
$servername = "localhost";
$username = "root"; // Your MariaDB username
$password = "1"; // Your MariaDB password (or empty if none)
$dbname = "travel_booking";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $location = $_POST['location'];
    $guests = $_POST['guests'];
    $arrivals = $_POST['arrivals'];
    $leaving = $_POST['leaving'];

    // Insert data into the bookings table
    $sql = "INSERT INTO bookings (name, email, phone, address, location, guests, arrivals, leaving)
            VALUES ('$name', '$email', '$phone', '$address', '$location', $guests, '$arrivals', '$leaving')";

    // if ($conn->query($sql) === TRUE) {
    //     // Get the last inserted booking ID
    //     $booking_id = $conn->insert_id;
    //     echo "Booking successful! Your booking ID is: " . $booking_id;
    // } else {
    //     echo "Error: " . $sql . "<br>" . $conn->error;
    // }
    // After successful booking
if ($conn->query($sql) === TRUE) {
    // Get the last inserted booking ID
    $booking_id = $conn->insert_id;

    // Start session and set booking ID
    session_start();
    $_SESSION['booking_id'] = $booking_id;

    // Redirect to acknowledgment page
    header('Location: acknowledgment.php');
    exit();
}
else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();

