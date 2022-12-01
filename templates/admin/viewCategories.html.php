<h2 class="i-name">Categories</h2>
<div class="admin-content">
    <a class="addBtn" href="createCategory.php"><i class="fa fa-plus"></i> Add New</a>
    <p><?= $message ?></p>
    <table class="data-table">
        <tr>
            <th>Category Name</th>
            <th>Action</th>
        </tr>
        <?php foreach($category->getCategories() as $row){
            $categoryName = $row["categoryName"];
            $catId = $row["categoryId"];
            ?>
            <tr>
                <td><?= $categoryName;?></td>
                <td>
                    <a class="updateBtn" href="updateCategory.php?id=<?= $catId ?>">Update</a>
                    <a class="deleteBtn" href="deleteCategory.php?id=<?= $catId ?>">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>