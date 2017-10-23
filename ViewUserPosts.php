<!-- Author: Taylor Walenczyk -->

<html>
<body>

	<?php
		$user = $_POST["username"];
		$my_db = new mysqli("mysql.eecs.ku.edu", "twalenczyk", "P@\$\$word123", "twalenczyk");
		
		if ($my_db->connect_errno) {
    			printf("Connect failed: %s\n", $my_db->connect_error);
    			exit();
		}
		$query = "SELECT content FROM Posts WHERE author_id='" . $user . "'";
	?>

	<table>
		<thead>
			<th> <?php echo $user . "'s Posts" ?> </th>
		</thead>
		<tbody>
			<?php if ($result = $my_db->query($query)): ?>
				<?php while ($row = $result->fetch_assoc()): ?>
					<tr>
						<td> <?php echo $row["content"] ?> </td>
					</tr>
				<?php endwhile; ?>
			<?php endif; ?>
		</tbody>
	</table>

</body>
</html>
