<?php
include("header.php");
include 'connect.php';




$query1 = "SELECT * FROM `tbl_destination`";
$res1 = mysqli_query($con, $query1);
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
    /* =========================================================
       1. PACKAGE CARDS CSS (UNTOUCHED)
       ========================================================= */
    .pkgc-wrap {
        --pkgc-ink: #16323A;
        --pkgc-teal: #1F4E52;
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

    /* =========================================================
       2. HERO & SEARCH BAR OVERLAP (BOOTSTRAP OPTIMIZED)
       ========================================================= */
    .hero-search-wrap {
        position: relative;
        z-index: 1;
    }

    .hero-search-wrap .th-hero-wrapper.hero-1 {
        height: 700px;
        overflow: visible;
    }

    .hero-search-wrap .swiper,
    .hero-search-wrap .swiper-wrapper,
    .hero-search-wrap .swiper-slide,
    .hero-search-wrap .hero-inner,
    .hero-search-wrap .th-hero-bg {
        height: 100%;
        width: 100%;
    }

    .hero-search-wrap .th-hero-bg {
        position: absolute;
        top: 0;
        left: 0;
        background-size: cover !important;
        background-position: center !important;
        z-index: -1;
    }

    /* Search Bar Overlap Positioning */
    .booking-sec {
        position: relative;
        z-index: 99;
        transform: translateY(-50%);
        margin-bottom: -60px;
    }

    /* Strip default select styles */
    .clean-select {
        border: none !important;
        background-color: transparent !important;
        padding: 0 15px 0 0 !important;
        font-size: 15px;
        /* Slightly bigger options, but smaller than header */
        font-weight: 600;
        color: #555;
        /* Slightly softer color so the header stands out */
        box-shadow: none !important;
        cursor: pointer;
        appearance: none;
        -webkit-appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='10' height='10' viewBox='0 0 24 24' fill='none' stroke='%23666' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right center;
    }

    .clean-select:focus {
        outline: none;
    }

    /* Responsive Column Borders & Height Adjustments */
    @media (min-width: 992px) {
        .search-border {
            border-right: 1px solid #e0e0e0;
        }
    }

    @media (max-width: 991.98px) {
        .hero-search-wrap .th-hero-wrapper.hero-1 {
            height: 800px;
        }

        .search-border {
            border-bottom: 1px solid #e0e0e0;
        }

        .booking-sec {
            transform: translateY(-20%);
            margin-bottom: -20px;
        }
    }

    @media (max-width: 767.98px) {
        .hero-search-wrap .th-hero-wrapper.hero-1 {
            height: 600px;
        }

        .booking-sec {
            transform: translateY(-15%);
        }
    }

    /* =========================================================
       3. DESTINATION IMAGE CSS
       ========================================================= */
    .destination-img img {
        width: 100%;
        height: 600px;
        object-fit: cover;
        border-radius: 20px;
        display: block;
    }

    .destination-img {
        position: relative;
        width: 100%;
        overflow: hidden;
    }

    .destination-content {
        padding: 25px;
        box-sizing: border-box;
        width: 100%;
        position: absolute;
        bottom: 0;
        left: 0;
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
    }

    .th-btn {
        white-space: nowrap;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }
</style>

<div class="hero-search-wrap">
    <div class="th-hero-wrapper hero-1" id="hero">
        <div class="swiper th-slider hero-slider-1" id="heroSlide1"
            data-slider-options='{"effect":"fade","menu": ["", "", ""],"heroSlide1": {"swiper-container": {"pagination": {"el": ".swiper-pagination", "clickable": true }}}}'>
            <div class="swiper-wrapper">

                <!-- Slide 1 -->
                <div class="swiper-slide">
                    <div class="hero-inner">
                        <div class="th-hero-bg" data-bg-src="assets1/img/hero/hero_bg_1_1.jpg"></div>
                        <div class="container">
                            <div class="hero-style1">
                                <span class="sub-title style1" data-ani="slideinup" data-ani-delay="0.2s">Escape the Ordinary</span>
                                <h1 class="hero-title" data-ani="slideinup" data-ani-delay="0.4s">Your dream vacation awaits</h1>
                                <div class="btn-group" data-ani="slideinup" data-ani-delay="0.6s">
                                    <a href="destination.php" class="th-btn th-icon">Explore Desinations</a>
                                    <a href="about_us.php" class="th-btn style2 th-icon">About Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="swiper-slide">
                    <div class="hero-inner">
                        <div class="th-hero-bg" data-bg-src="assets1/img/hero/hero_bg_1_2.jpg"></div>
                        <div class="container">
                            <div class="hero-style1">
                                <span class="sub-title style1" data-ani="slideinup" data-ani-delay="0.2s">Get unforgetable pleasure with us</span>
                                <h1 class="hero-title" data-ani="slideinup" data-ani-delay="0.4s">Let’s make your best trip with us</h1>
                                <div class="btn-group" data-ani="slideinup" data-ani-delay="0.6s">
                                    <a href="destination.php" class="th-btn th-icon">Explore Desinations</a>
                                    <a href="about_us.php" class="th-btn style2 th-icon">About Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="swiper-slide">
                    <div class="hero-inner">
                        <div class="th-hero-bg" data-bg-src="assets1/img/hero/hero_bg_1_3.jpg"></div>
                        <div class="container">
                            <div class="hero-style1">
                                <span class="sub-title style1" data-ani="slideinup" data-ani-delay="0.2s">Embark on your next great adventure</span>
                                <h1 class="hero-title" data-ani="slideinup" data-ani-delay="0.4s">Travel made Seamless</h1>
                                <div class="btn-group" data-ani="slideinup" data-ani-delay="0.6s">
                                    <a href="destination.php" class="th-btn th-icon">Explore Desinations</a>
                                    <a href="about_us.php" class="th-btn style2 th-icon">About Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="th-swiper-custom">
                <button data-slider-prev="#heroSlide1" class="slider-arrow slider-prev">
                    <img src="assets1/img/icon/right-arrow.svg" alt="">
                </button>
                <div class="slider-pagination"></div>
                <button data-slider-next="#heroSlide1" class="slider-arrow slider-next">
                    <img src="assets1/img/icon/left-arrow.svg" alt="">
                </button>
            </div>
        </div>
    </div>

    <!-- BOOTSTRAP OPTIMIZED SEARCH BAR HTML -->
    <div class="booking-sec">
        <div class="container">
            <div class="bg-white p-2 rounded-4" style="border: 1px solid #1cb5c9;border-radius: 20px;">
                <!-- Change action="packages.php" to whatever your results page is named -->
                <form method="GET" action="package_search.php" class="row g-0 align-items-center m-0 bg-white shadow-sm rounded-3 text-start">

                    <!-- Destination (5 cols) -->
                    <div class="col-lg-5 col-md-6 search-border">
                        <div class="d-flex align-items-center py-3 px-3 w-100">
                            <i class="fa-light fa-route text-info fs-4 me-3"></i>
                            <div class="d-flex flex-column align-items-start w-100 text-start">
                                <label class="text-dark fw-bold mb-1" style="font-size: 20px;">Destination</label>
                                <select name="destination" id="destination" class="form-select clean-select w-100">
                                    <option value="" selected>Select Destination</option>
                                    <?php foreach ($dest as $d): ?>
                                        <option value="<?php echo htmlspecialchars($d['dname']); ?>">
                                            <?php echo htmlspecialchars($d['dname']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Type (5 cols) -->
                    <div class="col-lg-5 col-md-6 search-border">
                        <div class="d-flex align-items-center py-3 px-3 w-100">
                            <i class="fa-regular fa-person-hiking text-info fs-4 me-3"></i>
                            <div class="d-flex flex-column align-items-start w-100 text-start">
                                <label class="text-dark fw-bold mb-1" style="font-size: 20px;">Type</label>
                                <select name="tour_type" id="tour_type" class="form-select clean-select w-100">
                                    <option value="">Select Type</option>
                                    <option value="International">International</option>
                                    <option value="Domestic">Domestic</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button (2 cols) -->
                    <div class="col-lg-2 col-md-12">
                        <div class="d-flex justify-content-center py-3 px-3">
                            <!-- Changed to a standard submit button so it builds the GET query naturally -->
                            <button type="submit" class="th-btn th-icon w-100 text-center" style="border: none;">Search</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<section class="category-area bg-top-center" data-bg-src="assets/img/bg/category_bg_1.png">
    <div class="container th-container">
        <div class="title-area text-center"><span class="sub-title">The Traveler’s Lens</span></div>
        <div class="swiper categorySlider" id="categorySlide">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="category-card single">
                        <div class="box-img global-img"><img style="height: 300px;" src="https://img.magnific.com/free-photo/beautiful-girl-standing-boat-looking-mountains-ratchaprapha-dam-khao-sok-national-park-surat-thani-province-thailand_335224-849.jpg?semt=ais_hybrid&w=740&q=80" alt="Image"></div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="category-card single">
                        <div class="box-img global-img"><img style="height: 300px;" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRVuE_jXA3lU75BCIQzv9HAKmtfWgefakdKjXcz3WKJhFC84HybStVLFPaa&s=10" alt="Image"></div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="category-card single">
                        <div class="box-img global-img"><img style="height: 300px;" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSYx4aeJAQSDPVdd-MCyKk7twMUUOYbznxcTybU59abvaIFpoVys2EhvTs3&s=10" alt="Image"></div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="category-card single">
                        <div class="box-img global-img"><img style="height: 300px;" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSeUZIKFWeqCjpbwGsHkwkayUJN9X-hCTXbTTTS4yxRK2WQPBkNDvHFs_XZ&s=10" alt="Image"></div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="category-card single">
                        <div class="box-img global-img"><img style="height: 300px;" src="https://media.istockphoto.com/id/2161498980/photo/woman-walking-on-crowded-street-in-old-town-of-jaisalmer-india.jpg?s=612x612&w=0&k=20&c=Gs6D-17Ozj5DRzJ0NQwiz2duJtS1Zu8ZEUij5Knxy88=" alt="Image"></div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="category-card single">
                        <div class="box-img global-img"><img style="height: 300px;" src="https://img.magnific.com/premium-photo/indian-young-handsome-man-historical-palace-qutub-minar-travel-india-image_181020-1347.jpg?semt=ais_hybrid&w=740&q=80" alt="Image"></div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="category-card single">
                        <div class="box-img global-img"><img style="height: 300px;" src="https://media.istockphoto.com/id/1477512135/photo/group-of-friends-admiring-view-at-historic-site.jpg?s=612x612&w=0&k=20&c=LyLbPa_3Y_TjBdca-lQeReHNqR1WwxxIwi5XhxW_F7w=" alt="Image"></div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="category-card single">
                        <div class="box-img global-img"><img style="height: 300px;" src="https://img.magnific.com/free-photo/beautiful-girl-standing-boat-looking-mountains-ratchaprapha-dam-khao-sok-national-park-surat-thani-province-thailand_335224-849.jpg?semt=ais_hybrid&w=740&q=80" alt="Image"></div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="category-card single">
                        <div class="box-img global-img"><img style="height: 300px;" src="https://media.istockphoto.com/id/1487684660/photo/walking-along-the-corniche-at-sunset-is-a-magical-experience-with-the-warm-hues-of-the-sky.jpg?s=612x612&w=0&k=20&c=bbjP66K2LfvnVD9v7WradKnUEZLyCSDO-50TIS95QVU=" alt="Image"></div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="category-card single">
                        <div class="box-img global-img"><img style="height: 300px;" src="https://media.istockphoto.com/id/1049409042/photo/young-woman-reading-map-in-bundi-temple.jpg?s=612x612&w=0&k=20&c=SCHmCHCI8fgtMBnmkGG61VLhSVgvzoL52s_fSy2JCjQ=" alt="Image"></div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="category-card single">
                        <div class="box-img global-img"><img style="height: 300px;" src="https://media.istockphoto.com/id/1403617423/photo/young-woman-tourist-in-sun-hat-and-white-dress-standing-in-front-of-eiffel-tower-in-paris-at.jpg?s=612x612&w=0&k=20&c=5M4C_uB1F7HVhLG1Z82yn3uthqAU_arGvpJiNO88bhg=" alt="Image"></div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="category-card single">
                        <div class="box-img global-img"><img style="height: 300px;" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS3oy8iG5aXqET8x2skwacufKb07UoO-0vq3cHkiVwbb8qZO47QkzZSu__A&s=10" alt="Image"></div>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>

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
                            <div class="destination-img"><img src="<?= $d['dpic'] ?>" alt="destination image">
                                <div class="destination-content">
                                    <div class="media-left">
                                        <h4 class="box-title"><a href="destination-details.html"><?= $d['dname'] ?></a></h4><span
                                            class="destination-subtitle">Type : <?php echo $d['type'] ?></span>
                                    </div>
                                    <div class=""><a href="destination.php" class="th-btn style2 th-icon">View All</a></div>
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
                    <div class="title-area mb-20 pe-xl-5 me-xl-5"><span class="sub-title style1">Let’s Go Together</span>
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
    <div class="shape-mockup shape1 d-none d-xl-block" data-top="12%" data-left="2%"><img src="assets/img/shape/shape_1.png" alt="shape"></div>
    <div class="shape-mockup shape2 d-none d-xl-block" data-top="20%" data-left="3%"><img src="assets/img/shape/shape_2.png" alt="shape"></div>
    <div class="shape-mockup shape3 d-none d-xl-block" data-top="14%" data-left="8%"><img src="assets/img/shape/shape_3.png" alt="shape"></div>
    <div class="shape-mockup about-shape movingX d-none d-xxl-block" data-bottom="0%" data-right="8%"><img src="assets/img/normal/about-slide-img.png" alt="shape"></div>
    <div class="shape-mockup about-rating d-none d-xxl-block" data-bottom="45%" data-right="2%"><i class="fa-sharp fa-solid fa-star"></i><span>4.9k</span></div>
    <div class="shape-mockup about-emoji d-none d-xxl-block" data-bottom="25%" data-right="22%"><img src="assets/img/icon/emoji.png" alt=""></div>
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
                                        </div>
                                        <div>
                                            <h2 class="pkgc-front-title"><?php echo $p['pname']; ?></h2>
                                            <p class="pkgc-front-sub"><?php echo $p['type']; ?></p>
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

<?php
include("footer.php");
?>