<?php

// require_once(__DIR__ . "\\..\\controllers\\general_controller.php");
// require_once(__DIR__ . "\\..\\settings\\core.php");

require_once(__DIR__ . "/../controllers/general_controller.php");

if (isset($_POST['deleteItemsCart'])) {
    $pid = $_POST['pid'];
    $ip_old = $_POST['ip_add'];
    if(isLogged()){
        $c_id = $_SESSION['id'];
        delete_items_cart($pid, $ip_old); 
        header("Location: ../view/frontend/cart.php");
        exit;   
    }else{
        $c_id = 0;
        delete_items_cart($pid, $ip_old); 
        header("Location: ../view/frontend/cart.php");
        exit;  
    }
}

if (isset($_POST['updateQtyCart'])) {
    $pid = $_POST['pid'];
    $new_qty = $_POST['new_qty'];
    if($new_qty!=null){
        update_qty_cart($pid, $new_qty); 
        header("Location: ../view/frontend/cart.php");
        exit;       
    }
    else {
        echo "error";
    }
}

?>