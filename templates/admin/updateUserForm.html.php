<h2 class="i-name">Update User</h2>
<div class="admin-content form-design">
	<p><?= $message ?></p>
	<form action="updateUser.php" method="post">
		<div class="add-form">
			<h3>User details</h3>
			<div class="form-group">
				<label for="username">Username</label>
				<input type="text" id="username" name="username" value="<?= $user->getUserName()?>" autocomplete="off" required>
			</div>
			<div class="form-action">
				<input type="hidden" name="user-id" id="user-id" value="<?= $user->getUserID()?>">
				<input type="submit" class="addBtn" value="update user">
				<a href="users.php" class="deleteBtn">Back</a>
			</div>
		</div>
	</form>
</div>