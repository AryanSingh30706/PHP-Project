<?php
include("header.php");
include 'connect.php';
$query = "SELECT * FROM `tbl_package`";
$res = mysqli_query($con, $query);

$count = 0;
$count = mysqli_num_rows($res);

$query1 = "SELECT * FROM `tbl_destination`";
$res1 = mysqli_query($con, $query1);
$count1 = 0;
$count1 = mysqli_num_rows($res1);
$dest = array();
if ($count1 > 0) {
    while ($row = mysqli_fetch_assoc($res1)) {
        $dest[] = $row;
    }
}

$query2 = "SELECT * FROM `tbl_package` LIMIT 0,3;";
$res2 = mysqli_query($con, $query2);

$count2 = mysqli_num_rows($res2);

$pack = array();
if ($count2 > 0) {
    while ($row = mysqli_fetch_assoc($res2)) {
        $pack[] = $row;
    }
}

?>

<style>
    /* All rules below are scoped to .pkgc- prefixed classes so they cannot
       collide with the AtlasGo admin theme's own .container/.card/.grid/etc. */

    .pkgc-wrap {
        --pkgc-ink: #16323A;
        --pkgc-teal: #1F4E52;
        /* --pkgc-sand: #F4EEE1; */
        --pkgc-paper: #FBF8F1;
        --pkgc-brass: #B98B3E;
        --pkgc-coral: #D9573B;
        --pkgc-sage: #8FA98C;
        --pkgc-line: rgba(244, 238, 225, 0.28);

        background: var(--pkgc-sand);
        font-family: 'Inter', sans-serif;
        color: var(--pkgc-ink);
        padding: 1rem 1.5rem 2rem;
        border-radius: 12px;
    }

    .pkgc-wrap *,
    .pkgc-wrap *::before,
    .pkgc-wrap *::after {
        box-sizing: border-box;
    }

    .pkgc-head {
        max-width: 1180px;
        margin: 0 auto 2.5rem;
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .pkgc-eyebrow {
        font-family: 'IBM Plex Mono', monospace;
        font-size: 0.75rem;
        letter-spacing: 0.14em;
        text-transform: uppercase;
        color: var(--pkgc-brass);
        margin: 0 0 0.4rem;
    }

    .pkgc-head h1 {
        font-family: 'Fraunces', serif;
        font-weight: 600;
        font-size: 2.4rem;
        margin: 0 0 0.4rem;
        letter-spacing: -0.01em;
        color: var(--pkgc-ink);
    }

    .pkgc-head p {
        margin: 0;
        color: var(--pkgc-teal);
        font-size: 0.95rem;
    }

    .pkgc-add-btn {
        font-family: 'Inter', sans-serif;
        font-size: 0.85rem;
        font-weight: 500;
        background: var(--pkgc-ink);
        color: var(--pkgc-paper);
        border: none;
        padding: 0.7rem 1.2rem;
        border-radius: 8px;
        cursor: pointer;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        white-space: nowrap;
    }

    .pkgc-add-btn:hover {
        background: var(--pkgc-teal);
        color: var(--pkgc-paper);
    }

    .pkgc-flash {
        max-width: 1180px;
        margin: 0 auto 1.5rem;
        background: var(--pkgc-paper);
        border: 1px solid var(--pkgc-sage);
        color: var(--pkgc-teal);
        font-family: 'IBM Plex Mono', monospace;
        font-size: 0.8rem;
        padding: 0.7rem 1rem;
        border-radius: 8px;
    }

    .pkgc-grid {
        max-width: 1180px;
        width: 100%;
        min-width: 0;
        margin: 0 auto;
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 1.75rem;
        perspective: 1600px;
    }

    @media (max-width:980px) {
        .pkgc-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width:640px) {
        .pkgc-grid {
            grid-template-columns: minmax(0, 1fr);
        }
    }

    .pkgc-flip {
        position: relative;
        height: 400px;
        min-width: 0;
    }

    .pkgc-flip-inner {
        position: relative;
        width: 100%;
        height: 100%;
        text-align: left;
        transition: transform .6s cubic-bezier(.175, .885, .32, 1.1);
        transform-style: preserve-3d;
    }

    .pkgc-flip:hover .pkgc-flip-inner,
    .pkgc-flip:focus-within .pkgc-flip-inner {
        transform: rotateY(180deg);
    }

    .pkgc-face {
        position: absolute;
        inset: 0;
        backface-visibility: hidden;
        border-radius: 14px;
        overflow: hidden;
        pointer-events: none;
    }

    .pkgc-flip .pkgc-front {
        pointer-events: auto;
    }

    .pkgc-flip:hover .pkgc-front,
    .pkgc-flip:focus-within .pkgc-front {
        pointer-events: none;
    }

    .pkgc-flip:hover .pkgc-back,
    .pkgc-flip:focus-within .pkgc-back {
        pointer-events: auto;
    }

    /* ---------- FRONT ---------- */
    .pkgc-front {
        background-color: var(--pkgc-teal);
        background-size: cover;
        background-position: center;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        padding: 1.1rem;
    }

    .pkgc-front::after {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg, rgba(22, 50, 58, 0.15) 0%, rgba(22, 50, 58, 0.1) 40%, rgba(22, 50, 58, 0.88) 100%);
        z-index: 0;
    }

    .pkgc-front>* {
        position: relative;
        z-index: 1;
        min-width: 0;
    }

    .pkgc-id-row {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
    }

    .pkgc-pill {
        font-family: 'IBM Plex Mono', monospace;
        font-size: 0.68rem;
        letter-spacing: 0.04em;
        background: rgba(251, 248, 241, 0.92);
        color: var(--pkgc-ink);
        padding: 0.3rem 0.6rem;
        border-radius: 20px;
        white-space: nowrap;
    }

    .pkgc-pill.pkgc-dest {
        background: rgba(185, 139, 62, 0.92);
        color: var(--pkgc-paper);
    }

    .pkgc-front-title {
        font-family: 'Fraunces', serif;
        font-weight: 600;
        font-size: 2rem;
        color: var(--pkgc-paper);
        line-height: 1.15;
        margin: 0 0 0.15rem;
        overflow-wrap: normal;
        word-break: normal;
    }

    .pkgc-front-sub {
        font-family: 'IBM Plex Mono', monospace;
        font-size: 1rem;
        color: white;
        opacity: 0.85;
        margin: 0;
    }



    /* ---------- BACK ---------- */
    .pkgc-back {
        transform: rotateY(180deg);
        background: var(--pkgc-ink);
        color: var(--pkgc-sand);
        padding: 1.1rem 1.2rem 1.2rem;
        display: flex;
        flex-direction: column;
    }

    .pkgc-back-top {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 0.6rem;
        gap: 0.5rem;
    }

    .pkgc-back-title {
        font-family: 'Fraunces', serif;
        font-weight: 600;
        font-size: 1.2rem;
        margin: 0 0 0.15rem;
        color: var(--pkgc-paper);
    }

    .pkgc-type-tag {
        font-family: 'IBM Plex Mono', monospace;
        font-size: 0.65rem;
        letter-spacing: 0.06em;
        text-transform: uppercase;
        color: var(--pkgc-sage);
        margin: 0;
    }

    .pkgc-price {
        font-family: 'IBM Plex Mono', monospace;
        font-size: 1.1rem;
        font-weight: 500;
        color: var(--pkgc-coral);
        white-space: nowrap;
    }

    .pkgc-desc {
        font-size: 0.8rem;
        line-height: 1.5;
        color: white;
        opacity: 0.85;
        margin: 0 0 0.7rem;
        overflow: hidden;
        display: -webkit-box;
        /* -webkit-line-clamp: 4; */
        -webkit-box-orient: vertical;
    }

    .pkgc-stub {
        position: relative;
        border-top: 1.5px dashed var(--pkgc-line);
        padding-top: 0.65rem;
        margin-top: auto;
    }

    .pkgc-ticket-fields {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 0.5rem;
        margin-bottom: 0.75rem;
    }

    .pkgc-tf-label {
        font-family: 'IBM Plex Mono', monospace;
        font-size: 0.6rem;
        letter-spacing: 0.05em;
        text-transform: uppercase;
        color: var(--pkgc-sage);
        margin: 0 0 0.15rem;
    }

    .pkgc-tf-value {
        font-family: 'IBM Plex Mono', monospace;
        font-size: 0.78rem;
        color: var(--pkgc-paper);
        margin: 0;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .pkgc-actions {
        display: flex;
        gap: 5px;
    }

    .pkgc-actions a {
        flex: 1;
        text-align: center;
        font-family: 'Inter', sans-serif;
        font-size: 0.78rem;
        font-weight: 500;
        padding: 0.55rem 0.5rem;
        border-radius: 8px;
        border: 1px solid var(--pkgc-line);
        cursor: pointer;
        transition: transform .15s ease, background .15s ease;
        text-decoration: none;
    }

    .pkgc-actions a:active {
        transform: scale(0.97);
    }

    .pkgc-btn-edit {
        background: var(--pkgc-brass);
        color: var(--pkgc-ink);
        border-color: var(--pkgc-brass);
    }

    .pkgc-btn-edit:hover {
        background: #a67a34;
        color: var(--pkgc-ink);
    }

    .pkgc-btn-delete {
        background: transparent;
        color: var(--pkgc-coral);
        border-color: var(--pkgc-coral);
    }

    .pkgc-btn-delete:hover {
        background: rgba(217, 87, 59, 0.12);
        color: var(--pkgc-coral);
    }

    .pkgc-empty-state {
        max-width: 1180px;
        margin: 0 auto;
        text-align: center;
        padding: 3rem 1rem;
        color: var(--pkgc-teal);
        font-family: 'IBM Plex Mono', monospace;
        font-size: 0.85rem;
    }
</style>

<div class="th-hero-wrapper hero-1" id="hero">
    <div class="swiper th-slider hero-slider-1" id="heroSlide1"
        data-slider-options='{"effect":"fade","menu": ["", "", ""],"heroSlide1": {"swiper-container": {"pagination": {"el": ".swiper-pagination", "clickable": true }}}}'>
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="hero-inner">
                    <div class="th-hero-bg" data-bg-src="assets1/img/hero/hero_bg_1_1.jpg"></div>
                    <div class="container">
                        <div class="hero-style1"><span class="sub-title style1" data-ani="slideinup"
                                data-ani-delay="0.2s">Get unforgetable pleasure with us</span>
                            <h1 class="hero-title" data-ani="slideinup" data-ani-delay="0.4s">Natural Wonder of the
                                world</h1>
                            <div class="btn-group" data-ani="slideinup" data-ani-delay="0.6s"><a href="tour.html"
                                    class="th-btn th-icon">Explore Tours</a> <a href="service.html"
                                    class="th-btn style2 th-icon">Our Services</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="hero-inner">
                    <div class="th-hero-bg" data-bg-src="assets1/img/hero/hero_bg_1_2.jpg"></div>
                    <div class="container">
                        <div class="hero-style1"><span class="sub-title style1" data-ani="slideinup"
                                data-ani-delay="0.2s">Get unforgetable pleasure with us</span>
                            <h1 class="hero-title" data-ani="slideinup" data-ani-delay="0.4s">Let’s make your best
                                trip with us</h1>
                            <div class="btn-group" data-ani="slideinup" data-ani-delay="0.6s"><a href="tour.html"
                                    class="th-btn th-icon">Explore Tours</a> <a href="service.html"
                                    class="th-btn style2 th-icon">Our Services</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="hero-inner">
                    <div class="th-hero-bg" data-bg-src="assets1/img/hero/hero_bg_1_3.jpg"></div>
                    <div class="container">
                        <div class="hero-style1"><span class="sub-title style1" data-ani="slideinup"
                                data-ani-delay="0.2s">Get unforgetable pleasure with us</span>
                            <h1 class="hero-title" data-ani="slideinup" data-ani-delay="0.4s">Explore beauty of the
                                whole world</h1>
                            <div class="btn-group" data-ani="slideinup" data-ani-delay="0.6s"><a href="tour.html"
                                    class="th-btn th-icon">Explore Tours</a> <a href="service.html"
                                    class="th-btn style2 th-icon">Our Services</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="th-swiper-custom"><button data-slider-prev="#heroSlide1" class="slider-arrow slider-prev"><img
                    src="assets1/img/icon/right-arrow.svg" alt=""></button>
            <div class="slider-pagination"></div><button data-slider-next="#heroSlide1"
                class="slider-arrow slider-next"><img src="assets1/img/icon/left-arrow.svg" alt=""></button>
        </div>
    </div>
</div>
<div class="booking-sec">
    <div class="container">
        <form action="https://html.themeholy.com/tourm/demo/mail.php" method="POST"
            class="booking-form ajax-contact">
            <div class="input-wrap">
                <div class="row align-items-center justify-content-between">
                    <div class="form-group col-md-6 col-lg-auto">
                        <div class="icon"><i class="fa-light fa-route"></i></div>
                        <div class="search-input"><label>Destination</label> <select name="subject" id="subject"
                                class="form-select nice-select">
                                <option value="Select Destination" selected="selected" disabled="disabled">Select
                                    Destination</option>
                                <option value="Australia">Australia</option>
                                <option value="Dubai">Dubai</option>
                                <option value="England">England</option>
                                <option value="Sweden">Sweden</option>
                                <option value="Thailand">Thailand</option>
                                <option value="Egypt">Egypt</option>
                                <option value="Saudi Arab">Saudi Arab</option>
                                <option value="Switzerland">Switzerland</option>
                                <option value="Scandinavia">Scandinavia</option>
                                <option value="Western Europe">Western Europe</option>
                                <option value="Indonesia">Indonesia</option>
                                <option class="Italy">Italy</option>
                            </select></div>
                    </div>
                    <div class="form-group col-md-6 col-lg-auto">
                        <div class="icon"><i class="fa-regular fa-person-hiking"></i></div>
                        <div class="search-input"><label>Type</label> <select class="nice-select" name="Adventure"
                                id="Adventure">
                                <option value="Adventure" selected="selected" disabled="disabled">Adventure</option>
                                <option value="Beach">Beach</option>
                                <option value="Group Tour">Group Tour</option>
                                <option value="Couple Tour">Couple Tour</option>
                                <option value="Family Tour">Family Tour</option>
                            </select></div>
                    </div>
                    <div class="form-group col-md-6 col-lg-auto">
                        <div class="icon"><i class="fa-light fa-clock"></i></div>
                        <div class="search-input"><label>Duration</label> <select class="form-select nice-select"
                                name="Duration" id="Duration">
                                <option value="Normal" selected="selected" disabled="disabled">Duration</option>
                                <option value="1">1 days</option>
                                <option value="2">2 days</option>
                                <option value="3">3 days</option>
                                <option value="4">4 days</option>
                                <option value="5">5 days</option>
                                <option value="6">6 days</option>
                                <option value="7">7 days</option>
                            </select></div>
                    </div>
                    <div class="form-group col-md-6 col-lg-auto">
                        <div class="icon"><i class="fa-light fa-map-location-dot"></i></div>
                        <div class="search-input"><label>Tour Category</label> <select name="subject" id="category"
                                class="form-select nice-select">
                                <option value="Normal" selected="selected" disabled="disabled">Luxury</option>
                                <option value="1">Delux</option>
                                <option value="2">Economy</option>
                            </select></div>
                    </div>
                    <div class="form-btn col-md-12 col-lg-auto"><button class="th-btn"><img
                                src="assets1/img/icon/search.svg" alt="">Search</button></div>
                </div>
                <p class="form-messages mb-0 mt-3"></p>
            </div>
        </form>
    </div>
</div>

<body>

    <section class="category-area bg-top-center" data-bg-src="assets/img/bg/category_bg_1.png">
        <div class="container th-container">
            <div class="title-area text-center"><span class="sub-title">The Traveler’s Lens</span>
                <!-- <h2 class="sec-title">The Traveler’s Lens</h2> -->
            </div>
            <div class="swiper categorySlider" id="categorySlide">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="category-card single">
                            <div class="box-img global-img"><img style="height: 300px;" src="https://img.magnific.com/free-photo/beautiful-girl-standing-boat-looking-mountains-ratchaprapha-dam-khao-sok-national-park-surat-thani-province-thailand_335224-849.jpg?semt=ais_hybrid&w=740&q=80" alt="Image">
                            </div>
                            <!-- <h3 class="box-title"><a href="destination.html">Cruises</a></h3><a class="line-btn"
                                href="destination.html">See more</a> -->
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="category-card single">
                            <div class="box-img global-img"><img style="height: 300px;" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRVuE_jXA3lU75BCIQzv9HAKmtfWgefakdKjXcz3WKJhFC84HybStVLFPaa&s=10" alt="Image">
                            </div>
                            <!-- <h3 class="box-title"><a href="destination.html">Hiking</a></h3><a class="line-btn"
                                href="destination.html">See more</a> -->
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="category-card single">
                            <div class="box-img global-img"><img style="height: 300px;" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSYx4aeJAQSDPVdd-MCyKk7twMUUOYbznxcTybU59abvaIFpoVys2EhvTs3&s=10" alt="Image">
                            </div>
                            <!-- <h3 class="box-title"><a href="destination.html">Airbirds</a></h3><a class="line-btn"
                                href="destination.html">See more</a> -->
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="category-card single">
                            <div class="box-img global-img"><img style="height: 300px;" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSeUZIKFWeqCjpbwGsHkwkayUJN9X-hCTXbTTTS4yxRK2WQPBkNDvHFs_XZ&s=10" alt="Image">
                            </div>
                            <!-- <h3 class="box-title"><a href="destination.html">Wildlife</a></h3><a class="line-btn"
                                href="destination.html">See more</a> -->
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="category-card single">
                            <div class="box-img global-img"><img style="height: 300px;" src="https://media.istockphoto.com/id/2161498980/photo/woman-walking-on-crowded-street-in-old-town-of-jaisalmer-india.jpg?s=612x612&w=0&k=20&c=Gs6D-17Ozj5DRzJ0NQwiz2duJtS1Zu8ZEUij5Knxy88=" alt="Image">
                            </div>
                            <!-- <h3 class="box-title"><a href="destination.html">Walking</a></h3><a class="line-btn"
                                href="destination.html">See more</a> -->
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="category-card single">
                            <div class="box-img global-img"><img style="height: 300px;" src="https://img.magnific.com/premium-photo/indian-young-handsome-man-historical-palace-qutub-minar-travel-india-image_181020-1347.jpg?semt=ais_hybrid&w=740&q=80" alt="Image">
                            </div>
                            <!-- <h3 class="box-title"><a href="destination.html">Cruises</a></h3><a class="line-btn"
                                href="destination.html">See more</a> -->
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="category-card single">
                            <div class="box-img global-img"><img style="height: 300px;" src="https://media.istockphoto.com/id/1477512135/photo/group-of-friends-admiring-view-at-historic-site.jpg?s=612x612&w=0&k=20&c=LyLbPa_3Y_TjBdca-lQeReHNqR1WwxxIwi5XhxW_F7w=" alt="Image">
                            </div>
                            <!-- <h3 class="box-title"><a href="destination.html">Hiking</a></h3><a class="line-btn"
                                href="destination.html">See more</a> -->
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="category-card single">
                            <div class="box-img global-img"><img style="height: 300px;" src="https://img.magnific.com/free-photo/beautiful-girl-standing-boat-looking-mountains-ratchaprapha-dam-khao-sok-national-park-surat-thani-province-thailand_335224-849.jpg?semt=ais_hybrid&w=740&q=80" alt="Image">
                            </div>
                            <!-- <h3 class="box-title"><a href="destination.html">Airbirds</a></h3><a class="line-btn"
                                href="destination.html">See more</a> -->
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="category-card single">
                            <div class="box-img global-img"><img style="height: 300px;" src="https://media.istockphoto.com/id/1487684660/photo/walking-along-the-corniche-at-sunset-is-a-magical-experience-with-the-warm-hues-of-the-sky.jpg?s=612x612&w=0&k=20&c=bbjP66K2LfvnVD9v7WradKnUEZLyCSDO-50TIS95QVU=" alt="Image">
                            </div>
                            <!-- <h3 class="box-title"><a href="destination.html">Wildlife</a></h3><a class="line-btn"
                                href="destination.html">See more</a> -->
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="category-card single">
                            <div class="box-img global-img"><img style="height: 300px;" src="https://media.istockphoto.com/id/1049409042/photo/young-woman-reading-map-in-bundi-temple.jpg?s=612x612&w=0&k=20&c=SCHmCHCI8fgtMBnmkGG61VLhSVgvzoL52s_fSy2JCjQ=" alt="Image">
                            </div>
                            <!-- <h3 class="box-title"><a href="destination.html">Walking</a></h3><a class="line-btn"
                                href="destination.html">See more</a> -->
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="category-card single">
                            <div class="box-img global-img"><img style="height: 300px;" src="https://media.istockphoto.com/id/1403617423/photo/young-woman-tourist-in-sun-hat-and-white-dress-standing-in-front-of-eiffel-tower-in-paris-at.jpg?s=612x612&w=0&k=20&c=5M4C_uB1F7HVhLG1Z82yn3uthqAU_arGvpJiNO88bhg=" alt="Image">
                            </div>
                            <!-- <h3 class="box-title"><a href="destination.html">Cruises</a></h3><a class="line-btn"
                                href="destination.html">See more</a> -->
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="category-card single">
                            <div class="box-img global-img"><img style="height: 300px;" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS3oy8iG5aXqET8x2skwacufKb07UoO-0vq3cHkiVwbb8qZO47QkzZSu__A&s=10" alt="Image">
                            </div>
                            <!-- <h3 class="box-title"><a href="destination.html">Cruises</a></h3><a class="line-btn"
                                href="destination.html">See more</a> -->
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>

    <style>
        /* Target the image inside the destination box */
        .destination-img img {
            width: 100%;
            height: 600px;
            /* You can adjust this height based on your design needs */
            object-fit: cover;
            /* Ensures the image fills the box without distorting */
            border-radius: 20px;
            /* Optional: matches the rounded corners in your screenshot */
            display: block;
        }

        /* Ensure the parent container can properly hold the absolute positioned content */
        .destination-img {
            position: relative;
            width: 100%;
            overflow: hidden;
        }

        .destination-content {
            /* Adds space inside the container on all sides */
            padding: 25px;

            /* Ensures the padding doesn't make the container wider than the image */
            box-sizing: border-box;

            /* Assuming this container is absolutely positioned at the bottom */
            width: 100%;
            position: absolute;
            bottom: 0;
            left: 0;

            /* If you want the text on the left and button on the right, ensure flexbox is on */
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            /* or center, depending on your design */
        }

        .th-btn {
            white-space: nowrap;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }
    </style>

    <div class="destination-area position-relative overflow-hidden mt-5" style="margin-bottom: 100px;">
        <div class="container">
            <div class="title-area text-center"><span class="sub-title">Top Destinations</span>
                <h2 class="sec-title">Popular Destinations</h2>
            </div>
            <div class="swiper th-slider destination-slider" id="aboutSlider1"
                data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"2"},"992":{"slidesPerView":"3"},"1200":{"slidesPerView":"3"}},"effect":"coverflow","coverflowEffect":{"rotate":"0","stretch":"95","depth":"212","modifier":"1"},"centeredSlides":"true"}'>
                <div class="swiper-wrapper">

                    <?php foreach ($dest as $d): ?>
                        <div class="swiper-slide">
                            <div class="destination-box gsap-cursor">
                                <div class="destination-img"><img src="<?= $d['dpic'] ?>"
                                        alt="destination image">
                                    <div class="destination-content">
                                        <div class="media-left">
                                            <h4 class="box-title"><a href="destination-details.html"><?= $d['dname'] ?></a></h4><span
                                                class="destination-subtitle">Type : <?php echo $d['type'] ?></span>
                                        </div>
                                        <div class=""><a href="destination.php" class="th-btn style2 th-icon">View
                                                All</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="about-area position-relative overflow-hidden pb-0" id="about-sec">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="img-box1">
                        <div class="img1"><img src="assets/img/normal/about_1_1.jpg" alt="About"></div>
                        <div class="img2"><img src="assets/img/normal/about_1_2.jpg" alt="About"></div>
                        <div class="img3"><img src="assets/img/normal/about_1_3.jpg" alt="About"></div>
                    </div>
                </div>
                <div class="col-xl-6 ">
                    <div class="ps-xl-4 ms-xl-2">
                        <div class="title-area mb-20 pe-xl-5 me-xl-5"><span class="sub-title style1">Let’s Go
                                Together</span>
                            <h2 class="sec-title mb-20 pe-xl-5 me-xl-5 heading">Plan Your Trip With us</h2>
                            <p class="sec-text mb-30">Discover unforgettable destinations and create lasting memories with custom travel experiences tailored just for you. From breathtaking landscapes to rich cultural journeys, we take care of every detail so you can focus on the adventure.</p>
                        </div>
                        <div class="about-item-wrap">
                            <div class="about-item">
                                <div class="about-item_img"><img src="assets/img/icon/map3.svg" alt=""></div>
                                <div class="about-item_centent">
                                    <h5 class="box-title">Exclusive Trip</h5>
                                    <p class="about-item_text">Handcrafted itineraries designed around your preferences, offering unique experiences you won't find anywhere else.</p>
                                </div>
                            </div>
                            <div class="about-item">
                                <div class="about-item_img"><img src="assets/img/icon/guide.svg" alt=""></div>
                                <div class="about-item_centent">
                                    <h5 class="box-title">Professional Guide</h5>
                                    <p class="about-item_text">Explore like a local with our certified, experienced guides who bring every destination to life.</p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-35"><a href="about_us.php" class="th-btn style3 th-icon">Learn More</a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="shape-mockup shape1 d-none d-xl-block" data-top="12%" data-left="2%"><img
                src="assets/img/shape/shape_1.png" alt="shape"></div>
        <div class="shape-mockup shape2 d-none d-xl-block" data-top="20%" data-left="3%"><img
                src="assets/img/shape/shape_2.png" alt="shape"></div>
        <div class="shape-mockup shape3 d-none d-xl-block" data-top="14%" data-left="8%"><img
                src="assets/img/shape/shape_3.png" alt="shape"></div>
        <div class="shape-mockup about-shape movingX d-none d-xxl-block" data-bottom="0%" data-right="8%"><img
                src="assets/img/normal/about-slide-img.png" alt="shape"></div>
        <div class="shape-mockup about-rating d-none d-xxl-block" data-bottom="45%" data-right="2%"><i
                class="fa-sharp fa-solid fa-star"></i><span>4.9k</span></div>
        <div class="shape-mockup about-emoji d-none d-xxl-block" data-bottom="25%" data-right="22%"><img
                src="assets/img/icon/emoji.png" alt=""></div>
    </div>


    <section class="position-relative bg-top-center overflow-hidden space" id="service-sec">
        <div class="container">
            <!-- Title Header (Centered) -->
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="title-area text-center">
                        <span class="sub-title">Best Place For You</span>
                        <h2 class="sec-title">Most Popular Tour</h2>
                        <p class="sec-text">Handpicked journeys to the world’s most breathtaking destinations. Explore our top-rated tour packages curated for unforgettable travel experiences.</p>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="pkgc-wrap">
                    <?php if (isset($_GET['msg'])) { ?>
                        <div class="pkgc-flash"><?php echo htmlspecialchars($_GET['msg']); ?></div>
                    <?php } ?>

                    <?php if ($count2 > 0) { ?>
                        <div class="pkgc-grid">
                            <?php
                            $i = 1;
                            foreach ($pack as $p) {
                            ?>
                                <div class="pkgc-flip" tabindex="0">
                                    <div class="pkgc-flip-inner">
                                        <div class="pkgc-face pkgc-front" style="background-image:url('<?php echo $p['pic']; ?>')">
                                            <div class="pkgc-id-row">
                                                <span class="pkgc-pill"><?php echo $i++; ?></span>
                                                <!-- <span class="pkgc-pill pkgc-dest">DID-<?php echo $p['did']; ?></span> -->
                                            </div>
                                            <div>
                                                <h2 class="pkgc-front-title"><?php echo $p['pname']; ?></h2>
                                                <p class="pkgc-front-sub"><?php echo $p['type']; ?></p>
                                                <!-- <p class="pkgc-hover-hint">hover / tap to manage →</p> -->
                                            </div>
                                        </div>
                                        <div class="pkgc-face pkgc-back">
                                            <div class="pkgc-back-top">
                                                <div>
                                                    <h3 class="pkgc-back-title"><?php echo $p['pname']; ?></h3>
                                                    <p class="pkgc-type-tag"><?php echo $p['type']; ?></p>
                                                </div>
                                                <span class="pkgc-price">₹<?php echo $p['price']; ?></span>
                                            </div>
                                            <p class="pkgc-desc"><?php echo $p['description']; ?></p>
                                            <div class="pkgc-stub">
                                                <div class="pkgc-ticket-fields">
                                                    <div>
                                                        <p class="pkgc-tf-label">People</p>
                                                        <p class="pkgc-tf-value"><?php echo $p['no_of_people']; ?></p>
                                                    </div>
                                                    <div>
                                                        <p class="pkgc-tf-label">Date</p>
                                                        <p class="pkgc-tf-value"><?php echo $p['date']; ?></p>
                                                    </div>
                                                    <div>
                                                        <p class="pkgc-tf-label">Time</p>
                                                        <p class="pkgc-tf-value"><?php echo $p['time']; ?></p>
                                                    </div>
                                                </div>
                                                <div class="pkgc-actions">
                                                    <a href="package_info.php?id=<?php echo $p['pid']; ?>" class="pkgc-btn-edit"> More Info </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    <?php } else { ?>
                        <div class="pkgc-empty-state">No packages found. Click "Add New Package" to create one.</div>
                    <?php } ?>
                </div>

            </div>


            <!-- Button placed at the bottom right corner of the slider -->
            <div class="d-flex justify-content-end mt-35">
                <a href="packages.php" class="th-btn style3 th-icon">Show More Packages</a>
            </div>

            <div class="gallery-area" style="margin-top: 150px;">
                <div class="container th-container">
                    <div class="title-area text-center "><span class="sub-title">Make Your Tour Memorable</span>
                        <h2 class="sec-title">Recent Gallery</h2>
                    </div>
                    <div class="row gy-10 gx-10 justify-content-center align-items-center">
                        <div class="col-md-6 col-lg-2">
                            <div class="gallery-card">
                                <div class="box-img global-img"><a href="assets/img/gallery/gallery_1_1.jpg"
                                        class="popup-image">
                                        <div class="icon-btn"><i class="fal fa-magnifying-glass-plus"></i></div><img
                                            src="assets/img/gallery/gallery_1_1.jpg" alt="gallery image">
                                    </a></div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-2">
                            <div class="gallery-card">
                                <div class="box-img global-img"><a href="assets/img/gallery/gallery_1_2.jpg"
                                        class="popup-image">
                                        <div class="icon-btn"><i class="fal fa-magnifying-glass-plus"></i></div><img
                                            src="assets/img/gallery/gallery_1_2.jpg" alt="gallery image">
                                    </a></div>
                            </div>
                            <div class="gallery-card">
                                <div class="box-img global-img"><a href="assets/img/gallery/gallery_1_3.jpg"
                                        class="popup-image">
                                        <div class="icon-btn"><i class="fal fa-magnifying-glass-plus"></i></div><img
                                            src="assets/img/gallery/gallery_1_3.jpg" alt="gallery image">
                                    </a></div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-2">
                            <div class="gallery-card">
                                <div class="box-img global-img"><a href="assets/img/gallery/gallery_1_4.jpg"
                                        class="popup-image">
                                        <div class="icon-btn"><i class="fal fa-magnifying-glass-plus"></i></div><img
                                            src="assets/img/gallery/gallery_1_4.jpg" alt="gallery image">
                                    </a></div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-2">
                            <div class="gallery-card">
                                <div class="box-img global-img"><a href="assets/img/gallery/gallery_1_5.jpg"
                                        class="popup-image">
                                        <div class="icon-btn"><i class="fal fa-magnifying-glass-plus"></i></div><img
                                            src="assets/img/gallery/gallery_1_5.jpg" alt="gallery image">
                                    </a></div>
                            </div>
                            <div class="gallery-card">
                                <div class="box-img global-img"><a href="assets/img/gallery/gallery_1_6.jpg"
                                        class="popup-image">
                                        <div class="icon-btn"><i class="fal fa-magnifying-glass-plus"></i></div><img
                                            src="assets/img/gallery/gallery_1_6.jpg" alt="gallery image">
                                    </a></div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-2">
                            <div class="gallery-card">
                                <div class="box-img global-img"><a href="assets/img/gallery/gallery_1_7.jpg"
                                        class="popup-image">
                                        <div class="icon-btn"><i class="fal fa-magnifying-glass-plus"></i></div><img
                                            src="assets/img/gallery/gallery_1_7.jpg" alt="gallery image">
                                    </a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="shape-mockup d-none d-xl-block" data-top="-25%" data-left="0%"><img src="assets/img/shape/line.png"
                        alt="shape"></div>
                <div class="shape-mockup movingX d-none d-xl-block" data-top="30%" data-left="3%"><img class="gmovingX"
                        src="assets/img/shape/shape_4.png" alt="shape"></div>
            </div>

        </div>
    </section>
</body>


<?php
include("footer.php");
?>