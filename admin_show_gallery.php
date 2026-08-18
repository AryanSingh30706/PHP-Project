<?php
include('admin_header.php');
include('connect.php');

$query = "SELECT * FROM `tbl_gallery`";
$res = mysqli_query($con, $query);

$count = 0;
$count = mysqli_num_rows($res);

$user = array();
if ($count > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
        $user[] = $row;
    }
}
?>

<style>
    .pkg-cards-grid {
        display: flex;
        justify-content: flex-start;
        flex-wrap: wrap;
        gap: 25px;
        width: 100%;
        z-index: 1;
    }

    .pkg-card {
        position: relative;
        width: 31%;
        height: 300px;
        border-radius: 30px;
        overflow: hidden;
        box-shadow: 5px 5px 30px 7px rgba(0, 0, 0, 0.15);
        cursor: pointer;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .pkg-card:hover {
        transform: scale(0.96);
        box-shadow: 5px 5px 30px 15px rgba(0, 0, 0, 0.25);
    }

    .pkg-card .pkg-card-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .pkg-card .pkg-card-title {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        padding: 20px 10px 15px 10px;
        text-align: center;
        font-family: sans-serif;
        font-weight: bold;
        font-size: 22px;
        background: linear-gradient(transparent, rgba(0, 0, 0, 0.8));
        margin: 0;
    }

    .pkg-title-white {
        color: #ffffff;
    }

    .pkg-title-black {
        color: #000000;
    }
</style>

<div class="container">
    <div class="card">
        <div class="card-body" style="display: flex;justify-content: space-between;align-items: center;">
            <h2>Gallery Images</h2>
            <a href="admin_add_gallery.php" class="btn btn-primary"><i class="fa-solid fa-plus fa-sm" style="color: #ffffff;"></i> Add New Image</a>
        </div>
        <div class="card-body">
            <div class="pkg-cards-grid">
                <?php
                $i = 1;
                foreach ($user as $u) {
                ?>
                    <div class="pkg-card">
                        <img class="pkg-card-img" src="<?php echo $u['image'] ?>" alt="Gallery Image" />
                        <div class="pkg-card-title pkg-title-white">
                            <a href="admin_update_gallery.php?id=<?php echo $u['id']; ?>" class="btn btn-warning"><i class="fa-regular fa-pen-to-square"></i> Edit</a>
                            <a href="admin_delete_gallery.php?id=<?php echo $u['id']; ?>" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Delete</a>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>


</div>

<?php
include('admin_footer.php');
?>