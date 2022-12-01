<div>
	<?php if($orderId>0):?>
        <h1 class="cart-heading">Successfully purchase completed!</h1>
		<p>Thank you, your order number is <?= $orderId ?></p>
	<?php else: ?>
		<p>Something went wrong and the order was not placed</p>
	<?php endif; ?>
	<p>Want more. Click <a class="addCartBtn" href="shopping.php">Shop Now</a></p>
</div>