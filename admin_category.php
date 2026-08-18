<?php
include('admin_header.php');
?>

<div class="container">
    <div class="row">
        <div class="col-6">
            <div class="card" >
                <img style="height: 400px;" src="https://media.istockphoto.com/id/2161498980/photo/woman-walking-on-crowded-street-in-old-town-of-jaisalmer-india.jpg?s=612x612&w=0&k=20&c=Gs6D-17Ozj5DRzJ0NQwiz2duJtS1Zu8ZEUij5Knxy88=" class="card-img-top" alt="...">
                <div class="card-body">
                    <h4 class="card-title">Domestic</h4>
                    <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p> -->
                    <a href="admin_show_destination.php?type=domestic" class="btn btn-primary">Show Destinations</a>
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="card">
                <img  style="height: 400px;" src="https://travcoholidays.com/wp-content/uploads/2025/12/Top-5-Budget-friendly-International-Destinations-for-Indian-Travellers-scaled.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h4 class="card-title">International</h4>
                    <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p> -->
                    <a href="admin_show_destination.php?type=international" class="btn btn-primary">Show Destinations</a>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include('admin_footer.php');
?>