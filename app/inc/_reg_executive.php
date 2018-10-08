<?php
if(isset($_POST['btnsubmit']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
    $msg = $canprocess=false;
    foreach($_POST as $key => $val){
        //skip btnsubmit
        if($key == "btnsubmit"){continue;}
        if($key == "pass" || $key == "vpass"){
            $pass[] = clean($con,$val,true);
            continue;
        }
        $vals[] = clean($con,$val,false);
        $fields[]=$key;
        //$values[] = clean($con,$val,false);
            
    }
    //Process PASSPORT
   //check if passport is uploaded
    if(isset($_FILES['passport'])){
        if($_FILES['passport']['name'] ==''){$msg .= "Please upload passport";}
        else{
            //Process the passport
            $passport = time().'_'.$_FILES['passport']['name'];
        $valid_extensions = array("jpeg","JPEG","JPG", "jpg", "PNG","png","GIF","gif");
        $temporary = explode(".", $_FILES["passport"]["name"]);
        $file_extension = end($temporary);
        $ftype = $_FILES["passport"]["type"];
        //check for valid passport file type
        if((($_FILES["passport"]["type"] == "image/png") ||
            ($_FILES["passport"]["type"] == "image/jpg") ||
            ($_FILES["passport"]["type"] == "image/jpeg")) &&
           in_array($file_extension, $valid_extensions)){//if file type ok
            $sourcePath = $_FILES['passport']['tmp_name'];
            $targetPath = "uploads/executives/";
            $filePath = $targetPath.$passport;
            //create directories if not exists
            if(!is_dir('uploads')){mkdir('uploads');}
            if(!is_dir($targetPath)){mkdir($targetPath);}
            if(move_uploaded_file($sourcePath,$filePath)){
                $uploadedFile = $passport;
                $canprocess = true;
            }
            //$uploadedFile = addslashes(file_get_contents($_FILES['img']['tmp_name']));
        }/*End if file type ok*/
        else{$msg .= "<script>$.notify(\"Error! Invalid file type \",{className:\"error\",clickToHide:true});</script>";}
        }
    }else
    {$msg .=  "<script>$.notify(\"Error! Passport field not set \",{className:\"error\",clickToHide:true});</script>";}
if($pass[0] !=$pass[1]){
    $msg.= "<script>$.notify(\"Error! Password Mismatch\",{className:\"error\",clickToHide:true});</script>";
    $canprocess = false;
}
    ########################################################3
    //If no error the Store values in database
    if($canprocess){
    //push passport link and storage field into the field and value arrays
    $fields[]="passport";$vals[]=$filePath;
    $fields[]="pass";$vals[]= md5($pass[0]);
        //execute the query
    $insert = $executive -> add($fields,$vals);
    if($insert){
        $msg .= "<script>$.notify(\"Rregisteration successfully \",{className:\"success\",clickToHide:true});</script>";
    }else{
        $msg .= "<script>$.notify(\"Error! Registration Unsuccessfull\",{className:\"error\",clickToHide:true});</script>";
    }
    }else{$msg .= "<script>alert('We can not Process Registration');</script>";}
    
}
?>

<div class="panel panel-default">
                <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo 'jailor?page=_reg_executive';?>">
                    <div class="panel-heading fade-black white-text">
                    <div class="panel-title">
                        <h2>Busy Executive Registration</h2>
                        </div>
                    </div>
				<div class="panel-body">
					<fieldset>
					<!-- Text input-->
                        <div class="col col-md-8">
					
					<div class="form-group">
					  <label class="col-md-4 control-label" for="exid">Registration Id</label>  
					  <div class="col-md-8">
					  <input id="exid" readonly name="exid" value="<?php echo db_id_gen($con,"IMO/EX/".date('y'),"-","executive","exid");?>" class="form-control input-md" type="text">
                        <span class="help-block">This will be used for signing in so keep it safe.</span>
					  </div>
					</div>
                            
                            <div class="form-group">
					  <label class="col-md-4 control-label" for="lastname">Full Name <span>*</span></label>  
					  <div class="col-md-8">
					  <input id="fullname" name="fullname" placeholder="Enter Full Name (Surname first)" class="form-control input-md" type="text" required>
					  </div>
					</div>
                    <div class="form-group">
					  <label class="col-md-4 control-label" for="othernames">Occupation<span>*</span></label>  
					  <div class="col-md-8">
					  <input id="occupation" name="occupation" placeholder="Please enter your occupation" class="form-control input-md" type="text" required>
					  </div>
					</div>
                            
                            <div class="form-group">
					  <label class="col-md-4 control-label" for="raddress">Residence Address</label>  
					  <div class="col-md-8">
					  <input id="raddress" name="raddress" placeholder="Residence address" class="form-control input-md" type="text">
					  </div>
					</div>
                           
                    <div class="form-group">
					  <label class="col-md-4 control-label" for="sex">Gender <span>*</span></label>  
					  <div class="col-md-8">
					  <select id="sex" name="sex" required class="form-control input-md">
                          <option value="">choose</option>
                          <option value="male">Male</option>
                          <option value="Female">Female</option>
                          </select>
					  </div>
					</div>
                            
                    
                         <div class="form-group">
					  <label class="col-md-4 control-label" for="mstatus">Marital Status</label>  
					  <div class="col-md-8">
                          <select id="mstatus" name="m_status"  class="form-control input-md" required>
                          <option>choose</option>
                          <option value="married">married</option>
                          <option value="sigle">single</option>
                          <option value="divorced">divorced</option>
                          </select>
					  </div>
					</div>
                            
                     
                        <div class="form-group">
					  <label class="col-md-4 control-label" for="phone">phone <span>*</span></label>  
					  <div class="col-md-8">
					  <input id="phone" name="phone" required placeholder="Phone number" class="form-control input-md" type="tel">
					  </div>
					</div>    
                        <div class="form-group">
					  <label class="col-md-4 control-label" for="date_of_release">Email</label>  
					  <div class="col-md-8">
					  <input id="email" name="email" placeholder="Email Address" class="form-control input-md" type="email">
					  </div>
					</div>
                    
                         <div class="form-group">
					  <label class="col-md-4 control-label" for="desscription">Briefly describe yourself</label>  
					  <div class="col-md-8">
                          <textarea id="description" name="description" placeholder="Describe your self" class="form-control input-md" ></textarea>
					  </div>
					</div>
                          
                         <div class="form-group">
					  <label class="col-md-4 control-label" for="office_address">Office Address</label>  
					  <div class="col-md-8">
					  <input id="office_address" name="office_address" placeholder="Office address" class="form-control input-md" type="text">
					  </div>
					</div>
                            
                            
                        </div><!--//Text input-->
                    <!--PASSPORT SECTION-->
                        <div class="col col-md-4">
                            
                            
                        <div class="form-group">
					  <label class="col-md-4 control-label" for="passport">Upload picture</label>  
					  <div class="col-md-8">
					  <input id="passport" name="passport" placeholder="Choose Passport" class="form-control input-md dropify-event" type="file" accept="image/x-png,image/gif,image/jpeg">
					  </div>
                            
					</div>
                    
                    
                            
                         <p class="help-block">Note<br>max image size: 70kb<br>Supported format: gif, jpeg and png file formats<br>Fields with asteriks (*) are required</p>
                            
                            
                            <fieldset>
                            <legend>Enter Login password</legend>
                                <div class="form-group">
					  <label class="col-md-4 control-label" for="pass">Password</label>  
					  <div class="col-md-8">
					  <input id="pass" name="pass" placeholder="Enter you dislikes seperated with comma" class="form-control input-md" type="password" required>
					  </div>
					</div>
                                
                                <div class="form-group">
					  <label class="col-md-4 control-label" for="vpass">Verify Password</label>  
					  <div class="col-md-8">
					  <input id="vpass" name="vpass" placeholder="Enter you dislikes seperated with comma" class="form-control input-md" type="password" required>
					  </div>
					</div>
                            </fieldset>
                        </div><!--//PASPORT SECTION-->
				</fieldset>
                    </div>
				<div class="panel-footer right">
					<button type="reset" class="btn btn-danger" >Reset</button>
					<input type="submit" name="btnsubmit" class="btn btn-primary"  value="Register">
				</div>

			</form>
                    
                </div><!--//end panel-->
<?php echo (isset($msg))?$msg:"";?>

<script>
$(document).ready(function(){
    $('.dropify').dropify();
                        // Used events
                //var drEvent = $('#input-file-events').dropify();
                var drEvent = $('#passport').dropify();

                drEvent.on('dropify.beforeClear', function(event, element){
                    return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
                });

                drEvent.on('dropify.afterClear', function(event, element){
                    //alert('File deleted');
                });

                drEvent.on('dropify.errors', function(event, element){
                    console.log('Has Errors');
                });

                var drDestroy = $('#input-file-to-destroy').dropify();
                drDestroy = drDestroy.data('dropify')
                $('#toggleDropify').on('click', function(e){
                    e.preventDefault();
                    if (drDestroy.isDropified()) {
                        drDestroy.destroy();
                    } else {
                        drDestroy.init();
                    }
                });
});
</script>
