
<?php require_once "../utilities/core/init.php";
// redirect to panel if already logged in
if($executive -> is_login) redirect('executive_panel');
?>
<!doctype html>
<html lang="en">
<head>
    <title><?php echo $config -> site_title;?> - Admin login</title>
    <?php require "inc/header_default.php";?>
    </head>
    <body style="background-color:transparent;">
    <?php require_once "inc/header.php";?>
        <div class="container-fluid fade-black" style="padding:10px;">
       <div class="row">&nbsp;</div>
       <div class="row">&nbsp;</div>
       <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col col-md-4 hidden-xs">&nbsp;</div>
                
            <div class="col col-md-4">
                <div class="modal-content title">
		  <div class="modal-header">
			
			<h4 class="modal-title title1"><span style="color:orange">Login Into Admin Panel</span></h4>
		  </div>
			<form class="form-horizontal" id="signinForm">
					<fieldset>
				<div class="modal-body">
					<!-- Text input-->
					<div class="form-group">
					  <label class="col-md-4 control-label" for="email">Username or Email Address</label>  
					  <div class="col-md-6">
					  <input id="uname" name="uname" placeholder="Username or Email Address" class="form-control input-md" type="text">
					  </div>
					</div>
					<div class="form-group">
					  <label class="col-md-4 control-label" for="email">Password</label>  
					  <div class="col-md-6">
					  <input id="pass" name="pass" placeholder="Password" class="form-control input-md" type="password">
					  </div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" >Close</button>
					<button type="submit" class="btn btn-primary" >Sign In</button>
				</div>
				</fieldset>
			</form>
		</div><!-- /.modal-content -->
                </div>
                
                <div class="col col-md-4 hidden-xs"></div>
            </div>
            
            <div class="row">
            <div class="col col-md-4">&nbsp;</div>
            <div class="col col-md-4"></div>
            <div class="col col-md-4"></div>
            </div>
             <div class="row">&nbsp;</div>
       <div class="row">&nbsp;</div>
       <div class="row">&nbsp;</div>
            
             <?php require_once "inc/footer.php";?>
            
        </div><!--//container-->
    </body>
    <script>
    $('#signinForm').on('submit', function (e){
     e.preventDefault();
    var url = "action/signin.php";
    login($(this),url,'executive_panel.php');
});
    </script>
</html>

