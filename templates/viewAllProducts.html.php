<div class="item-list">
    <?php foreach ($productRows as $item) { ?>
        <div class="item__view">
            <div class="item__detail">
                <a href="product.php?id=<?= $item["itemId"] ?>" class="item__detail-link">
                    <div class="item__photo-frame">
                        <img src="./assets/products/<?= $item["photo"] ?>" class="item__photo" width="130" height="170" alt="<?= $item["itemName"] ?>">
                    </div>
                    <div class="item-price">
                        <?php if (!empty($item["salePrice"]) && $item["salePrice"] != 0.00) { ?>
                            <div class="item__price-discounted"><?= $item["salePrice"] ?></div>
                            <div class="item__price-previous">
                                <span class="was">was</span>
                                <span class="previous-price"><del><?= $item["price"] ?></del></span>
                            </div>
                        <?php } else { ?>
                            <div class="item__price-previous">
                                <span class="original-price"><?= $item["price"] ?></span>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="item__description">
                        <p><?= $item["itemName"] ?></p>
                    </div>
                </a>
            </div>
            
            <form action="shopping.php" method="POST">
            <div class="item__form">
                <div class="product-details__Qty center">
                    <div>Quantity</div>
                    <div>
                        <input class="qty" type="number" id="qty" name="qty" min="1" value="1">
                    </div>
                </div>
                <input type="hidden" value="<?=$item["itemId"]?>" name="productId">
                <button type="submit" class="addCartBtn" name="addCartBtn">
                    <span>Add to cart</span>
                </button>
                </div>
            </form>
        </div>
        
    <?php } ?>
</div>