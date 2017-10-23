<!-- Athor: Taylor Walenczyk -->

<html>
<body>

<?php
	$user = $_POST["username"];
	$post = $_POST["post"];
	$my_db = new mysqli("mysql.eecs.ku.edu", "twalenczyk", "P@\$\$word123", "twalenczyk");
	if ($my_db->connect_errno) {
    		printf("Connect failed: %s\n", $my_db->connect_error);
    		exit();
	}
	
	if ($user) {
		/* User name must exist */
		$query = "SELECT * FROM Users WHERE user_id ='" . $user . "'";
		
		if ($result = $my_db->query($query)) {
	
   			if ($result->num_rows > 0) {
				if ($post) {
				
					$insert = "INSERT INTO Posts (content, author_id) VALUES ('" . $post . "','" . $user . "')";
					if ($my_db->query($insert)) {
						$message = "Your post was successfully created!";
					} else {
						$message = $my_db->error;
					}			
				} else {
					$message = "Your post cannot be empty.";
				}
			} else {
				$message = "You must register this username before using this service.";
			}
   			/* free result set */
    			$result->free();
		}
	} else {
		$message = "You must enter a username to use this service.";
	}
	/* close connection */
	$my_db->close();
?>

<h3> <?php echo $message ?> </h3>

</body>
</html>


