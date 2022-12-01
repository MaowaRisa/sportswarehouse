<h2 class="i-name">Create Category</h2>
<div class="admin-content form-design">
	<p><?= $message ?></p>
	<form action="createCategory.php" method="post">
		<div class="add-form">
			<h3>Add category</h3>
			<div class="form-group">
                <label for="CategoryName">Category Name:</label>
                <input type="text" name="CategoryName" id="CategoryName" autocomplete="off" required>
			</div>
			<div class="form-action">
				<input type="submit" class="addBtn" value="Add new">
				<a href="categories.php" class="deleteBtn">Back</a>
			</div>
		</div>
	</form>
</div>
