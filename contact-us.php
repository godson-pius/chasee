<?php
$title = "Chaxze Bank";
require_once 'inc/components/header.php';
?>
<!-- header -->
<header class="page-title page-bg" style="background-image: url(assets/images/Contact.png);">
    <div class="container">
        <div class="page-title-inner">
            <div class="section-title">
                <h1>Contact Us</h1>
                <ul class="page-breadcrumbs">
                    <li><a href="index.php">Home</a></li>
                    <li>Contact us</li>
                </ul>
            </div>
        </div>
    </div>
</header>
<!-- .end header -->
<!-- contact-address-section -->
<section class="contact-address-section pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="box-card fluid-height">
                    <div class="box-card-inner full-height">
                        <div class="box-card-icon mb-25">
                            <img src="assets/images/address.png" width="10" alt="icon"> <!-- you can use icon instead of img. For using icon you should use span tag like: <span><i class="font-name"></i></span> -->
                        </div>
                        <div class="box-card-details">
                            <h3 class="box-card-title mb-20">Address</h3>
                            <p class="box-card-para">Lagos Island, Nigeria</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="box-card fluid-height">
                    <div class="box-card-inner full-height">
                        <div class="box-card-icon mb-25">
                            <img src="assets/images/email.png" width="40" alt="icon"> <!-- you can use icon instead of img. For using icon you should use span tag like: <span><i class="font-name"></i></span> -->
                        </div>
                        <div class="box-card-details">
                            <h3 class="box-card-title mb-20">Email</h3>
                            <p class="box-card-para"><a class="link-us" href="mailto:support@alia.com"> ChaxzeBank@info.com</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="box-card fluid-height">
                    <div class="box-card-inner full-height">
                        <div class="box-card-icon mb-25">
                            <img src="assets/images/call.png" alt="icon"> <!-- you can use icon instead of img. For using icon you should use span tag like: <span><i class="font-name"></i></span> -->
                        </div>
                        <div class="box-card-details">
                            <h3 class="box-card-title mb-20">Phone</h3>
                            <p class="box-card-para"><a class="link-us" href="tel: (+00) 800 0046 674"> (+00) 800 0046 674</a></p>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--end contact-address-section-->
<!-- contact-comment-section -->
<section class="contact-comment-section bg-off-white pt-100 pb-70">
    <div class="container">
        <div class="home-facility-content">
            <div class="row align-items-end">
                <div class="col-sm-12 col-md-12 col-lg-5">
                    <div class="home-facility-image pl-20">
                        <div class="home-facility-item faq-block-image pb-30">
                            <img src="assets/images/contact-comment.png" alt="comment">
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-7">
                    <div class="home-facility-item pb-30">
                        <div class="blog-comment-leave-area contact-comment-leave-area">
                            <h3 class="sub-section-title">Leave a message</h3>
                            <div class="blog-comment-input-area mt-40">
                                <form id="contactForm">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                            <div class="form-group mb-30">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="flaticon-user"></i></span>
                                                    </div>
                                                    <input type="text" name="name" id="name" class="form-control" required data-error="Please enter your name" placeholder="Name*" />
                                                </div>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                            <div class="form-group mb-30">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="flaticon-user"></i></span>
                                                    </div>
                                                    <input type="email" name="email" id="email" class="form-control" required data-error="Please enter your email" placeholder="Email*" />
                                                </div>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                            <div class="form-group mb-30">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="flaticon-phone-call"></i></span>
                                                    </div>
                                                    <input type="text" name="phone_number" id="phone_number" required data-error="Please enter your phone number" class="form-control" placeholder="Phone*" />
                                                </div>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                            <div class="form-group mb-30">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="flaticon-book"></i></span>
                                                    </div>
                                                    <input type="text" name="msg_subject" id="msg_subject" class="form-control" required data-error="Please enter your subject" placeholder="Subject*" />
                                                </div>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <div class="form-group mb-30">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="flaticon-email"></i></span>
                                                    </div>
                                                    <textarea name="message" class="form-control" id="message" rows="5" required data-error="Write your message" placeholder="Your Message*"></textarea>
                                                </div>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <button class="btn1 orange-gradient btn-with-image" type="submit">
                                                <i class="flaticon-login"></i>
                                                <i class="flaticon-login"></i>
                                                Send A Message
                                            </button>
                                            <div id="msgSubmit"></div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--end contact-comment-section-->
   <!-- home-contact-section -->
   <section class="home-contact-section overflow-hidden blue-gradient pt-100 pb-80">
            <div class="home-contact-bg-circle">
                <div class="home-contact-circle-item">
                    <img src="assets/images/lg-circle-1.png" alt="circle">
                </div>
                <div class="home-contact-circle-item">
                    <img src="assets/images/lg-circle-1.png" alt="circle">
                </div>
            </div>
            <div class="container">
                <div class="home-contact-inner">
                    <h2>Create your bank account now!</h2>
                    <p>What’s next in Chaxze Bank? <a href="#">Learn more</a></p>
                    <ul class="section-button">
                        <li>
                            <a href="user/signup.php" class="btn1 orange-gradient btn-with-image">
                                <!-- <i class="flaticon-agenda"></i>
                                <i class="flaticon-agenda"></i> -->
                                Create Your Account
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
<!-- .end home-contact-section -->
<!-- footer -->
<?php require_once 'inc/components/footer.php'; ?>