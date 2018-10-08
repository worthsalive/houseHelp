<?php
require_once "../utilities/core/init.php";
if(isset($_REQUEST)){
    foreach($_REQUEST as $key => $val){
        $$key = $val;
        //$values[] = clean($con,$val,false);
            
    }
    //match password
    if($pass1 != $pass2){
        echo "Pass Mismatch Please try again";exit();
    }
    
    //check if usrname and email exists
    
    
    //prpare data for storage
    $flds = ['fullname','username','password','phone','email','status'];
    //$time="now()";
    $values = [$full_name,$username,md5($pass2),$phone,$email,'unapproved'];
    //store data
    $insert = $user -> add($flds,$values);
    if($insert){
        echo "Your Registration was Success. Please wait for admin approval";
    }
}
?>