<?php

require_once(__DIR__ . "/../../settings/core.php");
require_once(__DIR__ . "/../../actions/product.php");
require_once(__DIR__ . "/../../controllers/general_controller.php");
require_once(__DIR__ . "/../../functions/general_function.php");



// require_once(__DIR__ . "\\..\\..\\functions\\general_function.php");
// require_once(__DIR__ . "\\..\\..\\settings\\core.php");

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
    </head>

    <body>


        <!-- Spinner Start -->
        <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" role="status"></div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar start -->
        <div class="container-fluid fixed-top">
            <div class="container px-0">
                <nav class="navbar navbar-light bg-white navbar-expand-xl">
                    <a href="index.php" class="navbar-brand"><h1 class="text-primary display-6">BetterMeats</h1></a>
                    <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars text-primary"></span>
                    </button>
                    <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                        <div class="navbar-nav mx-auto">
                            <a href="index.php" class="nav-item nav-link active">Home</a>
                            <a href="shop.php" class="nav-item nav-link">Shop</a>
                            <a href="contact.php" class="nav-item nav-link">Contact</a>

                            <?php 
                            
                                if(isAdmin()){
                                echo '<a href="../adminSide/index.php" class="nav-item nav-link">Admin Dashboard</a>';
                                }

                            ?>

                        </div>

                        <div class="d-flex m-3 me-0">
                            <button class="btn-search btn border border-secondary btn-md-square rounded-circle bg-white me-4" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fas fa-search text-primary"></i></button>
                            <a href="cart.php" class="position-relative me-4 my-auto">
                                <i class="fa fa-shopping-bag fa-2x"></i>

                                <?php 
                                    numItemsCart();
                                 ?>

                            </a>
                            <?php 

                            if(!isLogged()){
                                ?>
                                 <a href="../adminSide/sign-in.php" class="my-auto">
                                 <i class="fas fa-user fa-2x"></i>
                                 
                             </a>
                             
                             <h6>Guest</h6>

                             <?php

                            }
                            else{

                            ?>
                            <a href="../adminSide/sign-up.php" class="my-auto">
                                <i class="fas fa-user fa-2x"></i>            
                            </a>
                            
                            <a href="../../actions/logout.php?logout=yes"><?php echo $_SESSION['username']?></a>

                            <?php

                            }
                            ?>
                            
                        </div>
                    </div>
                </nav>
            </div>
        </div>

        <!-- Navbar End -->

        <!-- Modal Search Start -->

    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content rounded-0">

            <form method="post" action="displaySearchedProducts.php">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body d-flex align-items-center">
                    <div class="input-group w-75 mx-auto d-flex">
                        <input type="text" class="form-control p-3" id="keywords" name="keywords" placeholder="Keywords" aria-describedby="search-icon-1" required>
                        <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                    </div>
                </div>
            </form>

        </div>
    </div>
    
    </div>

        <!-- Back to Top -->
        <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>   
        
    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    </body>

</html>