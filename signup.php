<?php

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sign Up</title>
	<link rel="stylesheet" type="text/css" href="./static/css/shared.css">
	<link rel="stylesheet" type="text/css" href="./static/css/home.css">
	<link rel="stylesheet" type="text/css" href="./static/css/auth.css">
</head>
<body>

	<nav id="topnav">
        <a id="logo" href="#">PerA</a>
    </nav>

    <div id="login-container" style="margin-top: 10%">
    	<div class="login-title">
    		sign up
    	</div>
		<form action="auth/doSignup.php" method="post">
			<!--<input type="text" name="First-name" placeholder="First Name" class="login-input">
			<input type="text" name="Last-name" placeholder="Last Name" class="login-input">-->
			<input type="text" name="Username" placeholder="Username" class="login-input" required>
			<input id="email" type="email" name="Email" placeholder="Email" class="login-input" required>
			<input type="password" name="Password" placeholder="Password" class="login-input" required>
			<input type="password" name="PasswordAgain" placeholder="Retype password" class="login-input" required>
			<br><br>
			<input type="submit" value="register">
			<!--<div style="width: 100%; margin-top: 30px;">
				<a href="home.html">
				<div class="login-button">
					Submit
				</div>
				</a>
			</div>-->
		</form>
    </div>
	<!--<script>
        const URL = 'http://localhost:8080/PerA/register.php';
        const TIME = 2000;

        try { // trying to instantiate a XMLHttpRequest object
            var xhr = new XMLHttpRequest();
        } catch (e) {
            alert('XMLHttpRequest cannot be instantiated: ' + e.message);
        } finally {
            var emailInput = document.getElementById('email');
            xhr.ontimeout = function () { alert('Time-out... :('); };
            xhr.onload = function () {
                if (xhr.readyState === 4) {   // data arrived
                    if (xhr.status === 200) { // response Ok from Web service
                        numbers.textContent = xhr.responseText.trim().replace(/\W+/g, ', ');
                    } else {
                        numbers.textContent = 'An error occurred: ' + xhr.statusText;
                    }
                }
            };
            xhr.open("GET", URL, true); // opening connection
            xhr.timeout = TIME;         // setting the response time
            xhr.send(null);             // sending the HTTP request (no data is provided)
        }
	</script>-->
</body>
</html>