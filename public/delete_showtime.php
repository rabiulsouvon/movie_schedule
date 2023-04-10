<?php require_once("../includes/sessions.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirm_logged_in(); ?>

<?php
	//$current_subject = find_subject_by_id($_GET["subject"], false);
	//if(!$current_subject){
	//	redirect_to("manage_content.php");
	//}
	
	//$pages_set = find_pages_for_subject($current_subject["id"], false);
	//if(mysqli_num_rows($pages_set) > 0){
	//	$_SESSION["message"] = "Can't delete a subject with pages.";
	//	redirect_to("manage_content.php?subject={$current_subject["id"]}");
	//}
	
	//$id = $current_subject["id"];
	$id = $_GET['id'];
	$query = "DELETE FROM showtime WHERE id = {$id} LIMIT 1";	
	$result = mysqli_query($connection, $query);
	
		if($result && mysqli_affected_rows($connection) == 1){
			$_SESSION["message"] = "Subject deleted.";
			redirect_to("manage_showtime.php");
		}else {
			$_SESSION["message"] = "Subject deletion failed.";
			redirect_to("manage_showtime.php?subject={$id}");
		}
	
?>







