<div >
    <figure class="img-thumbnail" style="width:99%;margin-top:0;">
<img src="<?php echo $config->site_url."app/".$_SESSION['pix'];?>" class="img-responsive img-circle" style="width:100%;height:200px;">
    <figcaption class="thumb-title">
        <?php echo $seeker->get_uname();?>
        </figcaption>
    </figure>
    <h3>My Links</h3>
    <ul class="nav nav-pills nav-stacked" style="max-width: 260px;">
        <li class="active">
        <a href="seeker?view=jobs">
        
        Available Jobs
        </a>
            </li> 
        
        <li class="">
        <a href="seeker?view=view_executives">
       
        See Executives
        </a>
            </li>
    </ul>
</div>