//function to display a loader preview with a message
function showLoader(msg){
    //Create style tag
    var newStyle=$("<style></style>");
    var str='.loader-preview{display:none;position:absolute;width:100%;top:0;background:rgba(202,202,202,.5);height:550px;background-image: ; background-position: center; z-index: 99999;}';
    str+='.loader-preview:after{ content: "'+msg+'"; position: absolute; top:45%; left:30%; padding:20px; padding-left:45px; background:#000;   color: #eee; font-weight: 500; background-image: url(loader_icon.gif); background-position: left; background-repeat: no-repeat; border-radius:5px;}';
    newStyle.append(str);
    $('body').append(newStyle);
     //create new div element
    var newDiv=$("<div></div>")
            .attr('class','loader-preview');
    $('body').append(newDiv); 
    $('.loader-preview').fadeIn(1000);
}

function hideLoader(){
    $('.loader-preview').fadeOut(1000);

}