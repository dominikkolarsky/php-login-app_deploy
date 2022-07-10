<?php

function Connection(){
    require "dbconfig.php";
    global $con;

    $con = mysqli_connect($host, $user, $password, $db);
    if (!$con) {
        die("Nelze se připojit k databazi");
    }
    mysqli_query($con, "SET NAMES 'utf8'");
}