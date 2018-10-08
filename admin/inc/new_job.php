<?php
if(isset($_POST['btnsubmit']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
    $msg = $canprocess=false;
    foreach($_POST as $key => $val){
        //skip btnsubmit
        if($key == "btnsubmit"){continue;}
        /*if($key == "pass" || $key == "vpass"){
            $pass[] = clean($con,$val,true);
            continue;
        }*/
        $vals[] = clean($con,$val,false);
        $fields[]=$key;
        //$values[] = clean($con,$val,false);
            
    }
    $fields[] = "exid";//store the unique key of the executive entity
    $vals[] = $executive -> get_id();//get the id value of the currently logged executive
    
 $insert = $job -> add($fields,$vals);
    if($insert){
        $msg .= "<script>$.notify(\"New Domestic Work successfully Added \",{className:\"success\",clickToHide:true});</script>";
    }else{
        $msg .= "<script>$.notify(\"Error! Registration Unsuccessfull\",{className:\"error\",clickToHide:true});</script>";
    }
    
    
}
    ?>
<div class="panel panel-default">
                <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo 'executive_panel?page=new_job';?>" id="frmNewJob">
                    <div class="panel-heading fade-black white-text">
                    <div class="panel-title">
                        <h2> <i class="fa fa-plus-circle" ></i> CREATE NEW DOMESTIC WORK</h2>
                        </div>
                    </div>
				<div class="panel-body">
					<fieldset>
					<!-- Text input-->
                        <div class="col col-md-8">
					
					<div class="form-group">
					  <label class="col-md-4 control-label" for="title">Job Title <span>*</span></label>  
					  <div class="col-md-8">
					  <input id="title" required name="title" class="form-control input-lg" type="text" placeholder="Job title">
                        
					  </div>
					</div>
                            
                            <div class="form-group">
					  <label class="col-md-4 control-label" for="description">Job Description <span>*</span></label>  
					  <div class="col-md-8">
                          <textarea maxlength="255" class="form-control" id="description" name="description" placeholder="Full Product Details" rows="5"></textarea>
                          <!--<textarea required id="description" name="description" placeholder="Job description" class="form-control input-lg" maxlength="500" type="text" required></textarea>-->
                          <span class="help-block">Explicit description of job is recommended to allow the domestic work seekers gain better understanding of the work nature</span>
					  </div>
					</div>
                    
                          
                        </div>
                    </fieldset>
                    </div>
                    <div class="panel-footer">
                    <div class="panel-footer right">
					<button type="reset" class="btn btn-danger btn-lg" >Reset</button>
                        <button type="submit" name="btnsubmit" class="btn btn-primary btn-lg"><i class="fa fa-plus-circle"></i> Add New Domestic Job</button>
				</div>
                    </div>
    </form>
</div>
<script>
$(document).ready(function(){
      $('#description').Editor();
    
    $('form#frmNewJob').on('submit',function(e){
           //e.preventDefault();
           edit = $('.Editor-editor').html();//get text from the editor
            $('textarea[name="description"]').val(edit);//populate the text in textarea
       // alert(edit);
    });
});
</script>

<?php echo (isset($msg))?$msg:"";