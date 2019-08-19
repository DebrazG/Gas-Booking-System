<?php
session_start();
error_reporting(0);
include('includes/config.php');
$message = '';
if(isset($_POST["submit"]))
{
		$userid=rand(100000,999999);
		$id=$userid;
		$name = $_POST['name'];
		$dob = $_POST['dob'];
		$fname = $_POST['fname'];
		$mname = $_POST['mname'];
		$spname = $_POST['spname'];
		$gender = $_POST['gender'];
		$address = $_POST['address'];
		$state = $_POST['state'];
		$district = $_POST['district'];
		$city = $_POST['city'];
		$pin = $_POST['pin'];
		$cno = $_POST['cno'];
		$email = $_POST['email'];
		$poi = $_POST['poi'];
		$cardNo = $_POST['cardNo'];
		$subsidy = $_POST['subsidy'];
		$bank = $_POST['bank'];
		$accNo = $_POST['accNo'];
		$photo = $_FILES["photo"]["name"];
		$sign = $_FILES["sign"]["name"];
		$user_email_status = 'not verified';
	$query= "SELECT * FROM connection WHERE email = '$email'";
  	$res_u = mysqli_query($conn, $sql_u);
  	if (mysqli_num_rows($res_u) > 0) {
  	  $message = "Sorry... email already exist"; 
	}
	else
	{
$sql = "insert into connection(userid,name,dob,fname,mname,spname,gender,address,state,district,city,pin,cno,email,poi,cardNo,subsidy,bank,accNo,photo,sign,user_email_status)
 values('$userid','$name','$dob','$fname','$mname','$spname','$gender','$address','$state','$district','$city','$pin','$cno','$email','$poi','$cardNo','$subsidy','$bank','$accNo','$photo','$sign','$user_email_status')";
	move_uploaded_file($_FILES["photo"]["tmp_name"],"images/photos/".$_FILES["photo"]["name"]);
	move_uploaded_file($_FILES["sign"]["tmp_name"],"images/signs/".$_FILES["sign"]["name"]);
if(mysqli_query($conn, $sql)){
    $message=" Registration done Successfully !!";
header('Refresh:1;url=new-connection.php');
} else{
	$message=" Could not able to execute $sql";
header('Refresh:1;url=new-connection.php');
}
	}
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
<!-- main-section -->	
	<div class="head agile" style="height: 1900px;">
	<div class="wthree_head_section">
				<h4 class="w3_header"><b>Request For New Connection</B></h4>
				<?php echo $message; ?>
			</div>
		<div class="login w3">
			<div class="sap_tabs">
				<h5><b>(1) Personal Details</b></h5>
								<form action="" method="post" enctype="multipart/form-data">
								<input type="hidden" name="userid">
									<div class="w3_agileits_main_grid w3l_main_grid">
										<div class="agileits_grid">
											<h5>Name </h5>
											<div class="name">
												<input type="text" name="name" placeholder="" required>
											</div>
											<div class="clear"></div>
										</div>
									</div>
									<div class="w3_agileits_main_grid w3l_main_grid">
										<div class="agileits_grid">
											<h5>date of birth                                                                                                                                                                                            </h5>
												<input type="date" name="dob" placeholder="" required>
												
										</div>
									</div>
									<div class="w3_agileits_main_grid w3l_main_grid">
										<div class="agileits_grid">
											<h5>Father's name</h5>
												<input type="text" name="fname" placeholder="" required>
										</div>
									</div>
									<div class="w3_agileits_main_grid w3l_main_grid">
										<div class="agileits_grid">
											<h5>Mother's name</h5>
												<input type="text" name="mname" placeholder="" required>
										</div>
									</div>
									<div class="w3_agileits_main_grid w3l_main_grid">
										<div class="agileits_grid">
											<h5>Spouse name</h5>
												<input type="text" name="spname" placeholder="">
										</div>
									</div>
									<div class="w3_agileits_main_grid w3l_main_grid">
										<div class="agileits_grid">
											<h5>Gender</h5>
												<select id="category1" name="gender" required="">
												<option value="category1">-Select-</option>												
												<option>Male</option>
												<option>Female</option>
												</select>
										</div>
									</div>
				<h5><b>(2) Address of LPG Connection</b></h5>
									<div class="agileinfo_main_grid1">
										<div class="agileits_w3layouts_grid mim">
											<h5>Address</h5>
											<input type="text" name="address" placeholder="" required>
										</div>
									</div>
									<div class="agileinfo_main_grid1">
										<div class="agileits_w3layouts_grid mim">
											<h5>State</h5>
											<input type="text" name="state" placeholder="" required>
										</div>
									</div>
									<div class="w3_agileits_main_grid w3l_main_grid">
										<div class="agileits_grid">
											<h5>District</h5>
											<input type="text" name="district" placeholder="" required>
										</div>
									</div>
									<div class="w3_agileits_main_grid w3l_main_grid">
										<div class="agileits_grid">
											<h5>Village/Town/city</h5>
											<input type="text" name="city" placeholder="" required>
										</div>
									</div>
									<div class="w3_agileits_main_grid w3l_main_grid">
										<div class="agileits_grid">
											<h5>PIN Code</h5>                                                                                                                                                                                           </h5>
											<input type="text" name="pin" placeholder="" pattern="^\d{6}$" required>
												
										</div>
									</div>
									<div class="w3_agileits_main_grid w3l_main_grid">
										<div class="agileits_grid">
											<h5>Mobile Number</h5>
											<input type="text" name="cno" placeholder="" pattern="^\d{10}$" required>
										</div>
									</div>
									<div class="w3_agileits_main_grid w3l_main_grid">
										<div class="agileits_grid">
											<h5>Email ID</h5>
											<input type="email" name="email" placeholder="" required>
										</div>
									</div>
			    <h5><b>(3) Other Relevant Details</b></h5>						
                                        <div class="agileinfo_main_grid1">
											<div class="agileits_w3layouts_grid mim">
												<h5>POI(Proof of identity)Category</h5>
												<select id="category2" name="poi" required>
													<option>-Select-</option>
													<option>Voter ID</option>
													<option>Aadhaar Card</option>
													<option>Ration Card</option>
													<option>Driving License</option>
													<option>Electricity/Water Bill</option>
												</select>
											</div>
										</div>
                                        <div class="agileinfo_main_grid1">
											<div class="agileits_w3layouts_grid mim">
												<h5>Card Number</h5>
												<input type="text" name="cardNo" placeholder="" pattern="^\d{16}$" required>
										    </div>
										</div>
				<h5><b>(4) Details Related to Cash Transfer</b></h5>
                                        <div class="agileinfo_main_grid1">
											<div class="agileits_w3layouts_grid mim">
												<h5>Government has launched the 'Give Up Subsidy' scheme which is aimed at motivating LPG users who can afford to 
												    pay the market price for LPG, voluntarily surrender their LPG subsidy.If you want to give up subsidy, select 
												    'Yes' below. If you want subsidy, select 'No' below:</h5>
												<select id="category2" name="subsidy" required>
													<option>-Select-</option>
													<option>Yes</option>
													<option>No</option>
												</select>
											</div>
										</div>
						                <div class="agileinfo_main_grid1">
											    <div class="agileits_w3layouts_grid">
												     <h5>Bank</h5>
													    <select id="category1" name="bank" required>
                                                        <option>-Select-</option>												
														<option>SBI</option>
														<option>PNB</option>
														<option>ICICI</option>
														<option>HDFC</option>
														<option>AXIS</option>
													    </select>
												</div>
										</div>
									    <div class="w3_agileits_main_grid w3l_main_grid">
											<div class="agileits_grid">
												<h5>Bank Account Number</h5>
												<input type="text" name="accNo" placeholder="" required>
											</div>
										</div>	
				<h5><b>(5)Document Submission</b></h5>
						                <div class="w3_agileits_main_grid w3l_main_grid">
											    <div class="agileits_grid">
													 <h5>photo</h5>
													 <input type="file" name="photo" required>  
												</div>
										</div>
						                <div class="w3_agileits_main_grid w3l_main_grid">
											    <div class="agileits_grid">
													 <h5>Signature</h5>
													 <input type="file" name="sign" required>  
												</div>
										</div>
										<div class="aitssubmitw3ls">
											<input type="submit" name="submit" value="submit">
										</div>
								</form>
			</div>
		</div>
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
			$('php,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script> 
<!-- //scrolling script -->
</body>
</html>