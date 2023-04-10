<?php require_once("../includes/sessions.php"); ?>
<?php require_once("../includes/functions.php"); ?>

<?php confirm_logged_in(); ?>

<?php $layout_context = "admin"; ?>
<?php include("../includes/layouts/header.php"); ?>

		<div id="main">
			<div id="navigation">
				&nbsp;
			</div>
			<div id="page">
				<h2>Admin Menu</h2>
				<p>Welcome to the Admin area, <?php echo htmlentities($_SESSION["username"]); ?>.</p>
				<ul>
					<h4><li><a href="manage_content.php">Manage Movie List</a></li></h4>
					<h4><li><a href="manage_admin.php">Manage Admin Users</a></li></h4>
					<h4><li><a href="manage_showtime.php">Manage Showtime</a></li></h4>
				</ul>
			</div>
		</div>
		
<?php include("../includes/layouts/footer.php"); ?>
