 
<?php 

// require_once(__DIR__ . "/../settings/core.php");


// require_once(__DIR__ . "\\..\\actions\\product.php");
require_once(__DIR__ . "/../actions/product.php");

require_once(__DIR__ . "/calculator.php");

// require_once(__DIR__ . "\\calculator.php");

require_once(__DIR__ . "/../functions/general_function.php");


// require_once(__DIR__ . "\\..\\functions\\general_function.php");

// require_once(__DIR__ . "\\..\\classes\\general_class.php");
require_once(__DIR__ . "/../classes/general_class.php");



// require_once(__DIR__ . "\\..\\settings\\core.php");



function displayProducts(){
    $products = showAllProducts();        
    foreach ($products as $product): ?>
        <div class="col-md-6 col-lg-4 col-xl-3">
            <div class="rounded position-relative fruite-item">
                <div class="fruite-img">
                    <a href="shop_details.php">
                        <img src="../../upload/<?php echo $product["product_image"]; ?>" class="img-fluid w-100 rounded-top" alt="" width="400" title="<?php echo $product['product_image']; ?>">
                    </a>
                </div>
                <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;"> <?php echo $product["product_desc"]?> % Discount </div>
                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                    <h4><?php echo getCategoryName($product["product_cat"])?></h4>
                    <p><?php echo $product["product_title"]?></p>

                    <?php
                    // Assuming you have started the session somewhere above this code
                    if(isset($_SESSION['id'])) {
                        // User is logged in
                        $add_to_cart_link = "?add_to_cart=" . trim($product['product_id']);
                    } else {
                        // User is not logged in, provide a link to the login page
                        $add_to_cart_link = "../adminSide/sign-in.php"; // Adjust the link accordingly
                    }
                    ?>

                    <div class="d-flex justify-content-between flex-lg-wrap">
                        <p class="text-dark fs-5 fw-bold mb-0">$ <?php echo $product["product_price"]?> /Kg </p>
                        <?php if(isset($_SESSION['id'])): ?>
                            <a href="<?php echo $add_to_cart_link; ?>" class="btn border border-secondary rounded-pill px-3 text-primary" id="addToCartButton">
                                <i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart
                            </a>
                        <?php else: ?>
                            <a href="<?php echo $add_to_cart_link; ?>" class="btn border border-secondary rounded-pill px-3 text-primary">
                                <i class="fa fa-shopping-bag me-2 text-primary"></i> Log in to add to cart
                            </a>
                        <?php endif; ?>
                    </div>


                    <!-- <div class="d-flex justify-content-between flex-lg-wrap">
                        <p class="text-dark fs-5 fw-bold mb-0"> $ <?php echo $product["product_price"]?> /Kg </p>

                        <a href="?add_to_cart=<?php echo trim($product['product_id']); ?>" class="btn border border-secondary rounded-pill px-3 text-primary" id="addToCartButton"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                    </div> -->
                </div>
            </div>
        </div>
    <?php endforeach; 
} 

function displayShopDetails(){
    $products = showAllProducts();        
    foreach ($products as $product): ?>
        <div class="col-md-6 col-lg-4 col-xl-3">
            <div class="rounded position-relative fruite-item">
                <div class="fruite-img">
                    <img src="../../upload/<?php echo $product["product_image"]; ?>" class="img-fluid w-100 rounded-top" alt="" width = 400 title="<?php echo $product['product_image']; ?> "> 
                </div>
                <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;"> <?php echo $product["product_desc"]?> % Discount </div>
                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                    <h4><?php echo getCategoryName($product["product_cat"])?></h4>
                    <p><?php echo $product["product_title"]?></p>
                    <div class="d-flex justify-content-between flex-lg-wrap">
                        <!-- <p class="text-dark fs-5 fw-bold mb-0"> $ <?php echo $product["product_price"]?> /Kg </p> -->
                        <?php
                    // Assuming you have started the session somewhere above this code
                    if(isset($_SESSION['id'])) {
                        // User is logged in
                        $add_to_cart_link = "?add_to_cart=" . trim($product['product_id']);
                    } else {
                        // User is not logged in, provide a link to the login page
                        $add_to_cart_link = "../adminSide/sign-in.php"; // Adjust the link accordingly
                    }
                    ?>

                    <div class="d-flex justify-content-between flex-lg-wrap">
                        <p class="text-dark fs-5 fw-bold mb-0">$ <?php echo $product["product_price"]?> /Kg </p>
                        <?php if(isset($_SESSION['id'])): ?>
                            <a href="<?php echo $add_to_cart_link; ?>" class="btn border border-secondary rounded-pill px-3 text-primary" id="addToCartButton">
                                <i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart
                            </a>
                        <?php else: ?>
                            <a href="<?php echo $add_to_cart_link; ?>" class="btn border border-secondary rounded-pill px-3 text-primary">
                                <i class="fa fa-shopping-bag me-2 text-primary"></i> Log in to add to cart
                            </a>
                        <?php endif; ?>
                    </div>

                        <!-- <a href="?add_to_cart=<?php echo trim($product['product_id']); ?>" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a> -->

                    </div>
                </div>
            </div>
        </div>

    <?php endforeach; 
} 


 function displayShopProduct(){
    
    $products = showAllProducts();        

    foreach ($products as $product): ?>
        <div class="col-md-6 col-lg-6 col-xl-4">
        <div class="rounded position-relative fruite-item">
            <div class="fruite-img">
                <img src="../../upload/<?php echo $product["product_image"]; ?>" class="img-fluid w-100 rounded-top" alt="" width = 400 title="<?php echo $product['product_image']; ?> "> 
            </div>
            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;"><?php echo $product["product_desc"]?></div>
            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                <h4><?php echo getCategoryName($product["product_cat"])?></h4>
                <p><?php echo $product["product_title"]?></p>
                <div class="d-flex justify-content-between flex-lg-wrap">
                    <!-- <p class="text-dark fs-5 fw-bold mb-0">$ <?php echo $product["product_price"]?> / kg</p> -->
                    <?php
                    // Assuming you have started the session somewhere above this code
                    if(isset($_SESSION['id'])) {
                        // User is logged in
                        $add_to_cart_link = "?add_to_cart=" . trim($product['product_id']);
                    } else {
                        // User is not logged in, provide a link to the login page
                        $add_to_cart_link = "../adminSide/sign-in.php"; // Adjust the link accordingly
                    }
                    ?>

                    <div class="d-flex justify-content-between flex-lg-wrap">
                        <p class="text-dark fs-5 fw-bold mb-0">$ <?php echo $product["product_price"]?> /Kg </p>
                        <?php if(isset($_SESSION['id'])): ?>
                            <a href="<?php echo $add_to_cart_link; ?>" class="btn border border-secondary rounded-pill px-3 text-primary" id="addToCartButton">
                                <i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart
                            </a>
                        <?php else: ?>
                            <a href="<?php echo $add_to_cart_link; ?>" class="btn border border-secondary rounded-pill px-3 text-primary">
                                <i class="fa fa-shopping-bag me-2 text-primary"></i> Log in to add to cart
                            </a>
                        <?php endif; ?>
                    </div>

                    <!-- <a href="?add_to_cart=<?php echo trim($product['product_id']); ?>" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a> -->
                </div>
            </div>
        </div>
        </div>
    <?php endforeach; 
}

