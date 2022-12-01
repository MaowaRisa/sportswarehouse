<h2 class="i-name">Create User</h2>
<div class="admin-content form-design">
	<p><?= $message ?></p>
	<form action="createUser.php" method="post">
		<div class="add-form">
			<h3>Add new user</h3>
			<div class="form-group">
				<label for="username">Username</label>
				<input type="text" id="username" name="username" autocomplete="off" required>
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" id="password" name="password" autocomplete="off" required>
			</div>
			<div class="form-action">
				<input type="submit" class="addBtn" value="Add new user">
				<a href="users.php" class="deleteBtn">Back</a>
			</div>
		</div>
	</form>
</div>


	<!-- <fieldset>
		<legend>Create User</legend>
		<p>
			<label for="username">Username:</label>
			<input type="text" id="username" name="username" required>
		</p>
		<p>
			<label for="password">Password:</label>
			<input type="password" id="password" name="password" required>
		</p>
		<p>
			
		</p>
	</fieldset> -->
