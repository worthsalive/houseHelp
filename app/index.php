
<?php require_once "../utilities/core/init.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $config -> site_title;?> - index</title>
    <link rel="stylesheet" href="flexslider/css/flexslider.css" type="text/css" media="screen" />

	<!-- Modernizr -->
  <script src="flexslider/js/modernizr.js"></script>
    <?php require "inc/header_default.php";?>
    </head>
    <body class="loading" style="transparent !important">
    <?php require_once "inc/header.php";?>
        <div class="container fade-white">
        <div class="row"><!--Slider row-->
            <div class=""><?php include_once "inc/slider.php";?></div>
            </div><!--//slider row-->
            <div class="row">
            <div class="clearfix">&nbsp;</div>
            <div class="clearfix">&nbsp;</div>
            <div class="clearfix">&nbsp;</div>
            <div class="clearfix">&nbsp;</div>
            <div class="clearfix">&nbsp;</div>
            <div class="clearfix">&nbsp;</div>
                
            
            <div class="col col-md-12">
                <div class="panel panel-default">
                    <div class="clearfix"></div>
                    <div class="col col-md-6">
                <div class="panel-body justify" id="about">
                <?php include "inc/home_writeup.html";?>
                    </div>
                </div>
                    <div class="col col-sm-6 justify">
                     <p>
                        Nothing compares with looking potential applicants in the eye, shaking their hands, and telling them why you think the opportunity you’re offering is something they shouldn’t pass up. It is by far the most direct, and generally the most effective way to recruit domestic workers.
Unfortunately, it can also be more expensive and time consuming than other approaches. The following approaches where adopted in recruiting house help manually.
1.	Through the use of community newspapers or bulletin board or a popular restaurant to inform the people on recruitment of house help exercise.
2.	Through the use of religious cleric or traditional leaders to inform the people.
3.	Family or relations encouraging their brother or sister to indulge in the house help recruitment.
4.	School heads enlighten their student to indulge in domestic service to support themselves and their family at large.

                        </p>
                    </div>
                </div>
               
                </div>
                
            </div>
            <!--ABOUT US SECTION-->
            <div class="row ">
            <div class="jumbotron fade-black white-text">
                <h2>ABOUT US</h2>
                <p>
                Web base system for recruitment and Identification of domestic workers is an online application (website) in which job seekers who wish to work as a domestic servant can register themselves online, apply for a job. It provides online help to the users all over the world. It also provides an avenue for the busy executives to showcase their selves. Now it is all possible in a fraction of seconds without consuming much time. Today’s recruitment, applications are designed to do a whole lot more than just reducing paperwork, they can make a significant contribution to an organization or company’s marketing and sales activity. This system makes it possible for the busy executives in Owerri Imo state to access information that is crucial to managing their domestic workers which they can use for promotion decisions, and succession planning.
The proposed system adopts the Structured System Analysis and Design Methodology (SSADM) for development and the tools to use include the Pre-Hypertext Processor (PHP), JavaScript, HTML and CSS. This system if implemented would be very beneficial to both the busy executives and the domestic work seekers as it will provide very easy access to all needed information at their own comfort.

                </p>
                </div>
            </div>
            <!--END OF ABOUT US SECTION-->
            
            <div class="row" id="contact">
            
            <div class="jumbotron fade-white">
                <div class="panel panel-default">
                    <div class="clearfix"></div>
                    <div class="panel-heading">
                    <h1  class="panel-title">Contact us</h1>
                </div>
                    <div class="panel-body">
                    <form>
                    <div class="form-group">
					  <label class="col col-md-4 control-label" for="court">Email</label>  
					  <div class="col col-md-8">
					  <input id="contact_mail" name="contact_mail" placeholder="Please enter your contact_mail id" class="form-control input-lg" type="contact_mail">
					  </div>
                         <div class="clearfix"></div>
					</div>
                        
                        <div class="form-group">
					  <label class="col-md-4 control-label" for="court">Subject</label>  
					  <div class="col col-md-8">
					  <input id="subject" name="subject" placeholder="Subject" class="form-control input-lg" type="text">
					  </div>
                            <div class="clearfix"></div>
					</div>
                        
                        <div class="form-group">
					  <label class="col-md-4 control-label" for="court">Message</label>  
					  <div class="col col-md-8">
                          <textarea id="msg" name="msg" rows=:5 placeholder="Enter your message here" class="form-control input-lg" ></textarea>
					  </div>
                             <div class="clearfix"></div>
					</div>
                        <hr>
                        <div class="form-group right">
                            <button type="submit" class="btn btn-lg btn-primary"><i class="fa fa-send"></i> Send message</button>
                        </div>
                    </form>
                    </div>
            </div>
                </div>
            </div>
            <div class="row">
            <div class="col col-md-4"></div>
            <div class="col col-md-4"></div>
            <div class="col col-md-4"></div>
            </div>
            
            
             <?php require_once "inc/footer.php";?>
        </div><!--//container-->
        
        
         <!-- FlexSlider -->
  <script defer src="flexslider/js/jquery.flexslider.js"></script>

        <script type="text/javascript">
   
    $(document).ready(function(){
      $('.flexslider').flexslider({
        animation: "slide",
        //controlNav: "thumbnails",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
  </script>


  <!-- Optional FlexSlider Additions -->
  <script src="flexslider/js/jquery.easing.js"></script>
  <script src="flexslider/js/jquery.mousewheel.js"></script>
  <script defer src="flexslider/js/demo.js"></script>
        
    </body>
</html>

