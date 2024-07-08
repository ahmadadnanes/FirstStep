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
        $user = UserController::get_user($comment['user_id']);
        $nav = [];
        require "./resources/views/comment/index.php";
    }

    public static function insert_comment($user_id, $diary_id, $comment , $parent_id = null){
        $user_id = Validation::validate_text($user_id);
        $diary_id = Validation::validate_text($diary_id);
        $comment = Validation::validate_text($comment);
        if($parent_id == "") {$parent_id = null;};
        if($user_id && $diary_id && $comment ){
            $id = Diary::insert_comment($user_id , $diary_id , $comment , $parent_id);
            if(is_numeric($id)){
                $viewUser = new UserController();
                $user = $viewUser->get_user($user_id);
                echo "
                    <div class='comment'>
                        <div class='delete'>
                            <button class='xComment' id='x' name='delete' value='$id'>
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
                            <button class='reply' onclick='location.href=`/comment/?id=$id`'><i class='fas fa-comment'></i></button>
                                <button class='me-1 edit' onclick='location.href=`/comment/edit/?id=$id`'><i class='fas fa-edit'></i></button>
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
            if(!UserController::guest()){
                Diary::delete_comment($id);
            }
        }
    }

    public static function edit_comment($id , $comment){
        $id = Validation::validate_text($id);
        $comment = Validation::validate_text($comment);

        if(!($id && $comment)){
            header('location: /comment/edit/?id=' . $id);
            exit;
        }
        
        if(Diary::edit_comment($id , $comment)){
            header('location: /comment/?id=' . $id);
            exit;     
        }else{
            header('location: /comment/?id=' . $id . '&' . 'msg=Error Updating Your diary please contact us');
            exit;
        }
    }
}