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
            $targetPath = "uploads/seekers/";
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
    $insert = $seeker -> add($fields,$vals);
    if($insert){
        $msg .= "<script>$.notify(\"Rregisteration successfully \",{className:\"success\",clickToHide:true});</script>";
    }else{
        $msg .= "<script>$.notify(\"Error! Registration Unsuccessfull\",{className:\"error\",clickToHide:true});</script>";
    }
    }else{$msg .= "<script>alert('We can not Process Registration');</script>";}
    
}
?>

<div class="panel panel-default">
                <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo 'jailor?page=_reg_househelp';?>">
                    <div class="panel-heading">
                    <div class="panel-title">
                        <h2>Register New House Help</h2>
                        </div>
                    </div>
				<div class="panel-body">
					<fieldset>
					<!-- Text input-->
                        <div class="col col-md-8">
					
					<div class="form-group">
					  <label class="col-md-4 control-label" for="surname">Registration Id</label>  
					  <div class="col-md-8">
					  <input id="regid" readonly name="regid" value="<?php echo db_id_gen($con,"IMO".date('y'),"-","seeker","regid");?>" class="form-control input-md" type="text">
                          <span class="help-block">This will be used for signig in so keep it safe.</span>
					  </div>
					</div>
                            
                            <div class="form-group">
					  <label class="col-md-4 control-label" for="lastname">Last Name <span>*</span></label>  
					  <div class="col-md-8">
					  <input id="lastname" name="lastname" placeholder="Enter your last name" class="form-control input-md" type="text" required>
					  </div>
					</div>
                    <div class="form-group">
					  <label class="col-md-4 control-label" for="othernames">Other Name <span>*</span></label>  
					  <div class="col-md-8">
					  <input id="othernames" name="othernames" placeholder="Enter other name" class="form-control input-md" type="text" required>
					  </div>
					</div>
                            
                            <div class="form-group">
					  <label class="col-md-4 control-label" for="o_name">Residence Address</label>  
					  <div class="col-md-8">
					  <input id="raddress" name="raddress" placeholder="Residence Address" class="form-control input-md" type="text">
					  </div>
					</div>
                          
                            <div class="form-group">
					  <label class="col-md-4 control-label" for="paddress">Permanent Address <span>*</span></label>  
					  <div class="col-md-8">
					  <input id="paddress" name="paddress" placeholder="Permanent address" class="form-control input-md" type="text" required>
					  </div>
					</div>
                    
                            <div class="form-group">
					  <label class="col-md-4 control-label" for="court">state of origin <span>*</span></label>  
					  <div class="col-md-8">
					  <input id="state_of_o" name="state_of_o" placeholder="State of origin" class="form-control input-md" type="text" required>
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
					  <label class="col-md-4 control-label" for="court">Marital Status</label>  
					  <div class="col-md-8">
                          <select id="mstatus" name="m_status"  class="form-control input-md">
                          <option>choose</option>
                          <option value="married">married</option>
                          <option value="sigle">single</option>
                          <option value="divorced">divorced</option>
                          </select>
					  </div>
					</div>
                            
                          
                    <div class="form-group">
					  <label class="col-md-4 control-label" for="town"> LGA</label>  
					  <div class="col-md-8">
					  <input id="lga" name="lga" placeholder="Local Government Area" class="form-control input-md" type="text">
					  </div>
					</div>
                           
                            
                        <div class="form-group">
					  <label class="col-md-4 control-label" for="date_of_release">phone <span>*</span></label>  
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
					  <label class="col-md-4 control-label" for="education">Education </label>  
					  <div class="col-md-8">
					  <input id="education" name="education" placeholder="Enter education" class="form-control input-md" type="text"> 
					  </div>
					</div>
					
                         <div class="form-group">
					  <label class="col-md-4 control-label" for="date_of_release">Hobby</label>  
					  <div class="col-md-8">
					  <input id="hobby" name="hobby" placeholder="Enter hobby seperated with comma" class="form-control input-md" type="text">
					  </div>
					</div>
                        
                    <div class="form-group">
					  <label class="col-md-4 control-label" for="job_interest">Job Interest</label>  
					  <div class="col-md-8">
					  <input id="job_interest" name="job_interest" placeholder="What are the job areas that interest you" class="form-control input-md" type="text">
					  </div>
					</div>
                            
                         <div class="form-group">
					  <label class="col-md-4 control-label" for="date_of_release">Likes</label>  
					  <div class="col-md-8">
					  <input id="likes" name="likes" placeholder="Enter you ikes seperated with comma" class="form-control input-md" type="text">
					  </div>
					</div>
                                
                         <div class="form-group">
					  <label class="col-md-4 control-label" for="dislikes">Dislikes</label>  
					  <div class="col-md-8">
					  <input id="dislikes" name="dislikes" placeholder="Enter you dislikes seperated with comma" class="form-control input-md" type="text">
					  </div>
					</div>
                            
                            
                        </div><!--//Text input-->
                    <!--PASSPORT SECTION-->
                        <div class="col col-md-4">
                            
                            
                        <div class="form-group">
					  <label class="col-md-4 control-label" for="passport">Upload Passport</label>  
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
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<input type="submit" name="btnsubmit" class="btn btn-primary"  value="Register">
				</div>

			</form>
                    
                </div><!--//end panel-->
<?php if(isset($msg)){echo $msg;}?>

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
