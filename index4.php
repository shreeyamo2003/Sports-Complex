<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input from the form
    $username = $_POST["username"];
    $email = $_POST["email"];
    $contact = $_POST["contact"];
    $passw = $_POST["passw"];
    $address1 = $_POST["address1"];

    // Add your database connection code here
    // Replace the following placeholders with your actual database credentials
    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $dbname = "sports complex";

    // Create connection
    $conn = new mysqli($servername, $db_username, $db_password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the username already exists
    $check_username_sql = "SELECT * FROM members WHERE username = '$username'";
    $result = $conn->query($check_username_sql);
    if ($result->num_rows > 0) {
        echo "Username already exists. Please choose a different username.";
        exit(); // Stop further execution
    }

    // SQL query to insert user data into the database
    $insert_user_sql = "INSERT INTO members (username, email, contact, passw, address1) VALUES ('$username', '$email', '$contact', '$passw', '$address1')";

    // Execute the SQL query
    if ($conn->query($insert_user_sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $insert_user_sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Responsive Registration Form</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="stylesheet" href="style4.css" />
  <script>
    function validateForm() {
      var password = document.getElementById("passw").value;
      var confirmPassword = document.getElementById("confirmPassword").value;

      if (password != confirmPassword) {
        alert("Passwords do not match!");
        return false;
      }
      return true;
    }
  </script>
</head>
<body>
<header>
  <div class="main-top">
    <div class="company_logo"> <a href="@"><img src="logo.jpg" alt=""></a></div>

  </div>
</header>
<div class="container">
  <h1 class="form-title">Sign Up</h1>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validateForm()">
    <div class="main-user-info">

      <div class="user-input-box">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" placeholder="Enter Username" required />
      </div>
      <div class="user-input-box">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Enter Email" required />
      </div>
      <div class="user-input-box">
        <label for="contact">Phone Number</label>
        <input type="text" id="contact" name="contact" placeholder="Enter Phone Number" required />
      </div>
      <div class="user-input-box">
        <label for="passw">Password</label>
        <input type="passw" id="passw" name="passw" placeholder="Enter Password" required />
      </div>
      <div class="user-input-box">
        <label for="address1">Address</label>
        <input type="text" id="address1" name="address1" placeholder="Enter address1" required />
      </div>


    </div>

    <div class="form-submit-btn">
      <input type="submit" href="#" onclick="signup()">
    </div>

  </form>
  <script>    
  function signup(){
  window.location.href = "index.html";
}</script>
</div>
</body>
</html>