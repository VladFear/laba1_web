<?php
require "./connect.php";
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="css/style.css">
		<title>Title</title>
	</head>
	<body>
		<div id="reg">
			<h3><b><label name="intro">Make registration or sign up</label></b></h3>
		</div>
		<div id="slideout1">
			<b>Sign in</b>	
  		<div id="slideout_inner1">

				<form action="./sign_up.php" method="POST">
                    <label>Enter first name: </label>
					<input type="text" name="first"></input>
                    <label>Enter last name: </label>
					<input type="text" name="last"></input>
					<label>Enter login: </label>
					<input type="text" name="login"></input>
					<label>Enter password: </label>
					<input type="password" name="password"></input>
					<input type="submit" name="button_sig_up" value="Sign Up"</input>
				</form>
  		</div>
		</div>

		<div id="slideout2">
			<b>Log In</b>
  		<div id="slideout_inner2">
				<form action="./log_in.php" method="POST">
					<label>Enter login: </label>
					<input type="text" name="login"></input>
					<label>Enter password: </label>
					<input type="password" name="password"></input>
					<input type="submit" name="button_log_in" value="Log in"</input>
				</form>
  		</div>
		</div>
	</body>
</html>