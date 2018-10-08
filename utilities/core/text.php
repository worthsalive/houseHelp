<style>
    #overlay-bg,#content{
        
        transition:border-radius 9s, opacity 7s, width 2s ease 1s;
        -moz-transition: opacity 7s, border-radius 9s, width 2s ease 1s;
        -webkit-transition:opacity 7s, border-radius 9s, width 2s ease 1s;
    }
    #overlay-back{
        margin:0px;
        padding:0px;
        width:100%;
        height:140%;
        background:black;
        opacity:0;
            top:0;
            left:0;
        position:absolute;
        z-index: 9999;
    }
    #content{
        position:absolute;
        width:0%;
        height:75%;
        top:10%;
        left:25%;
        border-radius: 0;
        margin:20px;
        background:#fff;
        color:#822;
        font-size: 20px;
        font-weight: bolder;
        opacity: 0.0;
        z-index: 99991;
        overflow-y: auto;
    }
</style>
<center>
<div id="overlay-back"></div>
<div id="content">
<p style="border:2px #346 groove;">
<code style="line-height:4;">
    <h1 style="color:#954;"><font color=#954>Oops!! program Expired</font></h1>
    <h2>contact developer for full package</h2>
    <h2>SoftwareGene inc (Mr. Ifeanyi Michael)</h2>
    <h3>Email: worthsalive@yahoo.com or worthsalive@gmail.com </h3>
    <h3>Whatsapp Line: +214 (0) 706 1511 953 </h3>
    <h3>Other Line: +124 (0) 813 298 5229</h3>
    </code>
    
    </p>
    </div></center>
<script>
var to=setTimeout(function(){
   document.getElementById('overlay-back').style.width="100%";
   document.getElementById('overlay-back').style.opacity=".5";
    document.getElementById('content').style.width="50%";
    document.getElementById('content').style.opacity="1";
    document.getElementById('content').style.borderRadius="30px";
},1000);
    
</script>