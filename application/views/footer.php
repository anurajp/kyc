<div id="kyc-contact">
    <div class="container">
        <div class="row">
            <div class="templatemo-line-header head_contact">
                <div class="text-center">
                    <hr class="team_hr team_hr_left hr_gray"/><span class="txt_darkgrey">CONTACT US</span>
                    <hr class="team_hr team_hr_right hr_gray"/>
                </div>
            </div>


            <div class="col-md-12 contact_right">
                <p>Want to tell us about new or missing events or candidates, drop a message</p>
                <p><img src="/images/location.png" alt="icon 1" /> 8D, Vega Tata Aquila Heights Bangalore</p>
                <p><img src="/images/phone1.png"  alt="icon 2" /> +91-8105719832</p>
                <p><img src="/images/globe.png" alt="icon 3" /><a class="link_orange" href="#"><span class="txt_orange">www.know-your-candidates.in</span></a></p>

                <!--<form id="feedback-form" class="form-horizontal" action="http://localhost/index.php/email/send">-->
                <?php echo form_open('email/send', array('id'=>"feedback-form","class"=>"form-horizontal")); ?>

                    <div class="form-group">
                        <input class="form-control" placeholder="Your Name..." maxlength="40" name="iname"/>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Your Email..." maxlength="40" name="iemail"/>
                    </div>
                    <div class="form-group">
                        <textarea  class="form-control" style="height: 130px;" placeholder="Write down your message..." name="imsg"></textarea>
                    </div>
                    <!--<button type="submit" class="btn btn-orange pull-right">SEND</button>-->
                    <input type="submit" class="btn btn-orange pull-right" value="SEND"</input>
                </form>
                <div id="feedback-form-result">

                </div>

            </div>
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /#templatemo-contact -->

<div class="templatemo-team" id="templatemo-about">
    <div class="container">
        <div class="row">
            <div class="templatemo-line-header">
                <div class="text-center">
                    <hr class="team_hr team_hr_left"/><span>MEET OUR TEAM</span>
                    <hr class="team_hr team_hr_right" />
                </div>
            </div>
        </div>
        <div class="clearfix"> </div>
        <ul class="row row_team">
            <li class="col-lg-3 col-md-3 col-sm-6 ">
                <div class="text-center">
                    <div class="member-thumb">
                        <img src="/images/anuraj.jpg" class="img-responsive" alt="member 1" />
                        <div class="thumb-overlay">
                            <a href="https://www.facebook.com/anurajjpandey"><span class="social-icon-fb"></span></a>
                            <a href="https://twitter.com/anurajpandey"><span class="social-icon-twitter"></span></a>
                            <a href="https://www.linkedin.com/profile/view?id=26363176"><span class="social-icon-linkedin"></span></a>
                        </div>
                    </div>
                    <div class="team-inner">
                        <p class="team-inner-header">Anuraj Pandey</p>
                        <p class="team-inner-subtext">Software Developer</p>
                    </div>
                </div>
            </li>
            <li class="col-lg-3 col-md-3 col-sm-6 ">
                <div class="text-center">
                    <div class="member-thumb">
                        <img src="/images/ankur.jpeg" class="img-responsive" alt="member 2" />
                        <div class="thumb-overlay">
                            <a href="https://www.facebook.com/ankur.bansal.37"><span class="social-icon-fb"></span></a>
                            <a href="#"><span class="social-icon-twitter"></span></a>
                            <a href="https://www.linkedin.com/profile/view?id=37067304"><span class="social-icon-linkedin"></span></a>
                        </div>
                    </div>
                    <div class="team-inner">
                        <p class="team-inner-header">Ankur Bansal</p>
                        <p class="team-inner-subtext">Software Developer</p>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div><!-- /.templatemo-team -->



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"  type="text/javascript"></script>
<script src="/js/stickUp.min.js"  type="text/javascript"></script>
<script src="/js/colorbox/jquery.colorbox-min.js"  type="text/javascript"></script>
<script src="/js/templatemo_script.js"  type="text/javascript"></script>
<script type='text/javascript' src='/js/logging.js'></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script type='text/javascript' src='/js/jquery.ui.map.min.js'></script>
<script src="https://raw.github.com/placemarker/jQuery-MD5/master/jquery.md5.js" type="text/javascript"></script>
<script type="text/javascript">
    /*
    $(document).ready(function(){

        function getBrowserFingerprint()
        {
            var sFP = "";
            sFP+="Resolution:"+window.screen.availWidth+"x"+window.screen.availHeight+"\n";
            sFP+="ColorDepth:"+screen.colorDepth+"\n";
            sFP+="UserAgent:"+navigator.userAgent+"\n";
            sFP+="Timezone:"+(new Date()).getTimezoneOffset()+"\n";
            sFP+="Language:"+(navigator.language || navigator.userLanguage)+"\n";
            document.cookie="sFP";
            if (typeof navigator.cookieEnabled != "undefined"
                && navigator.cookieEnabled == true
                && document.cookie.indexOf("sFP") != -1)
                sFP+="Cookies:true\n";
            else
                sFP+="Cookies:false\n"
            sFP+="Plugins:"+jQuery.map(navigator.plugins, function(oElement)
            {
                return "\n"+oElement.name+"-"+oElement.version;
            });
            return $.md5(sFP);
        }

        var result = getBrowserFingerprint() + "anuraj";

    });*/
</script>

<!--<script src="http://pioul.fr/ext/jquery-diyslider/jquery.diyslider.min.js"></script>-->
<!--<script src="http://bxslider.com/lib/jquery.bxslider.js" type="text/javascript"></script>-->


</body>

</html>