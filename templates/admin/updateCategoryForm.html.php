<h2 class="i-name">Update Category</h2>
<div class="admin-content form-design">
	<p><?= $message ?></p>
	<form action="updateCategory.php" method="post">
		<div class="add-form">
			<h3>Category details</h3>
			<div class="form-group">
				<label for="categoryName">Category Name</label>
				<input type="text" id="categoryName" name="categoryName" value="<?= $category->getCategoryName()?>" autocomplete="off" required>
			</div>
			<div class="form-action">
				<input type="hidden" name="category-id" id="category-id" value="<?= $category->getCategoryID()?>">
				<input type="submit" class="addBtn" value="update category">
				<a href="categories.php" class="deleteBtn">Back</a>
			</div>
		</div>
	</form>
</div>