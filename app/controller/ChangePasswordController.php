<?php
namespace app\controller;
use app\Model\Admin;
use app\controller\UserController;

@session_start();
require 'vendor/autoload.php';

class ChangePasswordController extends Admin{
    public static function show(){
        if(UserController::guest()){
            header('location: /login');
            exit;
        }

        if(!UserController::verify_admin($_SESSION["id"])){
            header('location: /');
            exit;
        }

        require('./resources/views/admin/changePassword.php');
    }
    public static function edit($id,$old,$new){
        if (Admin::checkPass($id, $old)) {
            Admin::changePass($id, $new);
            return true;
        } else {
            header('location: /admin/changePassword/?msg="Old Password is Wrong Please Try Again"');
        }  
    }
}