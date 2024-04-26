<?php

// require_once(__DIR__ . "\\..\\..\\actions\\product.php");

require_once(__DIR__ . "/../../actions/product.php");

// require_once(__DIR__ . "\\..\\..\\settings\\core.php");

// require_once(__DIR__ . "\\..\\..\\functions\\general_function.php");

require_once(__DIR__ . "/../../functions/general_function.php");

if(!isLogged()){
    echo
    "
    <script>

        swal('Hello world!');

    </script>

    "; 
}

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>BetterMeats</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">
        <link rel="apple-touch-icon" sizes="180x180" href="../adminSide/assets/img/favicons/apple-touch-icon.png">
        <link rel="icon" type="../adminSide/image/png" sizes="32x32" href="../adminSide/assets/img/favicons/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="../adminSide/assets/img/favicons/favicon-16x16.png">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">

        <!-- <script src="/js/sweetalert.js"></script>

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->


    </head>

    <body>
        <!-- NavBar -->
    <?php include "userNavBar.php" ?>


    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Checkout</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item active text-white">Checkout</li>
        </ol>
    </div>
    <!-- Single Page Header End -->

        <!-- Checkout Page Start -->
        <div class="container-fluid py-5">
            <div class="container py-5">
                <h1 class="mb-4">Billing details</h1>


                <form action="#">
                    <div class="row g-5">

                        <div class="col-md-12 col-lg-6 col-xl-5">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Products</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Total</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        
                      
                                       <?php displayPayment()?>
                                    

                                        <tr>

                                            <th scope="row">
                                            </th>
                                            <td class="py-5">
                                                <p class="mb-0 text-dark text-uppercase py-3">TOTAL</p>
                                            </td>

                                            <td class="py-5"></td>
                                            <td class="py-5"></td>
                                            <td class="py-5">
                                                <?php 
                                                global $totalAmnt;
                                                    $totalAmnt = showTotalPaymentAmnt();
                                                ?>
                                            </td>


                                        </tr>
                                        <div class="form-item">
                                    </tbody>
                                </table>
                            </div>


                            <div class="row g-4 text-center align-items-center justify-content-center pt-4">
                                <button type="button" id="payButton" class="btn border-secondary py-3 px-4 text-uppercase w-100 text-primary" onclick="redirectToPayment()">Pay</button>

                            </div>

                        </div>


                           <!-- user details -->
                           <div class="col-md-12 col-lg-6 col-xl-7">
                            <div class="row">
                                <div class="col-md-12 col-lg-6">
                                    <div class="form-item w-100">
                                        <label class="form-label my-3">First Name<sup>*</sup></label>
                                        <input type="text" id="first-name"class="form-control">
                                    </div>
                                </div>
                                
                                <div class="col-md-12 col-lg-6">
                                    <div class="form-item w-100">
                                        <label class="form-label my-3">Last Name<sup>*</sup></label>
                                        <input type="text" id="last-name" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-item">
                                <label class="form-label my-3">Email Address<sup>*</sup></label>
                                <input type="email" id="email-address" class="form-control">
                            </div>

                            <div class="form-item">

                           

                                <?php 
                                    $Total = useTotalAmnt();
                                    echo $Total;
                                ?>

                            </div>
                            
                        </div>                        
                    </div>
                </form>
            </div>
        </div>

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>   


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>   

    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="js/main.js"></script>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <!-- <script src="js/paystack.js"></script> -->

    <script src="https://js.paystack.co/v1/inline.js"></script>


<script>
  document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("payButton").addEventListener("click", payWithPaystack);
  });

  function payWithPaystack() {

    var user_id = <?php echo isset($_SESSION['id']) ? $_SESSION['id'] : 'null'; ?>;


    var email = document.getElementById('email-address').value;
    var amount = document.getElementById('amount').value;
    var firstName = document.getElementById('first-name').value;
    var lastName = document.getElementById('last-name').value;
    // var totalAmnt = document.getElementById('amount').value;

    if (!email || !amount) {
      alert("Please fill in email and amount fields.");
      return;
    }

    var handler = PaystackPop.setup({
      key: 'pk_test_e679735d3c92632af80d5513fbf7c47f653c14bf', // Replace with your public key
      email: email,
      amount: amount * 100, 
      currency: 'GHS',
      totalamount:amount,
      ref: "" + Math.floor(Math.random() * 1000000000 + 1), // Replace with a reference you generated
      metadata: {
        custom_fields: [
            {
            display_name: "Customer Id",
            variable_name: "Customer_Id",
            value: user_id
          },
          {
            display_name: "amount",
            variable_name: "amount",
            value: amount
          },
          {
            display_name: "First Name",
            variable_name: "first_name",
            value: firstName
          },
          {
            display_name: "Last Name",
            variable_name: "last_name",
            value: lastName
          }
        ]
      },
      callback: function(response) {
        var reference = response.reference;
        alert('Payment complete! Reference: ' + reference);
        window.location.href="../../actions/verify.php?reference=" + reference;
      },
      onClose: function() {
        alert('Transaction was not completed, window closed.');
      },
    });
    handler.openIframe();
  }
</script>

    <!-- footer -->

</body>

</html>