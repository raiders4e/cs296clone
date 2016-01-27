<?php

if (!isset($_COOKIE['visits'])) 
{
    $_COOKIE['visits'] = 0;
}
$visits = $_COOKIE['visits'] + 1;
setcookie(visits, $visits, time() + 3600 * 24 * 365); // setcookie (name, value, expirytime) from 1/1/1970

include 'welcome.html.php';
