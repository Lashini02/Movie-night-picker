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

// SQL query to fetch all movies
$sql = "SELECT movie_name FROM custom_movies";
$result = mysqli_query($conn, $sql);

$movies = [];
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $movies[] = $row;
    }
}

// Return the movies as a JSON array
header('Content-Type: application/json');
echo json_encode($movies);

// Close the database connection
mysqli_close($conn);
?>