<?php require_once("../includes/sessions.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validations_functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php find_selected_page(); ?>

<?php
	if(!$current_page){
		redirect_to("manage_content.php");
	}
?>

<?php 
	if(isset($_POST['submit'])){
		$required_fields = array("menu_name", "position", "visible");
		validate_presences($required_fields);
		
		//$field_with_max_lengths = array("menu_name" => 30);
		//validate_max_lengths($field_with_max_lengths);
		
		if(empty($errors)){
			//$_SESSION["errors"] = $errors;
			//redirect_to("new_subject.php");
		
			$id = $current_page["id"];
			$menu_name = $_POST["menu_name"];
			$position = (int) $_POST["position"];
			$visible = (int) $_POST["visible"];
			$content = $_POST["content"];
			
			$menu_name = mysqli_real_escape_string($connection, $menu_name);
			$content = mysqli_real_escape_string($connection, $content);
	
			$query  = "UPDATE pages SET ";
			$query .= "menu_name = '{$menu_name}', ";
			$query .= "position = {$position}, ";
			$query .= "visible = {$visible}, ";
			$query .= "content = '{$content}' ";
			$query .= "WHERE id = {$id} ";
			$query .= "LIMIT 1";
			$result = mysqli_query($connection, $query);
	
			if($result && mysqli_affected_rows($connection) >= 0){
				$_SESSION["message"] = "Page updated.";
				redirect_to("manage_content.php?page={$id}");
			}else{
				$message = "Subject update failed.";
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
		<?php echo navigation($current_subject, $current_page); ?>
	</div>
	<div id="page">
		<?php
			if(!empty($message)){
				echo "<div class=\"message\">" . htmlentities($message) . "</div>";
			}
		?>
		<?php echo form_errors($errors); ?>
		
		<h2>Edit Page : <?php echo htmlentities($current_page["menu_name"]); ?></h2>
		
		<form action="edit_page.php?page=<?php echo urldecode($current_page["id"]); ?>" method="post">
			<p>Menu name:
				<input type="text" name="menu_name" value="<?php echo htmlentities($current_page["menu_name"]); ?>" />
			</p>
			<p>Position:
				<select name="position">
				<?php
					$page_set = find_pages_for_subject($current_page["subject_id"], false);
					$page_count = mysqli_num_rows($page_set);
					for($count=1; $count <= $page_count; $count++){
						echo "<option value=\"{$count}\"";
						if($current_page["position"] == $count){
							echo " selected";
						}						
						echo ">{$count}</option>";
					}					
				?>
				</select>
			</p>
			<p>Visible
				<input type="radio" name="visible" value="0" <?php if($current_page["visible"] == 0) {echo "checked"; }?>/> No
				&nbsp;
				<input type="radio" name="visible" value="1" <?php if($current_page["visible"] == 1) {echo "checked"; }?>/> Yes
			</p>
			<p>Content:<br />
				<textarea name="content" rows="20" cols="80"><?php echo htmlentities($current_page["content"]); ?></textarea>
			</p>
			<input type="submit" name="submit" value="Edit Page" />
		</form>
		<br />
		<a href="manage_content.php?page=<?php echo urlencode($current_page["id"]); ?>">Cancel</a>
		&nbsp;
		&nbsp;
		<a href="delete_page.php?page=<?php echo urldecode($current_page["id"]); ?>"onclick="return confirm('Are you sure ?');">Delete</a>
	</div>
</div>

<?php include("../includes/layouts/footer.php"); ?>








