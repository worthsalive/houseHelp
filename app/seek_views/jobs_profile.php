<?php
require_once "../utilities/core/init.php";
    if (isset($_GET['job']) && isset($_GET['executive'])){
        $job_id = $dbTools -> esc_str($_GET['job']);//sanitize and store
        $executive_id = $dbTools -> esc_str($_GET['executive']);//sanitize and store
        
        //get the job record
        $job_rec = $job -> get_record($job->pk,$job_id);
        
         //get the record of the executive who posted the job
        $ex = $executive -> get_record($executive ->pk,$executive_id);
        
        //find number of applicants for the selected selected job
        $num_applicants = count($applicant -> get_record($job->pk,$job_id));
        
       
    }

//APPLY FOR WORK IF THE USER CLICKS ON THE BUTTON
if(isset($_GET['job']) && isset($_GET['seeker'])){
    $job_id =$dbTools -> esc_str($_GET['job']);//get job id from url
    $seeker = $dbTools -> esc_str($_GET['seeker']);//get the seeker id form url
    
    //check if the user has already applied for this job
    if($applicant ->is_exists([$applicant->table,"seeker"],$seeker)){
        echo "<script>$.notify(\"You have already Applied for this job.\",{className:\"success\",clickToHide:true});</script>";
    }
    else{
        //apply if the seeker have not applied before
         $field[] = "job_id";//store the job id
    $val[] = $job_id;
    
    //prepare seeker data
    $field[] = "seeker";
    $val[] = $seeker;
    //apply for the job
    if($applicant -> add($field,$val)){
        echo "<script>$.notify(\"You have successfully applied for this Job. Once You are  \",{className:\"success\",clickToHide:true});</script>";
        //take the use back to where he came from
        echo "<script>window.history.back();</script>";
    }
    }
   
}
//end of the application
?>
<div class="panel panel-primary">
<div class="panel-heading center-text">
<div class="panel-title"><h1><?php echo $job_rec[0]['title'];?></h1></div>     
</div>
<!--panel body-->
<div class="panel-body">
    <div class="row justify-text">
        <!--EXEXUTIVE DETAILS SECTION-->
    <div class="col col-sm-5">
    <h1 class="fade-black white-text title">
        Details of the Busy Executive (<?php echo $ex[0]["fullname"];?>)
        </h1>
        <div class="" style="padding:10px">
        <img src="<?php echo $ex[0]['passport'];?>" class="img-thumbnail pull-left" style="width:150px; margin-right:8px;"/>
        
        <?php
        $obj = ($ex[0]["sex"] == "male")?"his":"her";                        
        ?>
        
   <p><strong><?php echo ucwords($ex[0]["fullname"]);?></strong>(<?php echo $ex[0]["sex"];?>) resides in <?php echo $ex[0]["raddress"]; 
        echo "
         and works as {$ex[0]["occupation"]} at {$ex[0]["office_address"]}. 
         
        ";
        ?>
        </p>
        <p><strong>Contact details: </strong><br><i class="fa fa-mobile"></i> <?php echo $ex[0]["phone"]; ?><br>
            <i class="fa fa-envelope"></i> <?php echo $ex[0]["email"];?>
            
            </p>
            <p><strong>Brief Description</strong><br>
                <?php echo $ex[0]['description'];?>
            
            </p>
  </div>
    </div>
        
        <!--JOB DETAILS SECTION-->
    <div class="col col-sm-7">
        <h1 class="fade-black white-text title">Job Description</h1>
        <div>
        <?php echo htmlspecialchars_decode($job_rec[0]['description']);?>
                <div class="clearfix"></div>
            <p class="help-block" style="background:rgba(0,0,0,.2); padding:5px;">
                <?php 
                       //create a date object from the record
                    $date = date_create($job_rec[0]['reg_date']);
                    echo "Created on ".date_format($date,'D jS M, Y h:i:s');
                ?>
                
            <span class="badge pull-right"><?php echo $num_applicants;?> interests</span>
            </p>
        </div>
    </div>
    <!--//JOB DETAILS SECTION-->
    </div>
    <!--//EXEXUTIVE DETAILS SECTION-->
</div>
    <!--//panel body-->
    <div class="panel-footer" style="text-align:right">
    <button class="btn btn-lg btn-default" onclick="window.history.back();">&laquo; Back</button>
    <a  href="seeker?view=jobs_profile&job=<?php echo $job_id; ?>&seeker=<?php echo $seeker ->get_id();?>&executive=<?php echo $executive_id; ?>";
       class="btn btn-lg btn-primary" onclick="window.history.back();" data-toogle="tooltip"
       title="Click to declare interest and apply for this job">
        I'm Intersted in this job
        </a>
    </div>
<!--Panel footer-->
</div>
<script>
$(document).ready(function(){
    $("[data-toogle='tooltip']").tooltip();
})
</script>