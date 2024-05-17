<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Display Table from Database</title>
<link rel="stylesheet" href="equipments.css">
</head>
<body>
<header class="header">
    <nav>
      <div class="nav__header">
        <div class="nav__logo">
          <a href="#"><img src="logo.png" alt="logo" />Sports Center</a>
        </div>
        <div class="nav__menu__btn" id="menu-btn">
          <span><i class="ri-menu-line"></i></span>
        </div>
      </div>
      <ul class="nav__links" id="nav-links">
        <li class="link"><a href="http://localhost/dbs-main/staff.php">Staff</a></li>
        <li class="link"><a href="http://localhost/dbs-main/equipments.php">Equipment</a></li>
        <li class="link"><a href="http://localhost/dbs-main/sports.php">Sports</a></li>
        <li class="link"><a href="http://localhost/dbs-main/offers.php">Offers</a></li>
        <li class="link"><a href="http://localhost/dbs-main/competitions.php">Competitions</a></li>
        <li class="link"><a href="http://localhost/dbs-main/damage.php">Damage</a></li>
        <li class="link"><a href="http://localhost/dbs-main/joins.php">Joins</a></li>
        <li class="link"><a href="http://localhost/dbs-main/registration.php">Registration</a></li>
        <li class="link"><button class="btn" onclick="func9()">Login</button></li>
        <li class="link"><button class="btn" onclick="new_mem()">New member detail</button></li>
      </ul>
    </nav>
  </header>
  <div id="tableContainer"></div>
  <input type="submit" value="Update" class="btn" onclick="func7(event)">
  <input type="submit" value="Delete" class="btn" onclick="func6(event)">
  <input type="submit" value="Insert" class="btn" onclick="func8(event)">

<main>
<table class="data-table">
    <caption>Table for Equipments</caption>
    <thead>
        <tr>
            <th>Eqp_name</th>
            <th>Quantity</th>
            <th>Cost</th>
            <th>Damage_amount</th>
            <th>Sports_id</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Database connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "sports complex";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch data from database
        $sql = "SELECT * FROM equipments";
        $result = $conn->query($sql);

        // Display data in table format
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["eqp_name"] . "</td>";
                echo "<td>" . $row["quantity"] . "</td>";
                echo "<td>" . $row["cost"] . "</td>";
                echo "<td>" . $row["damage_amount"] . "</td>";
                echo "<td>" . $row["sports_id"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No data found</td></tr>";
        }

        $conn->close();
        ?>
    </tbody>
</table>
      </main>
      <script>
     function new_mem(){
    window.location.href = "http://localhost/dbs-main/new_mem.php";
  }
    function func9(){       
        event.preventDefault();
        window.location.href="index2.html";
    
    }
    function func6(){       
        event.preventDefault();
        window.location.href="http://localhost/dbs-main/delete_eqp.php";
    
    }
    function func7(){       
        event.preventDefault();
        window.location.href="http://localhost/dbs-main/update_eqp.php";
    
    }
    function func8(){       
        event.preventDefault();
        window.location.href="http://localhost/dbs-main/insert_eqp.php";
    
    }
   </script>
</body>
</html>
