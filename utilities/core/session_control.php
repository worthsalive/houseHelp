<?php
session_start();
ob_clean();
$admin -> is_login = false;
$executive -> is_login = false;
$seeker -> is_login = false;

if(isset($_SESSION['admin']) && isset($_SESSION['admin_id'])){
    $admin -> set_uname(ucwords($_SESSION['admin']));
    $admin -> set_id(ucwords($_SESSION['admin_id']));
    $admin -> is_login = true;
    
  /*  $admin -> is_default = ucwords($_SESSION['is_default']);
    $admin -> privillage = ucwords($_SESSION['admin_priv']);*/
    
}

//Controll Executive Session
if(isset($_SESSION['executive']) && isset($_SESSION['executive_id'])){
    $executive -> set_uname(ucwords($_SESSION['executive']));
    $executive -> set_id(ucwords($_SESSION['executive_id']));
    $executive -> is_login = true;
    
    
}

//Control bidder session
if(isset($_SESSION['seeker']) &&  isset($_SESSION['regid'])){
    $seeker -> set_uname(ucwords($_SESSION['seeker']));
    $seeker -> set_id($_SESSION['regid']);
    $seeker -> is_login = true;
    $seeker ->pix = $_SESSION['pix'];
    $seeker -> is_login = true;
   /* $seeker ->fname = $_SESSION['bidder_fname'];
    $fullname = "$bidder->lname $bidder->fname";*/
}

//used on the login page to check if a member is already logged in. if yes he is redirected to his account page
function check_seeker_already_logged_in(){
    if(isset($_SESSION['seeker']) && isset($_SESSION['seeker_id'])){
        redirect("seeker");
    }
}

//used on other pages to check if a member logged in or not. if not he is redirected to the login page.
function check_seeker_not_logged_in(){
    if(!isset($_SESSION['bidder']) && !isset($_SESSION['bidder_id'])){
        echo "<script>Materialize.toast('please Login to access this page',4000);</script>";
        redirect("signin.php");
    }
}

?>