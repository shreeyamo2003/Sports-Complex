<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input from the form
    $comp_name = $_POST["comp_name"];
    $event_name = $_POST["event_name"];
    $date1 = $_POST["date1"];
    $fees = $_POST["fees"];

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
    $check_username_sql = "SELECT * FROM competitions WHERE comp_name = '$comp_name'";
    $result = $conn->query($check_username_sql);
    if ($result->num_rows > 0) {
        echo "comp_name already exist.";
        exit(); // Stop further execution
    }

    // SQL query to insert user data into the database
    $insert_user_sql = "INSERT INTO competitions(comp_name,event_name,date1,fees) VALUES('$comp_name','$event_name','$date1','$fees')";

    // Execute the SQL query
    if ($conn->query($insert_user_sql) === TRUE) {
        echo "Record inserted successfully";
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
  <h1 class="form-title">Insert</h1>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validateForm()">
    <div class="main-user-info">

      <div class="user-input-box">
        <label for="comp_name">comp_name</label>
        <input type="text" id="comp_name" name="comp_name" placeholder="Enter comp_name" required />
      </div>
      <div class="user-input-box">
        <label for="event_name">event_name</label>
        <input type="text" id="event_name" name="event_name" placeholder="Enter event_name" required />
      </div>
      <div class="user-input-box">
        <label for="date1">date</label>
        <input type="text" id="date1" name="date1" placeholder="Enter date" required />
      </div>
      <div class="user-input-box">
        <label for="fees">fees</label>
        <input type="text" id="fees" name="fees" placeholder="Enter fees" required />
      </div>


    </div>

    <div class="form-submit-btn">
      <input type="submit" value="Insert" href="#" onclick="signup()">
    </div>

  </form>
  <script>    
  function signup(){
  window.location.href = "http://localhost/dbs-main/competitions.php";
}</script>
</div>
</body>
</html>