<h2 class="i-name">Products</h2>
<div class="admin-content">
    <a class="addBtn" href="createProduct.php"><i class="fa fa-plus"></i> Add New</a>
    <p><?= $message ?></p>
    <table class="data-table">
        <tr>
            <th>Product</th>
            <th>Name</th>
            <th>Price</th>
            <th>Sale Price</th>
            <th>Action</th>
        </tr>
        <?php foreach($product->getAllProducts() as $row){
            $productName = $row["itemName"];
            $photo = $row["photo"];
            $price = $row["price"];
            $salePrice = $row["salePrice"];
            $description = $row["description"];
            $productId = $row["itemId"];
            ?>
            <tr>
                <td class="imgCenter">
                    <img class="productImg" src="./assets/products/<?= $photo;?>" alt="<?= $productName;?>">
                </td>
                <td>
                    <?= $productName;?>
                </td>
                <td>
                    <?= $price;?>
                </td>
                <td>
                    <?= $salePrice;?>
                </td>
                <td>
                    <a class="updateBtn" href="updateProduct.php?id=<?= $productId ?>">Update</a>
                    <a class="deleteBtn" href="deleteProduct.php?id=<?= $productId ?>">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>