<?php
include('header.php');
?>

<div style="
    background-color: #303954;
    border: 0px solid transparent;
    width: 100%;
    height: 100px;">
</div>

<!-- Page Title / Inner Hero Banner -->
<div class="breadcumb-wrapper mt-5" data-bg-src="images/mesut-kaya-eOcyhe5-9sQ-unsplash.jpg" style="padding: 180px 0 100px; background-size: cover; background-position: center; position: relative; border-radius: 20px; margin: 20px; overflow: hidden; border: 1px solid transparent;">
    <div class="container">
        <div class="breadcumb-content text-center">
            <h1 class="breadcumb-title text-white fw-bold mb-3"><i class="fa-solid fa-envelope me-2"></i>Contact Us</h1>
            <ul class="breadcumb-menu list-inline text-white">
                <li class="list-inline-item"><a href="home.php" class="text-white">Home</a></li>
                <li class="list-inline-item me-2">/</li>
                <li class="list-inline-item active text-white-50">Contact Us</li>
            </ul>
        </div>
    </div>
</div>

<!-- 1. Quick Info Cards Section -->
<section class="contact-info-sec py-4">
    <div class="container">
        <!-- Section Heading -->
        <div class="title-area text-center" style="margin-bottom: 15px !important;">
            <span class="sub-title style1 text-primary fw-bold text-uppercase" style="margin-bottom: 5px !important;"><i class="fa-solid fa-headset me-2"></i>Get In Touch</span>
            <h2 class="sec-title fw-bold" style="margin-bottom: 0 !important;">We Are Here To Help You</h2>
        </div>

        <div class="row text-center g-4 mt-2">
            <!-- Office Address Card -->
            <div class="col-md-4">
                <div class="contact-card style1 bg-white p-4 rounded shadow-sm h-100 border">
                    <div class="box-icon text-primary mb-3">
                        <i class="fa-solid fa-location-dot fs-2"></i>
                    </div>
                    <h4 class="box-title fw-bold mb-2">Our Head Office</h4>
                    <p class="text-muted mb-0">123 Travel Tower, Business Bay,<br>Main Avenue, City - 395007</p>
                </div>
            </div>

            <!-- Phone / Mobile Card -->
            <div class="col-md-4">
                <div class="contact-card style1 bg-white p-4 rounded shadow-sm h-100 border">
                    <div class="box-icon text-primary mb-3">
                        <i class="fa-solid fa-phone-volume fs-2"></i>
                    </div>
                    <h4 class="box-title fw-bold mb-2">Call Us Direct</h4>
                    <p class="text-muted mb-1"><a href="tel:+1234567890" class="text-muted">+1 (234) 567-890</a></p>
                    <p class="text-muted mb-0"><a href="tel:+0987654321" class="text-muted">+1 (098) 765-4321</a></p>
                </div>
            </div>

            <!-- Email Card -->
            <div class="col-md-4">
                <div class="contact-card style1 bg-white p-4 rounded shadow-sm h-100 border">
                    <div class="box-icon text-primary mb-3">
                        <i class="fa-solid fa-paper-plane fs-2"></i>
                    </div>
                    <h4 class="box-title fw-bold mb-2">Email & Support</h4>
                    <p class="text-muted mb-1"><a href="mailto:info@atlasgo.com" class="text-muted">info@atlasgo.com</a></p>
                    <p class="text-muted mb-0"><a href="mailto:support@atlasgo.com" class="text-muted">support@atlasgo.com</a></p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 2. Contact Form & Google Map Section -->
<section class="contact-form-sec space-extra py-5">
    <div class="container">
        <div class="row g-4 align-items-stretch">

            <!-- Left Side: Message Form -->
            <div class="col-lg-7">
                <div class="bg-white p-4 p-md-5 rounded shadow-sm border h-100">
                    <div class="title-area" style="margin-bottom: 20px !important;">
                        <span class="sub-title style1 text-primary fw-bold text-uppercase" style="margin-bottom: 5px !important;"><i class="fa-solid fa-paper-plane me-2"></i>Send A Message</span>
                        <h2 class="sec-title fw-bold" style="margin-bottom: 0 !important;">Do You Have Any Questions?</h2>
                    </div>

                    <form action="contact.php" method="POST" class="contact-form">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control bg-light" name="name" placeholder="Your Name" required style="height: 50px; border-radius: 8px;">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="email" class="form-control bg-light" name="email" placeholder="Your Email Address" required style="height: 50px; border-radius: 8px;">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="tel" class="form-control bg-light" name="phone" placeholder="Phone Number" style="height: 50px; border-radius: 8px;">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control bg-light" name="subject" placeholder="Subject / Inquiry" required style="height: 50px; border-radius: 8px;">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea name="message" class="form-control bg-light" rows="5" placeholder="Write Your Message Here..." required style="border-radius: 8px;"></textarea>
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <button type="submit" class="th-btn style1 w-100" style="height: 52px; border-radius: 8px;">Send Message <i class="fa-solid fa-paper-plane ms-2"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Right Side: Embedded Google Map -->
            <div class="col-lg-5">
                <div class="rounded shadow-sm overflow-hidden h-100 border" style="min-height: 400px;">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14878.016335165445!2d72.822296!3d21.182068!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04e59411d1563%3A0xfe4558290938b042!2sSurat%2C%20Gujarat!5e0!3m2!1sen!2sin!4v1700000000000!5m2!1sen!2sin" width="100%" height="100%" style="border:0; min-height: 400px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>

        </div>
    </div>
</section>

<?php
include('footer.php');
?>