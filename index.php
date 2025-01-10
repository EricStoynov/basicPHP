<?php
    session_start();

    include("connection.php");
    include("functions.php");

    $user_data = check_login($con);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Website</title>
</head>
<body>
    <h1>This is the index page.</h1>
    <a href="logout.php">Sign out</a>
    <br>
    <p>Hello, <?php echo $user_data['user_name'];?>.</p>
</body>
</html>