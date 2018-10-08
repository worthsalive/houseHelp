<?php
//get prioners reccored
$prisoners = $prisoner -> select_all('name','asc');

?>
<div class="panel panel-success">
<div class="panel-heading">
    <h1 class="panel-title">Records of Prison Inmates <span class="badge"><?php echo $prisoner -> get_num_items();?> Records</span></h1>
    </div>
    <div class="panel-body">
    <table class="table display table-hovered table-stripped" id="inmate_tbl">
        <thead>
        <tr>
            <th>S/N</th>
            <th>Full Name</th>
            <th>Gender</th>
            <th>Complexion</th>
            <th>Permanent Address</th>
            <th>Crime</th>
            <th>Crime Code</th>
            <th>Prison Name</th>
            <th>Court of Conviction</th>
            <th>Punishment</th>
            <th>Punishment Period</th>
            <th>Passport</th>
            <th>Registered Date</th>
            </tr>
        </thead>
        <tbody>
        <?php
            for($x=0; $x < count($prisoners); $x++){
                ?>
            <tr>
                
            <td><?php echo $x+1;?></td>
            <td>
                <a href="prisoners_profile?prisoner=<?php echo $prisoners[$x]['prisoner_id'];?>" title="Click to view profile">
                <?php echo ucwords($prisoners[$x]['name']);?>
                </a></td>
            <td><?php echo ucwords($prisoners[$x]['gender']);?></td>
            <td><?php echo ucwords($prisoners[$x]['complexion']);?></td>
            <td><?php echo ucwords($prisoners[$x]['address']);?></td>
            <td><?php echo ucwords($prisoners[$x]['crime']);?></td>
            <td><?php echo ucwords($prisoners[$x]['crimecode']);?></td>
            <td><?php echo ucwords($prisoners[$x]['prison_name']);?></td>
            <td><?php echo ucwords($prisoners[$x]['court']);?></td>
            <td><?php echo ucwords($prisoners[$x]['punishment']);?></td>
            <td><?php echo ucwords($prisoners[$x]['punishment_period']);?></td>
            <td><a href="<?php echo $prisoners[$x]['passport'];?>" class="btn btn-link" title="Click to view Passport"><?php echo $prisoners[$x]['passport'];?></a></td>
            <?php $date = date_create($prisoners[$x]['reg_date']);?>
            <td><?php echo date_format($date,'D jS M, Y h:i:s');?></td>
                
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
                dom: 'Bfrtip',
                buttons: [
                    'excel', 'pdf','print'
                ]
            } );
})
</script>