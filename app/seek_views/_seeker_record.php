<?php
//get prioners reccored
$indigenes = $indigene -> select_all('surname','asc');

?>
<div class="panel panel-success">
<div class="panel-heading">
    <h1 class="panel-title">IKEDURU LGA<br>Record of registered indigenes <span class="badge"><?php echo $indigene -> get_num_items();?> Records</span></h1>
    </div>
    <div class="panel-body">
    <table class="table display table-hovered table-stripped" id="inmate_tbl">
        <thead>
        <tr>
            <th>S/N</th>
            <th>Registration Id</th>
            <th>Full Name</th>
            <th>Gender</th>
            <th>Marital Status</th>
            <th>State of Origin</th>
            <th>Town</th>
            <th>occupation</th>
            <th>phone</th>
            <th>email</th>
            <th>address</th>
            <th>Mother_maiden</th>
            <th>Passport</th>
            <th>Registered Date</th>
            </tr>
        </thead>
        <tbody>
        <?php
            for($x=0; $x < count($indigenes); $x++){
                ?>
            <tr>
                
            <td><?php echo $x+1;?></td>
            <td><?php echo ucwords($indigenes[$x]['regid']);?></td>
            <td>
                <a href="indigenes_profile?indigene=<?php echo $indigenes[$x]['indigene_id'];?>" title="Click to view profile">
                <?php echo ucwords($indigenes[$x]['surname']);?> 
                <?php echo ucwords($indigenes[$x]['f_name']);?> 
                <?php echo ucwords($indigenes[$x]['o_name']);?>
                </a></td>
            <td><?php echo ucwords($indigenes[$x]['sex']);?></td>
            <td><?php echo ucwords($indigenes[$x]['m_status']);?></td>
            <td><?php echo ucwords($indigenes[$x]['state_of_o']);?></td>
            <td><?php echo ucwords($indigenes[$x]['town']);?></td>
            <td><?php echo ucwords($indigenes[$x]['occupation']);?></td>
            <td><?php echo ucwords($indigenes[$x]['phone']);?></td>
            <td><?php echo ucwords($indigenes[$x]['email']);?></td>
            <td><?php echo ucwords($indigenes[$x]['address']);?></td>
            <td><?php echo ucwords($indigenes[$x]['mother_maiden']);?></td>
            <td><a href="<?php echo $indigenes[$x]['passport'];?>" class="btn btn-link" title="Click to view Passport"><?php echo $indigenes[$x]['passport'];?></a></td>
            <?php $date = date_create($indigenes[$x]['reg_date']);?>
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