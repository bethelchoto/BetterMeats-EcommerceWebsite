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
       
        <div class="container">
            <div class="row flex-center">
              <div class="col-sm-10 col-md-8 col-lg-5 col-xl-5 col-xxl-3">
                <form method="post" action="../../actions/authentication.php" enctype="multipart/form-data">
                  <h3 class="text-body-highlight">Add Admin</h3>
                  <div class="mb-3 text-start"><label class="form-label" for="name">Name</label><input class="form-control" id="username" name="username" required type="text" placeholder="Name" /></div>
                
                  <div class="row g-3 mb-3">
                    <div class="col-sm-6"><label class="form-label" for="email">Email address</label><input class="form-control form-icon-input" id="email" name="email" required type="email" placeholder="name@gmail.om" /></div>
                    <div class="col-sm-6"><label class="form-label" for="contact">Phone Number</label><input class="form-control form-icon-input" id="contact" name="contact" required type="text" placeholder="0781029728" /></div>
                  </div>
                  
                  <div class="row g-3 mb-3">
                    <div class="col-sm-6"><label class="form-label" for="password">Country</label><input class="form-control form-icon-input" id="country" name="country" required type="text" placeholder="Country" /></div>
                    <div class="col-sm-6"><label class="form-label" for="confirmPassword">City</label><input class="form-control form-icon-input" id="city" name="city" required type="text" placeholder="City" /></div>
                  </div>

                  <div class="row g-3 mb-3">
                    <div class="col-sm-6"><label class="form-label" for="password">Password</label><input class="form-control form-icon-input" id="password" name="password" required type="password" placeholder="Password" /></div>
                    <div class="col-sm-6"><label class="form-label" for="confirmPassword">Confirm Password</label><input class="form-control form-icon-input" id="confirm_password" name="confirm_password" required type="password" placeholder="Confirm Password" /></div>
                  </div>

                  <h6 class="mb-3">Upload Profile</h6>
                  <div class="form-group" style="margin-bottom: 20px;">  
                      <input type="file" name="file" id="image" accept=".jpg, .jpeg, .png" class="form-control">
                  </div>
                  <button class="btn btn-primary w-100 mb-3" name="adminAuth">Register</button>
                </form>

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