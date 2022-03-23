<?php
require('app/Customer.php');
require('app/Product.php');
require('app/FileUtility.php');

$products_data = FileUtility::openCSV('products.csv');

$products = Product::convertArrayToProducts($products_data);

$customer = new Customer('Kirsten Pearl', 'ten@mail.com');
?>
<html>
<head>
    <title>My Cart</title>
</head>

<link href="/docs/4.4/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Sarina&display=swap" rel="stylesheet">

<style>
    body {
        overflow-x: hidden;
        background-image: linear-gradient(120deg, #061a3f 50%, #ff7ea5 50%);
    }
    #product-list{
        margin: 50px 100px;
        padding: 5px 10px;
    }
    .card{
        box-shadow: .5px .5px 10px black;
    }
    #collections{
        text-align: center;
        color: #ff7ea5;
        margin-top: 50px;
        font-family: 'Sarina', cursive;
    }
    #greetings{
        font-family: 'Sarina', cursive;
    }
</style>

<body>
    <!--<div class="container-fluid">
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
        </nav>-->

        <header>
            <div class="px-3 py-2 bg-dark text-white">
                <div class="container">
                    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <a href="/" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
                        <img src="kkum.png" width="130" height="50">
                        <!--<svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>-->
                    </a>

                    <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
                        <li>
                            <a href="products-list.php" class="nav-link text-secondary">
                                <div class="fs-4 mb-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-house-heart" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.707L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.646a.5.5 0 0 0 .708-.707L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207l-5-5-5 5V13.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7.207Zm-5-.225C9.664 5.309 13.825 8.236 8 12 2.175 8.236 6.336 5.309 8 6.982Z"/>
                                    </svg>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="shopping-cart.php" class="nav-link text-white">
                            <div class="fs-4 mb-3">

                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-bag-heart" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5Zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0ZM14 14V5H2v9a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1ZM8 7.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132Z"/>
                                </svg>
                            </div>
                            </a>
                        </li>
                    </ul>
                    </div>
                </div>
                </div>
            </div>
        </header>

        <!--
        <div class="main-page">
            <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="slide1.png" class="d-block w-100" alt="slide1">
                        <div class="container">
                        <div class="carousel-caption text-start">
                            <h1>Hello, <?php echo $customer->getName() ?>!</h1>
                            <p>Welcome to Kkum Collections! Your one stop shop for your dream albums.</p>
                        </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></svg>
                        <div class="container">
                        <div class="carousel-caption">
                            <h1>Another example headline.</h1>
                            <p>Some representative placeholder content for the second slide of the carousel.</p>
                            <p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p>
                        </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></svg>

                        <div class="container">
                            <div class="carousel-caption text-end">
                                <h1>One more for good measure.</h1>
                                <p>Some representative placeholder content for the third slide of this carousel.</p>
                                <p><a class="btn btn-lg btn-primary" href="#">Browse gallery</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
                </button>
            </div>-->

        <div class="slider">
          <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>

            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="vinyl.png" class="d-block w-100" alt="slide1">
                <div class="carousel-caption d-none d-md-block">
                    <h1 id="greetings">Hello, <?php echo $customer->getName() ?>!</h1>
                    <h4>Welcome to Kkum Collections! Your one stop shop for your dream albums.</h4>
                </div>
              </div>
              <div class="carousel-item">
                <img src="slide1.png" class="d-block w-100" alt="slide2">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Kkum Collections</h5>
                </div>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>



            <h1 id="collections">Our Collections</h1>
        
            <div class="container-fluid" id="product-list">
                <form action="add-to-cart.php" method="POST">
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                    <?php foreach ($products as $product): ?>
                        <div class="col mx-auto text-center">
                            <div class="card" style="width: 18rem;">
                                <img src="<?php echo $product->getImage(); ?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <input type="hidden" name="product_id" value="<?php echo $product->getId(); ?>" />
                                    <h5 class="card-title"><?php echo $product->getName(); ?></h5>
                                    <p class="card-text"><?php echo $product->getDescription(); ?><br/></p>
                                    <p class="card-text">
                                        <span style="font-size: 18px"><?php echo $product->getPrice(); ?></span>
                                        <input type="number" name="quantity" class="quantity" value="0" style="width: 3em" />
                                    </p>
                                    <button type="submit" class="btn btn-warning">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-bag-plus" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5z"/>
                                                <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                                            </svg>
                                    </button>
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
            </div>
            <?php //endforeach; ?>
        </div>
    </div>

    <script language="JavaScript" type="text/javascript">
    $(document).ready(function(){
        $('.carousel').carousel({
        interval: 3000
        })
    });    
    </script>
    <script language="JavaScript" type="text/javascript" src="scripts/jquery.js"></script>
    <script language="JavaScript" type="text/javascript" src="scripts/bootstrap.min.js"></script>

</body>
</html>