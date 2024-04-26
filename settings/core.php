<?php

// Start session
session_start(); 
// For header redirection
ob_start();

// Function to check for login
function verifiedUser($username, $password, $user){
    // Verify user 
    if($user){
        // Verify password
        if (password_verify($password, $user['customer_pass'])) {
            // Start session
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $user['user_role'];
            $_SESSION['id'] = $user['customer_id'];
            $_SESSION['customer_image'] = $user['customer_image'];


            // Redirect based on role
            if($user['user_role'] == "1"){
                echo
                "
                <script>
                  alert('Admin Logged In');
                  window.location.href ='../view/frontend/index.php';
                </script>
                "; 
                exit;

            } elseif($user['user_role'] == "2"){
                echo
                "
                <script>
                  alert('Welcome');
                  window.location.href ='../view/frontend/index.php';
                </script>
                "; 
                exit;
            }

        } else {
            echo
            "
            <script>
              alert('Wrong Login Details...Failed Try Again!');
              window.location.href ='../view/frontend/index.php';
            </script>
            "; 
            exit;
        }
    }
}
       
function isLogged(){
    if(isset($_SESSION['id'])){
        return true;
    } else {
        return false;
    }
}

// Function to check if user is admin
function isAdmin(){
    if(isset($_SESSION['id']) && $_SESSION['role'] === "1"){
        return true;
    } else {
        return false;
    }
}

function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
    //whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  





























// // Start session
// session_start(); 
// // For header redirection
// ob_start();


// // Function to check for login
// function verifiedUser($username, $password, $user){
//     // Verify user 
//     if($user){
//         // Verify password
//         if (password_verify($password, $user['customer_pass'])) {
//             // Start session
//             $_SESSION['username'] = $username;
//             $_SESSION['role'] = $user['user_role'];
//             $_SESSION['id'] = $user['customer_id'];
//             $_SESSION['customer_image'] = $user['customer_image'];


//             // Redirect based on role
//             if($user['user_role'] == "1"){
//                 echo
//                 "
//                 <script>
//                   alert('Admin Logged In');
//                   window.location.href ='../view/frontend/index.php';
//                 </script>
//                 "; 
//                 exit;

//             } elseif($user['user_role'] == "2"){
//                 echo
//                 "
//                 <script>
//                   alert('Welcome');
//                   window.location.href ='../view/frontend/index.php';
//                 </script>
//                 "; 
//                 exit;
//             }

//         } else {
//             echo
//             "
//             <script>
//               alert('Wrong Login Details...Failed Try Again!');
//               window.location.href ='../view/frontend/index.php';
//             </script>
//             "; 
//             exit;
//         }
//     }
// }
       
// function isLogged(){
//     if(isset($_SESSION['id'])){
//         return true;
//     } else {
//         return false;
//     }
// }

// // Function to check if user is admin
// function isAdmin(){
//     if(isset($_SESSION['id']) && $_SESSION['role'] === "1"){
//         return true;
//     } else {
//         return false;
//     }
// }

// function getIPAddress() {  
//     //whether ip is from the share internet  
//      if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
//                 $ip = $_SERVER['HTTP_CLIENT_IP'];  
//         }  
//     //whether ip is from the proxy  
//     elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
//                 $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
//      }  
//     //whether ip is from the remote address  
//     else{  
//              $ip = $_SERVER['REMOTE_ADDR'];  
//      }  
//      return $ip;  
// }  


?>
