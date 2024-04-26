
<?php

function totalPrice($qty, $originalPrice, $discount){
    $total_price = sellingPrice($originalPrice, $discount) * $qty;
    return $total_price;
}

function sellingPrice($originalPrice, $discount){
    $discountedPrice  = $originalPrice * ($discount/100);
    $sellingP = $originalPrice - $discountedPrice;
    return $sellingP;
}

?>