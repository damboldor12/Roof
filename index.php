<?php
include 'header.php';
include 'system/bd.php';
$uri = $_SERVER['REQUEST_URI'];
$path = parse_url($uri, PHP_URL_PATH);
$query = parse_url($uri, PHP_URL_QUERY);
if ($path === '/') {
    if (isset($_GET['order'])){
        include 'pages/order.php';
    }
    else { 
        include 'pages/main.php';
    }
} 
elseif ($path === '/drip') {
    include 'pages/collections.php';
} 
elseif ($path === '/cart') {
    include 'pages/cart.php';
} 
elseif ($path === '/drip/summerheats') {
    header("Location: /summerheats");
} 
elseif ($path === '/summerheats') {
    include 'pages/summerheats.php';
} 
elseif ($path === '/price') {
    include 'pages/price.php';
} 
elseif ($path === '/reg') {
    include 'pages/reg.php';
} 
elseif ($path === '/coffeeman') {
    include 'pages/coffeeman.php';
} 
elseif ($path === '/new-position') {
    include 'pages/new-position.php';
}  
elseif ($path === '/edit-position') {
    include 'pages/edit-position.php';
} 
elseif ($path === '/delete-position') {
    include 'pages/delete-position.php';
} 
else {
    include 'pages/404.php';
};

include 'futer.php';
