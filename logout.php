<!-- 
    logout
    Hamad Al-Hendi S00040674
 -->

<?php
session_start();

//if the session ID is set (logged in) then this unset to undo the session. afterwards the user is redirected to the homepage.
if (isset($_SESSION['ID'])) {
    unset($_SESSION['ID']);
}

header("Location: homepage.php");
die;
?>