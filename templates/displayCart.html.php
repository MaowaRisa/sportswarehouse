<div class="shopping-details">
    <?php if (isset($_SESSION["cart"]) && $totalCartItem > 0): 
            $cart = $_SESSION["cart"];
            $cartItems = $cart->getItems();
    ?>
    <div class="cart-details">
        <h1 class="cart-heading">Your Bag ( <?= count($cartItems)?> item<?php echo (count($cartItems)< 2) ? "":"s";?> )</h1>
        <table class="cart-table"> 
                <tr>
                    <th>Item</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th></th>
                </tr>
                <?php foreach ($cartItems as $item): 
                    $productName = $item->getItemName();
                    $productPhoto = $item->getPhoto();
                    $price = sprintf('%01.2f', $item->getPrice());
                    $productId = $item->getItemId();
                    $qty = $item->getQuantity();
                    ?>

                    <tr>
                        <td class="table-img">
                            <img src="./assets/products/<?= ($productPhoto == "") ? "noimage.jpeg": $productPhoto; ?>" width="50" height="50" alt="<?= $productName ?>">
                        </td>
                        <td><?= $productName ?></td>
                        <td><?= $price ?></td>
                        <td style="text-align:center"><?= $qty ?></td>
                        <td><form action="shopping.php" method="post">
                            <input type="submit" name="remove" value="Remove">
                            <input type="hidden" value="<?= $productId ?>" name="productId">
                            </form>
                        <td>
                    </tr>
                <?php endforeach; ?>

        </table> 
    </div>
    <div class="order-summary">
        <div class="summary-info">
            <span class="summary-title">Order Summary</span> 
        </div>
        <div class="summary-info">
            <div class="subtotal-label">Subtotal</div>
            <div class="subtotal-total">$<?= sprintf('%01.2f', $cart->calculateTotal()) ?></div>
        </div>
        <div class="summary-info">
            <div class="shipping-label">Shipping</div>
            <div class="shipping-total">$0.00</div>       
        </div>
        <div class="summary-info">
            <div class="estimated-label">Estimated Total</div>
            <div class="estimated-total">$<?= sprintf('%01.2f', $cart->calculateTotal()) ?></div>       
        </div>
        <div class="summary-info last-summary">
            <a href="checkout.php" class="checkoutBtn">Checkout Now</a>
        </div>
    </div>
    <?php else: ?>
        <div class="noResult">
            <div class="noResult-img">
                <img src="./assets/noResult.png" alt="noResult">
            </div>
            <h3>Sorry! No item in your bag :(</h3>
            <p>Looking for something! Click <a class="addCartBtn" href="shopping.php">Shop Now</a></p>
        </div>
    <?php endif; ?>
</div>