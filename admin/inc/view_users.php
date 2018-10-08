<?php
//process approve and block request
if((isset($_GET['act']) && $_GET['act'] !='') && (isset($_GET['rec']) && $_GET['rec'] !='')){
    $act = $dbTools -> esc_str(htmlspecialchars($_GET['act']));
    $rec = $dbTools -> esc_str(htmlspecialchars($_GET['rec']));
    //Determine which action to take
    if($act == 'block'){//block the account by changing status to unapproved
        if($act == 'block'){
            $block = $seeker -> update($rec,["status" => "unapproved"]);
            $msg="<script>$.notify(\"Account blocked\",{className:\"success\",clickToHide:true});</script>";
        }
    }elseif($act == 'approve'){
        //approve the account and active
        $block = $seeker -> update($rec,["status" => "approved"]);
        $msg="<script>$.notify(\"Account Approved and activated\",{className:\"success\",clickToHide:true});</script>";
    }elseif($act = 'del'){
        //Delete the account
        $del = $seeker -> delete($rec);
        if($del){
            $msg="<script>$.notify(\"Account Deleted\",{className:\"success\",clickToHide:true});</script>";
        }
    }
}

//get prioners reccored
$seekers = $seeker -> select_all('lastname','asc');

?>
<div class="panel panel-success" style="width:100%">
<div class="panel-heading">
    <h1 class="panel-title">Records of Users (Job Seekers) <span class="badge"><?php echo $seeker -> get_num_items();?> Records</span></h1>
    </div>
    <div class="panel-body">
    <table class="table display table-hovered table-stripped" id="seeker_tbl">
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
            <th>Residential Address</th>
            <th>Parmanent Address</th>
            <th>hobby</th>
            <th>Job Interest</th>
            <th>Likes</th>
            <th>Dislikes</th>
            <th>passport</th>
            <th>Registered Date</th>
            <th>Actions</th>
            <!--<th>&nbsp;</th>-->
            </tr>
        </thead>
        <tbody>
        <?php
            for($x=0; $x < count($seekers); $x++){
                ?>
            <tr>
            <td><?php echo $x+1;?></td>
                <td><a href="executive_panel?page=seeker_profile&seeker=<?php echo $seekers[$x]['seeker_id'];?>"data-toggle="tooltip" title="Click to view profile"><?php echo ucwords($seekers[$x]['lastname']);?></a></td>
            <td><?php echo ucwords($seekers[$x]['othernames']);?></td>
            <td><?php echo ucwords($seekers[$x]['regid']);?></td>
            <td><?php echo ucwords($seekers[$x]['sex']);?></td>
            <td><?php echo ucwords($seekers[$x]['email']);?></td>
            <td><?php echo ucwords($seekers[$x]['phone']);?></td>
            <td><?php echo ucwords($seekers[$x]['education']);?></td>
            <td><?php echo ucwords($seekers[$x]['raddress']);?></td>
            <td><?php echo ucwords($seekers[$x]['paddress']);?></td>
            <td><?php echo ucwords($seekers[$x]['hobby']);?></td>
            <td><?php echo ucwords($seekers[$x]['job_interest']);?></td>
            <td><?php echo ucwords($seekers[$x]['likes']);?></td>
            <td><?php echo ucwords($seekers[$x]['dislikes']);?></td>
            <td><a href="<?php echo "../app/".$seekers[$x]['passport'];?>"><img src="<?php echo "../app/".$seekers[$x]['passport'];?>" class="img-thumbnail img-responsive" style="width:80px;height:auto"/></a></td>
            
                <!--format and display date-->
            <?php $date = date_create($seekers[$x]['reg_date']);?>
            <td><?php echo date_format($date,'D jS M, Y h:i:s');?></td>
                <td><a href="executive_panel?page=seeker_profile&seeker=<?php echo $seekers[$x]['seeker_id'];?>"data-toggle="tooltip" title="Click to view profile"><i class="fa fa-eye" ></i> View Details</a></td>
<!--            <td>
                <span data-id="<?php echo ucwords($seekers[$x]['seeker_id']);?>" class = "btn btn-link" style="color:red;cursor:pointer;" title="Click to delete account" onclick="confirm_del(this)"><i class="fa fa-trash"></i></span>
                </td>-->
            </tr>
            <?php
            }
            ?>
        </tbody>
        </table>
    </div>
</div>
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
    
    function confirm_del(obj){
        var yn = confirm("Do you want to delete record\n Note: Action can not be Undon");
        if(yn){
            var id = $(obj).attr('data-id');//get the record id
            document.location.assign("admin_panel?page=view_seekers&act=del&rec="+id);
            
        }
            
        
    }
</script>
<?php echo (isset($msg))?$msg:'';?>