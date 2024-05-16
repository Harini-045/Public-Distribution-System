<?php

 require 'includes/config.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="web_home/css_home/fontawesome-all.css"> <!-- Font-Awesome-Icons-CSS -->
<title>Invoice</title>
    <style>
        body {
    font-family: Arial, Helvetica, sans-serif;
    margin: 0;
    padding: 0;
    background-color: rgb(255, 255, 255);
        background-size: cover;
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
        h1 {
            font-size: 40px;
            color: black;
        }

        table {
            width: 60%;
            margin: 100px auto;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            border: 2px solid black;
            text-align: left;
            color: black;
        }

        th {
            background-color: white;
            color: black;
        }

        form {
            margin-top: 20px;
            text-align: left; /* Align form elements to the left within the table cells */
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        select, input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            font-size: 16px;
        }
        #shopId {
            max-width: calc(100% - 24px); /* Adjust the max-width as needed */
        }

        button {
            background-color: rgb(32, 55, 114);
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
    </style>
</head>
<body>
    
<div class="navbar">
<h2>UPDATE AVAILABILITY</h2>
  <a href="#"><i class="fa fa-fw fa-user"></i><?php echo $_SESSION['username']; ?></a>
  <a href="home_manager.php"><i class="fa fa-fw fa-home"></i> Home </a> 
</div>
    <?php
// Include the database connection file
require 'includes/config.inc.php';

// Fetch the PDS ID based on the username
$username = $_SESSION['username'];
$query = "SELECT pds_id FROM employee WHERE username = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $pds_id = $row['pds_id'];
} else {
    // Handle the case where no PDS ID is found for the username
    // You can display an error message or handle it as per your requirement
    $pds_id = "No PDS ID found for the username.";
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $shopId = $_POST['shopId'];
    $shopAvailability = $_POST['shopAvailability'];
    $shopTimings = isset($_POST['shopTimings']) ? $_POST['shopTimings'] : null; // Check if timings were provided

    // Check if a row with the provided pds_id exists in the available table
    $query = "SELECT * FROM available WHERE shopId = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $shopId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Row with the provided pds_id exists, update the row
        $query = "UPDATE available SET shopAvailability = ?, shopTimings = ? WHERE shopId = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sss", $shopAvailability, $shopTimings, $shopId);
        $stmt->execute();

        // Check if the update was successful
        if ($stmt->affected_rows > 0) {
            echo "<script>alert('Availability updated successfully!');</script>";
        } else {
            echo "<script>alert('Failed to update availability.');</script>";
        }
    } else {
        // Row with the provided pds_id does not exist, insert a new row
        $query = "INSERT INTO available (shopId, shopAvailability, shopTimings) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sss", $shopId, $shopAvailability, $shopTimings);
        $stmt->execute();

        // Check if the insertion was successful
        if ($stmt->affected_rows > 0) {
            echo "<script>alert('Availability inserted successfully!');</script>";
        } else {
            echo "<script>alert('Failed to insert availability.');</script>";
        }
    }
}
?>
    <!-- HTML form -->
    <form action="available.php" method="POST" onsubmit="return submitOnce(this);">
    <!-- Form content -->
    

        <table>
            <tr>
                <th><label for="shopId">Shop ID:</label></th>
                <td><input type="text" id="shopId" name="shopId" value="<?php echo $pds_id; ?>" readonly required></td>
            </tr>
            <!-- Other form fields -->
            <tr>
                <th><label for="shopAvailability">Shop Availability:</label></th>
                <td>
                    <select id="shopAvailability" name="shopAvailability" onchange="toggleTimings()">
                        <option value="available">Available</option>
                        <option value="notavailable" selected>Not Available</option>
                    </select>
                </td>
            </tr>
            <tr id="timingRow" style="display:none;">
                <th><label for="shopTimings">Shop Timings:</label></th>
                <td><input type="text" id="shopTimings" name="shopTimings" placeholder="Shop Timings"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit" id="submitButton">Update Availability</button>
                </td>
            </tr>
        </table>
    </form>
    <!-- JavaScript -->
    <script>
        function toggleTimings() {
            var availability = document.getElementById("shopAvailability").value;
            var timingRow = document.getElementById("timingRow");
            if (availability === "available") {
                timingRow.style.display = "table-row"; // Display the timings row
            } else {
                timingRow.style.display = "none"; // Hide the timings row
            }
        }

        // Initially, check if the timings should be shown
        window.onload = function() {
            toggleTimings();
        };
    </script>
</body>
</html>
