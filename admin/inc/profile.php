<?php
//get prioners reccored
$admins = $admin -> select_all('name','asc');

?>
<div class="panel panel-success">
<div class="panel-heading">
    <h1 class="panel-title">System Administrators <span class="badge"><?php echo $admin -> get_num_items();?> Records</span></h1>
    </div>
    <div class="panel-body">
    <table class="table display table-hovered table-stripped" id="inmate_tbl">
        <thead>
        <tr>
            <th>S/N</th>
            <th>Name</th>
            <th>Username</th>
            <th>Default</th>
            <th>Privillage</th>
            <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php
            for($x=0; $x < count($admins); $x++){
                ?>
            <tr>
            <td><?php echo $x+1;?></td>
            <td><?php echo ucwords($admins[$x]['name']);?></td>
            <td><?php echo ucwords($admins[$x]['uname']);?></td>
            <td><?php echo ($admins[$x]['is_default'] == 1)?'Yes':'No';?></td>
            <td><?php echo ucwords($admins[$x]['privillage']);?></td>
            
            <td>
                <a href="admin_panel?page=view_users&act=del&rec=<?php echo ucwords($admins[$x]['admin_id']);?>" style="color:red;"><i class="fa fa-trash"></i></a>
                </td>
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
    $('#inmate_tbl').DataTable({
                //autoFill: true,
                responsive: true,
                scroller: false,
                colReorder: true,
                
                
            } );
})
</script>