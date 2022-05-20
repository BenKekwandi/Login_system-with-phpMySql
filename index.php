<?php
session_start();
 include("connection.php");
 include("functions.php");
 $user_data= check_login($con);

?>
<!DOCTYPE html>
<html>
<head>
    <title>My Website</title>
</head>
<body>
    <a href="login.php">Logout</a>
    <h1>This is the index page</h1>
    <h2>Hello <?php $user_data['user_name'];?></h2>
</body>
</html>