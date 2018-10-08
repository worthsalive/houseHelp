
<?php require_once "../utilities/core/init.php";
if(isset($_POST['regid'])){
    $p_id = $dbTools -> esc_str(htmlspecialchars($_POST['regid']));
    //Try getting the record of the indigene
    $indigene_rec = $indigene -> get_record('regid',$p_id);
    $found = $indigene ->get_num_records();
}else{echo "you can not view this page directory";}
?>

<!doctype html>
<html lang="en">
<head>
    <title><?php echo $config -> site_title;?> - Indigene Profile</title>
    <?php require "inc/header_default.php";?>
    </head>
    <body>
    <?php require_once "inc/header.php";?>
        <div class="container">
        
            <div class="clearfix"></div>
            <div class="row">
             <?php if($found ==1){
                echo $found;
            ?>
                <!--Display the certifcat-->
                <div class="jumbotron">
                <div class="panel panel-success">
                    <div class="panel-body">
                        <center>
                    <div class="row">
                            <div class="col col-md-12"><img src="../assets/img/nigeria-coat-of-arm.jpg" width="100px" height="auto">
                            <span class="badge pull-right">No: <?php echo $indigene_rec[0]['regid'];?></span>
                        </div>
                        
                        <div class="row">
                        <div class="col-md-12">
                            <h2 class="crt-title"><?php echo $config -> site_url;?></h2>
                            <h3 class="green-text">IMO STATE OF NIGERIA</h3>
                            <span class="pull-left">REF:______________</span>
                            <span class="pull-right">Date: <?php echo $indigene_rec[0]['reg_date'];?></span>
                            </div>
                            
                            <div class="row">
                                <div class="col col-md-2">
                                <div><img src="<?php echo $indigene_rec[0]['passport'];?>"><br>Passport</div>
                                </div>
                            <div class="col col-md-10">
                                <h3>Certificate of Identification</h3>
                                <p>This is to certify that </p>
                                <p>
                                The bearer <span><?php echo strtoupper($indigene_rec[0]['surname'])." ".strtoupper($indigene_rec[0]['f_name'])." ".strtoupper($indigene_rec[0]['o_name']);?></span> is an indigene of <span> <?php echo strtoupper($indigene_rec[0]['town']);?></span> in Ikeduru Local Government Area of Imo State Nigeria.
                                </p>
                                
                                <p>This certificate covers his/her identification as such:</p>
                                
                                <p>You are requested to give him/her every possible assistance you may be needed.</p>
                                <p>Thanks</p>
                                </div>
                                
                                <div class="row">
                                <div class="col col-md-12">
                                    <p>Note: this certificate of identification is valid only for official purpose</p>
                                    <p class="pull-right">
                                    <img src="../assets/img/sign.jpg" width="60px" height="auto"><br>
                                        Chairman<br>
                                        Idemili south Local Governement
                                    </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        
                        </center>
                    </div>
                    </div>
                </div>
                <?php
        }else{
    ?>
             <div class="alert alert-danger">
                <h2>Certificate invalid.</h2>
                 <p>The Registration Identity is not registered in our database.</p>
                </div>
                <?php
        }
             ?>              
            </div>
            
            <div class="row">
            <div class="col col-md-4"></div>
            <div class="col col-md-4"></div>
            <div class="col col-md-4"></div>
            </div>
            
             <?php require_once "inc/footer.php";?>
            
        </div><!--//container-->
    </body>
</html>