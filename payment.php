<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
    {   
header('location:index.php');
}
?>
<?php
if(isset($_POST['submit']))
{
	$pay=$_POST['paymentmethod'];
	$result=mysqli_query($conn,"insert into orders(userid,paymentmethod) values('".$_SESSION['userid']."','$pay')");
	while($row = mysqli_fetch_assoc($result))
	$_SESSION['msg']="Order Successfully Placed !!";
    header('Refresh:1;url=user-dashboard.php');	
}
?>
<?php
if(isset($_POST['card']))
{
	$pay=$_POST['paymentmethod'];
	$result=mysqli_query($conn,"insert into orders(userid,paymentmethod) values('".$_SESSION['userid']."','$pay')");
	while($row = mysqli_fetch_assoc($result))
	$_SESSION['msg']="Order Successfully Placed !!";
    header('Refresh:1;url=user-dashboard.php');	
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Gas Agency Website Template | Booking :: w3layouts</title>
<!-- custom-theme -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/php; charset=utf-8" />
<meta name="keywords" content="Travel Agency Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>	
		
<!-- For Testimonials slider -->
<!-- //For Testimonials slider -->
<!-- //custom-theme files-->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- //custom-theme files-->
<!-- font-awesome-icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome-icons -->
<!-- googlefonts -->
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext,vietnamese" rel="stylesheet">
<!-- //googlefonts -->
<link rel="stylesheet" href="css/jquery-ui.css" />
<link href="css/bookingstyle.css" rel="stylesheet" type="text/css" media="all"/>
</head>
<body>
		
<!-- banner -->


		<!-- Top-Bar -->
				<div class="top">
					<div class="container">
						
							
							<div class="col-md-6 top-middle">
								<ul>
									<li><a href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
									<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								</ul>
							</div>
							<div class="col-md-6 top-left">
								<ul>
									<li><i class="fa fa-mobile" aria-hidden="true"></i> +918486600983</li>
									<li><i class="fa fa-map-marker" aria-hidden="true"></i> Golaghat-785621,Assam,India</li>
								</ul>
							</div>
							<div class="clearfix"></div>
						
					</div>
				</div>
				<div class="top-bar">
				<div class="container">
					<div class="header">
						<nav class="navbar navbar-default">
							<div class="navbar-header navbar-left">
								<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
								<h1><a class="navbar-brand" href="index.php">Gas Agency</span></a></h1>
							</div>
							<!-- Collect the nav links, forms, and other content for toggling -->
							<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
								<nav class="cl-effect-15" id="cl-effect-15">
									<ul class="nav navbar-nav">
										<li><a href="index.php">Home</a></li>
													<li><a href="about.php">About</a></li>
													<li><a href="contact.php">Contact</a></li>
												</ul>
									
								</nav>
							</div>
						</nav>
				</div>
			</div>
		</div>
		<!-- //Top-Bar -->
		<!-- w3-banner -->
	<div class="banner">
			<div class="w3-banner">
			
			</div>
	</div>
<!-- //banner -->
	<div class="three-grids">
		<div class="container">
			<div class="statements">
				<div class="col-md-7 mission">
					 <h4>Total Stock - </h4>
					 <hr style="border:1px solid;">
				</div>
				<div class="clearfix"> </div>
			</div>		
		</div>
	</div>
	<div class="head agile">
		<div class="login w3" style="padding: .5rem;background-color: #fff;border: 1px solid #859bb1;border-radius: 1rem;max-width: 80%;height: auto;width: 100%;">
			<div class="sap_tabs">
				<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
					<ul class="resp-tabs-list">
						<li class="resp-tab-item" ><span>COD</span></li>
						<li class="resp-tab-item" ><span>Credit/Debit</span></li>
						
					</ul>				  	 
					<div class="resp-tabs-container">
						<div class="tab-1 resp-tab-content" >
							<div class="login-top agileinfo">								
								<form action="#" method="post">
								<input type="hidden" name="paymentmethod" value="cod">
											<div class="aitssubmitw3ls">
												<input type="submit" name="submit" value="Make Payment">
											</div>
								</form>
							</div>
						</div>
						<div class="tab-1 resp-tab-content" >
							<div class="login-top agileits">
								<div class="w3layouts-agileits">
											<div class="w3layoutscontactagileits">
												<form action="#" method="post">
												<input type="hidden" name="paymentmethod" value="card">
													<div class="w3_agileits_main_grid w3l_main_grid">
														<div class="agileits_grid">
															<h5>Name on Card </h5>
															<div class="name">
																<input type="text" name="name" placeholder="Your Name" required="">
															</div>
															<div class="clearfix"></div>
														</div>
													</div>
													<div class="w3_agileits_main_grid w3l_main_grid">
														<div class="agileits_grid">
															<h5>Card Number </h5>
																<input type="text" name="cardNo" placeholder="&#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149;" required="">
														</div>
													</div>
													<div class="w3_agileits_main_grid w3l_main_grid">
														<div class="agileits_grid">
															<h5>CVV </h5>
															<div class="name">
																<input type="text" name="cvv" placeholder="&#149;&#149;&#149;" required="">
															</div>
															<div class="clearfix"></div>
														</div>
													</div>
													<div class="w3_agileits_main_grid w3l_main_grid">
														<div class="agileits_grid">
															<h5>Expiration Date</h5>
															<div class="name">
																<input type="text" name="expDate" placeholder="MM / YY" required="">
															</div>
															<div class="clearfix"></div>
														</div>
													</div>
										<div class="clear"></div>
										</div>
										
											<div class="aitssubmitw3ls">
												<input type="submit" name="card" value="Make Payment">
											</div>
										</form>
									</div>
								</div>	
							</div>
						</div>		
					</div>	
				</div>
			</div>	
		</div>	
		<div class="clear"></div>
	</div>	
<!-- footer -->
	<div class="footer">
		<div class="container">
			<div class="col-md-4 agile_footer_grid">
				<h3>Contact Info</h3>
				<ul class="w3_address">
					<li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>Golaghat-785621 <span>Assam,India</span></li>
					<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:info@gmail.com">info@gmail.com</a></li>
					<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+918486600983</li>
				</ul>
			</div>
			<div class="col-md-4 agile_footer_grid">
				<h3>About Us</h3>
				<p>Bharatgas comes from the house of BPCL a Fortune 500 company - a major player in Refining and Marketing of petroleum Products in India.

Bharatgas has been a pioneer in more ways than one and brought many innovative products and customer centric offerings to the customers.</p>
				<ul class="agileits_social_list">
					<li><a href="#" class="w3_agile_facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
					<li><a href="#" class="agile_twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
					<li><a href="#" class="w3_agile_dribble"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
				</ul>
			</div>
		</div>
		<div class="clearfix"> </div>
	</div>
	<div class="agileinfo_copyright">
		<p>© 2019 Gas Agency. All rights reserved | Design by <a href="http://w3layouts.com/">Dulusmita Bora</a></p>
	</div>
<!-- //footer -->

<!-- js -->
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<!-- for bootstrap working -->
	<script src="js/bootstrap.js"></script>
	<!-- //for bootstrap working -->
<!-- //js -->
<!-- //here starts scrolling icon -->
<script src="js/SmoothScroll.min.js"></script>
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<!-- here stars scrolling script -->
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
	<!-- //here ends scrolling script -->
<!-- //here ends scrolling icon -->

<!-- scrolling script -->
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script> 
<!-- //scrolling script -->
<!-- //Calendar -->
											<script src="js/jquery-ui.js"></script>
											  <script>
													  $(function() {
														$( "#datepicker,#datepicker1" ).datepicker();
													  });
											  </script>
								<!-- //Calendar -->
<!--script-->
<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
		    <script type="text/javascript">
			    $(document).ready(function () {
			        $('#horizontalTab').easyResponsiveTabs({
			            type: 'default', //Types: default, vertical, accordion           
			            width: 'auto', //auto or any width like 600px
			            fit: true   // 100% fit in a container
			        });
			    });
				
</script>	
<!--script-->
</body>
</html>