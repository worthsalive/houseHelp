/*AJAX FUNCTION TO SUBMIT FORMS*/
function submitForm(frmObj,url){
        var data = false;
    if(window.FormData){
        data = new FormData(frmObj[0]);
    }
        //data = frmObj.serialize();
        data = new FormData(frmObj[0]);
          $.ajax({
            url: url,
            data: data ? data:frmObj.serialise(),
            cache: false,
            contentType: false,
            processData: false,
            type: 'POST',
            //mimeType:"multipart/form-data",
            before: function(){
                //$.notify.init();
                $.notify("Processing...",{className:"error",clickToHide:true});
            },
            success: function(msg) {
                $.notify(msg,{className:"success",clickToHide:true});
            },
            error: function(xhr,req,error) {
                var err =  xhr.responseText;
            $.notify("Error! "+err,{className:"error",clickToHide:true})
            },
              after: function(){
                  $.notify("Completed");
              }
          });
          return false;
        
}

//function to login
function login(frmObj,url,redirect){
        var data = false;
    if(window.FormData){
        data = new FormData(frmObj[0]);
    }
        //data = frmObj.serialize();
        data = new FormData(frmObj[0]);
          $.ajax({
            url: url,
            data: data ? data:frmObj.serialise(),
            cache: false,
            contentType: false,
            processData: false,
            type: 'POST',
            //mimeType:"multipart/form-data",
            before: function(){
                //$.notify.init();
                $.notify("Processing...",{className:"error",clickToHide:true});
            },
            success: function(msg) {
                if(msg != "ok"){
                    $.notify(msg,{className:"error",clickToHide:true});
                }else{
                    document.location.replace(redirect);
                }
            },
            error: function(xhr,req,error) {
                var err =  xhr.responseText;
            $.notify("Error! "+err,{className:"error",clickToHide:true})
            },
              after: function(){
                  $.notify("Completed");
              }
          });
          return false;
        
}

/*AJAX FUNCTION TO POPULATE DATA*/
function populateData(data_url,data,display){
    var output = $(display);
    $.ajax({
        type: 'post',
        url: data_url,
        data: data,
       
        success: function(d) {
            //Display data
            output.html(d);
        },
        error: function(xhr,req,error) {
            var err =  xhr.responseText;
        $.notify("Error! "+err,{className:"error",clickToHide:true})
        }
      
  });
}

/*AJAX FUNCTION TO RETURN RESPONSE DATA*/
function returnResponse(data_url,data,display){
    var output = $(display);
    $.ajax({
        type: 'post',
        url: data_url,
        data: data,
       
        success: function(d) {
            //Display data
            alert(d);
        },
        error: function(xhr,req,error) {
            var err =  xhr.responseText;
        $.notify("Error! "+err,{className:"error",clickToHide:true})
        }
      
  });
}


//function wordCount(){
    // for each "Characters remaining: ###" element found
$('.wordcount').each(function(){
// find and store the count readout and the related textarea/input field
var $count = $('.count',this);
var $input = $(this).next();
// .text() returns a string, multiply by 1 to make it a number (for math)
var maximumCount = $count.text()*1;
// update function is called on keyup, paste and input events
var update = function(){
var before = $count.text()*1;
var now = maximumCount - $input.val().length;
// check to make sure users haven't exceeded their limit
if ( now < 0 ){
var str = $input.val();
$input.val( str.substr(0,maximumCount) );
now = 0;
}
// only alter the DOM if necessary
if ( before != now ){
$count.text( now );
}
}
})