<?php
require_once "../../utilities/core/init.php";
if(isset($_REQUEST)){
    foreach($_REQUEST as $key => $val){
        $$key = $val;
        //$values[] = clean($con,$val,false);
            
    }
    //fetch user details
    $enc_pass = md5($pass);
    $qry = $executive ->query("SELECT * FROM executive where exid = '$uname' and pass = '$enc_pass'");
    if($executive -> affected_rows($qry) > 0){
        $rec = $executive -> fetch($qry);
        $_SESSION['executive'] = $rec[0]['fullname'];
        $_SESSION['executive_id'] = $rec[0]['exid'];
       
        echo "ok";
    }else{
        echo "Invalid Login Credentials";
    }
}
?>