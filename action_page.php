<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST["firstname"];
    $phone = $_POST["phone"];
    $pickup = $_POST["place"];
    $dropoff = $_POST["drop"];

    // Database connection parameters
    $servername = "localhost";
    $username = "your_username"; // Replace with your database username
    $password = "your_password"; // Replace with your database password
    $dbname = "booking_system";   // Replace with your database name

    // Create a database connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert data into the 'bookings' table
    $sql = "INSERT INTO bookings (name, phone, pickup, dropoff) VALUES ('$name', '$phone', '$pickup', '$dropoff')";

    if ($conn->query($sql) === TRUE) {
        echo "Booking successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
