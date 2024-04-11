<html>
    <head>
        <title>fiveMusic</title>
    </head>
</html>

<?php


// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$database = "fiveMusic";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve username and password from the form
$userName=$_POST["userName"];
$pass=$_POST["password"];

// SQL query to check if the username and password match
$sql = "SELECT * FROM users WHERE email = '$userName' AND password = '$pass'";
$result = $conn->query($sql);

// Check if the query executed successfully
if ($result === false) {
    die("Error executing the query: " . $conn->error);
}

// Check if any rows were returned
if ($result->num_rows > 0) {
    // Valid user, do something (e.g., redirect to a dashboard)
    echo "Valid user";
} else {
    // Invalid user, handle accordingly (e.g., display an error message)
    echo "Invalid username or password";
}

$conn->close();
?>
