<?php require_once("../includes/sessions.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php $layout_context = "public"; ?>
<?php include("../includes/layouts/header.php"); ?>
<?php find_selected_page(true); ?>

<?php
	if(isset($_POST['submit'])){
		//$required_fields = array("show_date", "name", "catagory");
		//validate_presences($required_fields);
		
		if(empty($errors)){
			$morning = null;
			$midday = null;
			$evening = null;
			$matinee = null;
			
			$show_date = mysqli_real_escape_string($connection, $_POST["show_date"]);
			$name = mysqli_real_escape_string($connection, $_POST["name"]);
			$catagory = mysqli_real_escape_string($connection, $_POST["catagory"]);
			if(isset($_POST['morning'])){
				$morning = mysqli_real_escape_string($connection, $_POST["morning"]);
			}
			if(isset($_POST['midday'])){
				$midday = mysqli_real_escape_string($connection, $_POST["midday"]);
			}
			if(isset($_POST['evening'])){
				$evening = mysqli_real_escape_string($connection, $_POST["evening"]);
			}
			if(isset($_POST['matinee'])){
				$matinee = mysqli_real_escape_string($connection, $_POST["matinee"]);
			}			
	
			$query  = "INSERT INTO showtime (";
			$query .= "show_date, name, catagory, morning, midday, evening, matinee";
			$query .= ") VALUES (";
			$query .= "'{$show_date}','{$name}','{$catagory}','{$morning}','{$midday}','{$evening}','{$matinee}'";
			$query .= ")";
			$result = mysqli_query($connection, $query);
	
			if($result && mysqli_affected_rows($connection) >= 0){
				$_SESSION["message"] = "Showtime updated.";
				redirect_to("manage_showtime.php");
			}else{
				$message = "Showtime update failed.";
			}
		}
	}
?>

<div id="main">
	<div id="navigation">
		<br />
		<a href="manage_showtime.php">&laquo; Manage Showtime</a>
		<?php echo public_navigation($current_subject, $current_page);?>	
	</div>
	<div id="page">
		<br />
		<form action="new_showtime.php" method="post">
			<p>Show Date: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="text" name="show_date" value="<?php echo gmdate("Y-m-d"); ?>" />
			&nbsp;&nbsp;&nbsp;
			Movie Name: &nbsp;&nbsp;&nbsp;
				<input type="text" name="name" value="Movie name" />
			&nbsp;&nbsp;&nbsp;
			Catagory: &nbsp;
				<input type="text" name="catagory" value="2D-Regular" />
			</p>			
			<p>Morning Show: &nbsp;
				<input type="text" name="morning" value="" />
			&nbsp;&nbsp;&nbsp;
			Midday Show: &nbsp;&nbsp;
				<input type="text" name="midday" value="" />
			</p>
			<p>Evening Show: &nbsp;
				<input type="text" name="evening" value="" />
			&nbsp;&nbsp;&nbsp;
			Matinee Show: &nbsp;
				<input type="text" name="matinee" value="" />				
			</p>
			&nbsp;&nbsp;
			<input type="submit" name="submit" value="Add New" />
			<br /><br />
			&nbsp;&nbsp;
			<a href="showtime.php">See all showtime</a>
		</form>
		<br />
		
		<table border="1" id="time-table">
			<tr>
				<th>Date</th>
				<th>Movie Name</th>
				<th>Catagory</th>
				<th>Morning Show</th>
				<th>Midday Show</th>
				<th>Evening Show</th>
				<th>Matinee Show</th>
			</tr>
			
			<?php
				$query = "SELECT * FROM showtime";
				$db = mysqli_query($connection, $query);
				while($row = mysqli_fetch_array($db))
				{
					echo "<tr><td>$row[1]</td>";
					echo "<td>$row[2]</td>";
					echo "<td>$row[3]</td>";
					echo "<td>$row[4]</td>";
					echo "<td>$row[5]</td>";
					echo "<td>$row[6]</td>";
					echo "<td>$row[7]</td></tr>";
				}
			?>
		</table>
			 
	</div>
</div>

<?php include("../includes/layouts/footer.php"); ?>








