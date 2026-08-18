<?php
include('connect.php');
include('admin_header.php');

$query = "SELECT * FROM `tbl_user`";
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
        <div class="card-body">
            <h2>List of Users</h2>
        </div>
        <div class="card-body">
            <di v
                class="table-responsive">
                <table
                    class="table table-primary table-hover ">
                    <thead>
                        <tr>
                            <th scope="col">USER ID</th>
                            <th scope="col">USER NAME</th>
                            <th scope="col">EMAIL</th>
                            <th scope="col">CONTACT</th>
                            <!-- <th scope="col">ADDRESS</th> -->
                        </tr>
                    </thead>
                    <tbody>

                        <?php   
                        $i=1;
                        foreach ($user as $u) {
                        ?>
                        <tr class="">
                            <td scope="row"><?php echo $i++ ?></td>
                            <td><?php echo $u['user_name'] ?></td>
                            <td><?php echo $u['email'] ?></td>
                            <td><?php echo $u['mobileno'] ?></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </di>

        </div>
    </div>

</div>

<?php
include('admin_footer.php');
?>