<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="./css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" >
</head>
<body>
	<form action="login.php" method="post">
		<div class="login-details">
			<div class="login-img">
				<img src="./assets/logo/sports-warehouse-logo.svg" alt="Sportswarehouse">
			</div>
			<div>
				<?php if(isset($error)):?>
					<p class="error"><?= $message ?></p>
				<?php endif; ?>
			</div>
			<div class="login-form">
				<div class="login-group">
					<label for="username">Username:</label>
					<div class="input-field">
						<i class="fa fa-user"></i>
						<input type="text" id="username" name="username" required>
					</div>
				</div>
				<div class="login-group">
					<label for="password">Password:</label>
					<div class="input-field">
						<i class="fa fa-lock"></i>
						<input type="password" id="password" name="password" required>
					</div>
				</div>
				<div class="login-group">
					<input type="submit" class="loginBtn" name="loginSubmit" value="Login">
				</div>
			</div>
		</div>
	</form>
	
	<!-- <form action="login.php" method="post">
		<fieldset>
			<legend>Login</legend>
			<p>
				<label for="username">Username:</label>
				<input type="text" id="username" name="username" required>
			</p>
			<p>
				<label for="password">Password:</label>
				<input type="password" id="password" name="password" required>
			</p>
			<p>
				<input type="submit" name="loginSubmit" value="Login">
			</p>
		</fieldset>
	</form> -->
</body>
</html>

