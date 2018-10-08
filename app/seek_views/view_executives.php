<?php
//process approve and block request
if((isset($_GET['act']) && $_GET['act'] !='') && (isset($_GET['rec']) && $_GET['rec'] !='')){
    $act = $dbTools -> esc_str(htmlspecialchars($_GET['act']));
    $rec = $dbTools -> esc_str(htmlspecialchars($_GET['rec']));
    //Determine which action to take
    if($act == 'block'){//block the account by changing status to unapproved
        if($act == 'block'){
            $block = $executive -> update($rec,["status" => "unapproved"]);
            $msg="<script>$.notify(\"Account blocked\",{className:\"success\",clickToHide:true});</script>";
        }
    }elseif($act == 'approve'){
        //approve the account and active
        $block = $executive -> update($rec,["status" => "approved"]);
        $msg="<script>$.notify(\"Account Approved and activated\",{className:\"success\",clickToHide:true});</script>";
    }elseif($act = 'del'){
        //Delete the account
        $del = $executive -> delete($rec);
        if($del){
            $msg="<script>$.notify(\"Account Deleted\",{className:\"success\",clickToHide:true});</script>";
        }
    }
}

//get prioners reccored
$executives = $executive -> select_all('reg_date','desc');

?>
<div class="panel panel-success" style="width:100%">
<div class="panel-heading">
    <h1 class="panel-title">Records of Executives (Prospective employers) <span class="badge"><?php echo $executive -> get_num_items();?> Records</span></h1>
    </div>
    <div class="panel-body">
    <table class="table display table-hovered table-stripped" id="executive_tbl">
        <thead>
        <tr>
            <th>S/N</th>
            <th>Full Name</th>
            <th>Occupaton</th>
            <th>Residential Address</th>
            <th>Gender</th>
            <th>Marital Status</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Office Address</th>
            <th>passport</th>
            <th>Registered Date</th>
            <th>Actions</th>
            <!--<th>&nbsp;</th>-->
            </tr>
        </thead>
        <tbody>
        <?php
            for($x=0; $x < count($executives); $x++){
                ?>
            <tr>
            <td><?php echo $x+1;?></td>
                <td><a href="seeker?view=executive_profile&executive=<?php echo $executives[$x]['executive_id'];?>"data-toggle="tooltip" title="Click to view profile"><?php echo ucwords($executives[$x]['fullname']);?></a></td>
            <td><?php echo ucwords($executives[$x]['occupation']);?></td>
            <td><?php echo ucwords($executives[$x]['raddress']);?></td>
            <td><?php echo ucwords($executives[$x]['sex']);?></td>
            <td><?php echo ucwords($executives[$x]['m_status']);?></td>
            <td><?php echo ucwords($executives[$x]['phone']);?></td>
            <td><?php echo ucwords($executives[$x]['email']);?></td>
            <td><?php echo ucwords($executives[$x]['office_address']);?></td>
            
            <td><a href="<?php echo "../app/".$executives[$x]['passport'];?>"><img src="<?php echo "../app/".$executives[$x]['passport'];?>" class="img-thumbnail img-responsive" style="width:80px;height:auto"/></a></td>
            
                <!--format and display date-->
            <?php $date = date_create($executives[$x]['reg_date']);?>
            <td><?php echo date_format($date,'D jS M, Y h:i:s');?></td>
                <td><a href="seeker?view=executive_profile&executive=<?php echo $executives[$x]['executive_id'];?>"data-toggle="tooltip" title="Click to view profile"><i class="fa fa-eye" ></i> View Details</a></td>
<!--            <td>
                <span data-id="<?php echo ucwords($executives[$x]['executive_id']);?>" class = "btn btn-link" style="color:red;cursor:pointer;" title="Click to delete account" onclick="confirm_del(this)"><i class="fa fa-trash"></i></span>
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
    $('#executive_tbl').DataTable({
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
            document.location.assign("admin_panel?view=view_executives&act=del&rec="+id);
            
        }
            
        
    }
</script>
<?php echo (isset($msg))?$msg:'';?>