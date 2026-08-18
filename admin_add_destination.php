<?php
include("admin_header.php");
include("connect.php");
   
?> 
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
if (isset($_POST['btnAdd'])) {
    $dest_name = $_POST['txt_dest_name'];
    $dest_name = strtoupper($dest_name);
    $dest_type = $_POST['dest_type'];
    $tmp_name = $_FILES['txt_dest_pic']['tmp_name'];
    $name = $_FILES['txt_dest_pic']['name'];    //abc.jpeg
    $name = "uploads/" . $name;                //uploads/abc.jpg

    if (empty(trim($dest_name))) {
        echo "<script>
                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Enter Destination Name!!',
                });
            </script>";
    } else if (empty($name)) {
        echo "<script>
                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Upload File!!',
                });
            </script>";
    } 
    elseif(empty($dest_type)){
        echo "<script>
                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Select destination type..',
                });
            </script>";
    } else {
        $query = "INSERT INTO `tbl_destination` (`did`, `dname`, `dpic`, `type`) VALUES (NULL, '$dest_name', '$name', '$dest_type')"; 

        $res = mysqli_query($con, $query);
        if ($res > 0) {
            move_uploaded_file($tmp_name, $name);    //from -> to
            echo "<script>window.location.href='admin_show_destination.php'</script>";
        }
    }
}
?>

<form action="" method="post" enctype="multipart/form-data">
    <h1>Destination Management</h1>
    <p class="lead">Add, Update, or remove travel locations for <b>AtlasGo</b></p>

    <div class="row">
        <div class="col new-destination">
            <div class="card">
                <div class="card-body">
                    <b>
                        <h3 class="">Add New Destination</h3>
                    </b>
                    <br>

                    <h5 class="card-title">Destination Name</h5>
                    <input class="form-control form-control-lg  mb-4" name="txt_dest_name" type="text" aria-label=".form-control-lg example">

                    <h5 class="card-title">Destination Type</h5>
                    <select name="dest_type" id="" class="form-control mb-4">
                        <option value="">Select Destination Type</option>
                        <option value="Domestic">Domestic</option>
                        <option value="International">International</option>
                    </select>

                    <h5 class="card-title">Destination Picture</h5>
                    <div class="mb-5">
                        <input class="form-control" type="file" id="formFile" name="txt_dest_pic">
                    </div>

                    <button type="submit" class="btn btn-success" name="btnAdd">Save Destination</button>
                    <a href="admin_show_destination.php" class="btn btn-warning">Back</a>
                </div>
            </div>
        </div>
    </div>

</form>

<?php
include("admin_footer.php");
?>