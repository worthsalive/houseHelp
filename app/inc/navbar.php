<nav class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
        <a class="navbar-brand" href="<?php echo $config -> site_url;?>">
            <?php echo $config -> site_title;?></a>
        </div>
        <div>
            
            
        <ul class="nav navbar-nav navbar">
        <li class="active"><a href="<?php echo $config->site_url;?>"><i class="fa fa-home"></i>  Home</a></li>
        <li><a href="index#about">About us</a></li>
        <li><a href="index#contact">Contact us</a></li>
            </ul>
       
        
        <ul class="nav navbar-nav navbar-left">
        <?php
            if($seeker->is_login){
                ?>
            
             <li class="dropdown fade-white white-text">
        <a href="#" class="dropdown-toggle btn btn-default btn-md fade-black white-text" data-toggle="dropdown">Your Reg id: 
        <?php echo "{$seeker -> get_id()}" ;?>
        <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
        <li><a href="seeker" ><i class="fa fa-user"></i> My account</a></li>
        <li><a href="logout" ><i class="fa fa-sign-out"></i> logout</a></li>
            
        </ul>
        </li>
            <?php
            }else{                                                  
                ?>
            
             
             <li class="dropdown fade-white white-text">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Registration
        <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
        <li><a href="jailor?page=_reg_househelp">House Help Registration</a></li>
        <li><a href="jailor?page=_reg_executive">Register as Busy Executive</a></li>
        
            
        </ul>
        </li>
            
            
            <li><a href="signin.php">Login</a></li>
            <?php
            }
            ?>
        </ul>
            
        </div>
        </nav>

<script>
$(document).ready(function(){
   $("[data-toggle='tooltip']").tooltip();
});
</script>