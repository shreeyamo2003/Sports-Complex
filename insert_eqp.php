<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input from the form
    $eqp_name = $_POST["eqp_name"];
    $quantity = $_POST["quantity"];
    $cost = $_POST["cost"];
    $damage_amount = $_POST["damage_amount"];
    $sports_id = $_POST["sports_id"];

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
    $check_username_sql = "SELECT * FROM equipments WHERE eqp_name = '$eqp_name'";
    $result = $conn->query($check_username_sql);
    if ($result->num_rows > 0) {
        echo "eqp_name already exist.";
        exit(); // Stop further execution
    }

    // SQL query to insert user data into the database
    $insert_user_sql = "INSERT INTO equipments(eqp_name,quantity,cost,damage_amount,sports_id) VALUES('$eqp_name','$quantity','$cost','$damage_amount','$sports_id')";

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
  <h1 class="form-title">Inserting</h1>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validateForm()">
    <div class="main-user-info">

      <div class="user-input-box">
        <label for="eqp_name">eqp_name</label>
        <input type="text" id="eqp_name" name="eqp_name" placeholder="Enter eqp_name" required />
      </div>
      <div class="user-input-box">
        <label for="quantity">quantity</label>
        <input type="text" id="quantity" name="quantity" placeholder="Enter quantity" required />
      </div>
      <div class="user-input-box">
        <label for="cost">cost</label>
        <input type="text" id="cost" name="cost" placeholder="Enter cost" required />
      </div>
      <div class="user-input-box">
        <label for="damage_amount">damage_amount</label>
        <input type="text" id="damage_amount" name="damage_amount" placeholder="Enter damage_amount" required />
      </div>
      <div class="user-input-box">
        <label for="sports_id">sports_id</label>
        <input type="text" id="sports_id" name="sports_id" placeholder="Enter sports_id" required />
      </div>


    </div>

    <div class="form-submit-btn">
      <input type="submit" value="Insert" href="#" onclick="signup()">
    </div>

  </form>
  <script>    
  function signup(){
  window.location.href = "http://localhost/dbs-main/equipments.php";
}</script>
</div>
</body>
</html>