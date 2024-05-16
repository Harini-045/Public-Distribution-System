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

#projects {
  top: 200px;
  background-color: rgb(32, 55, 114);
  font-weight: bold;
}
#stock {
  top: 260px;
  background-color: rgb(32, 55, 114);
}
#contact {
  top: 320px;
  background-color: rgb(32, 55, 114);
}
#status {
  top: 380px;
  background-color: rgb(32, 55, 114);
}

#qr {
  top: 440px;
  background-color: rgb(32, 55, 114);
}

#time {
  top: 500px;
  background-color: rgb(32, 55, 114);
}

.about__container {
    margin-right: -10px; /* Adjust this value as needed */
}

</style>
</head>
<body>

<div class="navbar">
<h2>CARD HOLDER</h2>
  <a href="profile.php"><i class="fas fa-sign-out-alt">Profile</a>
  <a href="#"><i class="fa fa-fw fa-user"></i><?php echo $_SESSION['cardnumber']; ?></a>
  <a href="ch.php"><i class="fa fa-fw fa-home"></i> Home </a> 
</div>

<div id="mySidenav" class="sidenav">
    <a href="faq_h.php" id="about">FAQ</a>
    <!--<a href="ch_view_holidays.html" id="blog">Holidays</a>-->
    <a href="ch_view_products.php" id="projects"> Products</a>
    <a href="ch_view_stock.php" id="stock">Current Stock</a>
    <a href="ch_register_complaints.php" id="contact">Register Complaint</a>
    <a href="view_complaint_status.php" id="status"> Complaint Status</a>
    <a href="ch_view_timings.php" id="qr"> Shop Timings</a>
</div>

<section class="about section">
    <div class="about__container container grid">
        <div class="about__data">
            <h2 class="section__title about__title">PUBLIC DISTRIBUTION SYSTEM</h2>
            <p>"Empowering Efficiency, Enhancing Accuracy: PDS System - Your Path to Seamless Management."</p>
</div>
    </div>
</section>

</body>
</html>
