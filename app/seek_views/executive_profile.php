
<?php require_once "../utilities/core/init.php";
if(isset($_GET['executive'])){
    $p_id = $dbTools -> esc_str(htmlspecialchars($_GET['executive']));
    //Try getting the record of the executive
    $executive_rec = $executive -> get_record('executive_id',$p_id);
}else{echo $executive -> get_entity();}
?>

<!doctype html>
<html lang="en">
<head>
    <title><?php echo $config -> site_title;?> - Executive Profile</title>
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
                    <h1 class="panel-title">BUSY EXECUTIVE (Prospective Domestic work Employer) PROFILE 
                         <span class="btn btn-default pull-right" onclick="print();">Print</span>
                        <span class="btn btn-default pull-right" onclick="window.history.back();">Back</span></h1>
                        
                    </div>
                <div class="panel-body justify">
                <div class="row">
                    <div class="col col-md-4" style="text-align:center;">
                   <div class="panel panel-default">
                       <div class="panel-body">
                        <h4>Executive's Passport</h4>
                        <img src="<?php echo "../app/".$executive_rec[0]['passport'];?>" alt="Profile picture of <?php echo $executive_rec[0]['fullname'];?>" style="width:300px;height:300px;" class="img-responsive img-thumbnail">
                        <div style="text-align:justify;">
                        <p><strong>Executive full Name: </strong><?php echo "{$executive_rec[0]['fullname']}";?></p>
                        <p><strong>Gender: </strong><?php echo $executive_rec[0]['sex'];?></p>
                        <p><strong>Marital Status: </strong><?php echo $executive_rec[0]['m_status'];?></p>
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
                             <?php //$date = date_create($executive_rec[0]['date_of_judgement']);?>
                            <td><?php  echo $executive_rec[0]['phone'];// date_format($date,'D jS M, Y');?></td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td><?php echo $executive_rec[0]['email'];?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><b>OTHER INFO</b></td>
                        </tr>
                        <tr>
                            <td>Occupation</td>
                            <td><?php echo $executive_rec[0]['occupation'];?></td>
                        </tr>
                        <tr>
                            <td>Office Address:</td>
                            <td><?php echo $executive_rec[0]['office_address'];?></td>
                        </tr>
                        <tr>
                            <td>Residential Address:</td>
                            <td><?php echo $executive_rec[0]['raddress'];?></td>
                        </tr>
                       
                        
                         <tr>
                            <td>description:</td>
                            <td><?php echo htmlspecialchars_decode($executive_rec[0]['description']);?></td>
                        </tr>
                         
                        <tr>
                            <td>Registration Date:</td>
                            <?php $date = date_create($executive_rec[0]['reg_date']);?>
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