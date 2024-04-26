<?php 

require_once(__DIR__ . "/../controllers/general_controller.php");
require_once(__DIR__ . "/../functions/calculator.php");

global $price;

if(isset($_GET['customer_id'])) {
    $customer_id = $_GET['customer_id'];

    $receipt_details = user_receipt($customer_id);
    $order_id = $receipt_details["order_id"];

?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .receipt-container {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .receipt-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .receipt-header h2 {
            margin: 0;
            color: #333;
        }
        .receipt-details {
            margin-bottom: 20px;
        }
        .receipt-details p {
            margin: 5px 0;
        }
        .receipt-items {
            margin-bottom: 20px;
        }
        .receipt-items table {
            width: 100%;
            border-collapse: collapse;
        }
        .receipt-items th,
        .receipt-items td {
            padding: 8px;
            border-bottom: 1px solid #ccc;
        }
        .receipt-total {
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="receipt-container">
        <div class="receipt-header">
            <h2>BETTER MEATS RECEIPT</h2>
        </div>
        <div class="receipt-details">
            <p><strong>Order Number:</strong># <?php echo $receipt_details["order_id"]; ?></p>
            <p><strong>Date:</strong> <?php echo $receipt_details["payment_date"]; ?></p>
            <p><strong>Customer Name:</strong> <?php echo $_SESSION["username"]; ?></p>
        </div>
            <div class="receipt-items">
                <table>
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                <?php
                    $order_id = $receipt_details["order_id"]; 
                    $products_receipts = get_all_order_products($order_id);
                    foreach ($products_receipts as $products_receipt): ?>
                    <? 
                    global $price;
                    ?>
                    <tbody>
                        <tr>
                            <td><?php echo $products_receipt["cat_name"];?></td>
                            <td>
                                GHC 
                                <?php
                            echo sellingPrice($products_receipt["product_price"], $products_receipt["product_desc"]) ?></td>
                        </tr>
                    </tbody>
                    <?php endforeach; 
                  ?>
                </table>
            </div>
        <div class="receipt-total">
            <p><strong>Total:</strong> GHC <?php echo $receipt_details["amt"]; ?></p>
        </div>
        <hr>
        <p>Thank you for your purchase with BetterMeats!</p>
    </div>
</body>
</html>

<?php

}

   
?>