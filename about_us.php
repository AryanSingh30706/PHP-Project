<?php
include('header.php');
?>

<style>
    /* Fix text color contrast on style2 buttons */
    .th-btn.style2 {
        background-color: #1ca8cb !important;
        color: #ffffff !important;
        /* Force text to be crisp white */
        border: 1px solid #1ca8cb !important;
    }

    /* Ensure hover state keeps text readable */
    .th-btn.style2:hover {
        background-color: #0d8ca9 !important;
        color: #000000 !important;
    }
</style>

<div style="
    background-color: #303954;
    border: 0px solid transparent;
    width: 100%;
    height: 100px;">
</div>

<!-- Page Title / Inner Hero Banner -->
<div class="breadcumb-wrapper mt-5" data-bg-src="images/jared-rice-649nMi_ymrA-unsplash.jpg" style="padding: 180px 0 100px; background-size: cover; background-position: center; position: relative; border-radius: 20px; margin: 20px; overflow: hidden; border: 1px solid transparent;">
    <div class="container">
        <div class="breadcumb-content text-center">
            <h1 class="breadcumb-title text-white fw-bold mb-3"><i class="fa-solid fa-circle-info me-2"></i>About AtlasGo</h1>
            <ul class="breadcumb-menu list-inline text-white">
                <li class="list-inline-item"><a href="home.php" class="text-white">Home</a></li>
                <li class="list-inline-item me-2">/</li>
                <li class="list-inline-item active text-white-50">About Us</li>
            </ul>
        </div>
    </div>
</div>

<!-- About Section Content -->
<section class="about-sec space-top space-extra-bottom py-5">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-xl-6 mb-4 mb-xl-0">
                <div class="img-box1 position-relative">
                    <div class="img1 rounded overflow-hidden shadow ">
                        <img src="./images/s-well-oj0zeY2Ltk4-unsplash.jpg" class="w-100 rounded" alt="About AtlasGo">
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="ps-xl-4">
                    <div class="title-area mb-30">
                        <span class="sub-title style1 text-primary fw-bold text-uppercase"><i class="fa-solid fa-compass me-2"></i>Get To Know Us</span>
                        <h2 class="sec-title mt-2 fw-bold">Plan Your Unforgettable Journey With AtlasGo</h2>
                    </div>
                    <p class="about-text mb-4 text-muted">
                        At AtlasGo, we believe travel is more than just reaching a destination—it's about the memories, connections, and stories you build along the way. Whether you are looking for luxurious retreats, adrenaline-fueled adventures, or tranquil group tours, we craft itineraries tailored to your wanderlust.
                    </p>

                    <!-- Core Highlights -->
                    <div class="row g-4 mb-4">
                        <div class="col-sm-6">
                            <div class="about-feature d-flex align-items-start">
                                <div class="icon me-3 fs-3 text-primary"><i class="fa-solid fa-route"></i></div>
                                <div class="media-body">
                                    <h5 class="box-title mb-1 fw-bold">Curated Routes</h5>
                                    <p class="feature-text text-muted mb-0 fs-6">Handpicked destinations and personalized itineraries.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="about-feature d-flex align-items-start">
                                <div class="icon me-3 fs-3 text-primary"><i class="fa-solid fa-shield-halved"></i></div>
                                <div class="media-body">
                                    <h5 class="box-title mb-1 fw-bold">Safe & Reliable</h5>
                                    <p class="feature-text text-muted mb-0 fs-6">24/7 dedicated support for worry-free travel.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="btn-group">
                        <a href="destination.php" class="th-btn style1 me-3">Explore Our Tours</a>
                        <a href="contact.php" class="th-btn style2">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 2. Counter / Stats Section -->
<section class="counter-sec bg-light py-4">
    <div class="container">
        <!-- Section Heading with Forced Tight Spacing -->
        <div class="title-area text-center" style="margin-bottom: 15px !important;">
            <span class="sub-title style1 text-primary fw-bold text-uppercase"><i class="fa-solid fa-chart-line me-2"></i>Our Achievement</span>
            <h2 class="sec-title fw-bold" style="margin-bottom: 0 !important;">Numbers That Speak For Us</h2>
        </div>

        <div class="row text-center g-4">
            <!-- Card 1 -->
            <div class="col-6 col-md-3">
                <div class="counter-card style1 bg-white p-4 rounded shadow-sm">
                    <div class="box-icon text-primary mb-3">
                        <i class="fa-solid fa-users fs-2"></i>
                    </div>
                    <h2 class="counter-card_number text-primary fw-bold mb-1">12K+</h2>
                    <p class="counter-card_text text-muted mb-0 fw-medium">Happy Travelers</p>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-6 col-md-3">
                <div class="counter-card style1 bg-white p-4 rounded shadow-sm">
                    <div class="box-icon text-primary mb-3">
                        <i class="fa-solid fa-map-location-dot fs-2"></i>
                    </div>
                    <h2 class="counter-card_number text-primary fw-bold mb-1">75+</h2>
                    <p class="counter-card_text text-muted mb-0 fw-medium">Destinations</p>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-6 col-md-3">
                <div class="counter-card style1 bg-white p-4 rounded shadow-sm">
                    <div class="box-icon text-primary mb-3">
                        <i class="fa-solid fa-star fs-2"></i>
                    </div>
                    <h2 class="counter-card_number text-primary fw-bold mb-1">98%</h2>
                    <p class="counter-card_text text-muted mb-0 fw-medium">Positive Reviews</p>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="col-6 col-md-3">
                <div class="counter-card style1 bg-white p-4 rounded shadow-sm">
                    <div class="box-icon text-primary mb-3">
                        <i class="fa-solid fa-award fs-2"></i>
                    </div>
                    <h2 class="counter-card_number text-primary fw-bold mb-1">10+</h2>
                    <p class="counter-card_text text-muted mb-0 fw-medium">Years Experience</p>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Mission & Vision Section -->
