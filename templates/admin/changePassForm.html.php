<h2 class="i-name">Update your password</h2>
<div class="admin-content form-design">
	<p><?= $message ?></p>
	<form action="changePassword.php" method="post">
		<div class="add-form">
			<h3>User details</h3>
			<div class="form-group">
				<label for="username">Username</label>
				<input type="text" id="username" name="username" value="<?= $user->getUserName()?>" autocomplete="off" required>
			</div>
            <div class="form-group">
				<label for="passwordCurrent">Current Password</label>
				<input type="password" id="passwordCurrent" name="passwordCurrent" autocomplete="off" required>
			</div>
            <div class="form-group">
				<label for="password">New Password</label>
				<input type="password" id="password" name="password" autocomplete="off" required>
			</div>
			<div class="form-action">
				<input type="hidden" name="user-id" id="user-id" value="<?= $user->getUserID()?>">
				<input type="submit" class="addBtn" value="Change">
				<a href="dashboard.php" class="deleteBtn">Back</a>
			</div>
		</div>
	</form>
</div>