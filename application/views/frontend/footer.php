<!-- BEGIN PRE-FOOTER -->
<div class="pre-footer">
    <div class="container">
        <div class="row">
            <!-- BEGIN BOTTOM ABOUT BLOCK -->
            <div class="col-md-4 col-sm-6 pre-footer-col">
                <h2>About Us</h2>
                <p>We’re a smart, passionate group of people who work really hard so you don’t have to. We strive to make our tools powerful enough for professional researchers, yet easy enough for a survey novice.</p>

                <div class="">
                    <h2></h2>
                    <img alt="" src="<?php echo base_url(); ?>assets/uploads/img/logo-corp.png">
                </div>
            </div>
            <!-- END BOTTOM ABOUT BLOCK -->

            <!-- BEGIN BOTTOM CONTACTS -->
            <div class="col-md-4 col-sm-6 pre-footer-col">
                <h2>Hubungi Kami</h2>
                <address class="margin-bottom-40">
                    Jl. Binamulya 1 no A2 Kavling Rejomulyo<br>
                    Madiun, Jawa Timur<br>
                    Phone: 0857 2000 4220<br>
                    WhatsApp: 0857 2000 4220<br>
                    Email: <a href="mailto:dedy90.informatika@gmail.com">dedy90.informatika@gmail.com</a><br>
                </address>

                <div class="pre-footer-subscribe-box pre-footer-subscribe-box-vertical">
                    <h2>Subscriber</h2>
                    <p>Follow me for newsletter and promo other product !</p>
                    <div style="display:none;" class="alert alert-warning" id="warning" >I'm Sorry, Email Not Valid !</div>
                    <form id="subscriber" action="<?php echo base_url('dashboard/addSubscriber');?>" method="post">
                        <div class="input-group">
                            <input type="text" name="email_subs" id="email_subs" placeholder="email-anda@mail.com" class="form-control">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="button" onclick="submitForm();">Subscribe</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END BOTTOM CONTACTS -->

            <!-- BEGIN TWITTER BLOCK --> 
            <div class="col-md-4 col-sm-6 pre-footer-col">
                <h2 class="margin-bottom-10">Engagement Survey..</h2>
                <img alt="" src="<?php echo base_url(); ?>assets/uploads/img/word_cloud.png" width="100%;">
            </div>
            <!-- END TWITTER BLOCK -->
        </div>
    </div>
</div>
<!-- END PRE-FOOTER -->

<!-- BEGIN FOOTER -->
<div class="footer">
    <div class="container">
        <div class="row">
            <!-- BEGIN COPYRIGHT -->
            <div class="col-md-6 col-sm-6 padding-top-10">
                <?php echo date('Y');?> © Dedy Pradana. ALL Rights Reserved.
            </div>
            <!-- END COPYRIGHT -->
            <!-- BEGIN PAYMENTS -->
            <div class="col-md-6 col-sm-6">
<!--                <ul class="social-footer list-unstyled list-inline pull-right">
                    <li><a href="javascript:;"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="javascript:;"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="javascript:;"><i class="fa fa-dribbble"></i></a></li>
                    <li><a href="javascript:;"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="javascript:;"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="javascript:;"><i class="fa fa-skype"></i></a></li>
                    <li><a href="javascript:;"><i class="fa fa-github"></i></a></li>
                    <li><a href="javascript:;"><i class="fa fa-youtube"></i></a></li>
                    <li><a href="javascript:;"><i class="fa fa-dropbox"></i></a></li>
                </ul>  -->
            </div>
            <!-- END PAYMENTS -->
        </div>
    </div>
</div>
<!-- END FOOTER -->
<script>
function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}
function submitForm(){
    email = $('#email_subs').val();
    check = validateEmail(email);
    if(check){
        document.getElementById("subscriber").submit();
    }else{
        document.getElementById('warning').style.display = "block";
        return false;
    }
}
</script>