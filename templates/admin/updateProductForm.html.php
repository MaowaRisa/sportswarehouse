<h2 class="i-name">Update Product</h2>
<div class="admin-content form-design">
    <p><?= $message ?></p>
    <form action="updateProduct.php" method="post" enctype="multipart/form-data">
        <div class="add-form">
            <h3>Update Product</h3>
            <div class="form-group">
                <label for="productName">Product Name:</label>
                <input type="text" name="productName" id="productName" value="<?= $product->getItemName() ?>" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="photoPath">Photo: </label>
                <input type="hidden" value="<?= $product->getPhoto(); ?>" name="prePhoto" id="prePhoto">
                <?= $product->getPhoto(); ?>
                <input type="file" name="photoPath" id="photoPath">
            </div>
            <div class="form-group">
                <label for="category">Category:</label>
                <select name="category" id="category" required>
                    <?php
                    foreach ($category->getCategories() as $row) {
                        $categoryId = $row["categoryId"];
                        $categoryName = $row["categoryName"]; ?>
                        <option value="<?= $categoryId ?>" <?php if ($product->getCategoryId() == $categoryId) echo "selected"; ?>><?= $categoryName ?></option>
                    <?php }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="price">Price: $</label>
                <input type="text" name="price" id="price" value="<?= $product->getPrice() ?>" required>
            </div>
            <div class="form-group">
                <label for="salePrice">Sale Price: $</label>
                <input type="text" name="salePrice" id="salePrice" value="<?= $product->getSalePrice() ?>">
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" id="description" required><?= $product->getDescription() ?></textarea>
            </div>
            <div class="form-action">
                <label for="featured">Is featured: </label>
                <input type="checkbox" name="featured" id="featured" <?php if ($product->getFeatured() == 1) echo "checked" ?>>
            </div>
            <div class="form-action">
                <input type="hidden" name="product-id" id="product-id" value="<?= $product->getItemID()?>">
                <input type="submit" class="addBtn" name="submit" value="Update">
                <a href="products.php" class="deleteBtn">Back</a>
            </div>
        </div>
    </form>
</div>