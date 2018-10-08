
<?php require_once "../utilities/core/init.php";
//Check if user logged in
check_seeker_already_logged_in();
$msg = "";
if(isset($_POST) && $_SERVER['REQUEST_METHOD'] == "POST"){
    foreach($_REQUEST as $key => $val){
        $$key = clean($con,$val,true);
        //$values[] = clean($con,$val,false);
            
    }
    //fetch user details
    $enc_pass = md5($pass);
    $qry = $seeker ->query("SELECT * FROM {$seeker->table} where regid = '$regid'  and pass = '$enc_pass'");
    if($seeker -> affected_rows($qry) > 0){
        $rec = $seeker -> fetch($qry);
        $_SESSION['seeker'] = $rec[0]['othernames'];
        $_SESSION['regid'] = $rec[0]['regid'];
        $_SESSION['pix'] = $rec[0]['passport'];
        redirect('seeker.php');
        
    }else{
        $msg.= "<script>$.notify(\"Error! Invalid Login Details\",{className:\"error\",clickToHide:true});</script>";
    }
}
?>


<!doctype html>
<html lang="en">
<head>
    <title><?php echo $config -> site_title;?> - index</title>
    <?php require "inc/header_default.php";?>
    </head>
    <body class="fade-black">
    <?php require_once "inc/header.php";?>
        <div class="container ">
        <div class="row"><!--Slider row-->
            <div class="clearfix"></div>
            </div><!--//slider row-->
            <div class="clearfix"></div>
            <div class="row">
                
            <div class="col col-md-2 hidden-xm">&nbsp;</div>
                
            <div class="col col-md-6">
                 <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo 'signin.php';?>">
                     <div class="panel panel-default">
                    <div class="panel-heading">
                    <div class="panel-title">
                        <h2>Seeker Sign in</h2>
                        </div>
                    </div>
				<div class="panel-body">
					<!-- Text input-->
                        <div class="col col-md-12">
					
					<div class="form-group">
					  <label class="col-md-4 control-label" for="uname">Registration Id</label>  
					  <div class="col-md-6">
					  <input id="uname" name="regid" placeholder="Enter your registration id" class="form-control input-md" type="text">
					  </div>
					</div>
                    <div class="form-group">
					  <label class="col-md-4 control-label" for="crimecode">Password</label>  
					  <div class="col-md-6">
					  <input id="pass" name="pass" placeholder="Enter first name" class="form-control input-md" type="password">
					  </div>
					</div>
                  
                </div>
               
                </div>
                <div class="panel-footer">
                
                <input type="submit" value="Sign in" name="submit" class="btn btn-primary"> <a href="jailor?page=_reg_househelp">Not yet registered? create account</a>
            </div>
                     </div>
                </form>
                </div>
                <div class="col col-md-2 hidden-sm"></div>
            </div>
            <div class="row">
            <div class="col col-md-4"></div>
            <div class="col col-md-4"></div>
            <div class="col col-md-4"></div>
            </div>
            
             <?php require_once "inc/footer.php";?>
            <?php echo (isset($msg))?$msg:'';?>
        </div><!--//container-->
    </body>
</html>

