<?php
include_once "app/classes/router.php";
$router = new router;

// Home

$router->addRoute('GET', '/', function () {
    require "app/resources/views/Home.php";
    exit;
});

$router->addRoute('GET', '/index.php', function () {
    require "app/resources/views/Home.php";
    exit;
});

$router->addRoute('GET', '//:msg', function () {
    require "app/resources/views/Home.php";
});

$router->addRoute('GET', '/logout', function () {
    require "app/logout.php";
    exit;
});

$router->addRoute('POST', '/contact', function () {
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

$router->addRoute('GET', '/login/:msg', function ($msg) {
    require "app/resources/views/login.php";
    exit;
});

$router->addRoute('GET', '/login/:pre', function ($pre) {
    require "app/controller/UserController.php";
    exit;
});

$router->addRoute('POST', '/login', function () {
    require "app/controller/UserController.php";
});

$router->addRoute('POST', '/login/:pre', function ($pre) {
    require "app/controller/UserController.php";
    exit;
});

// diary

$router->addRoute('GET', '/diary', function () {
    require "app/controller/DiaryController.php";
});

$router->addRoute('POST', '/diary', function () {
    require "app/controller/DiaryController.php";
});

// depression

$router->addRoute('GET', '/depression', function () {
    require "app/controller/DepressionController.php";
});

// psy

$router->addRoute('GET', '/psy', function () {
    require "app/resources/views/Recomended.php";
});


$router->matchRoute();
