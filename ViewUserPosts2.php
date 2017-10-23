<!-- Author: Taylor Walenczyk -->

<!DOCTYPE html>
<html>
<body>

        <h2>Hello! Please select a user to view their posts.</h2><br>
        <form action="ViewUserPosts.php" method="POST">
                <?php include ("ViewUserDropdown.php") ?>
                <br>
                <input type="submit" value="Submit">
        </form>

</body>
</html>
