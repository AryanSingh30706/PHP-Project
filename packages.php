<?php
include("header.php");
?>

<body>

    <div style="
    background-color: #303954;
    border: 0px solid transparent;
    width: 100%;
    height: 100px;"></div>

    <!-- Page Title / Inner Hero Banner -->
    <div class="breadcumb-wrapper mt-5" data-bg-src="images/package_back.avif" style="padding: 180px 0 100px; background-size: cover; background-position: center; position: relative; border-radius: 20px; margin: 20px; overflow: hidden; border: 1px solid transparent;margin-top: 20px;">
        <div class="container">
            <div class="breadcumb-content text-center">
                <h1 class="breadcumb-title text-white fw-bold mb-3"></i>AtlasGo - Packages</h1>
                <ul class="breadcumb-menu list-inline text-white">
                    <li class="list-inline-item"><a href="home.php" class="text-white">Home</a></li>
                    <li class="list-inline-item me-2">/</li>
                    <li class="list-inline-item active text-white-50">Packages</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Main Package Categories Section -->
    <section class="space position-relative overflow-hidden my-5" id="packages-sec">
        <div class="container">

            <!-- Section Title Header -->
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="title-area text-center mb-5">
                        <span class="sub-title">Choose Your Journey</span>
                        <h2 class="sec-title">Explore Travel Categories</h2>
                        <p class="sec-text">Select your preferred travel scope to discover customized tour packages tailored to your dream destinations.</p>
                    </div>
                </div>
            </div>

            <!-- Two Category Cards (Domestic & International) -->
            <div class="row gy-4 justify-content-center">

                <!-- Domestic Destinations Card -->
                <div class="col-lg-5 col-md-6">
                    <div class="tour-box th-ani gsap-cursor border rounded-4 shadow overflow-hidden h-100 text-center">
                        <div class="tour-box_img global-img position-relative overflow-hidden">
                            <img src="https://media.istockphoto.com/id/2161498980/photo/woman-walking-on-crowded-street-in-old-town-of-jaisalmer-india.jpg?s=612x612&w=0&k=20&c=Gs6D-17Ozj5DRzJ0NQwiz2duJtS1Zu8ZEUij5Knxy88=" alt="Domestic Packages" class="img-fluid w-100" style="height: 280px; object-fit: cover;">
                        </div>
                        <div class="tour-content p-4">
                            <h3 class="box-title fs-3 fw-bold mb-2">
                                <a href="domestic-packages.php" class="text-dark text-decoration-none">Domestic Tour Packages</a>
                            </h3>
                            <p class="text-muted mb-4">Discover the incredible culture, historic monuments, and scenic landscapes within your country.</p>
                            <a href="package_show.php?tag=1" class="th-btn style3 th-icon btn btn-primary px-4 py-2">Explore Domestic</a>
                        </div>
                    </div>
                </div>

                <!-- International Destinations Card -->
                <div class="col-lg-5 col-md-6">
                    <div class="tour-box th-ani gsap-cursor border rounded-4 shadow overflow-hidden h-100 text-center">
                        <div class="tour-box_img global-img position-relative overflow-hidden">
                            <img src="https://media.istockphoto.com/id/1403617423/photo/young-woman-tourist-in-sun-hat-and-white-dress-standing-in-front-of-eiffel-tower-in-paris-at.jpg?s=612x612&w=0&k=20&c=5M4C_uB1F7HVhLG1Z82yn3uthqAU_arGvpJiNO88bhg=" alt="International Packages" class="img-fluid w-100" style="height: 280px; object-fit: cover;">
                        </div>
                        <div class="tour-content p-4">
                            <h3 class="box-title fs-3 fw-bold mb-2">
                                <a href="international-packages.php" class="text-dark text-decoration-none">International Tour Packages</a>
                            </h3>
                            <p class="text-muted mb-4">Travel beyond borders to experience iconic world wonders, exotic beaches, and vibrant foreign cultures.</p>
                            <a href="package_show.php?tag=2" class="th-btn style3 th-icon btn btn-primary px-4 py-2">Explore International</a>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>

</body>

<?php
include("footer.php");
?>