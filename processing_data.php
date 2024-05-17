<?php
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
        $sql_select = "SELECT username FROM Members WHERE username = :name";

        // Prepare the SQL query for SELECT operation
        $stmt_select = $conn->prepare($sql_select);

        // Bind parameters for SELECT operation
        $stmt_select->bindParam(':name', $name);

        // Execute the SELECT query
        $stmt_select->execute();

        // Fetch the result
        $row = $stmt_select->fetch(PDO::FETCH_ASSOC);

        // Check if user exists
        if (!$row) {
            // If user doesn't exist, you can proceed with inserting them into the database
            // SQL query with placeholders for prepared statement
            $sql_insert = "INSERT INTO Members (username, passw) VALUES (:name, :password)";

            // Prepare the SQL query for INSERT operation
            $stmt_insert = $conn->prepare($sql_insert);

            // Bind parameters for INSERT operation
            $stmt_insert->bindParam(':name', $name);
            $stmt_insert->bindParam(':password', $password);
            // Execute the INSERT query
            $stmt_insert->execute();

            // Redirect to index.html after successful insertion
            header("Location: index.html");
            exit(); // Ensure no further output is sent
        } else {
            // User already exists, display an error message
            echo '<div style="color: red;">This username already exists!</div>';
        }

    } catch (PDOException $e) {
        // Handle database connection errors
        echo 'Connection failed: ' . $e->getMessage();
    }
}
?>
