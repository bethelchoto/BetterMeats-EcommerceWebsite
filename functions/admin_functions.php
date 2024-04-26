 
<?php 

// require_once(__DIR__ . "/../settings/core.php");

require_once(__DIR__ . "/../controllers/general_controller.php");


function adminSelectCategory(){
    $shopCats = get_all_categories(); 
    foreach($shopCats as $shopCat) : ?>
        <option><?php echo ($shopCat["cat_name"])?></option>
    <?php endforeach;
}

function adminSelectVendor(){
    $vendors = get_all_brands();
    foreach($vendors as $vendor) : ?>
        <option>
            <?php echo ($vendor["brand_name"])?>
        </option>
    <?php endforeach;
}

function adminShowOrders(){

    foreach($vendors as $vendor) : ?>

    <li class="nav-item"><a class="nav-link active" aria-current="page" href="#"><span>All </span><span class="text-body-tertiary fw-semibold">(68817)</span></a></li>
    <li class="nav-item"><a class="nav-link" href="#"><span>Published </span><span class="text-body-tertiary fw-semibold">(70348)</span></a></li>
    <li class="nav-item"><a class="nav-link" href="#"><span>Drafts </span><span class="text-body-tertiary fw-semibold">(17)</span></a></li>
    <li class="nav-item"><a class="nav-link" href="#"><span>On discount </span><span class="text-body-tertiary fw-semibold">(810)</span></a></li>
  <?php endforeach;
}

