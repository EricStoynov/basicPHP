<?php
    session_start();

    include("connection.php");
    include("functions.php");

    $user_data = check_login($con);
    updateCookies($con, true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Website</title>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.5/dist/js.cookie.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <h1>This is the index page.</h1>
    <a href="logout.php">Sign out</a>
    <br>
    <h3 id="h3text">Hello $user_name!</h3>
    <p id="ptext">Balance: $user_bal<br>Login Streak: $user_streak<br>Favorite Games: $user_favgame</p>
    <br><br>
    <h4>Set Balance:</h4>
    <input type="range" min="1" max="10000" value="0" id="setBalSlider" onchange="setBalVal()"><p id="setBalValue"></p>
    <button onclick="setBal()">Set</button><br>
    <button onclick="changeBal(10)">Add $10</button><button onclick="changeBal(-10)">Remove $10</button>
</body>
</html>
<script>
    const h3Text = document.getElementById("h3text")
    const h3TextTemplate = 'Hello $user_name!'
    const parText = document.getElementById("ptext")
    const parTextTemplate = 'Balance: $user_bal<br>Login Streak: $user_streak<br>Favorite Games: $user_favgame'
    const setBalSlider = document.getElementById("setBalSlider")
    const setBalValue = document.getElementById("setBalValue")

    function checkCookieChanges() {
        let currentCookie = document.cookie;
        setInterval(() => {
            if (currentCookie !== document.cookie) {
                updateText(true);
            }
        }, 100);
    }

    function updateText(reLoad) {
        if (reLoad) {
            value = Cookies.get("data").replace("data=", "").replace("; Max-Age=31536000", "").split(", ");
            user_name = value[0];
            user_bal = value[1].toLocaleString("en", { minimumFractionDigits: 2 });;
            user_streak = value[2];
            user_favgame = value[3];
        }
        h3Text.innerHTML = h3TextTemplate.replace("$user_name", user_name);
        parText.innerHTML = parTextTemplate.replace("$user_bal", user_bal).replace("$user_streak", user_streak).replace("$user_favgame", user_favgame);
        setBalValue.innerHTML = Number(user_bal);
        setBalSlider.value = Number(user_bal);
    }

    function refreshText() {
        value = `$usr, $bal, $str, $fvg; Max-Age=31536000`.replace("$usr", user_name).replace("$bal", user_bal).replace("$str", user_streak).replace("$fvg", user_favgame)
        Cookies.set("data", value)
        updateText();
    }

    function setBalVal() {
        setBalValue.innerHTML = setBalSlider.value;
    }

    function setBal() {
        user_bal = setBalSlider.value;
        $.ajax({
            url: 'functions.php',
            type: 'post',
            data: {"setBal": String(user_name)+", "+String(user_bal)},
            success: function(response) {}
        });
        refreshText();
    }
    function changeBal(amnt) {
        user_bal = String(Number(user_bal) + amnt);
        $.ajax({
            url: 'functions.php',
            type: 'post',
            data: {"setBal": String(user_name)+", "+String(user_bal)},
            success: function(response) {}
        });
        refreshText();
    }

    document.addEventListener("DOMContentLoaded", function() {
        updateText(true);
        setBalValue.innerHTML = Number(user_bal);
        setBalSlider.value = Number(user_bal);
    });
</script>
