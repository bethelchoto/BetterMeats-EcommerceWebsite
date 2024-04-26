<?php


// require_once(__DIR__ . "/../settings/core.php");

// require_once(__DIR__ . "\\..\\controllers\\general_controller.php");
require_once(__DIR__ . "/../controllers/general_controller.php");


// require_once(__DIR__ . "\\..\\settings\\core.php");
require_once(__DIR__ . "/calculator.php");


// require_once(__DIR__ . "\\calculator.php");

global $subTotal;
global $Total;
global $productsfound;

if(isset($_GET['add_to_cart'])) {
    $ip = getIPAddress();
    $product_id = $_GET['add_to_cart'];
    $c_id = $_SESSION['id'];
    cart($ip, $product_id, $c_id);
}

function cart($ip, $product_id, $c_id){ 
    $qty = 1;
    if(row_count_cart($ip, $product_id, $c_id) > 0){
        ?>
        <script>
          alert('Item Already Exists In Cart');
          window.location.href ='../frontend/shop.php';
        </script>
        <?php
    } else {
        add_to_cart($product_id, $ip, $c_id, $qty);
        ?>
        <script>
            alert('Added Successfully');
            window.location.href ='../frontend/shop.php';
        </script>
        <?php
    }   
}

function displayCartDetails(){
    global $subTotal;
    $productCartDetails = get_cart_product();  
    foreach ($productCartDetails as $allDetail): ?>
        <tr>
            <th scope="row">
                <div class="d-flex align-items-center">
                    <img src="../../upload/<?php echo $allDetail["product_image"]; ?>" class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="">
                </div>
            </th>
            <td>
                <p class="mb-0 mt-4"><?php echo $allDetail["cat_name"]?></p>
            </td>
            <td>
                <p class="mb-0 mt-4"> <?php echo sellingPrice($allDetail["product_price"], $allDetail["product_desc"]) ?> </p>
            </td>
            <td>
                <p class="mb-0 mt-4"> <?php echo $allDetail["qty"] ?> </p>
            </td>
            <td>
                <p  class="mb-0 mt-4"> <?php echo totalPrice($allDetail["qty"], $allDetail["product_price"], $allDetail["product_desc"]) ?> </p>
            </td>
            <form method="post" action="../../actions/editCart.php">
            <td>
                <div class="input-group quantity mt-4" style="width: 100px;">
                    <input type="text" class="form-control" id="new_qty" name="new_qty">
                </div>
            </td>
            <td>
                <input type="hidden" name="ip_add" type="text" class="form-control form-control-sm text-center border-0" value = <?php echo $allDetail["ip_add"] ?> >
                <input type="hidden" name="pid" type="text" class="form-control form-control-sm text-center border-0" value = <?php echo $allDetail["product_id"] ?> >

                <button type="submit" name="updateQtyCart" class="btn btn-md rounded-circle bg-light border mt-4" >
                    <i class="fa fa-check text-success"></i>
                </button>
            </td>
            <form>
            <td>
            <form method="post" action="../../actions/editCart.php">
            <input type="hidden" name = "ip_add" type="text" class="form-control form-control-sm text-center border-0" value = <?php echo $allDetail["ip_add"] ?> >
            <input type="hidden" name = "pid" type="text" class="form-control form-control-sm text-center border-0" value = <?php echo $allDetail["product_id"] ?> >
                <button type="submit" name="deleteItemsCart" class="btn btn-md rounded-circle bg-light border mt-4" >
                    <i class="fa fa-times text-danger"></i>
                </button>
            </form>
            </td>
        </tr>
        <?php $subTotal += totalPrice($allDetail["qty"], $allDetail["product_price"], $allDetail["product_desc"]) ?>
    <?php endforeach; 
}

function displayPayment(){

    global $Total;

    $productOrderDetails = get_order_products();  

    foreach ($productOrderDetails as $allDetail): ?>
    <tr>
        <th scope="row">
            <div class="d-flex align-items-center mt-2">
            <img src="../../upload/<?php echo $allDetail["product_image"]; ?>" class="img-fluid rounded-circle" style="width: 90px; height: 90px;" alt="">
            </div>
        </th>
        <td class="py-5"><?php echo $allDetail["cat_name"]?></td>
        <td class="py-5"> <?php echo sellingPrice($allDetail["product_price"], $allDetail["product_desc"]) ?>  </td>
        <td class="py-5"><?php echo $allDetail["qty"] ?></td>
        <td class="py-5"><?php echo totalPrice($allDetail["qty"], $allDetail["product_price"], $allDetail["product_desc"]) ?></td>
    </tr>

    <?php $Total += totalPrice($allDetail["qty"], $allDetail["product_price"], $allDetail["product_desc"]) ?>

    <?php endforeach;
}

function numItemsCart(){
    
    ?>
     <span class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1" style="top: -5px; left: 15px; height: 20px; min-width: 20px;"> <?php echo $numProductInCart = get_num_details(); ?> </span>
    <?php
    
}

function displayCartPrice(){
    global $subTotal;
    ?>
        <div class="row g-4 justify-content-end">
        <div class="col-8"></div>
        <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
            <div class="bg-light rounded">
                <div class="p-4">
                    <h1 class="display-6 mb-4">Cart <span class="fw-normal">Total</span></h1>
                    <div class="d-flex justify-content-between mb-4">
                        <h5 class="mb-0 me-4">Subtotal:</h5>
                        <p class="mb-0">$<?php echo $subTotal?> </p>
                    </div>
                </div>
                <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                    <h5 class="mb-0 ps-4 me-4">Total</h5>
                    <p class="mb-0 pe-4">$<?php echo $subTotal?></p>
                </div>
                <button class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4" type="submit" name="orders" onclick="redirectToCheckout()">Proceed to Checkout</button> 
                <script>
                    function redirectToCheckout() {
                        var url = '../../view/frontend/checkout.php';
                        window.location.href = url;
                    }
                </script>    
                </div>
            </div>
        </div>
    <?php
}

function showTotalPaymentAmnt(){
    global $Total;
     ?>
         <div class="py-3 border-bottom border-top">
                <p class="mb-0 text-dark"><?php echo $Total ?></p>
         </div>
     <?php
}

function useTotalAmnt(){
    global $Total;
    ?>
        <input type="tel" id="amount" value="<?php echo $Total ?>" style="display: none;"/>
    <?php
}

function showAdminName(){
    ?>
        <h6 class="mt-2 text-body-emphasis"><?php echo $_SESSION["username"]; ?></h6>
    <?php
}

function showProfile(){
    ?>
    <div class="avatar avatar-l ">
        <img class="rounded-circle " src="../../upload/<?php $_SESSION["customer_image"]; ?>" alt="" />
    </div>
  <?php
}

?>  