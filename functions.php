<?php
    function check_login($con) {
        if (isset($_SESSION['user_id'])) {
            $id = $_SESSION['user_id'];
            $query = "select * from userdata where user_id = '$id' limit 1";

            $query_result = mysqli_query($con, $query);
            if ($query_result && mysqli_num_rows($query_result) > 0) {
                $user_data = mysqli_fetch_assoc($query_result);
                return $user_data;
            }
        }
        header("Location: login.php");
        die;
    }

    function random_num($length) {
        $text = "";
        if($length < 5)
        {
            $length = 5;
        }
    
        $len = rand(4,$length);
    
        for ($i=0; $i < $len; $i++) { 
            # code...
    
            $text .= rand(0,9);
        }
    
        return $text;
    }
?>