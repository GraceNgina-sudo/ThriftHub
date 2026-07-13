<?php

session_start();

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $_SESSION['order_number']="TH".date("Ymd").rand(1000,9999);

    unset($_SESSION['cart']);

    header("Location: order_success.php");

    exit();

}

?>