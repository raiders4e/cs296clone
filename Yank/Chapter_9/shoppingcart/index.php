<?php
include_once($_SERVER['DOCUMENT_ROOT'] . 
    '/Yank/Chapter_9/includes_C8/magicquotes.inc.php');
    
$items = array(
    array('id' => '1', 'desc' => 'Canadian-Australian Dictionary',
        'price' => 24.95),
    array('id' => '2', 'desc' => 'As-new parachute (never opened)',
            'price' => 1000),
    array('id' => '3', 'desc' => 'Songs of the Goldfish (2CD set)',
            'price' => 19.99),
    array('id' => '4', 'desc' => 'Simply Javascript (SitePoint)',
            'price' => 39.95));

session_start();
    if (!isset($_SESSION['cart'])) 
    {
        $_SESSION['cart'] = array();
    }
    
    include 'catalog.html.php';