<section class="mission-vision-sec py-5">
    <div class="container">
        <div class="title-area text-center mb-5">
            <span class="sub-title style1 text-primary fw-bold text-uppercase"><i class="fa-solid fa-bullseye me-2"></i>Our Purpose</span>
            <h2 class="sec-title mt-2 fw-bold">Driven by Passion and Adventure</h2>
        </div>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="p-4 rounded border h-100 bg-white shadow-sm">
                    <div class="icon text-primary fs-2 mb-3"><i class="fa-solid fa-rocket"></i></div>
                    <h3 class="box-title fw-bold mb-3">Our Mission</h3>
                    <p class="text-muted mb-0">
                        To empower people to explore the world with ease, safety, and joy. We strive to offer accessible, affordable, and rich travel packages without compromising on quality or authentic local experiences.
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-4 rounded border h-100 bg-white shadow-sm">
                    <div class="icon text-primary fs-2 mb-3"><i class="fa-solid fa-eye"></i></div>
                    <h3 class="box-title fw-bold mb-3">Our Vision</h3>
                    <p class="text-muted mb-0">
                        To become the leading global agency for immersive and sustainable tourism, making eco-friendly travel options, unique cultural encounters, and luxury holidays available to travelers worldwide.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Core Values Section -->
<section class="values-sec bg-light py-5">
    <div class="container">
        <div class="title-area text-center mb-5">
            <span class="sub-title style1 text-primary fw-bold text-uppercase"><i class="fa-solid fa-heart me-2"></i>Why AtlasGo</span>
            <h2 class="sec-title mt-2 fw-bold">The Core Values We Live By</h2>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="value-card text-center p-4 bg-white rounded shadow-sm h-100">
                    <div class="icon text-primary fs-1 mb-3"><i class="fa-solid fa-handshake"></i></div>
                    <h4 class="fw-bold mb-2">Trust & Transparency</h4>
                    <p class="text-muted mb-0">No hidden costs or fine print. We provide straightforward bookings with transparent policies.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="value-card text-center p-4 bg-white rounded shadow-sm h-100">
                    <div class="icon text-primary fs-1 mb-3"><i class="fa-solid fa-earth-americas"></i></div>
                    <h4 class="fw-bold mb-2">Sustainable Travel</h4>
                    <p class="text-muted mb-0">We respect local eco-systems and cultural heritage, advocating for responsible travel habits.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="value-card text-center p-4 bg-white rounded shadow-sm h-100">
                    <div class="icon text-primary fs-1 mb-3"><i class="fa-solid fa-headset"></i></div>
                    <h4 class="fw-bold mb-2">Dedicated Service</h4>
                    <p class="text-muted mb-0">Our support team works around the clock to make sure your journey is smooth and pleasant.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Tour Guides / Team Section -->
<section class="team-sec py-5">
    <div class="container">
        <div class="title-area text-center mb-5">
            <span class="sub-title style1 text-primary fw-bold text-uppercase"><i class="fa-solid fa-users me-2"></i>Meet The Team</span>
            <h2 class="sec-title mt-2 fw-bold">Our Experienced Tour Specialists</h2>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="team-card text-center border rounded overflow-hidden bg-white shadow-sm">
                    <img src="https://t3.ftcdn.net/jpg/06/60/85/20/360_F_660852077_n6IKqpknrEOoSNnETf10FO6w4Na3KYWV.jpg" class="w-100" style="height: 250px; object-fit: cover;" alt="Team Member">
                    <div class="p-3">
                        <h5 class="fw-bold mb-1">Alex Morgan</h5>
                        <p class="text-muted small mb-0">Senior Tour Guide</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="team-card text-center border rounded overflow-hidden bg-white shadow-sm">
                    <img src="https://media.istockphoto.com/id/2074951678/photo/asian-businesswoman-using-digital-tablet-at-airport-lounge-while-waiting-for-the-flight.jpg?s=612x612&w=0&k=20&c=2mYmX6_I1ngpU3C_CbU2J8dqznSsdTi_dAT7bQlaapE=" class="w-100" style="height: 250px; object-fit: cover;" alt="Team Member">
                    <div class="p-3">
                        <h5 class="fw-bold mb-1">Sophia Chen</h5>
                        <p class="text-muted small mb-0">Travel Consultant</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="team-card text-center border rounded overflow-hidden bg-white shadow-sm">
                    <img src="https://thumbs.dreamstime.com/b/phone-portrait-business-man-city-online-social-media-networking-website-town-travel-professional-male-worker-295767260.jpg" class="w-100" style="height: 250px; object-fit: cover;" alt="Team Member">
                    <div class="p-3">
                        <h5 class="fw-bold mb-1">David Smith</h5>
                        <p class="text-muted small mb-0">Operations Manager</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include('footer.php');
?>