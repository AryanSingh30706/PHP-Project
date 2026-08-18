<?php
    include('connect.php');

    $id = $_GET['id'];

    $query = "DELETE FROM `tbl_gallery` WHERE `tbl_gallery`.`id` = $id";
    $res = mysqli_query($con,$query);

    if($res>0){
        header("location:admin_show_gallery.php");
    }
?>