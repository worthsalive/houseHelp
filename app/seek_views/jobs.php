<?php
//get prioners reccored
$jobs = $job -> select_all('reg_date','desc');
$records = $job -> get_num_items();
?>
<div class="panel panel-success">
<div class="panel-heading">
    <h1 class="panel-title">List of Available Jobs <span class="badge"><?php echo $job -> get_num_items();?> job vacancies</span></h1>
    </div>
    <div class="panel-body">
        <?php if($records > 0){ ?>
    <table class="table display table-hovered table-stripped" id="inmate_tbl">
        <thead>
        <tr>
            <th>S/N</th>
            <th>Job Title</th>
            <th>Job Description</th>
            <th>Name of Executive</th>
            <th>Occupation</th>
            <th>Residence Address</th>
            <th>Contact Details</th>
            <th>Posted Date</th>
            </tr>
        </thead>
        <tbody>
        <?php
            for($x=0; $x < count($jobs); $x++){
                //get record of the executive who posted teh job
                $executives = $executive -> get_record("exid",$jobs[$x]["exid"]);
                ?>
            <tr>
                
            <td><?php echo $x+1;?></td>
                
            <td><?php echo ucwords($jobs[$x]['title']);?></td>
                
            <td>
                <a href="seeker?view=jobs_profile&job=<?php echo $jobs[$x]['job_id'];?>&executive=<?php echo $executives[0]['executive_id'] ;?>" data-toggle="tooltip" title="Click to view and apply for this job">
                <?php echo substr(htmlspecialchars_decode(ucwords($jobs[$x]['description'])),0,50)."...";?> 
                </a></td>
                
                
            <td>
                <?php echo ucwords($executives[0]['fullname']);?>
            </td>
                
            <td><?php echo ucwords($executives[0]['occupation']);?></td>
                
            <td><?php echo ucwords($executives[0]['raddress']);?></td>
                
            <td>
                <?php echo "<i class='fa fa-mobile'></i> ".ucwords($executives[0]['phone']);?>
                <?php echo "<br><i class='fa fa-envelope'></i> ".ucwords($executives[0]['email']);?>
            </td>
           
            <?php $date = date_create($jobs[$x]['reg_date']);?>
            <td><?php echo date_format($date,'D jS M, Y h:i:s');?></td>
                
            </tr>
            <?php
            }
            }else{
                ?>
            <div class="alert alert-danger">
            <h1>NO JOBS FOUND</h1>
                <p>There is No Job Vacance at the momment Please Check back later</p>
                <p>Jobs vacancies posted by different busy executives are displayed here</p>
            </div>
            <?php
            }
            ?>
        </tbody>
        </table>
    </div>
</div>
<script>
$(document).ready(function(){
    $("data-toggle='tooltip'").tooltip();
    $('#inmate_tbl').DataTable({
                //autoFill: true,
                responsive: true,
                scroller: false,
                colReorder: true
                /*dom: 'Bfrtip',
                buttons: [
                    'excel', 'pdf','print'
                ]*/
            } );
})
</script>