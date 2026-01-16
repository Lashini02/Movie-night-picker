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

// Check if a movie name was sent
if (isset($_POST['movie_name'])) {
    // Sanitize the movie name to prevent SQL injection
    $movieName = mysqli_real_escape_string($conn, $_POST['movie_name']);

    // SQL query to insert the movie into the 'custom_movies' table
    $sql = "INSERT INTO custom_movies (movie_name) VALUES ('$movieName')";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        // Success response
        echo "Movie saved successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>