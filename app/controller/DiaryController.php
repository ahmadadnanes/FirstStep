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
        if(!UserController::guest()){
            global $user , $type , $diaries , $nav;
            $user = $_SESSION["user"];
            $type = "diary";
            if(isset($_GET['q'])){
            }
            $diaries = DiaryController::all();
            $server = explode('/', $_SERVER["REQUEST_URI"])[1];
            if($server == "ar"){
                $nav = [
                        'تسجيل الخروج' =>[
                            '/logout/en',
                            'logout'
                        ]
                    ];
                require ('./resources/views/rtl/diary.rtl.php');
            }else{
                $nav = [
                    'Create' => [
                        '/diary/create',
                        'create diary'
                    ]
                ];
                if(isset($_GET['q'])){
                }
                require ('./resources/views/diary/index.php');
            }
        }else{
            header("location:/login/?diary");
            exit;
        }
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
            require ('./resources/views/diary/show.php');
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
