<?php
 require 'includes/config.inc.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="assets/css/styles.css">
<style>

body {
    font-family: Arial, Helvetica, sans-serif;
    margin: 0;
    background-image: url('assets/img/people.jpg');
    background-size: cover;
}

.navbar {
    width: 100%;
    background-color: rgb(32, 55, 114);
    overflow: auto;
    position: fixed;
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
    padding: 15px;
    color: white;
    font-size: 20px;
    font-weight: bold;
}

.navbar a:hover {
    background-color: rgb(32, 55, 114);
}



#mySidenav a {
  position: absolute;
  left: 2px;
  transition: 0.3s;
  padding: 15px;
  width: 220px;
  text-decoration: none;
  font-size: 20px;
  color: white;
  font-weight: bold;
  border-radius: 0px 10px 10px 0px;
}

#mySidenav a:hover {
  left: 0;
}


#about {
  top: 140px;
  background-color: rgb(32, 55, 114);
  font-weight: bold;
}
#captureface{
  top: 200px;
  background-color: rgb(32, 55, 114);
}


#blog {
  top: 260px;
  background-color: rgb(32, 55, 114);
  font-weight: bold;
}

#projects {
  top: 320px;
  background-color: rgb(32, 55, 114);
  font-weight: bold;
}

#contact {
  top: 380px;
  background-color: rgb(32, 55, 114);
}

#qr {
  top:460px;
  background-color: rgb(32, 55, 114);
}

#time {
  top: 520px;
  background-color: rgb(32, 55, 114);
}

.about__container {
    margin-right: -10px; /* Adjust this value as needed */
}

</style>
</head>
<body>

<div class="navbar">
<h2>EMPLOYEE</h2>
  <a href="includes/logout.inc.php"><i class="fas fa-sign-out-alt">Logout</a>
  <a href="#"><i class="fa fa-fw fa-user"></i><?php echo $_SESSION['username']; ?></a>
  <a href="home_manager.php"><i class="fa fa-fw fa-home"></i> Home </a> 
</div>

<div id="mySidenav" class="sidenav">
    <a href="available.php" id="about">Availability</a>
    <a href="http://127.0.0.1:5000" id="captureface" onclick="runPythonScript()">Capture Face</a>

   
    <a href="view_stock.php" id="blog">View Stock</a>
    <a href="request_stock.php" id="projects">Request Stock</a>
    <a href="emp_rec_msg.php" id="contact"> Stock Confirmation</a>
    <a href="ch_details.php" id="qr">Generate Invoice</a>
</div>

<section class="about section">
    <div class="about__container container grid">
        <div class="about__data">
            <h2 class="section__title about__title">PUBLIC DISTRIBUTION SYSTEM</h2>
            <p class="about__description">"Empowering Efficiency, Enhancing Accuracy: PDS System - Your Path to Seamless Management."
            </p>
</div>
    </div>
</section>
<script>
function runPythonScript() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log("Python script executed successfully");
        }
    };
    xhttp.open("GET", "run_script.php", true);
    xhttp.send();
}
</script>

</body>
</html>
