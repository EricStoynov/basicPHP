<?php 
session_start();

	include("connection.php");
	include("functions.php");

	check_login2($con);

	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$user_pass = $_POST['user_pass'];

		if (array_key_exists('user_name', $_POST)) {
			$user_name = $_POST['user_name'];
			if(!empty($user_name) && !empty($user_pass) && !is_numeric($user_name)) {
				$query = "select * from userdata where user_name = '$user_name' limit 1";
				$query_result = mysqli_query($con, $query);
	
				if($query_result) {
					if($query_result && mysqli_num_rows($query_result) > 0) {
	
						$user_data = mysqli_fetch_assoc($query_result);
						
						if($user_data['user_pass'] === $user_pass) {
							if (!$user_data['user_suspended']) {
								$_SESSION['user_id'] = $user_data['user_id'];
								header("Location: index.php");
								die;
							} else {
								echo "Account suspended!";
							}
						} else {
							echo "wrong password!";
						}
					}
				}
				if ($_SESSION && $_SESSION && in_array('user_id', $_SESSION)) {echo "wrong username or password!";} else {}
				
			} else {
				if ($_SESSION && $_SESSION && in_array('user_id', $_SESSION)) {echo "wrong username or password!";} else {}
			}
		} else {
			$user_email = $_POST['user_email'];
			if(!empty($user_email) && !empty($user_pass) && !is_numeric($user_email)) {
				$query = "select * from userdata where user_email = '$user_email' limit 1";
				$query_result = mysqli_query($con, $query);
			
				if($query_result) {
					if($query_result && mysqli_num_rows($query_result) > 0) {
			
						$user_data = mysqli_fetch_assoc($query_result);
						
						if($user_data['user_pass'] === $user_pass) {
							if (!$user_data['user_suspended']) {
								$_SESSION['user_id'] = $user_data['user_id'];
								header("Location: index.php");
								die;
							} else {
								echo "Account suspended!";
							}
						} else {
							echo "wrong password!";
						}
					}
				}
				if ($_SESSION && $_SESSION && in_array('user_id', $_SESSION)) {echo "wrong username or password!";} else {}
				
			} else {
				if ($_SESSION && $_SESSION && in_array('user_id', $_SESSION)) {echo "wrong username or password!";} else {}
			}
		}

	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div id="box">
	<h2>Login</h2>
        <form method="post">
			<input id="user_email" type="email" name="user_email" placeholder="Email" style="display: none;">
            <input id="user_name" type="text" name="user_name" placeholder="Username"><br><br>
            <input id="user_pass" type="password" name="user_pass" placeholder="Password"><br><br>

            <input id="submit" type="submit" name="Login"><br><br>
        </form>
		<button onclick="changeSignIn()" id="changeSignInButton">Sign in with Email</button><br><br>
		<a href="signup.php">Click to Signup.</a>
    </div>
</body>
</html>
<script>
	const signInUser = document.getElementById("user_name");
	const signInEmail = document.getElementById("user_email");
	const button = document.getElementById("changeSignInButton")

	function changeSignIn() {
		if (button.innerHTML == "Sign in with Email") {
			button.innerHTML = "Sign in with Username"
			signInUser.style.display = "none"
			signInEmail.style.display = "inline-block"
			signInUser.disabled = true
			signInEmail.disabled = false
		} else {
			button.innerHTML = "Sign in with Email"
			signInUser.style.display = "inline-block"
			signInEmail.style.display = "none"
			signInUser.disabled = false
			signInEmail.disabled = true
		}
	}
</script>
