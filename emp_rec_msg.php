<?php

 require 'includes/config.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="web_home/css_home/fontawesome-all.css"> <!-- Font-Awesome-Icons-CSS -->
<title>Message</title>
	<style>
    
body {
	font-family:  Helvetica;
    margin: 0;
}

.navbar {
 background-color: rgb(32, 55, 114);
overflow: hidden;
font-size: 20px;
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
    display: block;
    color: white;
    text-align: center;
    padding: 14px 20px;
    text-decoration: none;
    font-weight: bold;
}

.navbar a:hover {
    background-color: rgb(32, 55, 114);
}

.container {
    margin-top: 20px;
}

.card {
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-bottom: 20px;
    background-color: #f9f9f9;
}

.card-body {
    padding: 15px;
    font-size: 18px;
}

.card-footer {
    text-align: left;
    padding: 15px;
    font-size: 16px;
}

</style>
</head>

<body>

<div class="navbar">
    <h2>MESSAGE</h2>
    <a href="#"><i class="fa fa-fw fa-user"></i><?php echo $_SESSION['username']; ?></a>
    <a href="home_manager.php"><i class="fa fa-fw fa-home"></i> Home </a> 
</div>

<?php

$username = $_SESSION['username'];

// Query to retrieve pds_id for the given username
$query = "SELECT pds_id FROM employee WHERE username = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

// Check if the query was successful and if there is a result
if ($result->num_rows > 0) {
    // Assuming that username is unique, so there should be at most one result
    $row = $result->fetch_assoc();
    $pds_id = $row['pds_id'];

    // Query to retrieve records from the 'confirm' table for the specific pds_id
    $query1 = "SELECT * FROM confirm WHERE receiver_id = ?";
    $stmt1 = $conn->prepare($query1);
    $stmt1->bind_param("s", $pds_id);
    $stmt1->execute();
    $result1 = $stmt1->get_result();

    // Check if there are records in the 'confirm' table for the specific pds_id
    if ($result1->num_rows > 0) {
        // Output data of each row
        while ($row1 = $result1->fetch_assoc()) {
            ?>
            <div class="container">
                <div class="card">
                    <div class="card-body"><?php echo $row1['message']; ?></div> 
                    <div class="card-footer"><?php echo $row1['msg_date']; ?></div>
                </div>
            </div>
            <?php
        }
    } else {
        // If no records found for the specific pds_id
        echo "<div class='container'><p>No confirmation messages found.</p></div>";
    }
} else {
    // If no pds_id found for the username
    echo "<div class='container'><p>No PDS ID found for the username.</p></div>";
}
?>

</body>
</html>
