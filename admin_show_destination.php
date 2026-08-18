<?php
include('connect.php');
$type=$_GET['type'];
include('admin_header.php');

if(!isset($type)){
$query = "SELECT * FROM `tbl_destination`";

}else{
$query = "SELECT * FROM `tbl_destination` WHERE type='$type'";

}
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

<div class="container">
    <div class="card">
        <div class="card-body" style="display: flex;justify-content: space-between;align-items: center;">
            <h2>List of Destinations</h2>
            <a href="admin_add_destination.php" class="btn btn-primary"><i class="fa-solid fa-plus fa-sm" style="color: rgb(255, 255, 255);"></i> Add New Destination</a>
        </div>
        <div class="card-body">
            <div
                class="table-responsive">
                <table
                    class="table table-primary table-hover">
                    <thead>
                        <tr>
                            <th scope="col">DEST. ID</th>
                            <th scope="col">DEST. NAME</th>
                            <th scope="col">DEST. TYPE</th>
                            <th scope="col">DEST. PIC</th>
                            <th scope="col">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($user as $u) {
                        ?>
                            <tr class="">
                                <td scope="row"><?php echo $i++  ?></td>
                                <td><?php echo $u['dname'] ?></td>

                                <td><?php echo $u['type'] ?></td>

                                <td>
                                    <div style="width: 100px; height: 100px;">
                                        <img src="<?php echo $u['dpic']; ?>" style="width: 100%; height: 100%; border-radius: 20px; border: 2px solid white; object-fit: cover;">
                                    </div>
                                </td>

                                <td>
                                    <a href="admin_update_destination.php?id=<?php echo $u['did'] ?>" class="btn btn-warning"><i class="fa-regular fa-pen-to-square"></i></a>
                                    <a href="admin_delete_category.php?id=<?php echo $u['did'] ?>" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>

                </table>
            </div>
            <!-- <a href="admin_add_destination.php" class="btn btn-primary">Add New Destination</a> -->
        </div>

    </div>
</div>

<?php
include('admin_footer.php');
?>