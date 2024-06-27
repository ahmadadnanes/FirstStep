<?php 
namespace app\controller;

use app\controller\{UserController , DiaryController};
use app\include\Validation;
use app\Model\Diary;

include "app/include/time_ago.php";
include "app/include/autoloader.php";

use DateTime , DateTimeZone;
class CommentController extends Diary {
    public static function index($id){
        global $server , $comment , $replies , $nav , $user;
        $server = explode('/', $_SERVER["REQUEST_URI"])[1];
        $id = Validation::validate_text($id);
        $comment = DiaryController::find_comment($id);
        $replies = CommentController::find_replies_by_comment($id);
        $user = UserController::get_user($comment[0][1]);
        $nav = [];
        require "./resources/views/comment/index.php";
    }

    public static function insert($user_id, $diary_id, $comment){
        $user_id = Validation::validate_text($user_id);
        $diary_id = Validation::validate_text($diary_id);
        $comment = Validation::validate_text($comment);
        if($user_id && $diary_id && $comment ){
            $id = Diary::insert_comment($user_id , $diary_id , $comment);
            if(is_numeric($id)){
                $viewUser = new UserController();
                $user = $viewUser->get_user($user_id);
                echo "
                    <div class='comment' onclick='location.href=`/comment/?id=$id`'>
                        <div class='delete'>
                            <button class='x' id='x' name='delete' value='<?= $diary_id ?>'>
                                <i class='fa-solid fa-trash'></i>
                            </button>
                        </div> 
                        <div class='author'>
                            <a href='/profile/?user=$user_id'>$user</a>
                        </div>
                        <div class='content'>
                            $comment
                        </div
                        <div class='combo'>
                            <div class='time'>
                                less than an hour ago
                            </div>
                        </div>
                    </div>";
            }
        }
    }

    public static function delete_comment($id){
        $id = Validation::validate_text($id);
        if($id){
            Diary::delete_comment($id);
        }
    }

    public static function insert_reply($user_id , $diary_id , $to_comment_id , $comment){
        $user_id = Validation::validate_text($user_id);
        $diary_id  = Validation::validate_text($diary_id);
        $to_comment_id  = Validation::validate_text($to_comment_id);
        $comment  = Validation::validate_text($comment);

        if($user_id && $diary_id && $to_comment_id && $comment){
            $viewUser = new UserController();
            $user = $viewUser->get_user($user_id);
            $id = Diary::insert_reply($user_id , $diary_id , $to_comment_id , $comment);
            if(is_numeric($id)){
                echo "
                <div class='comment position-relative'> 
                    <div class='delete'>
                        <button class='x' id='x' name='delete' value='<?= $diary_id ?>'>
                            <i class='fa-solid fa-trash'></i>
                        </button>
                    </div>
                    <div class='author'>
                        <a href='/profile/?user=$user_id'>$user</a>
                    </div>
                    <div class='content'>
                        $comment
                    </div
                    <div class='combo'>
                        <div class='time'>
                        <button class='reply mb-1 p-1' onclick='location.href=`/diary/show/?id=<?= $id ?>`'><i class='fa-solid fa-reply'></i></button>
                        <button class='me-1 edit'><i class='fas fa-edit'></i></button>
                        less than an hour ago
                        </div>
                    </div>
                </div>";
            }
        }
    }
}