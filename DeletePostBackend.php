<!-- Author: Taylor Walenczyk -->

<html>
<body>
	<?php
		$my_db = new mysqli("mysql.eecs.ku.edu", "twalenczyk", "P@\$\$word123", "twalenczyk");
		
		if ($my_db->connect_errno) {
    			printf("Connect failed: %s\n", $my_db->connect_error);
    			exit();
		}
		$query = "SELECT post_id FROM Posts";
		$result = $my_db->query($query);		
	?>

	<?php if ($result->num_rows > 0): ?>
		<?php while ($row = $result->fetch_assoc()): ?>
			<?php if ($_POST[$row["post_id"]] == "delete"): ?>
				<?php if ($my_db->query("DELETE FROM Posts WHERE post_id ='" . $row["post_id"] . "'")): ?>
					<p> Successfully deleted post <?php echo $row["post_id"] ?>. </p>
				<?php else: ?>
					<p> Failed to remove post <?php echo $row["post_id"] ?>. </p>
				<?php endif; ?>
			<?php endif; ?>
		<?php endwhile; ?>
	<?php else: ?>
		<p> No post selected. </p>
	<?php endif; ?>

	
	

</body>
</html>