function displayCategories(){
        
    $categories = showAllCategories();      

    //  SHOW ALL CATEGORIES
    foreach ($categories as $category) : ?>


        <li class="nav-item">
            <a class="d-flex py-2 m-2 bg-light rounded-pill" href="../../view/frontend/showByCat.php?cat_id=<?php echo $category['cat_id']; ?>">  
            <span class="text-dark" style="width: 130px;"><?php echo $category["cat_name"] ?></span>
            </a>
        </li>

    <?php endforeach;

}

function displayShopCategories(){
        
    $shopCats = showAllCategories();      

    //  SHOW ALL CATEGORIES
    foreach ($shopCats as $shopCat) : ?>

        <li>
            <div class="d-flex justify-content-between fruite-name">
                <a href="#"><i class="fas fa-apple-alt me-2"></i><?php echo $shopCat["cat_name"] ?></a>
                <span><?php echo ($shopCat["cat_id"])?></span>
            </div>
        </li>
    
<?php endforeach;

}

//Display Featured
function displayFeatured(){
    $products = showAllProducts(); 
    foreach ($products as $product) :?>
        <div class="d-flex align-items-center justify-content-start">
            <div class="rounded me-4" style="width: 100px; height: 100px;">
                <img src="../../upload/<?php echo $product["product_image"]; ?>" class="img-fluid rounded" alt=""> 
            </div>
            <div>
                <h6 class="mb-2"><?php echo getCategoryName($product["product_cat"])?></h6>
                <div class="d-flex mb-2">
                    <i class="fa fa-star text-secondary"></i>
                    <i class="fa fa-star text-secondary"></i>
                    <i class="fa fa-star text-secondary"></i>
                    <i class="fa fa-star text-secondary"></i>
                    <i class="fa fa-star"></i>
                </div>
                <div class="d-flex mb-2">
                    <h5 class="fw-bold me-2"><?php echo sellingPrice($product["product_price"], $product["product_desc"])?> $</h5> 
                    <h5 class="text-danger text-decoration-line-through"> <?php echo ($product["product_price"])?> $</h5>
                </div>
            </div>
        </div>
    <?php endforeach;
}

// display categories 

function filterByCategories(){
    
    $shopCats = showAllCategories(); 
    foreach($shopCats as $shopCat) : ?>
        <option value="saab"><?php echo ($shopCat["cat_name"])?></option>
    <?php endforeach;
}

function showCat(){
    
    $catDetails = show_by_cat($cat_id); 

    foreach ($catDetails as $product): ?>
        <div class="col-md-6 col-lg-6 col-xl-4">
            <div class="rounded position-relative fruite-item">
                <div class="fruite-img">
                    <img src="../../upload/<?php echo $product["product_image"]; ?>" class="img-fluid w-100 rounded-top" alt="" width = 400 title="<?php echo $product['product_image']; ?> "> 
                </div>
                <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;"><?php echo $product["product_desc"]?></div>
                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                    <h4><?php echo getCategoryName($product["product_cat"])?></h4>
                    <p><?php echo $product["product_title"]?></p>
                    <div class="d-flex justify-content-between flex-lg-wrap">
                        <p class="text-dark fs-5 fw-bold mb-0">$ <?php echo $product["product_price"]?> / kg</p>
                        <a href="?add_to_cart=<?php echo trim($product['product_id']); ?>" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; 
}



?>
