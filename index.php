<?php
include_once "app/classes/router.php";
$router = new router;

// Home

$router->addRoute('GET', '/', function () {
    require "app/controller/HomeController.php";
    exit;
});

$router->addRoute('GET', '/logout', function () {
    require "app/logout.php";
    exit;
});

$router->addRoute('GET', '/contact', function () {
    require "app/controller/ContactController.php";
    exit;
});


// signup

$router->addRoute('GET', '/signup', function () {
    require "app/resources/views/signup.php";
    exit;
});

$router->addRoute('GET', '/signup/:msg', function () {
    require "app/resources/views/signup.php";
    exit;
});

$router->addRoute('POST', '/signup', function () {
    require "app/controller/UserController.php";
    exit;
});

//login

$router->addRoute('GET', '/login', function () {
    require "app/controller/UserController.php";
    exit;
});

$router->addRoute('GET', '/login/:msg', function () {
    require "app/resources/views/login.php";
    exit;
});

$router->addRoute('POST', '/login', function () {
    require "app/controller/UserController.php";
    exit;
});

$router->matchRoute();
