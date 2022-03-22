<?php
require('app/Customer.php');
require('app/Product.php');
require('app/FileUtility.php');

$products_data = FileUtility::openCSV('products.csv');

$products = Product::convertArrayToProducts($products_data);

$customer = new Customer('Kirsten', 'ten@mail.com');
?>
<html>
<head>
    <title>My Cart</title>
</head>

<link href="/docs/4.4/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<body>
    <div class="container-fluid">
        <nav class="navbar navbar-light bg-danger">
        <a class="navbar-brand">Navbar</a>
        <form class="form-inline">
            <a href="shopping-cart.php">
                <div class="fs-2 mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </svg>
                </div>
            </a>
        </form>
        </nav>

        <div class="products">

            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img src="..." class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                    <img src="..." class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                    <img src="..." class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <h1>Welcome <?php echo $customer->getName() ?>!</h1>
            <h2>Products</h2>

            <?php //foreach ($products as $product): ?>
            <form action="add-to-cart.php" method="POST">
                <div class="row row-cols-1 row-cols-md-2 g-4">
                <?php foreach ($products as $product): ?>
                    <div class="col">
                        <div class="card" style="width: 18rem;">
                            <img src="<?php echo $product->getImage(); ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <input type="hidden" name="product_id" value="<?php echo $product->getId(); ?>" />
                                <h5 class="card-title"><?php echo $product->getName(); ?></h5>
                                <p class="card-text"><?php echo $product->getDescription(); ?><br/>
                                    <span style="color: blue">PHP <?php echo $product->getPrice(); ?></span>
                                    Qty <input type="number" name="quantity" class="quantity" value="0" />
                                </p>
                                <button type="submit" class="btn btn-outline-danger">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                </div>

                <!--<input type="hidden" name="product_id" value="<?php echo $product->getId(); ?>" />
                <h3><?php echo $product->getName(); ?></h3>
                <img src="<?php echo $product->getImage(); ?>" height="100px" />
                <p>
                    <?php echo $product->getDescription(); ?><br/>
                    <span style="color: blue">PHP <?php echo $product->getPrice(); ?></span>
                    Qty <input type="number" name="quantity" class="quantity" value="0" />
                    <button type="submit">
                        ADD TO CART
                    </button>
                </p>-->
            </form>

            <?php //endforeach; ?>
        </div>
    </div>

</body>
</html>