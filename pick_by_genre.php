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

// Check if a genre was sent via GET request
if (isset($_GET['genre'])) {
    $genre = mysqli_real_escape_string($conn, $_GET['genre']);

    // This new SQL query picks ONE random movie directly from the database
    $sql = "SELECT movie_name FROM movies_by_genre WHERE genre = '$genre' ORDER BY RAND() LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo json_encode(['movie' => $row['movie_name']]);
    } else {
        echo json_encode(['movie' => 'No movies found for this genre.']);
    }
} else {
    echo json_encode(['movie' => 'No genre selected.']);
}

// Close the database connection
mysqli_close($conn);
?>