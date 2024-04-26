<?php
require_once('../settings/core.php');

if(isset($_GET['logout'])) {
    session_destroy();
    echo
    "
    <script>
      alert('Logged Out');
      window.location.href ='../view/frontend/index.php';
    </script>
    "; 
}

?>
