<?php

// require_once('../settings/core.php');

require_once(__DIR__ . "\\..\\controllers\\general_controller.php");

if(isset($_POST['addToVendor'])) {
    $brand_name = $_POST['brand_name'];
    // if(isLogged() && isAdmin()){
        $v_id = $_SESSION['id'];
        if(add_brand($brand_name, $v_id)){
            header('Location: ../view/adminSide/add-product.php');
            exit(); 
        // }
    }else{
        header("Location: ../view/adminSide/add-product.php");
        exit();  
    }
}

if(isset($_POST['addToCategory'])) {
    $cat_name = $_POST['cat_name'];
    if(add_cat($cat_name)){
        header('Location: ../view/adminSide/add-product.php');
        exit(); 
    }
}
    
if(isset($_POST['addToProduct'])) {
    // Retrieve form data
    $product_cat = $_POST['product_cat'];
    $product_brand = $_POST['product_brand'];
    $product_title = $_POST['product_title'];
    $product_price = $_POST['product_price'];
    $product_desc = $_POST['product_desc'];
    $product_keywords = $_POST['product_keywords'];
    $qnty = $_POST['qnty'];
    $recipes = $_POST['product_recipe'];
    $cat = fetch_cat_id($product_cat);
    $cat_id  = (int) $cat['cat_id'];
    $brand = fetch_brand_id($product_brand);
    $brand_id = (int) $brand['brand_id'];  

    if($_FILES["file"]["error"] == 4){
        echo
        "<script> alert('Image Does Not Exist'); </script>";
    } else {
        $fileName = $_FILES["file"]["name"];
        $fileSize = $_FILES["file"]["size"];
        $tmpName = $_FILES["file"]["tmp_name"];
        $validImageExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $fileName);
        $imageExtension = strtolower(end($imageExtension));
        if ( !in_array($imageExtension, $validImageExtension) ){
            echo
            "
            <script>
              alert('Invalid Image Extension');
            </script>
            ";
        } else if ($fileSize > 1000000){
        echo
        "
        <script>
            alert('Image Size Is Too Large');
        </script>
        ";
        } else {
            $newImageName = uniqid();
            $newImageName .= '.' . $imageExtension;
            move_uploaded_file($tmpName, '../upload/' . $newImageName);
            if ($cat_id !== null && $brand_id !== null) {
                echo
                    "
                    <script>
                    alert('Successfully Added');
                    window.location.href ='../view/adminSide/index.php';
                    </script>
                    ";

                add_product($cat_id, $brand_id, $product_title, $product_price, $product_desc, $newImageName, $product_keywords, $qnty, $recipes);
            } 
        }
    } 
}

function showAll(){
    $brands = get_all_brands();
    return $brands;
}

if(isset($_POST['deleteBtn'])) {
    $brand_id = $_POST['brand_id'];
    delete_brand($brand_id);
}

if(isset($_POST['updateBtn'])) {
    $brand_id = $_POST['brand_id'];
    update_brand($brand_id);
}

?>