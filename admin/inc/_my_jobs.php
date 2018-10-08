<?php
//process approve and block request
if((isset($_GET['act']) && $_GET['act'] !='') && (isset($_GET['rec']) && $_GET['rec'] !='')){
    $act = $dbTools -> esc_str(htmlspecialchars($_GET['act']));
    $rec = $dbTools -> esc_str(htmlspecialchars($_GET['rec']));
    //Determine which action to take
    if($act == 'block'){//block the account by changing status to unapproved
        if($act == 'block'){
            $block = $job -> update($rec,["status" => "unapproved"]);
            $msg="<script>$.notify(\"Account blocked\",{className:\"success\",clickToHide:true});</script>";
        }
    }elseif($act == 'approve'){
        //approve the account and active
        $block = $job -> update($rec,["status" => "approved"]);
        $msg="<script>$.notify(\"Account Approved and activated\",{className:\"success\",clickToHide:true});</script>";
    }elseif($act = 'del'){
        //Delete the account
        $del = $job -> delete($rec);
        if($del){
            $msg="<script>$.notify(\"Account Deleted\",{className:\"success\",clickToHide:true});</script>";
        }
    }
}

//get jobs reccored
$jobs = $job -> get_record("exid",$executive->get_id());

?>
<div class="panel panel-success" style="width:100%">
<div class="panel-heading">
    <h1 class="panel-title">MY DOMESTIC WORKS <span class="badge"><?php echo $job -> get_num_items();?> Records</span></h1>
    </div>
    <div class="panel-body">
    <table class="table display table-hovered table-stripped" id="job_tbl">
        <thead>
        <tr>
            <th>S/N</th>
            <th>Job Title</th>
            <th>Job Description</th>
            <th>Number of applications</th>            
            <th>Registered Date</th>
            <th>Actions</th>
            <!--<th>&nbsp;</th>-->
            </tr>
        </thead>
        <tbody>
        <?php
            for($x=0; $x < count($jobs); $x++){
                //count the number of applicants for each job
                $num_of_applicants = count($applicant ->get_record($job->pk,$jobs[$x]['job_id']));
                ?>
            <tr>
            <td><?php echo $x+1;?></td>
                <td><a href="executive_panel?page=_job_review&job=<?php echo $jobs[$x]["job_id"];?>"data-toggle="tooltip" title="Click to view profile"><?php echo ucwords($jobs[$x]['title']);?></a></td>
            <td><?php echo substr(htmlspecialchars_decode(ucwords($jobs[$x]['description'])),0,40);?>...</td>
                
            <td><span class="badge"><?php echo $num_of_applicants;?></span></td>
                
             <?php $date = date_create($jobs[$x]['reg_date']);?>
            <td><?php  echo date_format($date,'D jS M, Y h:i:s');?>
            <td><a href="executive_panel?page=_job_review&job=<?php echo $jobs[$x]["job_id"];?>" class="btn btn-md btn-info">Review</a></td>
                <?php
            }
                ?>
            </tr>
        </tbody>
        </table>
    </div>
</div>
