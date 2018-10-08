<div class="modal fade" id="regFrm">
	<div class="modal-dialog">
		<div class="modal-content title1">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title title1"><span style="color:orange">Register New User (Jailor) Account</span></h4>
		  </div>
			<form class="form-horizontal" id="signupForm">
		
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>

<div class="modal fade" id="signinFrm">
	<div class="modal-dialog">
		<div class="modal-content title1">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title title1"><span style="color:orange">Login Into Your Account</span></h4>
		  </div>
			<form class="form-horizontal" id="signinForm">
					<!--<fieldset>
				<div class="modal-body">
					 Text input
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
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary" >Sign In</button>
				</div>
				</fieldset>
-->			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>

<script>
    //submit signup form
$('#signupForm').on('submit', function (e){ 
    e.preventDefault();
    
    var url = "action/register_user.php";
    submitForm($('#signupForm'),url);
    //alert('ddkdk');
});
    //Sumit login form
 $('#signinForm').on('submit', function (e){
     e.preventDefault();
    var url = "action/signin.php";
    login($(this),url,'jailor.php');
});
</script>