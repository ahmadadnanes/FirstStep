<?php
namespace app\controller;
@session_start();
use app\controller\UserController;
use app\Model\Diary;
use app\include\Validation;
use DateTime;
use DateTimeZone;
include './app/include/autoloader.php';


class DiaryController extends Diary
{
    public static function index(){
        if(!UserController::guest()){
            global $user , $initial , $type , $diaries , $nav;
            $user = $_SESSION["user"];
            $initial = 1;
            $type = "diary";
            $diaries = DiaryController::all();
            if(isset($_GET["lang"])){
                $nav = [
                    'تسجيل الخروج' =>[
                        '/logout/?lang=ar',
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

    public static function insert($id,$content,$private){
        if (isset($_SESSION["id"],$_POST["content"])) {
            $id = $_SESSION["id"];
            $content = Validation::validate_text($_POST["content"]);
            if (isset($_POST["private"])) {
                $private = $_POST["private"];
            } else {
                $private = 0;
            }
            $filter = DiaryController::Filter($content);
            if (is_bool($filter)) {
                Diary::insert($id,$content, $private);
                header("location: /profile/" . $_SESSION["user"]);
            } else {
                header("location: /diary/?msg=$filter");
            }
            exit;
        }
    }

    public static function edit($id , $content = null , $private = null){
        if($_SERVER["REQUEST_METHOD"] == "GET"){
            global $diary;
            $diary = DiaryController::find($id);
            require "./resources/views/diary/edit.php";
        }else{
            $id = Validation::validate_text($id);
            $content = Validation::validate_text($content);
            if(Diary::edit($id , $content , $private)){
                header("location: /diary");
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
// $server = explode('/', $_SERVER["REQUEST_URI"])[1];
// if ($server == "diary") {
// } else { else {
//             } else {
//                 header("location: /diary/?msg=Error");
//             }
//         }
//     }
// } else if ($server == "addcomment") {
// }else if($server == "user"){
//     if(isset($_GET["user"])){
//         if($_SESSION["id"] == $_GET["user"]){
//             header('location: /user/' . $_SESSION["user"]);
//         }else{
//             require ('./resources/views/YourDiares.php');
//         }
//     }else{
//         require ('./resources/views/YourDiares.php');
//     }
// }
// exit;
