<?php
 require 'includes/config.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css'>
    <style>
        body {
            background-color: rgb(255, 255, 255);
            background-size: cover; /* Adjust the image size */
            font-family: 'Raleway', sans-serif;
            margin: 0;
            padding: 0;
        }
        .navbar {
    width: 100%;
    background-color: rgb(32, 55, 114);
    overflow: auto;
    position: fixed;
}

.navbar h2 {
    font-size: 32px;
    margin: 0;
    padding: 15px;
    font-weight: bold;
    color: white;
    text-align:center;
    float: left;
}

.navbar a {
    float: right;
    padding: 15px;
    color: white;
    text-decoration: none;
    font-size: 20px;
    font-weight: bold;
}

.navbar a:hover {
    background-color: rgb(32, 55, 114);
}

.active {
    background-color: rgb(32, 55, 114);
}

@media screen and (max-width: 500px) {
  .navbar a {
    float: none;
    display: block;
  }
}
        
        h1
        {
            font-size: 40px;
            text-align:center;
            color:rgb(32, 55, 114);
        } th, td {
            font-size: 20px; /* Set your preferred font size */
        }

        table {
            width: 80%;
            
            margin: 160px auto;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            border: 2px solid black;
            text-align: center;

            color: black
        }

        th {
            background-color: white; /* Set your preferred heading background color */
            color:rgb(32, 55, 114);
            text-align: center; /* Set your preferred heading text color */
        }

    </style>
</head>
<body>
<div class="navbar">
<h2>SHOP TIMINGS</h2>
 
  <a href="#"><i class="fa fa-fw fa-user"></i><?php echo $_SESSION['cardnumber']; ?></a>
  <a href="ch.php"><i class="fa fa-fw fa-home"></i> Home </a> 
</div>
<br><br><br>
<?php
// Require your configuration file


// Check if the 'cardnumber' session variable is set, indicating the user is logged in
if (isset($_SESSION['cardnumber'])) {
    // Get the 'cardnumber' from the session
    $cardnumber = $_SESSION['cardnumber'];

    // Query to fetch the PDS ID based on the customer's card_number
    $sql = "SELECT pds_id FROM cardholder WHERE card_number = '$cardnumber'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $pds_id = $row['pds_id'];

        // Query to fetch shop and product availability based on the PDS ID
        $sql = "SELECT shopAvailability, shopTimings
                FROM available
                WHERE shopId = $pds_id";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $shopAvailability = $row['shopAvailability'];
            $shopTimings = $row['shopTimings']; // Get shop timings from the database

            echo "<h1 >Welcome, $cardnumber</h1>";
            echo "<table>";
            echo "<tr><th>Category</th><th>Availability</th></tr>";
            echo "<tr><td>Shop</td><td>$shopAvailability</td></tr>";
            if (!empty($shopTimings)) { // Check if shop timings are not empty
                echo "<tr><td>Shop Timings</td><td>$shopTimings</td></tr>";
            }
            
           
            echo "</table>";
        } else {
            echo "Shop and product availability information not found for this user.";
        }
    } else {
        echo "PDS ID not found for this user.";
    }

    // Close the database connection
    $conn->close();
} else {
    // If the 'cardnumber' session variable is not set, the user is not logged in
    echo "User not logged in.";
}
?>
</body>
</html>
