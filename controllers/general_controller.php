<?php

// include(__DIR__ . "\\..\\classes\\general_class.php");
include(__DIR__ . "/../classes/general_class.php");


function register($name, $email,$country, $city, $contact, $pass, $image, $role){
    // Create an instance of the general class
    $general_class = new general_class();
    // Attempt to sign up the user
    $signup_successful = $general_class->register($name, $email,$country, $city, $contact, $pass, $image, $role);
    return $signup_successful;
}

function user_login($username, $password) {
    // Create an instance of UserModel
    $general_class = new general_class();
    // Verify user credentials
    $user = $general_class->fetchUser($username, $password);
    return $user;
}

// add brand
function add_brand($brand_name, $v_id){
    // Create an instance of the general class
    $general_class = new general_class();
    // Attempt to sign up the user
    $addBrand = $general_class->addBrand($brand_name, $v_id);
    return $addBrand;
}

// add categories
function add_cat($cat_name){
    // Create an instance of the general class
    $general_class = new general_class();
    // Attempt to sign up the user
    $addCat = $general_class->addCat($cat_name);
    return $addCat;
}

// add product
function add_product($cat_id, $brand_id, $product_title, $product_price, $product_desc, $newImageName, $product_keywords, $qnty, $recipes){
    // Create an instance of the general class
    $general_class = new general_class();
    $addProduct = $general_class->addProduct($cat_id, $brand_id, $product_title, $product_price, $product_desc, $newImageName, $product_keywords, $qnty, $recipes);
    return $addProduct;
}

function add_orders_payment($user_id, $data){
    // Create an instance of the general class
    $general_class = new general_class();
    $element = $general_class->addOrdersPayment($user_id, $data);
    return $element;
}


function row_count_cart($ip, $product_id, $c_id){
        // Create an instance of the general class
        $general_class = new general_class();
        $num_rows = $general_class->fetchCart($ip, $product_id, $c_id);
        return $num_rows;
}

function add_to_cart($product_id, $ip_add, $c_id, $qty){
    // Create an instance of the general class
    $general_class = new general_class();
    $element = $general_class->addCart($product_id, $ip_add, $c_id, $qty);
    return $element;
}

function delete_cart($user_id){
    $general_class = new general_class();
    $element = $general_class->deleteCart($user_id);
    return $element;

}


function check_duplicate_infor($email, $contact){
    // Create an instance of the general class
    $general_class = new general_class();
    $num_rows = $general_class->checkDuplicateInfor($email, $contact);
    return $num_rows;
}

function fetch_cat_id($product_cat){
    $general_class = new general_class();
    $cat = $general_class->fetchId($product_cat);
    return $cat;
}

function fetch_brand_id($product_brand){
    $general_class = new general_class();
    $brands = $general_class->fetchBrandID($product_brand);
    return $brands; 
}

function fetch_brand($brand_id){
    $general_class = new general_class();
    $brand = $general_class->fetchBrand($brand_id);
    return $brand;
}

function fetch_product($product_id){
    $general_class = new general_class();
    $product = $general_class->fetchProduct($product_id);
    return $product;
}

function get_all_customers(){
    $general_class = new general_class();
    $customers = $general_class->getAllCustomers();
    return $customers;
}

function get_category_name($cat_id){
    $general_class = new general_class();
    $cat = $general_class->getCategoryName($cat_id);
    return $cat;
}

function get_all_brands() {
    $general_class = new general_class();
    $brands = $general_class->getAllBrands();
    return $brands;
}

function get_cart_product(){
    $general_class = new general_class();
    $found = $general_class->getCartProduct();
    return $found;
}

function get_order_products(){
    $general_class = new general_class();
    $found = $general_class->getProductsPayments();
    return $found;
}

function get_cart_details_ip(){
    $general_class = new general_class();
    $cartdetails = $general_class->showCartDetailsIP();
    return $cartdetails;

}

function get_all_categories() {
    $general_class = new general_class();
    $categories = $general_class->getAllCategories();
    return $categories;
}

function get_all_products() {
    $general_class = new general_class();
    $products = $general_class->getAllProducts();
    return $products;
}

function get_admin_products() {
    $general_class = new general_class();
    $products = $general_class->getAdminProducts();
    return $products;
}

function get_admin_orders() {
    $general_class = new general_class();
    $orders = $general_class->getAdminOrders();
    return $orders;
}

function get_num_details(){
    $general_class = new general_class();
    $num = $general_class->numProductInCart();
    return $num;

}

function keyword_search($product_keywords){
    $general_class = new general_class();
    $found = $general_class->getSearched($product_keywords);
    return $found;
}

function show_by_cat($cat_id){
    $general_class = new general_class();
    $found = $general_class->showByCat($cat_id);
    return $found;

}

function delete_brand($brand_id){
    $general_class = new general_class();
    $general_class->deleteBrand($brand_id);
}

function delete_product($product_id){
    $general_class = new general_class();
    $general_class->deleteProduct($product_id);
}

function update_brand($brand_id, $brand_name){
    $general_class = new general_class();
    $general_class->updateBrand($brand_id, $brand_name);
}

function delete_items_cart($pid, $ip_old){
    $general_class = new general_class();
    $general_class->deleteItemsCart($pid, $ip_old);
}

function update_product($product_id, $product_title, $product_price, $product_desc, $product_keywords){
    $general_class = new general_class();
    $general_class->updateProduct($product_id, $product_title, $product_price, $product_desc, $product_keywords);
}

function update_qty_cart($pid, $new_qty){
    $general_class = new general_class();
    $general_class->updateQtyCart($pid, $new_qty);
}

function user_receipt($customer_id){
    $general_class = new general_class();
    $user_receipt = $general_class->userReceipt($customer_id);
    return $user_receipt;
}

function get_all_order_products($order_id){
    $general_class = new general_class();
    $products_receipt = $general_class->productsReceipts($order_id);
    return $products_receipt;
}
?>
