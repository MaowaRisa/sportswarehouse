<div class="dashboard-heading">
    <h2>Dashboard</h2>
    <a href="changePassword.php" class="addBtn">Change your password</a>
</div>
<div class="values">
    <div class="val-box">
        <i class="fa fa-user"></i>
        <div>
            <h3><?= $user->getNumberOfUsers();?></h3>
            <span>Total Users</span>
        </div>
    </div>
    <div class="val-box">
        <i class="fa-solid fa-file"></i>
        <div>
            <h3><?= $category->getNumberOfCategories();?></h3>
            <span>Categories</span>
        </div>
    </div>
    <div class="val-box">
        <i class="fa-solid fa-list"></i>
        <div>
            <h3><?= $product->getNumberOfProducts(); ?></h3>
            <span>Products</span>
        </div>
    </div>
    <div class="val-box">
        <i class="fa-solid fa-cart-shopping"></i>
        <div>
            <h3><?= $order->getNumberOfOrders(); ?></h3>
            <span>Total Orders</span>
        </div>
    </div>
</div>