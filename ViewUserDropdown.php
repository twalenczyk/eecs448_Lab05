<?php
	$my_db = new mysqli("mysql.eecs.ku.edu", "twalenczyk", "P@\$\$word123", "twalenczyk");
	
	if ($my_db->connect_errno) {
   		printf("Connect failed: %s\n", $my_db->connect_error);
    		exit();
	}

	$query = "SELECT * FROM Users";

	if ($result = $my_db->query($query)) {
		echo "<select>";
		if($result->num_rows > 0 ) {
			echo "<option value='" . $row["user_id"] . "'>";
		}
		echo "</select>";
	}
	
	$result->free();
	$my_db->close();
?>
