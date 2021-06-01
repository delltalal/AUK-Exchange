<?php
/*
Connection to database
Hamad Al-Hendi S00040674
*/

//connection to the database is assigned to the variable $con using a shorthand as well as utilizing die to alert user if connection has failed. This function is included in all php files.
if (!$con = mysqli_connect("localhost", "root", "", "csis255-project")) {
    die("failed to connect");
};

?>