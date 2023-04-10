<?php require_once("../includes/sessions.php"); ?>
<?php require_once("../includes/functions.php"); ?>

<?php
	$_SESSION["admin_id"] = null;
	$_SESSION["username"] = null;
	redirect_to("login.php");
?>