<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
// Database connection parameters
$servername = "localhost";
$username = "system";
$password = "shreeya20";
$database = "XE";

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['username'];
    $password = $_POST['password'];

    try {
        // Create connection to Oracle database using PDO with oci driver
        $dsn = "oci:dbname=//$servername/$database";
        $conn = new PDO($dsn, $username, $password);

        // Set error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // SQL query with placeholders for prepared statement
        $sql = "SELECT username FROM Members WHERE username = :name AND passw = :password";

        // Prepare the SQL query
        $stmt = $conn->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':password', $password);

        // Execute the query
        $stmt->execute();

        // Fetch the result
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if user exists
        if ($row) {
            // User exists, redirect to index.html
            header("Location:index.html");
            exit(); // Ensure no further output is sent
        } else {
            // User does not exist or credentials are incorrect
            echo '<div style="color: red;">This username or password is incorrect!</div>';
        }

    } catch (PDOException $e) {
        // Handle database connection errors
        echo 'Connection failed: ' . $e->getMessage();
    }
}

?>