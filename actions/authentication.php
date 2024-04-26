<?php
// Include necessary files
// require_once("../settings/core.php");

require_once("../controllers/general_controller.php");


if(isset($_POST['userAuth'])) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Retrieve form data
        $name = $_POST['username'];
        $email = $_POST['email'];
        $country = $_POST['country'];
        $city = $_POST['city'];
        $contact = $_POST['contact'];
        $password = $_POST['password'];
        $cpass = $_POST['confirm_password'];
        $role = '2';

    // image 
    if($_FILES["file"]["error"] == 4){
        echo
        "<script> alert('Image Does Not Exist'); </script>";
    }
    else
    {
        $fileName = $_FILES["file"]["name"];
        $fileSize = $_FILES["file"]["size"];
        $tmpName = $_FILES["file"]["tmp_name"];
        $validImageExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $fileName);
        $imageExtension = strtolower(end($imageExtension));

        if ( !in_array($imageExtension, $validImageExtension) ){
            echo
            "
            <script>
              alert('Invalid Image Extension');
            </script>
            ";
        }
        else if($fileSize > 1000000){
        echo
        "
        <script>
            alert('Image Size Is Too Large');
        </script>
        ";
        } else{
            $newImageName = uniqid();
            $newImageName .= '.' . $imageExtension;
            move_uploaded_file($tmpName, '../upload/' . $newImageName);
            if(check_duplicate_infor($email, $contact) > 0){
                echo
                "
                <script>
                  alert('Invalid User');
                  window.location.href ='../view/frontend/index.php';
                </script>
                "; 
            }else{
                if ($password != $cpass) { 
                    echo("Error... Passwords do not match"); 
                    exit; 
                }else{
                    // hashed password
                    $pass = password_hash($password, PASSWORD_DEFAULT);
                    register($name, $email, $country, $city, $contact, $pass, $newImageName, $role);
                    echo
                    "
                    <script>
                    alert('User Successfully Registered');
                    </script>
                    ";
                    }
                }
            }
        }  
    }
}


if(isset($_POST['adminAuth'])) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve form data
        $name = $_POST['username'];
        $email = $_POST['email'];
        $country = $_POST['country'];
        $city = $_POST['city'];
        $contact = $_POST['contact'];
        $password = $_POST['password'];
        $cpass = $_POST['confirm_password'];
        $role = '1';
        // image 
    if($_FILES["file"]["error"] == 4){
        echo
        "<script> alert('Image Does Not Exist'); </script>";
    } else {
        $fileName = $_FILES["file"]["name"];
        $fileSize = $_FILES["file"]["size"];
        $tmpName = $_FILES["file"]["tmp_name"];
        $validImageExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $fileName);
        $imageExtension = strtolower(end($imageExtension));
        if ( !in_array($imageExtension, $validImageExtension) ){
            echo
            "
            <script>
              alert('Invalid Image Extension');
            </script>
            ";
        } else if($fileSize > 1000000) {
        echo
        "
        <script>
            alert('Image Size Is Too Large');
        </script>
        ";
        } else {
            $newImageName = uniqid();
            $newImageName .= '.' . $imageExtension;
            move_uploaded_file($tmpName, '../upload/' . $newImageName);
            if(check_duplicate_infor($email, $contact) > 0){
                echo
                    "
                    <script>
                        alert('Invalid Inputs');
                        window.location.href ='../view/adminSide/index.php';
                    </script>
                    "; 
            } else {
                // check if the passwords are the same
                if ($password != $cpass) { 
                    echo("Error... Passwords do not match"); 
                    exit; 
                } else {
                    // password hashing
                    $pass = password_hash($password, PASSWORD_DEFAULT);
                    register($name, $email, $country, $city, $contact, $pass, $newImageName, $role);
                    echo
                    "
                    <script>
                        alert('Admin Successfully Registered');
                        window.location.href ='../view/adminSide/index.php';
                    </script>
                    ";
                    }
                }
            }
        }
    }
}

if(isset($_POST['loginAuth'])) {
    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user = user_login($username, $password);
    if($user==null){
        echo
        "
        <script>
        window.location.href ='../view/frontend/index.php';
          alert('User Not Found');
          
        </script>
        "; 
        exit;
    }else{
        verifiedUser($username, $password, $user);
    }
}

?>