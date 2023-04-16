<!-- login.php -->
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<style>
		body {
			background-color: #f1f1f1;
			font-family: Arial, Helvetica, sans-serif;
		}
		form {
			width: 30%;
			margin: auto;
			padding: 50px;
			border: 1px solid #ccc;
			border-radius: 10px;
			box-shadow: 0 0 10px #ccc;
			background-color: #fff;
		}
		label {
			display: inline-block;
			width: 100px;
			margin-bottom: 10px;
		}
		input[type=text], input[type=password] {
			padding: 5px;
			border-radius: 5px;
			border: 1px solid #ccc;
			width: 150px;
		}
		input[type=submit] {
			padding: 5px 10px;
			border-radius: 5px;
			background-color: #4CAF50;
			color: #fff;
			border: none;
			cursor: pointer;
		}
		h1, h2 {
			text-align: center;
		}
	</style>
</head>
<body>
	<h1>Login</h1>
	<form method="post" action="login_check.php">
		<label for="username">Username: </label>
		<input type="text" id="username" name="username"><br><br>
		
		<label for="password">Password: </label>
		<input type="password" id="password" name="password"><br><br>
		
		<input type="submit" name="submit" value="Login">
	</form>
</body>
</html>