<?php
/*if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}*/
session_start();
if (isset($_SESSION['uid'])) {
    unset($_SESSION['uid']);
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Log In</title>
	<link rel="stylesheet" type="text/css" href="./static/css/shared.css">
	<link rel="stylesheet" type="text/css" href="./static/css/home.css">
    <link rel="stylesheet" type="text/css" href="./static/css/auth.css">
</head>
<body>

	<nav id="topnav">
        <a id="logo" href="#">PerA</a>
    </nav>

    <div id="login-container">
    	<div class="login-title">
    		log in
    	</div>
		<form action="auth/doLogin.php" method="post">
			<input type="email" name="Email" placeholder="Email" class="login-input">
			<input type="password" name="Password" placeholder="Password" class="login-input">

			<div class="remember-me">
				<div>
					<input id="Input" type="checkbox" name="Remember-me">
					<label class="" for="Input">
						Remember me
					</label>
				</div>

				<div>
					<a href="signup.php" style="text-align: right; position: relative; right: 0;">
						Sign up
					</a>
				</div>
			</div>
			<br><br>
			<input type="submit" value="login">
			<!--<div style="width: 100%;">
				<a href="home.html">
					<div class="login-button">
					Submit
					</div>
				</a>
			</div>-->
		</form>
    </div>

</body>
</html>