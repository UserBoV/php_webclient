<?php
    $sys['domain'] = "http://final.com";
    $sys['ver'] = "0.0.1";

    session_start();
    if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $userid = "";
    if (isset($_SESSION["username"])) $username = $_SESSION["username"];
    else $username = "";
?>