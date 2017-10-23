<!-- Author: Taylor Walenczyk -->

<html>
<body>

	<?php
		$my_db = new mysqli("mysql.eecs.ku.edu", "twalenczyk", "P@\$\$word123", "twalenczyk");
		
		if ($my_db->connect_errno) {
    			printf("Connect failed: %s\n", $my_db->connect_error);
    			exit();
		}
		$query = "SELECT content, author_id FROM Posts";
		$result = $my_db->query($query);
	?>
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
						<td> <input type="checkbox"> </td>
					</tr>
				<?php endwhile; ?>
			<?php endif; ?>
		</tbody>
	</table>
	
</body>
</html>
