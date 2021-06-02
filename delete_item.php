<?php
/*
    Delete user's items
    Hamad Al-Hendi S00040674
*/
include("connection.php");

// takes the id from the form submited
$id = $_POST['id'];
// delete the record where the ID matches
$query = "DELETE FROM listings WHERE ID = " . $id;
$result2 = mysqli_query($con, $query);
// return to the active_ads.php 
header("location: active_ads.php");
die;
?>