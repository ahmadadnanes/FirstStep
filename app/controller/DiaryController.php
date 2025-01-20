<?php
namespace app\controller;
@session_start();
use app\controller\UserController;
use app\Model\Diary;
use app\include\Validation;
use DateTime;
use DateTimeZone;

require 'vendor/autoload.php';


class DiaryController extends Diary
{
    public static function index(){
        if(UserController::guest()){
            header("location:/login/?diary");
            exit;       
        };

        global $user , $type , $diaries , $nav;
        $user = $_SESSION["user"];
        $type = "diary";
        if(isset($_GET["q"])){
            $q = Validation::validate_text($_GET["q"]);
            switch ($q){
                case "":
                    $diaries = DiaryController::all();
                    break;
                default:
                    $diaries = DiaryController::search_by_user($q);
                    break;
            }
        }else{
            $diaries = DiaryController::all();
        }

        
        if(isset(explode('/', $_SERVER["REQUEST_URI"])[2])){
            $server = explode('/', $_SERVER["REQUEST_URI"])[2];
        }else{
            $server = explode('/', $_SERVER["REQUEST_URI"])[1];
        }

        if($server !== "ar"){
            $nav = [
                'Create' => [
                    '/diary/create',
                    'create diary'
                ],
                'Depression Test' => [
                    '/depression',
                    'go to Depression Test'
                ],
                'Recomended Psychologist' => [
                    '/psy',
                    'go to Recomended Psychologist'
                ]
            ];
            return require ('./resources/views/diary/index.php');
        }

        $nav = [
            'تسجيل الخروج' =>[
                '/logout',
                'logout'
            ],
            'انشاء مذكرة جديدة' => [
                '/diary/create/ar',
                'create diary'
            ]
        ];
        return require ('./resources/views/rtl/diary/index.php');
    }

    public static function show($id){
        if (!UserController::guest()) {
            global $user , $view , $diary , $userView , $author;
            $user = $_SESSION["user"];
            $view = new DiaryController();
            $diary = $view->find($id);
            $userView = new UserController();
            $author = $userView->get_user($diary[0][1]);
            $nav = [
                'logout' => [
                    '/logout',
                    'logout'
                ]
            ];
            return require('./resources/views/diary/show.php');
        }else{
            header("location: /login");
            exit;
        }
    }

    public static function Filter($content)
    {
        if (strlen($content) > 0 && strlen($content) < 300) {
            $content = Validation::validate_text($content);
            return true;
        } else {
            return "content can't exceed 300 character";
        }
    }

    public static function insert($id,$content,$private = 0){
        if (!isset($_SESSION["id"],$_POST["content"])) {
            return "please fill the fields";
        }

        $id = $_SESSION["id"];
        $content = Validation::validate_text($_POST["content"]);

        $private = $private;
        $filter = DiaryController::Filter($content);

        if (!is_bool($filter)) {
            header("location: /diary/?msg=$filter");
            exit;
        }

        Diary::insert($id,$content, $private);
        header("location: /profile/" . $_SESSION["user"]);
        exit;
    }

    public static function edit($id , $content = "" , $private = 0){
        if($_SERVER["REQUEST_METHOD"] == "GET"){
            global $diary;
            $diary = DiaryController::find($id);
            require "./resources/views/diary/edit.php";
        }else{
            $id = Validation::validate_text($id);
            $content = Validation::validate_text($content);
            if(Diary::edit($id , $content , $private)){
                header("location: /diary");
                exit;
            }
        }
    }

    public static function delete($id){
        if (isset($id)) {
            $id = Validation::validate_text($id);
            Diary::delete($id);
        }
    }
}
