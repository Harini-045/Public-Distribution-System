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
<h2>ADMIN</h2>
  <a href="includes/logout.inc.php"><i class="fas fa-sign-out-alt">Logout</a>
  <a href="#"><i class="fa fa-fw fa-user"></i><?php echo $_SESSION['username']; ?></a>
  <a href="admin_home.php"><i class="fa fa-fw fa-home"></i> Home </a> 
</div>

<div id="mySidenav" class="sidenav">
    <a href="create_hm.php" id="about">Appoint/Remove Employee</a>
    <a href="create_ch.php" id="blog">Appoint/Remove CardHolder</a>
    <a href="../admin_rr.php" id="projects">Receive message</a>
    <a href="../admin_reply.php" id="contact"> Reply</a>
    <a href="view_grievance.php" id="qr">Grievance</a>
</div>

<section class="about section">
    <div class="about__container container grid">
        <div class="about__data">
            <h2 class="section__title about__title">PUBLIC DISTRIBUTION SYSTEM</h2>
            <p class="about__description">You can find the most beautiful and pleasant places at the best 
                prices with special discounts, you choose the place we will guide you all the way to wait, get your 
                place now.
            </p>
</div>
    </div>
</section>

<!-- js-scripts -->

	<!-- js -->
	<script type="text/javascript" src="../web_home/js/jquery-2.2.3.min.js"></script>
	<script type="text/javascript" src="../web_home/js/bootstrap.js"></script> <!-- Necessary-JavaScript-File-For-Bootstrap -->
	<!-- //js -->

	<!-- banner js -->
	<script src="../web_home/js/snap.svg-min.js"></script>
	<script src="../web_home/js/main.js"></script> <!-- Resource jQuery -->
	<!-- //banner js -->

	<!-- flexSlider --><!-- for testimonials -->
	<script defer src="../web_home/js/jquery.flexslider.js"></script>
	<script type="text/javascript">
		$(window).load(function(){
		  $('.flexslider').flexslider({
			animation: "slide",
			start: function(slider){
			  $('body').removeClass('loading');
			}
		  });
		});
	</script>
	<!-- //flexSlider --><!-- for testimonials -->

	<!-- start-smoth-scrolling -->
	<script src="../web_home/js/SmoothScroll.min.js"></script>
	<script type="text/javascript" src="../web_home/js/move-top.js"></script>
	<script type="text/javascript" src="../web_home/js/easing.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});
		});
	</script>
	<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear'
				};
			*/

			$().UItoTop({ easingType: 'easeOutQuart' });

			});
	</script>

</body>
</html>
