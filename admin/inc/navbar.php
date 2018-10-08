
<nav class="navbar navbar-default" role="navigation">
        <div class="nav-title fade-black center-text white-text">
    <?php  //echo out the user name
          echo "Hi! {$executive ->get_uname()}"; ?>
    </div>
        <div>
        <ul class="nav nav-pills nav-stacked">
        <li class=""><a href="index"><i class="fa fa-home"></i>  Home</a></li>
            
            <li> <a href="executive_panel?page=profile" data-toggle="tooltip" title="view profile">
        <?php echo "<i class='fa fa-user'></i> {$executive -> get_uname()}" ;?>
        
        </a>  </li>
        <li><a href="executive_panel?page=view_users" data-toggle="tooltip" title="click to  view Job seekers">Seekers</a></li>
        
        
        <li><a href="executive_panel?page=new_job" data-toggle="tooltip" title="Create a Job">Create a new Job</a></li>
        <li><a href="executive_panel?page=_my_jobs" data-toggle="tooltip" title="View my jobs and applications">Review My Jobs</a></li>
            
        <li class="divider"></li>
            
         
        <li><a href="logout" ><i class="fa fa-sign-out"></i> Sign out</a></li>
       
        
           
        </ul>
        </div>
        </nav>
<div class="" style="background:#eee;padding:10px;color:#347856;font-weight:bold">
            <time id="date" class=""></time>
            <time id="time" class=""></time>
        </div>

<script>
$(document).ready(function(){
   $("[data-toggle='tooltip']").tooltip();
});
</script>