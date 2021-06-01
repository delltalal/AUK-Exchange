<?php
include("connection.php");

    $id = $_POST['id'];
    $query = "DELETE FROM listings WHERE ID = " . $id;
    $result2 = mysqli_query($con, $query);
    header("location: active_ads.php");
    die;
?>