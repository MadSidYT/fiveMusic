<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "songs";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to retrieve songs from the database
$sql = "SELECT * FROM songs";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Streaming Website</title>
    <link rel="stylesheet" href="master.css">
</head>
<body>
    <header>
        <div class="logo">
            <h1>Music Streamer</h1>
        </div>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Discover</a></li>
                <li><a href="#">Playlists</a></li>
                <!-- Add more navigation links as needed -->
            </ul>
        </nav>
    </header>
    <main>
        <div id="musicPlayer">
            <!-- PHP code to fetch songs from the database and display them as buttons -->
            <?php
            if ($result->num_rows > 0) {
                // Output data of each row as buttons
                while($row = $result->fetch_assoc()) {
                    echo "<button onclick='playSong(\"" . $row["audio_url"] . "\")'>" . $row["title"] . "</button><br>";
                }
            } else {
                echo "0 results";
            }
            $conn->close();
            ?>
        </div>
    </main>
    <footer>
        <p>&copy; 2024 Music Streamer. All rights reserved.</p>
    </footer>
    <script src="script.js"></script>
</body>
</html>
