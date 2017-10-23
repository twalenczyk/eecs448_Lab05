<?php
	$my_db = new mysqli("mysql.eecs.ku.edu", "twalenczyk", "P@\$\$word123", "twalenczyk");
	
	if ($my_db->connect_errno) {
   		printf("Connect failed: %s\n", $my_db->connect_error);
    		exit();
	}
	$query = "SELECT * FROM Users";
	if ($result = $my_db->query($query)) {
		if($result->num_rows > 0 ) {
			echo "<select name='username'>";
			while ($row = $result->fetch_assoc()) {
				echo "<option value='" . $row["user_id"] . "'>" . $row["user_id"] . "</option>";
			}
			echo "</select>";
		}
	}
	
	$result->free();
	$my_db->close();
?>
