<?php require_once("../includes/sessions.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validations_functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php 

	$admin = find_admin_by_id($_GET["id"]);
	if(!$admin){
		redirect_to("manage_admin.php");
	}
?>

<?php 
	if(isset($_POST['submit'])){
		$required_fields = array("username", "password");
		validate_presences($required_fields);
		
		$field_with_max_lengths = array("username" => 30, "password" => 30);
		validate_max_lengths($field_with_max_lengths);
		
		if(empty($errors)){
			
			
			$id = $admin["id"];
			$username = $_POST["username"];
			$password = $_POST["password"];
			$username = mysqli_real_escape_string($connection, $username);
	
			$query  = "UPDATE admins SET ";
			$query .= "username = '{$username}', ";
			$query .= "password = '{$password}' ";
			$query .= "WHERE id = {$id} ";
			$query .= "LIMIT 1";
			$result = mysqli_query($connection, $query);
	
			if($result && mysqli_affected_rows($connection) >= 0){
				echo "dhukte parsi";
				$_SESSION["message"] = "Admin updated.";
				redirect_to("manage_admin.php");
			}else{
				//echo "dhukte parsi";
				$message = "Admin update failed.";
			}
		}
	}else {
		//redirect_to("new_subject.php");
	}
?>

<?php $layout_context = "admin"; ?>
<?php include("../includes/layouts/header.php"); ?>


<div id="main">
	<div id="navigation">
		&nbsp;
	</div>
	<div id="page">
		<?php echo message(); ?>
		<?php echo form_errors($errors); ?>
		
		<h2>Edit Admin : <?php echo htmlentities($admin["username"]); ?></h2>
		
		<form action="edit_admin.php?id=<?php echo urldecode($admin["id"]); ?>" method="post">
			<p>Username:
				<input type="text" name="username" value="<?php echo htmlentities($admin["username"]); ?>" />
			</p>
			<p>Password:
				<input type="password" name="password" value="" />
			</p>
			<input type="submit" name="submit" value="Edit Admin" />
		</form>
		<br />
		<a href="manage_admin.php">Cancel</a>
	</div>
</div>

<?php include("../includes/layouts/footer.php"); ?>








