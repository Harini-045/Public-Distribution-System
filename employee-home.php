<?php
 require 'includes/config.inc.php';
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!--=============== SWIPER CSS ===============-->
<link rel="stylesheet" href="assets/css/swiper-bundle.min.css">

<!--=============== CSS ===============-->
<link rel="stylesheet" href="assets/css/styles.css">
<style>

body {
    font-family: Arial, Helvetica, sans-serif;
    margin: 0;
    padding: 0;
    background-color: rgb(255, 255, 255);
    background-image: url('assets/img/people.jpg');
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

#blog {
  top: 200px;
  background-color: rgb(32, 55, 114);
  font-weight: bold;
}

#projects {
  top: 260px;
  background-color: rgb(32, 55, 114);
  font-weight: bold;
}

#contact {
  top: 320px;
  background-color: rgb(32, 55, 114);
}

#qr {
  top:380px;
  background-color: rgb(32, 55, 114);
}

#time {
  top: 460px;
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
    <a href="update_stock.php" id="blog">Update Stock</a>
    <a href="request_stock.php" id="projects">Request Stock</a>
    <a href="emp_rec_msg.php" id="contact"> Stock Confirmation</a>
    <a href="bill.html" id="qr">Generate Invoice</a>
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

</body>
</html>
