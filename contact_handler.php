<?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "movie_picker";

// Create database connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check if connection failed
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if form data was sent via POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    // SQL query to insert data into the 'messages' table
    $sql = "INSERT INTO messages (name, email, message) VALUES ('$name', '$email', '$message')";

    if (mysqli_query($conn, $sql)) {
        echo "Record saved successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>