<footer class="footer">
<div class="row">
    <div class="col col-md-6">
     <p>Presented by: <?php echo $presenter -> name. " Reg. No. ".$presenter -> reg_num;?>
    <p>Supervised by:<?php echo $presenter -> supervisor;?></p>
    </div>
    <div class="col col-md-6">
       <p> &copy; <?php echo date('Y');?></p>
        <p>Alrights reserved <?php echo $config -> site_title;?></p>
        <p>Coded with <i class="fa fa-heart"> by SoftwareGene Inc.</i></p>
    </div>
    </div>
</footer>
<!--MODALS-->
<?php include "modals.php";?>
<?php include "external_files.html";?>