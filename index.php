<?php
use app\controller\{AdminController , CommentController, ContactController , DiaryController , HomeController, ServicesController , UserController};
use app\Model\router;

include "app/include/autoloader.php";

@session_start();

$router = new router;

// Home
$router->addRoute('GET', '/',  fn () => HomeController::index());
$router->addRoute('GET' , '/Home/:lang' , fn($lang)  => HomeController::index());
$router->addRoute('GET', '/index.php', fn () => header("location: /"));
$router->addRoute('GET', '//:msg', fn ($msg) => HomeController::index());
$router->addRoute('GET', '/logout', fn () => require "./resources/views/logout.php");
$router->addRoute('POST', '/contact', fn() => ContactController::create($_POST["email"] , $_POST["contact"]));
// auth
$router->addRoute('GET', '/signup', fn () => UserController::index());
$router->addRoute('POST', '/signup', fn () => UserController::create($_POST["username"] , $_POST["email"] , $_POST["password"]));
$router->addRoute('GET', '/login', fn () => UserController::index());
$router->addRoute('GET', '/login/:msg',fn ($msg) => UserController::index());
$router->addRoute('GET', '/login/:pre', fn ($pre) =>  UserController::index());
$router->addRoute('GET' , '/login/:pre/:lang' , fn ($lang , $pre) => UserController::index());
$router->addRoute('POST', '/login', fn () => UserController::auth($_POST["email"] , $_POST["password"]));
$router->addRoute('POST', '/login/:pre', fn ($pre) => UserController::auth($_POST["email"] , $_POST["password"]));
$router->addRoute('GET' , '/login/:lang' , fn($lang) => UserController::index());
$router->addRoute('GET' , '/signup/:lang' , fn($lang) => UserController::index());
$router->addRoute('GET', '/signup/:msg', fn ($msg)  => UserController::index());
$router->addRoute('POST' , '/signup' , fn() => UserController::create($_POST["username"], $_POST["email"] , $_POST["password"]));
// diary
$router->addRoute('GET', '/diary', fn ()  => DiaryController::index());
$router->addRoute('POST', '/diary/create', fn ()  => DiaryController::insert($_SESSION["id"] , $_POST["content"] , $_POST["private"]));
$router->addRoute("GET" , "/diary/create" , fn() => require "./resources/views/diary/create.php");
$router->addRoute('GET' , '/diary/:lang' , fn($lang) => DiaryController::index());
$router->addRoute('GET', '/diary/show/:id', fn ($id)  => DiaryController::show($_GET['id']));
$router->addRoute('GET' , '/diary/edit/:id', fn($id) => DiaryController::edit($_GET["id"]));
$router->addRoute('POST' , '/diary/edit/:id' , fn($id) => DiaryController::edit($_GET["id"], $_POST["content"] , $_POST["private"]));
$router->addRoute('GET', '/diary/:msg', fn ($msg) => DiaryController::index());
$router->addRoute('POST', '/comment/create', fn() =>  CommentController::insert($_POST["user_id"] , $_POST["diary_id"] , $_POST["comment"]));
$router->addRoute('GET', '/comment/:id', fn ($id)  => CommentController::index($_GET["id"]));
$router->addRoute('POST' , '/comment/delete/:id' , fn($id) => CommentController::delete($id));
$router->addRoute('POST' , '/reply/create' , fn() => CommentController::insert_reply($_POST["user_id"] , $_POST["diary_id"] , $_POST["to_comment_id"] ,$_POST["comment"]));
$router->addRoute('POST' , '/diary/search' , fn () => "soon");
// services
$router->addRoute('GET', '/depression', fn ()  => ServicesController::index());
$router->addRoute('GET', '/psy', fn ()  => ServicesController::index());
$router->addRoute('GET', '/psy/:gov', fn ($gov)  => ServicesController::index());
$router->addRoute('GET', '/profile/:user', fn ($user)  => require "resources/views/profile.php");
$router->addRoute('POST' , '/profile' , fn() => DiaryController::delete($_POST["delete"]));
$router->addRoute('GET' , '/setting' , fn() => UserController::class);
//admin
$router->addRoute('GET', '/admin', fn ()  => AdminController::index());
$router->addRoute('GET', '/admin/changePassword', fn ()  => require('app/controller/adminController.php'));
$router->addRoute('POST', '/admin/changePassword', fn ()  => require('app/controller/adminController.php'));
$router->addRoute('GET', '/changePassword/:msg', fn ($msg)  => require('resources/views/admin/changePassword.php'));
$router->addRoute('GET' , '/admin/userlist' , fn() => require  "resources/views/admin/userList.php");
$router->addRoute('GET' , '/admin/userlist/:search' , fn($search) => require  "resources/views/admin/userList.php");
//about
$router->addRoute('GET' , '/about' , fn() => require('resources/views/about.php'));
$router->addRoute('GET' , '/about/:lang' , fn($lang) => require('resources/views/rtl/about.rtl.php'));


$router->matchRoute();

// try {
//     $router->matchRoute();
// } catch (Exception $e) {
//     // isset($_GET["lang"]) ? require("resources/views/rtl/404.rtl.php") : require("resources/views/404.php");
// }
