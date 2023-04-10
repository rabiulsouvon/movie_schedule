<?php
	if(!isset($layout_context)){
		$layout_context = "public";
	}
?>
<!DOCTYPE html>

<html lang="en">
    <head>
         <title>Star-Cineplex <?php if($layout_context == "admin") { echo "Admin"; }?></title>
		<link href="stylesheets/public.css" media="all" rel="stylesheet" type="text/css" />
		<style>
		.headbarr li{
			background: none !important;
		}
		#navigation{
			background: #2a0569 !important;
		}
		</style>
    </head>
    
    <body>
		
         <div id="header" style="background: none;">			
			
			<div id="logo">
				<img src="images/logo.jpg" width="290px" />
			</div>
			
			<div id="main-menu">
				<div id="home">
					<h1 style="color: black;">&nbsp;&nbsp;&nbsp;Star-Cineplex <?php if($layout_context == "admin") { echo "Admin"; }?></h1>		
				</div>
				<div id="menu-bar" >
					<ul class="headbarr">
						<li><a href="index.php">Home</a></li>
						<li><a href="showtime.php">Showtime</a></li>
						<li><a href="buy_ticket.php">Buy Ticket</a></li>
						<li><a href="">About Us</a></li>
						<li><a href="admin.php">Admin Access</a></li>
						<li><a href="logout.php">Logout</a></li>
						
						
					</ul>
				</div>
			</div>	
		</div>
		