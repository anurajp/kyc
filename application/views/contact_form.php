<div class="panel panel-default" style="margin:0 auto;width:500px">
    <div class="panel-heading">
        <h2 class="panel-title">Contact Form</h2>
    </div>
    <div class="panel-body">
        <form name="contactform" method="post" action="/kyc/index.php/hello/mailer" class="form-horizontal" role="form">
            <div class="form-group">
                <label for="inputName" class="col-lg-2 control-label">Name</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Your Name">
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail1" class="col-lg-2 control-label">Email</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" id="inputEmail" name="inputEmail" placeholder="Your Email">
                </div>
            </div>
            <div class="form-group">
                <label for="inputSubject" class="col-lg-2 control-label">Subject</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" id="inputSubject" name="inputSubject" placeholder="Subject Message">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword1" class="col-lg-2 control-label">Message</label>
                <div class="col-lg-10">
                    <textarea class="form-control" rows="4" id="inputMessage" name="inputMessage" placeholder="Your message..."></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                    <button type="submit" class="btn btn-default">
                        Send Message
                    </button>
                </div>
            </div>
        </form>

    </div>
</div>