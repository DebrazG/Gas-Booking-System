<?php
session_start();
include_once 'includes/config.php';
$oid=intval($_GET['oid']);
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
	<div class="two-grids">
		<div class="container">
			<div class="bs-docs-example">
			  <form name="updateticket" id="updateticket" method="post"> 
				<table class="table table-bordered">
					<thead>
						<tr>
							<td colspan="2" style="padding-left:0px;"><div class="fontpink2"> <b>Order Tracking Details !</b></div></td>
						</tr>
					</thead>
					<tbody>
						<tr>
						  <td  class="fontkink1"><b>order Id:</b></td>
						  <td  class="fontkink"><?php echo $oid;?></td>
						</tr>
    <?php 
$ret = mysqli_query($conn,"SELECT * FROM ordertrackhistory WHERE orderid='$oid'");
$num=mysqli_num_rows($ret);
if($num>0)
{
while($row=mysqli_fetch_array($ret))
      {
     ?>
	 
     <tr height="20">
      <td class="fontkink1" ><b>At Date:</b></td>
      <td  class="fontkink"><?php echo $row['postingdate'];?></td>
     </tr>
     <tr height="20">
      <td  class="fontkink1"><b>Status:</b></td>
      <td  class="fontkink"><?php echo $row['status'];?></td>
     </tr>
     <tr height="20">
      <td  class="fontkink1"><b>Remark:</b></td>
      <td  class="fontkink"><?php echo $row['remark'];?></td>
     </tr>
     <tr>
      <td colspan="2"><hr /></td>
     </tr>
   <?php } }
else{
   ?>
   <tr>
   <td colspan="2">Order Not Processed Yet</td>
   </tr>
   <?php  }
$st='Delivered';
   $rt = mysqli_query($conn,"SELECT * FROM orders WHERE id='$oid'");
     while($num=mysqli_fetch_array($rt))
     {
     $currrentSt=$num['status'];
   }
     if($st==$currrentSt)
     { ?>
   <tr><td colspan="2"><b>
      Product Delivered successfully </b></td>
   <?php } 
 
  ?>
					</tbody>
				</table>
			   </form>
			</div>
		</div>
	</div>