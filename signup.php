<?php 
session_start();
	include("connection.php");
	include("functions.php");

    check_login2($con);

	if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $user_email = $_POST['user_email'];
		$user_name = $_POST['user_name'];
		$user_pass = $_POST['user_pass'];

        $query2 = "select * from userdata where user_email = '$user_email' limit 1";
        $query2_result = mysqli_query($con, $query2);

        $query3 = "select * from userdata where user_name = '$user_name' limit 1";
        $query3_result = mysqli_query($con, $query3);
        
		if (!empty($user_name) && !empty($user_pass) && !is_numeric($user_name)) {
            if ($query2_result && mysqli_num_rows($query2_result) <= 0) {
                if ($query3_result && mysqli_num_rows($query3_result) <= 0) {
                    $user_bal = 0;
                    $user_creation = date('Y-m-d H:i:s');
                    $user_lastIP = $_SERVER['HTTP_CLIENT_IP'];
                    $query = "insert into userdata (user_name,user_email,user_pass,user_bal,user_creation,user_lastIP) values ('$user_name','$user_email','$user_pass', '$user_bal','$user_creation','$user_lastIP')";

                    mysqli_query($con, $query);

                    header("Location: login.php");
                    die;
                } else {
                    echo "This username is already in use.";
                }
            } else {
                echo "This email is already in use.";
            }
		} else {
			echo "Please enter some valid information!";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
</head>
<body>
	<div id="box">
		<form method="post">
            <h2>Signup</h2>
            <input id="user_name" type="text" name="user_name" placeholder="Username"><br><br>
            <input id="user_email" type="email" name="user_email" placeholder="E-Mail"><br><br>
            <input id="user_pass" type="password" name="user_pass" placeholder="Password"><br><br>
            <input id="submit" type="submit" name="Login"><br><br>
            <a href="login.php">Click to Login.</a>
		</form>
	</div>
</body>
</html>
