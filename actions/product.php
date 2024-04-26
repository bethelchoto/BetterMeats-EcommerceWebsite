<?php

// require_once("../controllers/general_controller.php");
// require_once($_SERVER['DOCUMENT_ROOT'] . '../controllers/general_controller.php');
// require_once(__DIR__ . "\\..\\controllers\\general_controller.php");
require_once(__DIR__ . "/../controllers/general_controller.php");

function showAllProducts(){
    $products = get_all_products();
    return $products;
}

function getCategoryName($cat_id){
    $cat = get_category_name($cat_id);
    return $cat['cat_name'];
}

function showAllCategories(){
    $vendor_name = get_all_categories();
    return $vendor_name;
}

function showAllVendors(){
    $categories_name = get_all_vendors();
    return $categories_name;
}

if(isset($_GET['product_id'])){
    $product_id = $_GET['product_id'];
    delete_product($product_id);
}

// if(isset($_POST['deleteProduct'])) {
//     // Retrieve form data
//     $product_id = $_POST['product_id'];
//     delete_product($product_id);
// }

if(isset($_POST['updateProduct'])) {
    // Retrieve form data
    $product_id = $_POST['product_id'];
    $product_title = $_POST['product_title'];
    $product_price = $_POST['product_price'];
    $product_desc = $_POST['product_desc'];
    $product_keywords = $_POST['product_keywords'];
    update_product($product_id, $product_title, $product_price, $product_desc, $product_keywords);
}

?>
