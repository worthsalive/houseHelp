
<?php require_once "../utilities/core/init.php";
if(isset($_GET['seeker'])){
    $p_id = $dbTools -> esc_str(htmlspecialchars($_GET['seeker']));
    //Try getting the record of the seeker
    $seeker_rec = $seeker -> get_record('seeker_id',$p_id);
}else{echo $seeker -> get_entity();}
?>

<!doctype html>
<html lang="en">
<head>
    <title><?php echo $config -> site_title;?> - Seeker Profile</title>
    <?php require "inc/header_default.php";?>
    </head>
    <body>
    <?php require_once "inc/header.php";?>
        <div class="container">
        <div class="row"><!--Slider row-->
           
            <div class="clearfix"></div>
            </div><!--//slider row-->
            <div class="clearfix"></div>
            <div class="row">
                
                           <div class="panel panel-default">
                    <div class="panel-heading">
                    <h1 class="panel-title">JOB SEEKER (Prospective Domestic worker) PROFILE 
                         <span class="btn btn-default pull-right" onclick="print();">Print</span>
                        <span class="btn btn-default pull-right" onclick="window.history.back();">Back</span></h1>
                        
                    </div>
                <div class="panel-body justify">
                <div class="row">
                    <div class="col col-md-4" style="text-align:center;">
                   <div class="panel panel-default">
                       <div class="panel-body">
                        <h4>Seeker's Passport</h4>
                        <img src="<?php echo "../app/".$seeker_rec[0]['passport'];?>" alt="Profile picture of <?php echo $seeker_rec[0]['lastname'];?>" style="width:300px;height:300px;" class="img-responsive img-thumbnail">
                        <div style="text-align:justify;">
                        <p><strong>Seeker full Name: </strong><?php echo "{$seeker_rec[0]['lastname']} {$seeker_rec[0]['othernames']}";?></p>
                        <p><strong>Gender: </strong><?php echo $seeker_rec[0]['sex'];?></p>
                        <p><strong>Marital Status: </strong><?php echo $seeker_rec[0]['m_status'];?></p>
                        <p><strong>Residental Address: </strong><?php echo $seeker_rec[0]['raddress'];?></p>
                        <p><strong>Parmanent Home Address: </strong><?php echo $seeker_rec[0]['paddress'];?></p>
                       </div>
                       </div>
                    </div>
                    </div>
                    
                    <div class="col col-md-8">
                    <table border="0" class="table table-striped table-condensed display">
                        <caption><h4>More Details</h4></caption>
                         <tr>
                          <td colspan="2"><b>CONTACT DETAILS</b></td>
                        </tr>
                        <tr>
                            <td>Phone:</td>
                             <?php //$date = date_create($seeker_rec[0]['date_of_judgement']);?>
                            <td><?php  echo $seeker_rec[0]['phone'];// date_format($date,'D jS M, Y');?></td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td><?php echo $seeker_rec[0]['email'];?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><b>OTHER INFO</b></td>
                        </tr>
                        <tr>
                            <td>State of Origin</td>
                            <td><?php echo $seeker_rec[0]['state_of_o'];?></td>
                        </tr>
                        <tr>
                            <td>Local Government:</td>
                            <td><?php echo $seeker_rec[0]['lga'];?></td>
                        </tr>
                       
                        
                         <tr>
                            <td>Eduction:</td>
                            <td><?php echo $seeker_rec[0]['education'];?></td>
                        </tr>
                         <tr>
                            <td>Job Interest:</td>
                            <td><?php echo $seeker_rec[0]['job_interest'];?></td>
                        </tr>
                        <tr>
                            <td>Hobby:</td>
                            <td><?php echo $seeker_rec[0]['hobby'];?></td>
                        </tr>
                        <tr>
                            <td>Likes:</td>
                            <td><?php echo $seeker_rec[0]['likes'];?></td>
                        </tr>
                        <tr>
                            <td>Dislikes:</td>
                            <td><?php echo $seeker_rec[0]['dislikes'];?></td>
                        </tr>
                        <tr>
                            <td>Registration Date:</td>
                            <?php $date = date_create($seeker_rec[0]['reg_date']);?>
                            <td><?php  echo date_format($date,'D jS M, Y h:i:s');?></td>
                        </tr>
                         
                        </table>
                    </div>
                    
                    </div>
                    </div>
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