<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="./css/normalize.min.css">
    <link rel="stylesheet" href="./css/style.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" >
    <script src="./js/script.min.js" defer></script>
</head>

<body>
    <!-- Top Header Start  -->
    <header class="header-wrapper">
        <div class="top-nav" id="top-nav">

            <nav class="nav-left" id="nav-left">
                <ul class="nav-left__list">
                    <li class="nav-left__list-item" id="left_login">
                        <a class="nav-left__list-link" href="#"><i class="fa-solid fa-lock"></i>Login</a>
                    </li>
                    <li class="nav-left__list-item">
                        <a class="nav-left__list-link" href="./">Home</a>
                    </li>
                    <li class="nav-left__list-item">
                        <a class="nav-left__list-link" href="#">About SW</a>
                    </li>
                    <li class="nav-left__list-item">
                        <a class="nav-left__list-link" href="contact.php">Contact Us</a>
                    </li>
                    <li class="nav-left__list-item">
                        <a class="nav-left__list-link" href="shopping.php">View Products</a>
                    </li>
                </ul>
            </nav>
            <nav class="nav-right">
                <a href="#" class="toggle" id="toggle-btn">
                    <div class="toggle-button">
                        <span class="bar"></span>
                        <span class="bar"></span>
                        <span class="bar"></span>
                    </div>
                    <div class="menu">
                        <span>Menu</span>
                    </div>
                </a>
                <ul class="nav-right__list">
                    <li class="nav-right__list-item login">
                        <a class="nav-right__list-link" href="login.php"><i class="fa-solid fa-lock"></i>Login</a>
                    </li>
                    <li class="nav-right__list-item">
                        <a class="nav-right__list-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i>View Cart</a>
                    </li>
                    <li class="nav-right__list-item cart-item">
                        <a class="nav-right__list-link" href="#"><?= $totalCartItem; ?> items</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <!-- Top Header End  -->
    <div class="content-wrapper">
        <!-- Content Header Start -->
        <div class="content-header">
            <div class="main-header">
                <div class="logo-container">
                    <a href="./" class="logo">
                        <h1 class="sr-only">Sports Warehouse</h1>
                        <img src="./assets/logo/sports-warehouse-logo.svg" alt="Sports Warehouse">
                    </a>
                </div>
                <section class="search-section">
                    <h2 class="sr-only">Product Search</h2>
                    <form action="searchProducts.php" class="search-form" method="POST" autocomplete="off">
                        <div class="search-item">
                            <label class="sr-only" for="searchValue">search</label>
                            <input type="text" name="searchValue" id="searchValue" placeholder="Search products" class="input" value="<?= $searchValue; ?>">
                        </div>
                        <div class="search-submit">
                            <button type="submit" class="search-btn" name="submit-searchBtn" id="submit-searchBtn">
                                <i class="fa-solid fa-magnifying-glass"></i>
                                <span class="sr-only">search product</span>
                            </button>
                        </div>
                    </form>

                </section>
            </div>
            <div class="category-nav">
                <?= $categoriesNav; //include('templates/displayCategories.html.php'); 
                ?>
            </div>
            <div class="slider-area">
                <div class="slide-show">
                    <div class="slide-show__image">
                        <img src="./assets/slider/image-1.png" alt="sports ball">
                    </div>
                    <!-- <div class="slide-show__image">
                        <img src="" alt="">
                    </div>
                    <div class="slide-show__image">
                        <img src="" alt="">
                    </div> -->
                </div>
                <div class="slide-info">
                    <p class="slide-info__about">View our brand new range of</p>
                    <h1 class="slide-info__heading">Sports balls</h1>
                    <input class="shop-now__btn" type="button" value="Shop now">
                </div>

            </div>
            <div class="slider-btn">
                <span class="slider-circle__btn slide-active"></span>
                <span class="slider-circle__btn"></span>
                <span class="slider-circle__btn"></span>
            </div>
        </div>
        <!-- Content Header End -->
        <!-- Main Start -->
        <main class="main-content">
            <div class="products">
                <h2><?= $pageHeading; ?></h2>
                <?= $output; ?>

            </div>
            <div class="product-brands">
                <h2>Our brands and partnerships</h2>
                <div class="brands">
                    <div class="brand-info">
                        <p>There are some of our top brands and partnerships.</p>
                        <a href="#">The best of the best is here.</a>
                    </div>
                    <div class="brand-logos">
                        <ul class="brand__list">
                            <li class="brand__list-item">
                                <a class="brand__list-link" href="#">
                                    <img src="./assets/brands/logo_nike.png" alt="Nike">
                                </a>
                            </li>
                            <li class="brand__list-item">
                                <a class="brand__list-link" href="#">
                                    <img src="./assets/brands/logo_adidas.png" alt="adidas">
                                </a>
                            </li>
                            <li class="brand__list-item">
                                <a class="brand__list-link" href="#">
                                    <img src="./assets/brands/logo_skins.png" alt="Skins">
                                </a>
                            </li>
                            <li class="brand__list-item">
                                <a class="brand__list-link" href="#">
                                    <img src="./assets/brands/logo_asics.png" alt="Asics">
                                </a>
                            </li>
                            <li class="brand__list-item">
                                <a class="brand__list-link" href="#">
                                    <img src="./assets/brands/logo_newbalance.png" alt="New balance">
                                </a>
                            </li>
                            <li class="brand__list-item">
                                <a class="brand__list-link" href="#">
                                    <img src="./assets/brands/logo_wilson.png" alt="Wilson">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </main>
        <!-- Main End -->
    </div>
    <footer class="footer-wrapper">
        <div class="site-footer">
            <div class="site-nav">
                <h3>Site navigation</h3>
                <ul class="site-nav__list">
                    <li class="site-nav__list-item">
                        <a class="site-nav__list-link" href="./">Home</a>
                    </li>
                    <li class="site-nav__list-item">
                        <a class="site-nav__list-link" href="#">About SW</a>
                    </li>
                    <li class="site-nav__list-item">
                        <a class="site-nav__list-link" href="contact.php">Contact US</a>
                    </li>
                    <li class="site-nav__list-item">
                        <a class="site-nav__list-link" href="shopping.php">View Products</a>
                    </li>
                    <li class="site-nav__list-item">
                        <a class="site-nav__list-link" href="#">Privacy Policy</a>
                    </li>
                </ul>
            </div>
            <div class="footer-category-nav">
                <?= $categoriesFooterNav; //include("templates/displayFooterCategories.html.php") 
                ?>
            </div>
            <div class="contact-nav">
                <h3>Contact Sports Warehouse</h3>
                <div class="social-link">
                    <div>
                        <a class="social" href="https://facebook.com" target="_blank">
                            <div class="social-icon">
                                <i class="fa-brands fa-facebook-f"></i>
                            </div>
                            <div class="social-site">Facebook</div>
                        </a>
                    </div>
                    <div>
                        <a class="social" href="https://twitter.com" target="_blank">
                            <div class="social-icon">
                                <i class="fa-brands fa-twitter"></i>
                            </div>
                            <div class="social-site">Twitter</div>
                        </a>
                    </div>
                    <div>
                        <a class="social" href="#" target="_blank">
                            <div class="social-icon">
                                <i class="fa-solid fa-paper-plane"></i>
                            </div>
                            <div class="social-site">
                                Others
                                <p class="other-info">Online form Email <br> Phone Address</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <p class="footer-info">
        <small>
            <span class="copy">&copy; Copyright 2022 Sports Warehouse.</span>
            <span class="right">All rights reserved.</span>
            <span class="made">Website made by Awesomesauce Design.</span>
        </small>
    </p>
</body>

</html>