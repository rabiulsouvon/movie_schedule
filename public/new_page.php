<?php require_once("../includes/sessions.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validations_functions.php"); ?>
<?php confirm_logged_in(); ?>

<?php find_selected_page(); ?>

<?php 
	if(!$current_subject){
		redirect_to("manage_content.php");
	}
?>

<?php 
	if(isset($_POST['submit'])){	
		
		$required_fields = array("menu_name", "position", "visible", "content");
		validate_presences($required_fields);
		
		//$field_with_max_lengths = array("menu_name" => 30);
		//validate_max_lengths($field_with_max_lengths);
		
		if(empty($errors)){
			
			$subject_id = $current_subject["id"];
			$menu_name = $_POST["menu_name"];
			$position = (int) $_POST["position"];
			$visible = (int) $_POST["visible"];
			$content = $_POST["content"];
			$menu_name = mysqli_real_escape_string($connection, $menu_name);
			$content = mysqli_real_escape_string($connection, $content);
	
			$query  = "INSERT INTO pages (";
			$query .= "subject_id, menu_name, position, visible, content";
			$query .= ") VALUES (";
			$query .= "{$subject_id},'{$menu_name}',{$position},{$visible},'{$content}'";
			$query .= ")";
			$result = mysqli_query($connection, $query);
	
			if($result){
				$_SESSION["message"] = "Page created.";
				redirect_to("manage_content.php?subject=" . urlencode($current_subject["id"]));
			}else{
				$_SESSION["message"] = "Page creation failed.";
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
		<?php echo navigation($current_subject, $current_page); ?>
	</div>
	<div id="page">
		<?php echo message(); ?>		
		<?php echo form_errors($errors); ?>
		<h2>Create Page</h2>
		
		<form action="new_page.php?subject=<?php echo urlencode($current_subject["id"]); ?>" method="post">
			<p>Menu name:
				<input type="text" name="menu_name" value="" />
			</p>
			<p>Position:
				<select name="position">
				<?php
					$page_set = find_pages_for_subject($current_subject["id"], false);
					$page_count = mysqli_num_rows($page_set);
					for($count=1; $count <= ($page_count + 1); $count++){
						echo "<option value=\"{$count}\">{$count}</option>";
					}					
				?>
				</select>
			</p>
			<p>Visible:
				<input type="radio" name="visible" value="0" <?php if($current_page["visible"] == 0) {echo "checked"; }?>/> No
				&nbsp;
				<input type="radio" name="visible" value="1" <?php if($current_page["visible"] == 1) {echo "checked"; }?>/> Yes
			</p>
			<p>Content:<br />
				<textarea name="content" rows="20" cols="80"></textarea>
			</p>
			<input type="submit" name="submit" value="Create Page" />
		</form>
		<br />
		<a href="manage_content.php?subject=<?php echo urlencode($current_subject["id"]); ?>">Cancel</a>
	</div>
</div>

<?php include("../includes/layouts/footer.php"); ?>








