<?php
require_once('../classes/general_class.php');
require_once('../controllers/general_controller.php');

if(isset($_POST['update_brand'])) {
    // Retrieve form data
    $brand_name = $_POST['brand_name'];
    $brand_id = $_POST['brand_id'];
    update_brand($brand_id, $brand_name);
}

?>