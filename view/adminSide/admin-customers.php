<?php
require_once(__DIR__ . "/../../functions/admin_functions.php");

?>

<!DOCTYPE html>
<html data-navigation-type="default" data-navbar-horizontal-shape="default" lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>BetterMeats</title>

    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicons/favicon.ico">
    <link rel="manifest" href="assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">
    <script src="vendors/simplebar/simplebar.min.js"></script>
    <script src="assets/js/config.js"></script>

    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&amp;display=swap" rel="stylesheet">
    <link href="vendors/simplebar/simplebar.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link href="assets/css/theme-rtl.min.css" type="text/css" rel="stylesheet" id="style-rtl">
    <link href="assets/css/theme.min.css" type="text/css" rel="stylesheet" id="style-default">
    <link href="assets/css/user-rtl.min.css" type="text/css" rel="stylesheet" id="user-style-rtl">
    <link href="assets/css/user.min.css" type="text/css" rel="stylesheet" id="user-style-default">

    <script>
      var phoenixIsRTL = window.config.config.phoenixIsRTL;
      if (phoenixIsRTL) {
        var linkDefault = document.getElementById('style-default');
        var userLinkDefault = document.getElementById('user-style-default');
        linkDefault.setAttribute('disabled', true);
        userLinkDefault.setAttribute('disabled', true);
        document.querySelector('html').setAttribute('dir', 'rtl');
      } else {
        var linkRTL = document.getElementById('style-rtl');
        var userLinkRTL = document.getElementById('user-style-rtl');
        linkRTL.setAttribute('disabled', true);
        userLinkRTL.setAttribute('disabled', true);
      }
    </script>

    <link href="vendors/leaflet/leaflet.css" rel="stylesheet">
    <link href="vendors/leaflet.markercluster/MarkerCluster.css" rel="stylesheet">
    <link href="vendors/leaflet.markercluster/MarkerCluster.Default.css" rel="stylesheet">

  </head>

  <body>
    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">

    <!-- ===============================================-->
    <!--    navBar Content-->
    <!-- ===============================================-->
    <?php include "navbar.php"  ?>


      <div class="content">
        
        <!-- ===============================================-->
        <!--    Main Body Content Goes Here-->
        <!-- ===============================================-->


        <nav class="mb-2" aria-label="breadcrumb">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="#!">Page 1</a></li>
            <li class="breadcrumb-item"><a href="#!">Page 2</a></li>
            <li class="breadcrumb-item active">Default</li>
          </ol>
        </nav>


        <div class="mb-9">
          <div class="row g-2 mb-4">
            <div class="col-auto">
              <h2 class="mb-0">Customers</h2>
            </div>
          </div>
          <ul class="nav nav-links mb-3 mb-lg-2 mx-n3">
            <li class="nav-item"><a class="nav-link active" aria-current="page" href="#"><span>All </span><span class="text-body-tertiary fw-semibold">(68817)</span></a></li>
            <li class="nav-item"><a class="nav-link" href="#"><span>New </span><span class="text-body-tertiary fw-semibold">(6)</span></a></li>
            <li class="nav-item"><a class="nav-link" href="#"><span>Abandoned checkouts </span><span class="text-body-tertiary fw-semibold">(17)</span></a></li>
            <li class="nav-item"><a class="nav-link" href="#"><span>Locals </span><span class="text-body-tertiary fw-semibold">(6,810)</span></a></li>
            <li class="nav-item"><a class="nav-link" href="#"><span>Email subscribers </span><span class="text-body-tertiary fw-semibold">(8)</span></a></li>
            <li class="nav-item"><a class="nav-link" href="#"><span>Top reviews </span><span class="text-body-tertiary fw-semibold">(2)</span></a></li>
          </ul>
          <div id="products" data-list='{"valueNames":["customer","email","total-orders","total-spent","city","last-seen","last-order"],"page":10,"pagination":true}'>
            <div class="mb-4">
              <div class="row g-3">
                <div class="col-auto">
                  <div class="search-box">
                    <form class="position-relative"><input class="form-control search-input search" type="search" placeholder="Search customers" aria-label="Search" />
                      <span class="fas fa-search search-box-icon"></span>
                    </form>
                  </div>
                </div>
                <div class="col-auto scrollbar overflow-hidden-y flex-grow-1">
                  <div class="btn-group position-static" role="group">
                    <div class="btn-group position-static text-nowrap"><button class="btn btn-phoenix-secondary px-7 flex-shrink-0" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"> Country<span class="fas fa-angle-down ms-2"></span></button>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">US</a></li>
                        <li><a class="dropdown-item" href="#">Uk</a></li>
                        <li><a class="dropdown-item" href="#">Australia</a></li>
                      </ul>
                    </div>
                    <div class="btn-group position-static text-nowrap"><button class="btn btn-sm btn-phoenix-secondary px-7 flex-shrink-0" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"> VIP<span class="fas fa-angle-down ms-2"></span></button>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">VIP 1</a></li>
                        <li><a class="dropdown-item" href="#">VIP 2</a></li>
                        <li><a class="dropdown-item" href="#">VIP 3</a></li>
                        <li></li>
                      </ul>
                    </div><button class="btn btn-phoenix-secondary px-7 flex-shrink-0">More filters</button>
                  </div>
                </div>
                <div class="col-auto"><button class="btn btn-link text-body me-4 px-0"><span class="fa-solid fa-file-export fs-9 me-2"></span>Export</button><button class="btn btn-primary"><span class="fas fa-plus me-2"></span>Add customer</button></div>
              </div>
            </div>
            <div class="mx-n4 px-4 mx-lg-n6 px-lg-6 bg-body-emphasis border-top border-bottom border-translucent position-relative top-1">
              <div class="table-responsive scrollbar-overlay mx-n1 px-1">
                
              <table class="table table-sm fs-9 mb-0">
                  <thead>
                    <tr>
                      <th class="white-space-nowrap fs-9 align-middle ps-0">
                        <div class="form-check mb-0 fs-8"><input class="form-check-input" id="checkbox-bulk-customers-select" type="checkbox" data-bulk-select='{"body":"customers-table-body"}' /></div>
                      </th>
                      <th class="sort align-middle pe-5" scope="col" data-sort="customer" style="width:10%;">PROFILE </th>
                      <!-- <th class="sort align-middle text-end" scope="col" data-sort="total-orders" style="width:10%">NAME</th>
                     -->
                     <th class="sort align-middle pe-5" scope="col" data-sort="email" style="width:20%;">NAME</th>

                      <th class="sort align-middle pe-5" scope="col" data-sort="email" style="width:20%;">EMAIL</th>
                      <th class="sort align-middle text-end ps-3" scope="col" data-sort="total-spent" style="width:10%">TOTAL SPENT</th>
                      <th class="sort align-middle ps-7" scope="col" data-sort="city" style="width:25%;">TOTAL SPENT</th>
                      <th class="sort align-middle text-end" scope="col" data-sort="last-seen" style="width:15%;">CITY</th>
                      <th class="sort align-middle text-end pe-0" scope="col" data-sort="last-order" style="width:10%;min-width: 150px;">COUNTRY</th>
                    </tr>
                  </thead>

                  <tbody class="list" id="customers-table-body">
                    <?php echo adminShowCustomers() ?>

                  </tbody>
                  
                </table>
              </div>
              <div class="row align-items-center justify-content-between py-2 pe-0 fs-9">
                <div class="col-auto d-flex">
                  <p class="mb-0 d-none d-sm-block me-3 fw-semibold text-body" data-list-info="data-list-info"></p><a class="fw-semibold" href="#!" data-list-view="*">View all<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a><a class="fw-semibold d-none" href="#!" data-list-view="less">View Less<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                </div>
                <div class="col-auto d-flex"><button class="page-link" data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
                  <ul class="mb-0 pagination"></ul><button class="page-link pe-0" data-list-pagination="next"><span class="fas fa-chevron-right"></span></button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- ===============================================-->
        <!--    Footer Content-->
        <!-- ===============================================-->
        <?php include "footer.php"  ?>
      </div>
      <?php include "chatbot.php"  ?>
    </main>
    
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->

    
    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="vendors/popper/popper.min.js"></script>
    <script src="vendors/bootstrap/bootstrap.min.js"></script>
    <script src="vendors/anchorjs/anchor.min.js"></script>
    <script src="vendors/is/is.min.js"></script>
    <script src="vendors/fontawesome/all.min.js"></script>
    <script src="vendors/lodash/lodash.min.js"></script>
    <script src="../../../polyfill.io/v3/polyfill.min58be.js?features=window.scroll"></script>
    <script src="vendors/list.js/list.min.js"></script>
    <script src="vendors/feather-icons/feather.min.js"></script>
    <script src="vendors/dayjs/dayjs.min.js"></script>
    <script src="assets/js/phoenix.js"></script>
    <script src="vendors/echarts/echarts.min.js"></script>
    <script src="vendors/leaflet/leaflet.js"></script>
    <script src="vendors/leaflet.markercluster/leaflet.markercluster.js"></script>
    <script src="vendors/leaflet.tilelayer.colorfilter/leaflet-tilelayer-colorfilter.min.js"></script>
    <script src="assets/js/ecommerce-dashboard.js"></script>

  </body>
</html>