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
            <h2>Receipt</h2>
        </div>
        <div class="receipt-details">
            <p><strong>Order Number:</strong> #123456789</p>
            <p><strong>Date:</strong> April 7, 2024</p>
        </div>
        <div class="receipt-items">
            <table>
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Product Name 1</td>
                        <td>$25.00</td>
                    </tr>
                    <tr>
                        <td>Product Name 2</td>
                        <td>$35.00</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="receipt-total">
            <p><strong>Total:</strong> $60.00</p>
        </div>
        <hr>
        <p>Thank you for your purchase!</p>
    </div>
</body>
</html>
