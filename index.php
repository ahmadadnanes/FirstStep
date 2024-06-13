<?php
include_once "app/Model/router.php";

$router = new router;

// Home

$router->addRoute('GET', '/', function () {
    require "app/controller/UserController.php";
    exit;
});

$router->addRoute('GET', '/index.php', function () {
    require "app/controller/UserController.php";
    exit;
});

$router->addRoute('GET', '//:msg', function ($msg) {
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
    require "app/resources/views/auth.php";
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
    require "app/controller/UserController.php";
    exit;
});

$router->addRoute('GET', '/login/:pre', function ($pre) {
    require "app/controller/UserController.php";
    exit;
});

$router->addRoute('GET' , '/login/:lang/:pre' , function($lang , $pre){
    require "app/controller/UserController.php";
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

$router->addRoute('GET' , '/diary/:lang' , fn($lang) => require('app/controller/DiaryController.php'));

$router->addRoute('GET', '/diary/:msg', fn ($msg) => require "app/resources/views/diary.php");

$router->addRoute('GET', '/diaryById/:id', fn ($id) => require "app/resources/views/diaryById.php");

$router->addRoute('POST', '/addcomment', fn () => require "app/controller/DiaryController.php");

$router->addRoute('GET', '/comment/:id', function ($id) {
    require "app/resources/views/comment.php";
});

// depression

$router->addRoute('GET', '/depression', function () {
    require "app/controller/ServicesController.php";
});

// psy

$router->addRoute('GET', '/psy', function () {
    require "app/controller/ServicesController.php";
});

$router->addRoute('GET', '/psy/:gov', function ($gov) {
    require "app/resources/views/Recomended.php";
});

$router->addRoute('GET', '/user/:user', function ($user) {
    require "app/resources/views/YourDiares.php";
});

$router->addRoute('GET', '/admin', function () {
    require("app/controller/adminController.php");
});

$router->addRoute('GET', '/changePassword', function () {
    require('app/controller/adminController.php');
});

$router->addRoute('POST', '/changePassword', function () {
    require('app/controller/adminController.php');
});

$router->addRoute('GET', '/changePassword/:msg', function ($msg) {
    require('app/resources/views/admin/changePassword.php');
});

$router->addRoute('GET' , '/:lang' , function($lang) {
    require('app/resources/views/rtl/Home.rtl.php');
});

$router->addRoute('GET' , '/login/:lang' , function($lang){
    require('app/controller/UserController.php');
});

$router->addRoute('GET' , '/signup/:lang' , function($lang){
    require('app/resources/views/rtl/auth.rtl.php');
});

$router->addRoute('GET', '/signup/:msg', function ($msg) {
    require "app/resources/views/auth.php";
    exit;
});

try {
    $router->matchRoute();
} catch (Exception $e) {
    isset($_GET["lang"]) ? require("app/resources/views/rtl/404.rtl.php") : require("app/resources/views/404.php");
}
