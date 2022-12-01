<div class="product-details">
    
        <div class="product-details__image">
            <img src="./assets/products/<?= $photo; ?>" alt="<?= $itemName; ?>">
        </div>
        <form action="shopping.php" method="POST">
            <div class="product-details__info">
                <div class="product-details__info-name">
                    <h3><?= $itemName; ?></h3>
                </div>
                <div class="product-details__info-price">
                <?php if (!empty($salePrice) && $salePrice != 0.00) { ?>
                            <div class="product__price-discounted"><?= $salePrice ?></div>
                            <div class="product__price-previous">
                                <span class="was">was</span>
                                <span class="previous-price"><del><?= $salePrice ?></del></span>
                            </div>
                        <?php } else { ?>
                            <div class="product__price-previous">
                                <span class="original-price"><?= $price ?></span>
                            </div>
                        <?php } ?>
                </div>
                <div class="product-details__info-description">
                    <p><?= $description?></p>
                </div>
                <div class="product-details__Qty">
                    <div>Quantity</div>
                    <div>
                        <input class="qty" type="number" id="qty" name="qty"  value="1">
                    </div>
                </div>
                <div>
                    <input type="hidden" value="<?= $itemId; ?>" name="productId">
                    <button type="submit" class="addCartBtn" name="addCartBtn">
                        <span>Add to cart</span>
                    </button>
                    <a href="cart.php" class="viewCart" name="viewCart">
                        <span>View cart</span>
                    </a>
                </div>
            </div>
        </form>


</div>