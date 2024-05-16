<?php

 require 'includes/config.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="web_home/css_home/fontawesome-all.css"> <!-- Font-Awesome-Icons-CSS -->
<title>View Stock</title>
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

@media screen and (max-width: 500px) {
  .navbar a {
    float: none;
    display: block;
  }
}

        table {
            width: 80%;
            margin: 100px auto;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: white;
            text-align: center;
            font-weight:bold;
            font-size:25px;
        }
    </style>
</head>
<body>
<div class="navbar">
<h2>VIEW STOCK</h2>
  <a href="#"><i class="fa fa-fw fa-user"></i><?php echo $_SESSION['username']; ?></a>
  <a href="home_manager.php"><i class="fa fa-fw fa-home"></i> Home </a> 
</div>
    <table>
        <thead>
            <tr>
                <th>ITEM NAME</th>
                <th>STOCK QUANTITY</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Include the database connection file
            require 'includes/config.inc.php';

            $username = $_SESSION['username'];
            $query = "SELECT pds_id FROM employee WHERE username = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $pds_id = $row['pds_id'];

                // Now, fetch the items and quantities for the retrieved PDS ID
                $query = "SELECT item_name, stock_quantity FROM pds_item WHERE pds_id = ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("i", $pds_id);
                $stmt->execute();
                $result = $stmt->get_result();

                // Check if any rows are returned
                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['item_name'] . "</td>";
                        echo "<td>" . $row['stock_quantity'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='2'>No data found</td></tr>";
                }
            } else {
                echo "<tr><td colspan='2'>No PDS ID found for the username.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
