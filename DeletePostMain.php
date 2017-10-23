<!-- Author: Taylor Walenczyk -->

<html>
<body>

	<?php
		$my_db = new mysqli("mysql.eecs.ku.edu", "twalenczyk", "P@\$\$word123", "twalenczyk");
		
		if ($my_db->connect_errno) {
    			printf("Connect failed: %s\n", $my_db->connect_error);
    			exit();
		}
		$query = "SELECT post_id, content, author_id FROM Posts";
		$result = $my_db->query($query);
	?>
	<form action="DeletePostBackend.php" method="POST">
	<table>
		<thead>
			<th> User </th>
			<th> Post </th>
			<th> Delete? </th>
		</thead>
		<tbody>
			<?php if ($result): ?>
				<?php while ($row = $result->fetch_assoc()): ?>
					<tr>
						<td> <?php echo $row["author_id"] ?> </td>
						<td> <?php echo $row["content"] ?> </td>
						<td> <input type="checkbox" name="'" . $row["post_id"] . "'" value="delete"> </td>
					</tr>
				<?php endwhile; ?>
			<?php endif; ?>
		</tbody>
	</table>
	<input type="submit" value="Submit" >
	</form>
</body>
</html>
