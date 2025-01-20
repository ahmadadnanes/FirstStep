<?php

use app\controller\{AdminController , ChangePasswordController, CommentController, ContactController , DepressionController, DiaryController , HomeController, MailController, UserController , RecomendedController};
use app\Model\Router;
use Dotenv\Dotenv;
require 'vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

@session_start();

$router = new Router;

// Home
$router->addRoute('GET', '/',  fn () => HomeController::index());
$router->addRoute('GET' , '/ar' , fn()  => HomeController::index());
$router->addRoute('GET', '/index.php', fn () => header("location: /"));
$router->addRoute('GET', '//:msg', fn ($msg) => HomeController::index());
$router->addRoute('GET', '/logout', fn () => UserController::destroy());
$router->addRoute('POST', '/contact', fn() => ContactController::create($_POST["email"] , $_POST["contact"]));
// auth
$router->addRoute('GET', '/signup', fn () => UserController::index());
$router->addRoute('POST', '/signup', fn () => UserController::create($_POST["username"] , $_POST["email"] , $_POST["password"] , $_POST["confirm_password"]));
$router->addRoute('GET', '/login', fn () => UserController::index());
$router->addRoute('GET', '/login/:msg',fn ($msg) => UserController::index());
$router->addRoute('GET', '/login/:pre', fn ($pre) =>  UserController::index());
$router->addRoute('GET' , '/login/:pre/ar' , fn ($pre) => UserController::index());
$router->addRoute('POST', '/login', fn () => UserController::auth($_POST["email"] , $_POST["password"]));
$router->addRoute('POST', '/login/:pre', fn ($pre) => UserController::auth($_POST["email"] , $_POST["password"]));
$router->addRoute('GET' , '/login/ar' , fn() => UserController::index());
$router->addRoute('GET' , '/signup/ar' , fn() => UserController::index());
$router->addRoute('GET', '/signup/:msg', fn ($msg)  => UserController::index());
$router->addRoute('POST', '/signup/:msg', fn ($msg)  => UserController::create($_POST["username"] , $_POST["email"] , $_POST["password"] , $_POST["confirm_password"]));
// diary
$router->addRoute('GET', '/diary', fn ()  => DiaryController::index());
$router->addRoute('POST', '/diary/create', fn ()  => DiaryController::insert($_SESSION["id"] , $_POST["content"] , isset($_POST["private"]) ? $_POST["private"] : 0));
$router->addRoute("GET" , "/diary/create" , fn() => require "./resources/views/diary/create.php");
$router->addRoute("GET", "/diary/create/ar", fn() => require "./resources/views/rtl/diary/create.php");
$router->addRoute('GET' , '/diary/ar' , fn() => DiaryController::index());
$router->addRoute('GET' , '/diary/:q' , fn ($q) => DiaryController::index());
$router->addRoute('GET' , '/diary/ar/:q' , fn ($q) => DiaryController::index($q));
$router->addRoute('GET', '/diary/show/:id', fn ($id)  => DiaryController::show($id));
$router->addRoute('GET' , '/diary/edit/:id', fn($id) => DiaryController::edit($id));
$router->addRoute('POST' , '/diary/delete' , fn() => DiaryController::delete($_POST["delete"]));
$router->addRoute('POST' , '/diary/edit/:id' , fn($id) => DiaryController::edit($id, $_POST["content"] , $_POST["private"] || 0));
$router->addRoute('GET', '/diary/:msg', fn ($msg) => DiaryController::index());
$router->addRoute('POST', '/comment/create', fn() =>  CommentController::insert_comment($_POST["user_id"] , $_POST["diary_id"] , $_POST["comment"] , $_POST["to_comment_id"]));
$router->addRoute('GET', '/comment/:id', fn ($id)  => CommentController::index($id));
$router->addRoute('POST' , '/comment/delete' , fn() => CommentController::delete_comment($_POST["delete_id"]));
$router->addRoute('GET' , '/comment/edit/:id' , fn($id) => require './resources/views/comment/edit.php');
$router->addRoute('POST' , '/comment/edit' , fn() => CommentController::edit_comment($_POST["id"], $_POST["comment"]));
// services
$router->addRoute('GET', '/depression', fn ()  => DepressionController::index());
$router->addRoute('GET', '/depression/ar', fn ()  => DepressionController::index());
$router->addRoute('GET', '/psy', fn ()  => RecomendedController::index());
$router->addRoute('GET', '/psy/ar', fn ()  => RecomendedController::index());
$router->addRoute('GET', '/psy/:gov', fn ($gov)  => RecomendedController::index());
$router->addRoute('GET', '/profile/:user', fn ($user)  => require "resources/views/profile.php");
$router->addRoute('POST' , '/profile' , fn() => DiaryController::delete($_POST["delete"]));
$router->addRoute('GET' , '/setting' , fn() => UserController::class);
//admin
$router->addRoute('GET', '/admin', fn ()  => AdminController::index());
$router->addRoute('GET', '/admin/changePassword', fn ()  => ChangePasswordController::show());
$router->addRoute('POST', '/admin/changePassword', fn ()  => ChangePasswordController::edit($_SESSION["id"] , $_POST["oldPass"] , $_POST["newPass"]));
$router->addRoute('GET', '/admin/changePassword/:msg', fn ($msg)  => require('resources/views/admin/changePassword.php'));
$router->addRoute('GET' , '/admin/userlist' , fn() => require  "resources/views/admin/userList.php");
$router->addRoute('GET' , '/admin/userlist/:search' , fn($search) => require  "resources/views/admin/userList.php");
//about
$router->addRoute('GET' , '/about' , fn() => require('resources/views/about.php'));
$router->addRoute('GET' , '/about/ar' , fn() => require('resources/views/rtl/about.rtl.php'));

//error page
$router->addRoute('GET' , '/errorPage' , fn() => require('resources/views/errorPage.php'));

//verify email
$router->addRoute('GET' , '/verify_email/:token' , fn($token) => UserController::verify($token));

//forget password
$router->addRoute('GET' , '/forgetPassword' , fn() => require "resources/views/forgetPassword.php");

$router->matchRoute();

// try {
//     $router->matchRoute();
// } catch (Exception $e) {
//     isset($_GET["lang"]) ? require("resources/views/rtl/404.rtl.php") : require("resources/views/404.php");
// }
