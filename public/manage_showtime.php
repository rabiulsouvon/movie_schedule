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
		$query = "SELECT * FROM showtime";
		$db = mysqli_query($connection, $query);
	}
?>

<div id="main">
	<div id="navigation">
	<br />
		<a href="admin.php">&laquo; Admin Access</a>
		<?php echo public_navigation($current_subject, $current_page);?>	
	</div>
	<div id="page">
		<br />
		<div id="crud">
			
			<ul>
				<li><a href="new_showtime.php">Insert</a></li>		
			</ul>
		</div>
		<h2>All Showtime</h2>
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
				<th>Delete</th>
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
					echo "<td>$row[7]</td>";
					echo "<td><a href=\"delete_showtime.php?id=";
					echo $row[0];
					echo "\">Delete</td></tr>";
				}
			?>
		</table>
			 
	</div>
</div>

<?php include("../includes/layouts/footer.php"); ?>








