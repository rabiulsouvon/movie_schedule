<?php require_once("../includes/sessions.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php $layout_context = "public"; ?>
<?php include("../includes/layouts/header.php"); ?>
<?php find_selected_page(true); ?>

<?php
	if(isset($_POST['bydate'])){
		
		$s_date = $_POST['date'];
		$query = "SELECT * FROM showtime WHERE show_date = '{$s_date}'";
		$db = mysqli_query($connection, $query);
		if(!$db){
			echo "Error -_-";
		}
		
	} elseif(isset($_POST['bytitle'])){
		$m_title = $_POST['movie_title'];
		$query = "SELECT * FROM showtime WHERE name LIKE '{$m_title}%' OR name LIKE '%{$m_title}%' OR name LIKE '%{$m_title}'";
		$db = mysqli_query($connection, $query);
		if(!$db){
			echo "Error -_-";
		}
	} else{
		$query = "SELECT * FROM showtime ORDER BY show_date ASC";
		$db = mysqli_query($connection, $query);
	}
?>

<div id="main">
	<div id="navigation"> 	
		<?php echo public_navigation($current_subject, $current_page);?>	
	</div>
	<div id="page">
		<br />
		<form action="showtime.php" method="post">
			<p>Find shows by date: &nbsp;
				<input type="text" name="date" value="<?php echo gmdate("Y-m-d"); ?>" />
				<input type="submit" name="bydate" value="Search" />
			</p>
			<p>Find show by name: &nbsp;
				<input type="text" name="movie_title" value="" />
				<input type="submit" name="bytitle" value="Search" />
			</p>
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








