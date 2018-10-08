<?php require_once "../utilities/core/init.php";
?>
<!doctype html>
<html lang="en">
<head>
    <title><?php echo $config -> site_title;?> - House help</title>
    <?php require "inc/header_default.php";?>
    </head>
    <body>
    <?php require_once "inc/header.php";?>
        <div class="container">
       
            <div class="row">
                
            <div class="col col-md-12">
                <?php
                //check if the user is approved
                
                    //check url to include a page
                    if(isset($_GET['page'])){
                        $page = htmlspecialchars($_GET['page']);
                        include_once "inc/$page.php";
                    }else{//if page not set
                        //display user profile
                        $profile = $admin -> get_record('admin_id',$admin -> id);
                        ?>
                <div class="panel panel-primary">
                
                    <div class="panel-body">
                    <div class="jumbotron">
                        <div class="alert  alert-success">
                        <h1>WELCOME TO ONLINE HOUSE HELP RECRUITPMENT PORTAL</h1>
                            <P>with smart data you can easily get hired by busy exexutives</P>
                        </div>
                        </div>
                        
                        
                    
                    </div><!--//panel-body-->
                   
                </div>
                <?php
                    }
                        ?>
                </div>
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

