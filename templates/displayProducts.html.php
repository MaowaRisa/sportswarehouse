<ul class="product-list">
    <?php foreach ($productRows as $item) { ?>
        <li class="product__item product">
            <a href="product.php?id=<?= $item["itemId"] ?>" class="product__item-link">
                <div class="product__photo-frame">
                    <img src="./assets/products/<?= $item["photo"] ?>" class="product__photo" width="130" height="170" alt="<?= $item["itemName"] ?>">
                </div>
                <div class="product-price">
                    <?php if (!empty($item["salePrice"]) && $item["salePrice"] != 0.00) { ?>
                        <div class="product__price-discounted"><?= $item["salePrice"] ?></div>
                        <div class="product__price-previous">
                            <span class="was">was</span>
                            <span class="previous-price"><del><?= $item["price"] ?></del></span>
                        </div>
                    <?php } else { ?>
                        <div class="product__price-previous">
                            <span class="original-price"><?= $item["price"] ?></span>
                        </div>
                    <?php } ?>
                </div>
                <div class="product__description">
                    <p><?= $item["itemName"] ?></p>
                </div>
            </a>
        </li>
    <?php } ?>
</ul>