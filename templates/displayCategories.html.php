<span id="categoryName" style="display: none;"><?= $categoryName ?></span>
<ul class="category__list">
    <?php foreach ($categoryRows as $row) { 
            if($row["categoryName"] === $categoryName){
                $activeClass = " active";
            }else{
                $activeClass = "";
            }
        ?>
        <li class="category__list-item<?= $activeClass ?>">
            <a class="category__list-link" href='productsByCategory.php?id=<?= $row["categoryId"]?>'>
                <span><?= $row["categoryName"] ?></span>
                <span class="arrow"></span>
            </a>
        </li>
    <?php } ?>
</ul>