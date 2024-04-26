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
          <div class="row align-items-center justify-content-between g-3 mb-4">
            <div class="col-auto">
              <h2 class="mb-0">Customer details</h2>
            </div>
            <div class="col-auto">
              <div class="row g-3">
                <div class="col-auto"><button class="btn btn-phoenix-danger"><span class="fa-solid fa-trash-can me-2"></span>Delete customer</button></div>
                <div class="col-auto"><button class="btn btn-phoenix-secondary"><span class="fas fa-key me-2"></span>Reset password</button></div>
              </div>
            </div>
          </div>

          <div class="row g-5">
            <div class="col-12 col-xxl-4">
              <div class="row g-3 g-xxl-0 h-100">
                
                <div class="col-12 col-md-7 col-xxl-12 mb-xxl-3">
                  <div class="card h-100">
                    <div class="card-body d-flex flex-column justify-content-between pb-3">
                      <div class="row align-items-center g-5 mb-3 text-center text-sm-start">
                        <div class="col-12 col-sm-auto mb-sm-2">
                          <div class="avatar avatar-5xl"><img class="rounded-circle" src="../../../assets/img/team/15.webp" alt="" /></div>
                        </div>
                        <div class="col-12 col-sm-auto flex-1">
                          <h3>Ansolo Lazinatov</h3>
                          <p class="text-body-secondary">Joined 3 months ago</p>
                          <div><a class="me-2" href="#!"><span class="fab fa-linkedin-in text-body-quaternary text-opacity-75 text-primary-hover"></span></a><a class="me-2" href="#!"><span class="fab fa-facebook text-body-quaternary text-opacity-75 text-primary-hover"></span></a><a href="#!"><span class="fab fa-twitter text-body-quaternary text-opacity-75 text-primary-hover"></span></a></div>
                        </div>
                      </div>
                      <div class="d-flex flex-between-center border-top border-dashed pt-4">
                        <div>
                          <h6>Following</h6>
                          <p class="fs-7 text-body-secondary mb-0">297</p>
                        </div>
                        <div>
                          <h6>Projects</h6>
                          <p class="fs-7 text-body-secondary mb-0">56</p>
                        </div>
                        <div>
                          <h6>Completion</h6>
                          <p class="fs-7 text-body-secondary mb-0">97</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>


                <div class="col-12 col-md-5 col-xxl-12 mb-xxl-3">
                  <div class="card h-100">
                    <div class="card-body pb-3">
                      <div class="d-flex align-items-center mb-3">
                        <h3 class="me-1">Default Address</h3><button class="btn btn-link p-0"><span class="fas fa-pen fs-8 ms-3 text-body-quaternary"></span></button>
                      </div>
                      <h5 class="text-body-secondary">Address</h5>
                      <p class="text-body-secondary">Shatinon Mekalan<br />Vancouver, British Columbia<br />Canada</p>
                      <div class="mb-3">
                        <h5 class="text-body-secondary">Email</h5><a href="mailto:shatinon@jeemail.com">shatinon@jeemail.com</a>
                      </div>
                      <h5 class="text-body-secondary">Phone</h5><a class="text-body-secondary" href="tel:+1234567890">+1234567890</a>
                    </div>
                  </div>
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