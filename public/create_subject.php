<?php require_once("../includes/sessions.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validations_functions.php"); ?>
<?php confirm_logged_in(); ?>

<?php 
	if(isset($_POST['submit'])){
		$menu_name = $_POST["menu_name"];
		$position = (int) $_POST["position"];
		$visible = (int) $_POST["visible"];
	
		$menu_name = mysqli_real_escape_string($connection, $menu_name);
		
		$required_fields = array("menu_name", "position", "visible");
		validate_presences($required_fields);
		
		$field_with_max_lengths = array("menu_name" => 30);
		validate_max_lengths($field_with_max_lengths);
		
		if(!empty($errors)){
			$_SESSION["errors"] = $errors;
			redirect_to("new_subject.php");
		}
	
		$query  = "INSERT INTO subjects (";
		$query .= "menu_name, position, visible";
		$query .= ") VALUES (";
		$query .= "'{$menu_name}',{$position},{$visible}";
		$query .= ")";
		$result = mysqli_query($connection, $query);
	
		if($result){
			$_SESSION["message"] = "Subject created.";
			redirect_to("manage_content.php");
		}else{
			$_SESSION["message"] = "Subject creation failed.";
			redirect_to("new_subject.php");	
		}
		
	}else {
		redirect_to("new_subject.php");
	}
?>


<?php
	if(isset($connection)) { mysqli_close($connection); }	
?>