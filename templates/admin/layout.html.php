<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | <?= $title; ?></title>
    <link rel="stylesheet" href="./css/admin/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <script src="./js/script.min.js" defer></script>
</head>

<body>

    <section id="menu">
        <div class="logo">
            <h1 class="sr-only">Sportswarehouse</h1>
            <a href="index.php" target="_blank">
                <img src="./assets/logo/sports-warehouse-logo.svg" alt="Sportswarehouse">
            </a>
        </div>
        <ul class="items" id="items">
            <li class="<?php if($linkClassFor == "dashboard") echo "active"?>"><a href="dashboard.php"><i class="fa-solid fa-chart-pie"></i>Dashboard</a></li>
            <li class="<?php if($linkClassFor == "category") echo "active"?>"><a href="categories.php"><i class="fa-solid fa-list"></i>Categories</a></li>
            <li class="<?php if($linkClassFor == "product") echo "active"?>"><a href="products.php"><i class="fa-solid fa-box"></i>Products</a></li>
            <li class="<?php if($linkClassFor == "users") echo "active"?>"><a href="users.php"><i class="fa-solid fa-users"></i>Users</a></li>
        </ul>

    </section>
    <section id="interface">
        <div class="nav">
            <div class="n1">
                <div class="search">
                    <i class="fa fa-search"></i>
                    <label for="search" class="sr-only">Search</label>
                    <input type="text" name="search" id="search" placeholder="search">
                </div>
            </div>
            <div class="profile">
                <i class="fa fa-bell"></i>
                <a class="logout" href="logout.php">logout</a>
                
                <img src="./assets/profile.png" alt="profile">
            </div>
        </div>
       
        <!-- <div class="main-content"> -->
        <div>
            <?= $output; ?>
        </div>
    </section>
</body>

</html>