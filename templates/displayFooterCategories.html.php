<h3>Product categories</h3>
    <ul class="footer-category-nav__list">
        <?php foreach ($categoryRows as $row) {?>
        <li class="footer-category-nav__list-item">
            <a class="footer-category-nav__list-link" href="productsByCategory.php?id=<?= $row["categoryId"]?>"><?= $row["categoryName"]?></a>
        </li>
        <?php }?>
        
    </ul>