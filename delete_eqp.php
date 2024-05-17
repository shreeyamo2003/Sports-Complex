<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input from the form
    $emp_name = $_POST["emp_name"];

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
    $check_username_sql = "SELECT * FROM equipments WHERE emp_name = '$emp_name'";
    $result = $conn->query($check_username_sql);
    if ($result->num_rows == 0) {
        echo "emp_name doesn't exist.";
        exit(); // Stop further execution
    }

    // SQL query to insert user data into the database
    $insert_user_sql = "DELETE FROM equipments WHERE emp_name='$emp_name'";

    // Execute the SQL query
    if ($conn->query($insert_user_sql) === TRUE) {
        echo "Record deleted successfully";
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
  <h1 class="form-title">Delete</h1>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validateForm()">
    <div class="main-user-info">

      <div class="user-input-box">
        <label for="emp_name">emp_name</label>
        <input type="text" id="emp_name" name="emp_name" placeholder="Enter emp_name" required />
      </div>


    </div>

    <div class="form-submit-btn">
      <input type="submit" value="Delete" href="#" onclick="signup()">
    </div>

  </form>
  <script>    
  function signup(){
  window.location.href = "http://localhost/dbs-main/equipments.php";
}</script>
</div>
</body>
</html>