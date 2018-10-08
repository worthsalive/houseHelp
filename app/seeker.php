<?php require_once "../utilities/core/init.php";
?>
<!doctype html>
<html lang="en">
<head>
    <title><?php echo $config -> site_title;?> - House help</title>
    <?php require "inc/header_default.php";?>
    </head>
    <body>
   
        <div class="container-fluid">
            <!--SIDENAVE SECTION-->
            <div class="fade-black sidenav">
            <?php require_once "inc/sidenav.php"; ?>
            </div>
            <!--END OF SIDENAVE SECTION-->
            
            <!--MAIN CONTENT SECTION-->
       <div class=" fade-black main">
            <?php require_once "inc/header.php";?>
           
            <div class="row">
                
            <div class="col col-md-12">
                <?php
                //check if the user is approved
                
                    //check url to include a page
                    if(isset($_GET['view'])){
                        $page = htmlspecialchars($_GET['view']);
                        include_once "seek_views/$page.php";
                    }else{//if page not set
                        //display user profile
                        $profile = $admin -> get_record('admin_id',$admin -> id);
                        ?>
                <div class=" panel-default">
                
                    <div class="panel-bod fade-wh">
                    <div class="jumbotrn">
                        <div class="alert  alert-success">
                        <h1>WELCOME TO ONLINE HOUSE HELP RECRUITMENT PORTAL</h1>
                            <P>with smart data you can easily get hired by busy exexutives</P>
                        </div>
                        
                        
                        <?php
                         //check if an applicant is recruited
                        $db -> set_entity("recruited");
                        //prepare search string
                        $str = "SELECT * FROM  {$db -> table} WHERE seeker_id = '{$seeker -> id}'";
                        $search = $db -> fetch($db -> query($str));
                        if(count($search) >0){
                            for($x=0; $x < count($search); $x++){
                                $job_id = $search[$x]['job_id'];
                                $executive_id = $search[$x]['executive_id'];
                                //fetch the job details
                                $jrec = $job -> get_record("job_id",$job_id);//get job record
                                $job_t = $jrec[0]['title'];//get and store job title
                                //fetch the executive record
                                $erec = $executive -> get_record("exid",$executive_id);
                                $busy_executive = "<a href='seeker?view=executive_profile&executive={$erec[0]['executive_id']}'>".$erec[0]["fullname"]."</a>";
                            }
                            echo "
                            <div class='alert alert-info'>
                            <h3>You have been Recruited by $busy_executive for the job titled <a href = 'seeker?view=jobs_profile&job={$job_id}&executive={$erec[0]['executive_id']}'>$job_t</a></h3>
                            <p>Just wait patiently for him to contact you for interview and other recruitment processes. Goodluck
                            </div>";
                        }
    
                        ?>
                        
                        
                        <div class="alert alert-info">
                        <h2>Things You can do  with your account</h2>
                            <p class="help-block">
                            This platform Provides you the smarter way of searching for your dream job as a house help.
                                <li>You can  view all available house help job .</li>
                                <li>opportunities without having to work around under the sun.</li>
                                
                                <li>You can apply for any job of your choice right from the comform of your home.</li>
                                
                                <li>This platform can easily link you up with thousands of busy executives who are drastically in need of house help.</li>
                                
                            </p>
                            
                            <p class="center-text">
                            <a href="seeker?view=jobs" class="btn btn-lg btn-primary ">
                            Get Started
                            </a>
                            </p>
                        </div>
                        
                        </div>
                        
                        
                    
                    </div><!--//panel-body-->
                   
                </div>
                <?php
                    }
                        ?>
                </div>
            </div>
             <?php require_once "inc/footer.php";?>
        </div><!--End of Main content-->
            <div class="row">
            <div class="col col-md-4"></div>
            <div class="col col-md-4"></div>
            <div class="col col-md-4"></div>
            </div>
            
            
        </div><!--//container-->
    </body>
</html>

