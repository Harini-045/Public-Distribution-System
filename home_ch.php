<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!--=============== SWIPER CSS ===============-->
<link rel="stylesheet" href="assets/css/swiper-bundle.min.css">

<!--=============== CSS ===============-->
<link rel="stylesheet" href="assets/css/styles.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
    font-family: Arial, Helvetica, sans-serif;
    margin: 0;
    padding: 0;
}
#mySidenav a {
  position: absolute;
  left: -80px;
  transition: 0.3s;
  padding: 15px;
  width: 100px;
  text-decoration: none;
  font-size: 20px;
  color: white;
  background-color: white
  border-radius: 0px 5px 5px 0px;
}

#mySidenav a:hover {
  left: 0;
}

#about {
  top: 80px;
  background-color: rgb(32, 55, 114);
}

#blog {
  top: 140px;
  background-color: rgb(32, 55, 114);
}

#projects {
  top: 200px;
  background-color: rgb(32, 55, 114);
}

#contact {
  top: 280px;
  background-color: rgb(32, 55, 114);
}


.navbar {
    width: 100%;
    background-color: rgb(32, 55, 114);
    overflow: auto;
}

.navbar h2 {
    font-size: 32px;
    margin: 0;
    padding: 15px;
    font-weight: bold;
    color: white;
    float: left;
}

.navbar a {
    float: right;
    padding: 15px;
    color: white;
    text-decoration: none;
    font-size: 20px;
}

.navbar a:hover {
    background-color: rgb(32, 55, 114);
}

.active {
    background-color: rgb(32, 55, 114);
}
.about__data {
  text-align: center;
}

.about__container {
  row-gap: 2.5rem;
}

.about__description {
  margin-bottom: var(--mb-2);
}

.about__img {
  display: flex;
  column-gap: 1rem;
  align-items: center;
  justify-content: center;
}

.about__img-overlay {
  overflow: var(--img-hidden);
}

.about__img-one {
  width: 130px;
}

.about__img-two {
  width: 180px;
}

.about__img-one, 
.about__img-two {
  transition: var(--img-transition);
}

.about__img-one:hover, 
.about__img-two:hover {
  transform: var(--img-scale);
}

@media screen and (max-width: 500px) {
    .navbar a {
        float: none;
        display: block;
    }
}
</style>
<body>

<div class="navbar">
    <h2>CARD HOLDER</h2>
	<a href="includes/logout.inc.php"><i class="fas fa-sign-out-alt">Logout</a>
    <a href="faq.php"><i class="fa fa-search"></i>FAQ</a>
    <a href="ch_view_holidays.html"><i class="far fa-comment-dots"></i>Holidays</a>
    <a href="ch_view_products.html"><i class="fa fa-qrcode"></i> Products</a>
    <a href="grievance.php"><i class="far fa-comment-dots"></i>Register Complaint</a>
    <a href="qr_code.php"><i class="fa fa-qrcode"></i> Scan QR</a>
    <a href="ch_view_timings.php"><i class="fas fa-user-clock"></i> Shop and Product Availability</a>
    <a href="ch_home.php"><i class="fa fa-fw fa-home"></i> Home</a>
</div>
<div id="mySidenav" class="sidenav">
  <a href="#" id="about">About</a>
  <a href="#" id="blog">Blog</a>
  <a href="#" id="projects">Projects</a>
  <a href="#" id="contact">Contact</a>
</div>
 <section class="about section" id="about">
                <div class="about__container container grid">
                    <div class="about__data">
                        <h2 class="section__title about__title">More Information <br> About The Best Beaches</h2>
                        <p class="about__description">You can find the most beautiful and pleasant places at the best 
                            prices with special discounts, you choose the place we will guide you all the way to wait, get your 
                            place now.
                        </p>
                        <a href="#" class="button">Reserve a place</a>
                    </div>

                    <div class="about__img">
                        <div class="about__img-overlay">
                            <img src="assets/img/about1.jpg" alt="" class="about__img-one">
                        </div>

                        <div class="about__img-overlay">
                            <img src="assets/img/about2.jpg" alt="" class="about__img-two">
                        </div>
                    </div>
                </div>
            </section>

</body>
</html> 