function showAdminProducts(){
    
    $products = get_admin_products();       

    foreach ($products as $product): ?>
        <tr class="position-static">
            <td class="fs-9 align-middle">
            <div class="form-check mb-0 fs-8"><input class="form-check-input" type="checkbox" data-bulk-select-row='{"product":"Fitbit Sense Advanced Smartwatch with Tools for Heart Health, Stress Management & Skin Temperature Trends, Carbon/Graphite, One Size (S & L Bands...","productImage":"/products/1.png","price":"$39","category":"Plants","tags":["Health","Exercise","Discipline","Lifestyle","Fitness"],"star":false,"vendor":"Blue Olive Plant sellers. Inc","publishedOn":"Nov 12, 10:45 PM"}' /></div>
            </td>
            <td class="align-middle white-space-nowrap py-0"><a class="d-block border border-translucent rounded-2" href="../frontend/product-details.html"><img src="../../upload/<?php echo $product["product_image"];?>" alt="" width="53" /></a></td>
            <td class="product align-middle ps-4"><a class="fw-semibold line-clamp-3 mb-0" href="../landing/product-details.html"> <?php echo $product["product_title"]?> &amp; (S &amp; ...</a></td>            
            <td class="price align-middle white-space-nowrap text-end fw-bold text-body-tertiary ps-4">GHC<?php echo $product["product_price"]?></td>
            <td class="category align-middle white-space-nowrap text-body-quaternary fs-9 ps-4 fw-semibold"><?php echo $product["cat_name"]?></td>
            <td class="tags align-middle review pb-2 ps-3" style="min-width:225px;"><a class="text-decoration-none" href="#!"><span class="badge badge-tag me-2 mb-2"><?php echo $product["product_keywords"]?></span></a></td>
            <td class="align-middle review fs-8 text-center ps-4">
            <div class="d-toggle-container">
                <div class="d-block-hover"><span class="fas fa-star text-warning"></span></div>
                <div class="d-none-hover"><span class="far fa-star text-warning"></span></div>
            </div>
            </td>
            <td class="vendor align-middle text-start fw-semibold ps-4"><a href="#!"><?php echo $product["brand_name"]?></a></td>
            <td class="time align-middle white-space-nowrap text-body-tertiary text-opacity-85 ps-4"><?php echo $product["product_price"]?> GHC</td>
            <td class="align-middle white-space-nowrap text-end pe-0 ps-4 btn-reveal-trigger">
            <div class="btn-reveal-trigger position-static"><button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs-10" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs-10"></span></button>
                <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                <a class="dropdown-item text-danger" href="../../actions/product.php?product_id=<?php echo $product['product_id']; ?>&deleteProduct=1">Remove</a>
                <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                </div>
            </div>
            </td>
        </tr>
    <?php endforeach; 
} 


function adminShowCustomers(){
    
    $customers = get_all_customers();       

    foreach ($customers as $customer): ?>
        <tr class="hover-actions-trigger btn-reveal-trigger position-static">
            <td class="fs-9 align-middle ps-0 py-3">
            <div class="form-check mb-0 fs-8"><input class="form-check-input" type="checkbox" data-bulk-select-row='{"customer":{"avatar":"/team/32.webp","name":"Carry Anna"},"email":"annac34@gmail.com","city":"Budapest","totalOrders":89,"totalSpent":23987,"lastSeen":"34 min ago","lastOrder":"Dec 12, 12:56 PM"}' /></div>
            </td>
            <td class="customer align-middle white-space-nowrap pe-5"><a class="d-flex align-items-center text-body-emphasis" href="customer-details.html">
                <div class="avatar avatar-m"> <img src="../../upload/<?php echo $customer["customer_image"];?>" ></div>
            </a></td>
            <td class="email align-middle white-space-nowrap pe-5"><a class="fw-semibold" href="mailto:annac34@gmail.com"><?php echo $customer["customer_name"]?></a></td>
            <td class="email align-middle white-space-nowrap pe-5"><a class="fw-semibold" href="mailto:annac34@gmail.com"><?php echo $customer["customer_email"]?></a></td>
            <td class="total-spent align-middle white-space-nowrap fw-bold text-end ps-3 text-body-emphasis">$ 23987</td>
            <td class="city align-middle white-space-nowrap text-body-highlight ps-7"><?php echo $customer["customer_city"];?></td>
            <td class="last-seen align-middle white-space-nowrap text-body-tertiary text-end"><?php echo $customer["customer_city"];?></td>
            <td class="last-order align-middle white-space-nowrap text-body-tertiary text-end"><?php echo $customer["customer_country"];?></td>
        </tr>
    <?php endforeach; 
} 

function adminShowOrder(){
    $orders = get_admin_orders();  
    foreach ($orders as $order): ?>
            <tbody class="list" id="order-table-body">
            <tr class="hover-actions-trigger btn-reveal-trigger position-static">
              <td class="fs-9 align-middle px-0 py-3">
                <div class="form-check mb-0 fs-8"><input class="form-check-input" type="checkbox" data-bulk-select-row='{"order":2453,"total":87,"customer":{"avatar":"/team/32.webp","name":"Carry Anna"},"payment_status":{"label":"Complete","type":"badge-phoenix-success","icon":"check"},"fulfilment_status":{"label":"Cancelled","type":"badge-phoenix-secondary","icon":"x"},"delivery_type":"Cash on delivery","date":"Dec 12, 12:56 PM"}' /></div>
              </td>
              <td class="order align-middle white-space-nowrap py-0"><a class="fw-semibold" href="#!">## <?php echo $order["order_id"];?></a></td>
              <td class="total align-middle text-end fw-semibold text-body-highlight">GHC <?php echo $order["amt"];?></td>
              <td class="customer align-middle white-space-nowrap ps-8"><a class="d-flex align-items-center text-body" href="../landing/profile.html">
                  <div class="avatar avatar-m"><img class="rounded-circle" src="../../upload/<?php echo $order["customer_image"];?>" alt="" /></div>
                  <h6 class="mb-0 ms-3 text-body"><?php echo $order["customer_name"];?></h6>
                </a></td>
              <td class="payment_status align-middle white-space-nowrap text-start fw-bold text-body-tertiary"><span class="badge badge-phoenix fs-10 badge-phoenix-success"><span class="badge-label"><?php echo $order["order_status"];?></span><span class="ms-1" data-feather="check" style="height:12.8px;width:12.8px;"></span></span></td>
              <td class="fulfilment_status align-middle white-space-nowrap text-start fw-bold text-body-tertiary"><span class="badge badge-phoenix fs-10 badge-phoenix-secondary"><span class="badge-label">Cancelled</span><span class="ms-1" data-feather="x" style="height:12.8px;width:12.8px;"></span></span></td>
              <td class="delivery_type align-middle white-space-nowrap text-body fs-9 text-start">Cash On Delivery</td>
              <td class="date align-middle white-space-nowrap text-body-tertiary fs-9 ps-4 text-end"><?php echo $order["order_date"];?>/td>
            </tr>
          </tbody>
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
                        <p class="text-dark fs-5 fw-bold mb-0"> $ <?php echo $product["product_price"]?> /Kg </p>
                        <a href="?add_to_cart=<?php echo trim($product['product_id']); ?>" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
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
                    <p class="text-dark fs-5 fw-bold mb-0">$ <?php echo $product["product_price"]?> / kg</p>
                    <a href="?add_to_cart=<?php echo trim($product['product_id']); ?>" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
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

           TO DO ??? make the categories filter using when clicked 

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

// Display Featured

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
