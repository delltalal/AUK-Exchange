<?php

function check_login($con) 
{

    if(isset($_SESSION['ID'])) 
    {

        $id = $_SESSION['ID'];
        $query = "select * from accounts where ID = '$id' limit 1";
   
        $result = mysqli_query($con,$query);

        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }
}
