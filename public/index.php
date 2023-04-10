<?php require_once("../includes/sessions.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php $layout_context = "public"; ?>
<?php include("../includes/layouts/header.php"); ?>
<?php find_selected_page(true); ?>

<div id="main">
	<div id="navigation"> 	
		<?php echo public_navigation($current_subject, $current_page);?>	
	</div>
	<div id="page">
		<?php if($current_page) { ?>
			
			<h2><?php //echo htmlentities($current_page["menu_name"]); ?></h2><br />
			<div id="page-content-public">
				<div id="cover">
					<img src="images/<?php echo $current_page["menu_name"] ?>.jpg" />
				</div>
				
				<div id="view-content-public">				
					<p><?php echo nl2br(htmlentities($current_page["content"])); ?></p>
				</div>
			</div>
		<?php } else { ?>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<img src="images/left.jpg" />
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<img src="images/right.jpg" />
			
			<div class="w3-content" style="max-width:500px">

				<img class="mySlides" src="images/Warcraft.jpg" style="width:80%">
				<!--<img class="mySlides" src="images/Fantastic Beasts and Where to Find Them.jpg" style="width:80%">-->
				<!--<img class="mySlides" src="images/Captain America 3 Civil War.jpg" style="width:80%">-->
				<!--<img class="mySlides" src="images/Finding Dory.jpg" style="width:80%">-->
				<!--<img class="mySlides" src="images/Ice Age Collision Course.jpg" style="width:80%">-->
				<!--<img class="mySlides" src="images/Independence Day Resurgence.jpg" style="width:80%">-->
				<img class="mySlides" src="images/Now You See Me 2.jpg" style="width:80%">
				<!--<img class="mySlides" src="images/The Angry Birds.jpg" style="width:80%">-->
				<img class="mySlides" src="images/The Jungle Book.jpg" style="width:80%">
				<!--<img class="mySlides" src="images/X-Men Apocalypse.jpg" style="width:80%">-->
                <!--<img class="mySlides" src="images/bed-35.jpg" style="width:80%">-->
			</div>

			<script>
				var myIndex = 0;
				carousel();

				function carousel() {
					var i;
					var x = document.getElementsByClassName("mySlides");
					for (i = 0; i < x.length; i++) {
					   x[i].style.display = "none";  
					}
					myIndex++;
					if (myIndex > x.length) {
						myIndex = 1
					}    
					x[myIndex-1].style.display = "block";  
					setTimeout(carousel, 2500);    
				}
			</script>	
			
		<?php } ?>
			
	</div>
</div>

<?php include("../includes/layouts/footer.php"); ?>








