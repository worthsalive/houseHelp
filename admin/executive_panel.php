<?php require_once "../utilities/core/init.php";
if(!$executive -> is_login) redirect('index');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $config -> site_title;?> - Admin_panel</title>
    <?php require "inc/header_default.php";?>
    </head>
    <body>
    <?php require_once "inc/header.php";?>
        <div class="container-fluid">
             <?php //require_once "inc/navbar.php";?>
            <div class="row">
                
                <div class="admin-sidenav sidenav fade-white">
                    
               <?php 
                   
                    require_once "inc/navbar.php";?>
                </div>
                
                <div class="main">
                <div class="col col-md-12">
                    <?php
                if(isset($_GET['page'])){
                        $page = htmlspecialchars($_GET['page']);
                        include_once "inc/$page.php";
                    }else{//if page not set
                        
                    ?>
                     <div class="jumbotron">
                        <div class="alert  alert-success">
                        <h1>WELCOME TO ONLINE HOUSE HELP RECRUITMENT PORTAL</h1>
                            <P>with smart data you can easily get hired by busy exexutives</P>
                        </div>
                    </div>
                    <?php } ?>
                    </div>
                     <!--FOOTER SECTION-->
                    <div class="container-fluid admin">
            <?php require_once "inc/footer.php";?>
        </div>
                    <!--END OF FOOTER SECTION-->
            </div>    
               
                
            </div><!--//row-->
        </div><!--//container-->
        
    </body>
</html>