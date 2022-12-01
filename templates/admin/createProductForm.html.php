<h2 class="i-name">Create Product</h2>
<div class="admin-content form-design">
	<p><?= $message ?></p>
	<form action="createProduct.php" method="post" enctype="multipart/form-data">
		<div class="add-form">
			<h3>Add Product</h3>
			<div class="form-group">
                <label for="productName">Product Name:</label>
                <input type="text" name="productName" id="productName" autocomplete="off" required>
			</div>
			<div class="form-group">
                <label for="photoPath">Photo: </label>
                <input type="file" name="photoPath" id="photoPath">
			</div>
			<div class="form-group">
                <label for="category">Category:</label>
                <select name="category" id="category" required>
                    <?php 
                        foreach($category->getCategories() as $row){
                            $categoryId = $row["categoryId"];
                            $categoryName = $row["categoryName"];?>
                            <option value="<?=$categoryId?>"><?=$categoryName?></option>
                        <?php }
                    ?>
                </select>
			</div>
			<div class="form-group">
                <label for="price">Price: $</label>
                <input type="text" name="price" id="price" required>
			</div>
			<div class="form-group">
                <label for="salePrice">Sale Price: $</label>
                <input type="text" name="salePrice" id="salePrice">
			</div>
			<div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" id="description" required></textarea>
			</div>
			<div class="form-action">
                <label for="featured">Is featured: </label>
                <input type="checkbox" name="featured" id="featured">
			</div>
			<div class="form-action">
				<input type="submit" class="addBtn" name="submit" value="Add new">
				<a href="products.php" class="deleteBtn">Back</a>
			</div>
		</div>
	</form>
</div>
