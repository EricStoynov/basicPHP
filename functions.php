<?php
    include("connection.php");

    function check_login($con) {
        if (isset($_SESSION['user_id'])) {
            $id = $_SESSION['user_id'];
            $query = "select * from userdata where user_id = '$id' limit 1";
            $query_result = mysqli_query($con, $query);

            $user_lastIP = $_SERVER['REMOTE_ADDR'];
            $query2 = "UPDATE userdata SET user_lastIP='$user_lastIP' WHERE user_id='$id'";
            $query2_response = mysqli_query($con, $query2);

            if ($query_result && mysqli_num_rows($query_result) > 0) {
                $user_data = mysqli_fetch_assoc($query_result);
                if (!$user_data['user_suspended']) {
                    return $user_data;
                } else {
                    $_SESSION['user_id'] = null;
                    unset($_SESSION['user_id']);
                    header("Location: login.php");
                    die;
                }
            }
        }
        header("Location: login.php");
        die;
    }

    function check_login2($con) {
        if (isset($_SESSION['user_id'])) {
            $id = $_SESSION['user_id'];
            $query = "select * from userdata where user_id = '$id' limit 1";
            $query_result = mysqli_query($con, $query);

            $user_lastIP = $_SERVER['REMOTE_ADDR'];
            $query2 = "UPDATE userdata SET user_lastIP='$user_lastIP' WHERE user_id='$id'";
            $query2_response = mysqli_query($con, $query2);

            if ($query_result && mysqli_num_rows($query_result) > 0) {
                $user_data = mysqli_fetch_assoc($query_result);
                header("Location: index.php");

                $user_lastIP = "test";
                $query2 = "UPDATE userdata SET user_lastIP='$user_lastIP' WHERE user_id='$id'";
                $query2_response = mysqli_query($con, $query2);
                echo $user_lastIP;
            }
        }

    }

    function updateCookies($con, $write) {
        if ($write) {
            $user_data = check_login($con);

            if (isset($_SESSION['user_id'])) {$user_id = $_SESSION['user_id'];};
        
            $query = "select * from userdata where user_id = '$user_id' limit 1";
            $query_result = mysqli_query($con, $query);
            $user_data = mysqli_fetch_assoc($query_result);
        
            $user_name = $user_data["user_name"];
            $user_bal = $user_data["user_bal"];
            $user_streak = $user_data["user_streak"];
            $user_favgame = $user_data["user_favgame"];
        
            $value = strval("data=$user_name, $user_bal, $user_streak, $user_favgame; Max-Age=31536000");
            setcookie("data", $value);
        }
    }

    function updateCookies2() {
        global $con;
        $user_data = check_login($con);

        if (isset($_SESSION['user_id'])) {$user_id = $_SESSION['user_id'];};
    
        $query = "select * from userdata where user_id = '$user_id' limit 1";
        $query_result = mysqli_query($con, $query);
        $user_data = mysqli_fetch_assoc($query_result);
    
        $user_name = $user_data["user_name"];
        $user_bal = $user_data["user_bal"];
        $user_streak = $user_data["user_streak"];
        $user_favgame = $user_data["user_favgame"];
    
        $value = strval("data=$user_name, $user_bal, $user_streak, $user_favgame; Max-Age=31536000");
        setcookie("data", $value);
    }

    function setBal($data) {
        global $con;
        $data2 = explode(', ', $data);

        $user_name = $data2[0];
        $user_bal = $data2[1];
        $query = "select * from userdata where user_name = '$user_name' limit 1";
        $query_result = mysqli_query($con, $query);

        if ($query_result && mysqli_num_rows($query_result) > 0 && count($data2) > 1) {
            $query2 = "UPDATE userdata SET user_bal='$user_bal' WHERE user_name='$user_name'";
            $query2_response = mysqli_query($con, $query2);
        }

        return ("$user_name's balance was set to $user_bal");
    }

    if (isset($_POST['setBal'])) {
        echo setBal($_POST['setBal']);
    }
    if (isset($_POST['updateCookies'])) {
        echo updateCookies2();
    }
?>
