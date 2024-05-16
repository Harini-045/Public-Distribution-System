<?php
require 'includes/config.inc.php';

// Check if the user is logged in
if (!isset($_SESSION['cardnumber'])) {
    // Redirect the user to the login page if they are not logged in
    header("Location: ../index.php");
    exit(); // Prevent further execution
}

// The card number is stored in the session
$cardNumber = $_SESSION['cardnumber'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaint Status</title>
    <style>
         body {
    font-family:  Helvetica;
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
        
        h2 {
            color: #0066cc; /* Government Blue header color */
            text-align: center;
            margin-bottom: 20px;
        }
        
        label {
            color: #0066cc; /* Government Blue label color */
            font-weight: bold;
        }
        
        header {
            background-color: rgb(32, 55, 114); /* Blue background color */
            color: white; /* White text color */
            padding: 10px;
            text-align: center;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
            color:rgb(32, 55, 114) ; /* Change text color to blue */
        }

        th {
            background-color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        select, textarea, input[type="submit"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        select:focus, textarea:focus, input[type="submit"]:focus {
            outline: none;
            border-color: #007bff;
        }
    </style>
</head>
<body>
<div class="navbar">
<h2>COMPLAINT STATUS</h2>
<a href="#"><i class="fa fa-fw fa-user"></i><?php echo $_SESSION['cardnumber']; ?></a>
  <a href="ch.php"><i class="fa fa-fw fa-home"></i> Home </a>
</div>
<br><br><br><br>

    <?php
    // Retrieve complaints data
    $sql = "SELECT c.id, c.complaint_type, c.message, c.status, c.action_taken, c.submission_date FROM complaints c JOIN cardholder ch ON c.card_number = ch.card_number WHERE ch.card_number = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $cardNumber);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Complaint Type</th><th>Message</th><th>Submission Date</th><th>Status</th><th>Action Taken</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["complaint_type"] . "</td>";
            echo "<td>" . $row["message"] . "</td>";
            echo "<td>" . $row["submission_date"] . "</td>";
            echo "<td>" . $row["status"] . "</td>";
            echo "<td>" . $row["action_taken"] . "</td>";
            
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No complaints found.";
    }
    ?>
</body>
</html>
