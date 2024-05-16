<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grievance View</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: white;
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
<header>
    <h1>GRIEVANCES</h1>
</header>

<?php
// Your PHP code here

require '../includes/config.inc.php';
if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
    exit();
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $id = $_POST['id'];
    $status = $_POST['status'];
    $action_taken = ($_POST['status'] == 'Pending') ? null : $_POST['action_taken']; // Set action_taken to null if status is Pending
    
    // Update status and action_taken in the database
    $sql = "UPDATE complaints SET status=?, action_taken=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $status, $action_taken, $id);
    $stmt->execute();
    $stmt->close();
}

$sql = "SELECT * FROM complaints";
$result = $conn->query($sql);

// Check if there are complaints
if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Card Holder Name</th><th>Card Number</th><th>Complaint Type</th><th>Submission Date</th><th>Status</th><th>Action Taken</th><th>Action</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["cname"] . "</td>";
        echo "<td>" . $row["card_number"] . "</td>";
        echo "<td>" . $row["complaint_type"] . "</td>";
        echo "<td>" . $row["submission_date"] . "</td>";
        echo "<td>";
        echo "<form method='post'>";
        echo "<input type='hidden' name='id' value='" . $row["id"] . "'>";
        echo "<select name='status'>";
        echo "<option value='Pending'" . ($row["status"] == "Pending" ? " selected" : "") . ">Pending</option>";
        echo "<option value='In Progress'" . ($row["status"] == "In Progress" ? " selected" : "") . ">In Progress</option>";
        echo "<option value='Completed'" . ($row["status"] == "Completed" ? " selected" : "") . ">Completed</option>";
        echo "</select>";
        echo "</td>";
        echo "<td><textarea name='action_taken'>" . ($row["status"] == "Pending" ? "" : $row["action_taken"]) . "</textarea></td>"; // Set action_taken to empty string if status is Pending
        echo "<td><input type='submit' name='update' value='Update'></td>";
        echo "</form>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No grievances found.";
}

// Close connection
$conn->close();
?>
</body>
</html>
