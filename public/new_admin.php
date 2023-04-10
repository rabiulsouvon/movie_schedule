<?php require_once("../includes/sessions.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validations_functions.php"); ?>
<?php confirm_logged_in(); ?>

<?php 
	if(isset($_POST['submit'])){	
		
		$required_fields = array("username", "password");
		validate_presences($required_fields);
		
		$field_with_max_lengths = array("username" => 30 , "password" => 30);
		validate_max_lengths($field_with_max_lengths);
		
		if(empty($errors)){
			
			$username = $_POST["username"];
			$password = $_POST["password"];
			
			$username = mysqli_real_escape_string($connection, $username);
	
			$query  = "INSERT INTO admins (";
			$query .= "username, password";
			$query .= ") VALUES (";
			$query .= "'{$username}','{$password}'";
			$query .= ")";
			$result = mysqli_query($connection, $query);
	
			if($result){
				$_SESSION["message"] = "Admin added.";
				redirect_to("manage_admin.php");
			}else{
				$_SESSION["message"] = "Admin add failed.";
				//redirect_to("new_subject.php");	
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
		<h2>Create Admin</h2>
		
		<form action="new_admin.php" method="post">
			<p>Username:
				<input type="text" name="username" value="" />
			</p>
			<p>Password:
				<input type="password" name="password" value="" />
			</p>
			<input type="submit" name="submit" value="Create Admin" />
		</form>
		<br />
		<a href="manage_admin.php">Cancel</a>
	</div>
</div>

<?php include("../includes/layouts/footer.php"); ?>






