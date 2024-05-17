<?php
// Database connection parameters
$servername = "localhost";
$username = "system";
$password = "shreeya20";
$database = "XE";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to select data from the Members table
$sql = "SELECT username, email, contact, addr, passw FROM Members";
$result = $conn->query($sql);

// Output table headers
echo "<table>";
echo "<tr><th>Username</th><th>Email</th><th>Contact</th><th>Address</th><th>Password</th></tr>";

// Output data into table rows
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["username"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["contact"] . "</td>";
        echo "<td>" . $row["address"] . "</td>";
        echo "<td>" . $row["password"] . "</td>";
        echo "</tr>";
    }
} else {
    // If no data found, display a message
    echo "<tr><td colspan='5'>No data found</td></tr>";
}
echo "</table>";

// Close connection
$conn->close();
?>
