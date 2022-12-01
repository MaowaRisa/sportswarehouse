<h2 class="i-name">Reset User Password</h2>
<div class="admin-content form-design">
	<p><?= $message ?></p>
	<form action="replacePassword.php" method="post">
		<div class="add-form">
			<h3>User details</h3>
			<div class="form-group">
				<label for="username">Username</label>
				<input type="text" id="username" name="username" value="<?= $user->getUserName()?>" autocomplete="off" required>
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" id="password" name="password" placeholder="Password replace" autocomplete="off">
			</div>
			<div class="form-action">
				<input type="hidden" name="user-id" id="user-id" value="<?= $user->getUserID()?>">
				<input type="submit" class="addBtn" value="Change Password">
				<a href="users.php" class="deleteBtn">Back</a>
			</div>
		</div>
	</form>
</div>