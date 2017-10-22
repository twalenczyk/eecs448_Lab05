<!-- Author: Taylor Walenczyk -->

<html>
<body>

<?php
	$new_user = $_POST["username"];
	$taken = false;
	$my_db = new mysqli("mysql.eecs.ku.edu", "twalenczyk", "P@\$\$word123", "twalenczyk");

	if ($my_db->connect_errno) {
    		printf("Connect failed: %s\n", $my_db->connect_error);
    		exit();
	}
	
	if ($new_user) {
		/* User name must exist */
		$query = "SELECT * FROM Users";
		
		if ($result = $my_db->query($query)) {
	
   			/* fetch associative array */
   			while ($row = $result->fetch_assoc()) {
        			if ($row["user_id"] === $new_user) {
					$taken = true;
				} /* else the user name is available */
    			}

   			/* free result set */
    			$result->free();
		}

		if (!$taken) {
			/* Insert into db if the username is available */
			$addition = "INSERT INTO Users (user_id) VALUES ('".$new_user."')";

			if ($my_db->query($addition)) {
				$message = $new_user + " successfully added to the database!";	
			} else {
				$message = $my_db->error;
			}
		} else {
			$message = $new_user + " is taken.";
		}
	} else {
		$message = "You must provide a user name to user this service.";
	}

	/* close connection */
	$my_db->close();

?>

<h3> <?php echo $message ?> </h3>
<h3> <?php echo $new_user ?> </h3>

</html>
</body>
