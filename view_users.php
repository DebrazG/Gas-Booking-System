<?php
session_start();
include('includes/config.php');
if(strlen($_SESSION['id'])==0)
{	
header('location:login.php');
}
else {
$id=intval($_GET['id']);
$sql = "SELECT * FROM connection WHERE id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$user_email_status = $row['user_email_status'];
$userid = $row['userid'];
if($user_email_status=='Accepted' || $user_email_status=='Rejected')
{
    $_SESSION['msg']="Application already $user_email_status";
}
else
if(isset($_POST["user_email_status"]))
{
    $user_email_status = $_POST['user_email_status'];
	if ($user_email_status == "Accepted") {
		$sql = "UPDATE connection SET user_email_status = 'Accepted' WHERE id = '$id'";
		$result = $conn->query($sql);
		echo 'alert("Accepted")';
		header ("Location: manage-users.php");
	
	$base_url = "http://localhost/Gas-Agency/";  //change this baseurl value as per your file path
	$mail_body = "
	<p>Hi ".$_POST['name'].",</p>
	<p>Welcome to Bharat Gas Agency. Your ID is ".$userid.", You can use this ID for login purposes.</p>
	<p>Please Open this link to login - ".$base_url."login.php
	<p>Best Regards,<br />Gas Agency</p>
	";
	require 'class/class.phpmailer.php';
	$mail = new PHPMailer;
	$mail->IsSMTP();								//Sets Mailer to send message using SMTP
	$mail->Host = 'smtp.gmail.com';		//Sets the SMTP hosts of your Email hosting, this for Godaddy
	$mail->Port = '465';								//Sets the default SMTP server port
	$mail->SMTPAuth = true;							//Sets SMTP authentication. Utilizes the Username and Password variables
	$mail->Username = 'Your Email ID';					//Sets SMTP username
	$mail->Password = 'Your Password';					//Sets SMTP password
	$mail->SMTPSecure = 'ssl';							//Sets connection prefix. Options are "", "ssl" or "tls"
	$mail->From = 'Your Email Id';			//Sets the From email address for the message
	$mail->FromName = 'Bharat Gas';					//Sets the From name of the message
	$mail->AddAddress($_POST['email'], $_POST['name']);		//Adds a "To" address			
	$mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
	$mail->IsHTML(true);							//Sets message type to HTML				
	$mail->Subject = 'Verification ID';			//Sets the Subject of the message
	$mail->Body = $mail_body;							//An HTML or plain text message body
	if($mail->Send())								//Send an Email. Return true on success or false on error
	{
		$message = '<label class="text-success">Register Done, Please check your mail.</label>';
	}
	}
	else {
		$sql = "UPDATE connection SET user_email_status = 'Rejected' WHERE id = '$id'";
		$result = $conn->query($sql);
		echo 'alert("Rejected")';
		header ("Location: manage-users.php");
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
								<h1><a class="navbar-brand" href="dashboard.php">Gas Agency</span></a></h1>
							</div>
						</nav>
				</div>
			</div>
		</div>
<!-- main-section -->
	<div class="head agile">
	<div class="wthree_head_section">
				<h3 class="w3l_header">User<span>Details</span></h3>
			</div>
		<div class="login w3">
			<div class="sap_tabs">
				
								<form action="#" method="post">
<?php
$id=intval($_GET['id']);
$query=mysqli_query($conn,"select * from connection where id='$id'");
while($row=mysqli_fetch_array($query))
{
?>
									<div class="w3_agileits_main_grid w3l_main_grid">
										<div class="agileits_grid">
											<div class="name">
												<img src="http://localhost/Gas-Agency/images/photos/<?php echo htmlentities($row['photo']);?>" style="height:150px";>
											</div>
											<div class="clear"></div>
										</div>
									</div>
									<div class="w3_agileits_main_grid w3l_main_grid">
										<div class="agileits_grid">
											<div class="name">
												<img src="http://localhost/Gas-Agency/images/signs/<?php echo htmlentities($row['sign']);?>" width="200" height="100">
											</div>
											<div class="clear"></div>
										</div>
									</div>
									<div class="w3_agileits_main_grid w3l_main_grid">
										<div class="agileits_grid">
											<h5>Name</h5>
											<div class="name">
												<input type="text" name="name" value="<?php echo htmlentities($row['name']);?>" readonly>
											</div>
											<div class="clear"></div>
										</div>
									</div>
									<div class="w3_agileits_main_grid w3l_main_grid">
										<div class="agileits_grid">
											<h5>Date of Birth</h5>
											<div class="name">
												<input type="date" name="dob" value="<?php echo htmlentities($row['dob']);?>" readonly>
											</div>
											<div class="clear"></div>
										</div>
									</div>
									<div class="w3_agileits_main_grid w3l_main_grid">
										<div class="agileits_grid">
											<h5>Father's Name</h5>
											<div class="name">
												<input type="text" name="fname" value="<?php echo htmlentities($row['fname']);?>" readonly>
											</div>
											<div class="clear"></div>
										</div>
									</div>
									<div class="w3_agileits_main_grid w3l_main_grid">
										<div class="agileits_grid">
											<h5>Mother's Name</h5>
											<div class="name">
												<input type="text" name="mname" value="<?php echo htmlentities($row['mname']);?>" readonly>
											</div>
											<div class="clear"></div>
										</div>
									</div>
									<div class="w3_agileits_main_grid w3l_main_grid">
										<div class="agileits_grid">
											<h5>Spouse's Name</h5>
											<div class="name">
												<input type="text" name="spname" value="<?php echo htmlentities($row['spname']);?>" readonly>
											</div>
											<div class="clear"></div>
										</div>
									</div>
									<div class="w3_agileits_main_grid w3l_main_grid">
										<div class="agileits_grid">
											<h5>Gender</h5>
											<div class="name">
												<input type="text" name="gender" value="<?php echo htmlentities($row['gender']);?>" readonly>
											</div>
											<div class="clear"></div>
										</div>
									</div>
									<div class="w3_agileits_main_grid w3l_main_grid">
										<div class="agileits_grid">
											<h5>Address</h5>
											<div class="name">
												<input type="text" name="address" value="<?php echo $row['address'].",".$row['state'].",".$row['district'].",".$row['city']."-".$row['pin'];?>" readonly>
											</div>
											<div class="clear"></div>
										</div>
									</div>
									<div class="w3_agileits_main_grid w3l_main_grid">
										<div class="agileits_grid">
											<h5>Contact Number</h5>
											<div class="name">
												<input type="text" name="cno" value="<?php echo htmlentities($row['cno']);?>" readonly>
											</div>
											<div class="clear"></div>
										</div>
									</div>
									<div class="w3_agileits_main_grid w3l_main_grid">
										<div class="agileits_grid">
											<h5>Email ID</h5>
											<div class="name">
												<input type="text" name="email" value="<?php echo htmlentities($row['email']);?>" readonly>
											</div>
											<div class="clear"></div>
										</div>
									</div>
									<div class="w3_agileits_main_grid w3l_main_grid">
										<div class="agileits_grid">
											<h5>Proof of Identity</h5>
											<div class="name">
												<input type="text" name="poi" value="<?php echo htmlentities($row['poi']."-".$row['cardNo']);?>" readonly>
											</div>
											<div class="clear"></div>
										</div>
									</div>
									<div class="w3_agileits_main_grid w3l_main_grid">
										<div class="agileits_grid">
											<h5>Subsidy</h5>
											<div class="name">
												<input type="text" name="subsidy" value="<?php echo htmlentities($row['subsidy']);?>" readonly>
											</div>
											<div class="clear"></div>
										</div>
									</div>
									<div class="w3_agileits_main_grid w3l_main_grid">
										<div class="agileits_grid">
											<h5>Bank Details</h5>
											<div class="name">
												<input type="text" name="bank" value="<?php echo htmlentities($row['bank']."-".$row['accNo']);?>" readonly>
											</div>
											<div class="clear"></div>
										</div>
									</div>
									<?php if($user_email_status == 'Accepted' || $user_email_status == 'Rejected')
{?>
									<div class="alert alert-danger">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
									</div>
<?php } ?>
             						<div class="aitssubmitw3ls">
										<button type="submit" name="user_email_status" value="Accepted" style="padding: 12px 50px;border: none;outline: none;background: #999;color: #FFF;font-size: 16px;cursor: pointer;background: #1cc7d0;">Accept</button>
										<button type="submit" name="user_email_status" value="Rejected" style="padding: 12px 50px;border: none;outline: none;background: #999;color: #FFF;font-size: 16px;cursor: pointer;background: #1cc7d0;">Decline</button>
									</div>
									</form>
<?php } ?>	
							</div>
						</div>
			</div>	
		<div class="clear"></div>
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
<?php } ?>