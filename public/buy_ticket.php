<?php require_once("../includes/sessions.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php $layout_context = "public"; ?>
<?php include("../includes/layouts/header.php"); ?>
<?php find_selected_page(true); ?>

<?php
	if(isset($_GET['sort'])){
		if($_GET['sort']=="asc"){
			$query = "SELECT * FROM ticket ORDER BY price ASC";
			$db = mysqli_query($connection, $query);
		} else{
			$query = "SELECT * FROM ticket";
			$db = mysqli_query($connection, $query);
		}
	} else {
		$query = "SELECT * FROM ticket";
		$db = mysqli_query($connection, $query);
	}
?>

<div id="main">
	<div id="navigation"> 	
		<?php echo public_navigation($current_subject, $current_page);?>	
	</div>
	<div id="page">
		<br />
		<table border="1" id="price-table">
			<tr>
				<th>Movie Type</th>
				<th>Seat</th>
				<th><a href="buy_ticket.php?sort=asc">Price</a></th>
			</tr>
			<?php
				while($row = mysqli_fetch_array($db))
				{
					echo "<tr><td>$row[0]</td>";
					echo "<td>$row[1]</td>";
					echo "<td>$row[2]</td></tr>";
				}
			?>
			</table>
	</div>
</div>

<?php include("../includes/layouts/footer.php"); ?>








