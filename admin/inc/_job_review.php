<?php
if(isset($_GET['job'])){
    //RECRUITMENT PROCESS
    if(isset($_GET['seeker']) && isset($_GET['recruit'])){
        $sid = $dbTools -> esc_str($_GET['seeker']);
        $job_id = $dbTools -> esc_str($_GET['job']);
        
        //submit the details
        $db -> set_entity('recruited');//set the table to use
        $fields =["job_id","executive_id","seeker_id"];//set fields
        $values = [$job_id,$executive -> id,$sid];
        //insert into database
        if($db -> add($fields,$values)){
             echo "<script>$.notify(\"Recruitment Successfull \",{className:\"success\",clickToHide:true});</script>";
        }
        else{ echo "<script>$.notify(\"Recruitment Failed \",{className:\"success\",clickToHide:true});</script>";}
    }
    //END OF RECRUTMENT PROCESS
    
    
    $job_id = $dbTools -> esc_str($_GET['job']);
    //fetch the job details
    $job_rec = $job -> get_record($job->pk,$job_id);
     //get the record of the executive who posted the job
        $applicants = $applicant -> get_record($job->pk,$job_id);
        
        //find number of applicants for the selected selected job
        $num_applicants = count($applicant -> get_record($job->pk,$job_id));
    
   
    ?>

    
    <div class="panel panel-primary">
<div class="panel-heading center-text">
<div class="panel-title"><h1><?php echo $job_rec[0]['title'];?>
    
                        <span class="btn btn-info pull-right" onclick="window.history.back();">Back</span>
    </h1></div>     
</div>
<!--panel body-->
    <div class="panel-body">
        <!--Job details-->
        <div class="col col-md-5">
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
        <!-- end of job details-->
        
        <!--applicants details-->
        <div class="col col-md-7">
          <table class="table display table-hovered table-stripped" id="seeker_tbl">
              <caption><h2>List of Applicants</h2></caption>
        <thead>
        <tr>
            <th>S/N</th>
            <th>Last Name</th>
            <th>Other Names</th>
            <th>Registration Id</th>
            <th>Gender</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Education</th>
            <th>passport</th>
            <th>Registered Date</th>
            <th>Actions</th>
            <!--<th>&nbsp;</th>-->
            </tr>
        </thead>
        <tbody>
        <?php
    for($y=0; $y < count($applicants);$y++){
        $seeker_id = $applicants[$y]["seeker"];
        //get the details of the seekers
        $seekers = $seeker ->fetch($seeker->query("select * from seeker where regid = '$seeker_id'   "));
        $sid = $seekers[0]['regid'];
            
         //check if an applicant is recruited
    $db -> set_entity("recruited");
    $search = $db -> search($db->table,["job_id = '$job_id'","seeker_id = '$sid'"],["seeker_id"]);
    
        $alart = $disable='';
    if($search[0]['seeker_id'] != ""){
    $alart = 'style="background:#cceecc;" data-toogle="tooltip" title="Recruited"';
        $disable = "disabled";
    }
                ?>
            <tr <?php echo $alart;?> >
            <td><?php echo 0+1;?></td>
                <td><a href="executive_panel?page=seeker_profile&seeker=<?php echo $seekers[0]['seeker_id'];?>"data-toggle="tooltip" title="Click to view profile"><?php echo ucwords($seekers[0]['lastname']);?></a></td>
            <td><?php echo ucwords($seekers[0]['othernames']);?></td>
            <td><?php echo ucwords($seekers[0]['regid']);?></td>
            <td><?php echo ucwords($seekers[0]['sex']);?></td>
            <td><?php echo ucwords($seekers[0]['email']);?></td>
            <td><?php echo ucwords($seekers[0]['phone']);?></td>
            <td><?php echo ucwords($seekers[0]['education']);?></td>
            <td><a href="<?php echo "../app/".$seekers[0]['passport'];?>"><img src="<?php echo "../app/".$seekers[0]['passport'];?>" class="img-thumbnail img-responsive" style="width:80px;height:auto"/></a></td>
            
                <!--format and display date-->
            <?php $date = date_create($seekers[0]['reg_date']);?>
            <td><?php echo date_format($date,'D jS M, Y h:i:s');?></td>
                <td><a href="executive_panel?page=seeker_profile&seeker=<?php echo $seekers[0]['seeker_id'];?>"data-toggle="tooltip" title="Click to view profile" class="btn btn-primary btn-md"><i class="fa fa-eye" ></i> View Details</a>
                
                    <a href="executive_panel?page=_job_review&seeker=<?php echo $seekers[0]['regid'];?>&job=<?php echo $job_id;?>&recruit" class="btn btn-success btn-md" <?php echo $disable; ?> >
                    Recruit
                    </a>
                </td>
          <!--  <td>
                <span data-id="<?php echo ucwords($seekers[0]['seeker_regid']);?>" class = "btn btn-link" style="color:red;cursor:pointer;" title="Click to delete account" onclick="confirm_del(this)"><i class="fa fa-trash"></i></span>
                </td>-->
            </tr>
            <?php
            }

            ?>
        </tbody>
        </table>
        </div>
        <!--End of applicants details-->
        
    </div>
<!--//panel body-->
        
</div>
<?php
}else{
    ?>
<div class="jumbotron">
<div class="alert alert-warning">
    <h1>AN ERROR OCCURED AND THIS PAGE CANG NOT BE DISPLAYED</h1>
    </div>
</div>
<?php
}
    ?>

<script>
$(document).ready(function(){
    $('#seeker_tbl').DataTable({
                //autoFill: true,
                responsive: true,
                scroller: false,
                colReorder: true,
                dom: 'Bfrtip',
                buttons: [
                    'excel', 'pdf','print'
                ]
            } );
    
})
    
    /*function confirm_del(obj){
        var yn = confirm("Do you want to delete record\n Note: Action can not be Undon");
        if(yn){
            var id = $(obj).attr('data-id');//get the record id
            document.location.assign("admin_panel?page=view_seekers&act=del&rec="+id);
            
        }
            
        
    }*/
</script>
        