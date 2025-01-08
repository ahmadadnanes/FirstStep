<?php
namespace app\Model;

use app\controller\MailController;
use app\include\csrf;
use app\include\Validation;
use app\Model\Connect;

require 'vendor/autoload.php';
class User extends Connect
{
    public static function all(){
        $db = new Connect;
        $conn = $db->conn();
        $sql = $conn->prepare("SELECT * FROM users");
        $sql->execute();
        $result = $sql->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public static function insert($username, $email, $password, $admin = 0): bool
    {

        $db = new Connect();
        $conn = $db->conn();
        // select email
        $sql_email = $conn->prepare("SELECT email from users where email like ?");
        $sql_email->bind_param('s', $email);
        $sql_email->execute();
        $result_email = $sql_email->get_result();

        // select user
        $sql_user = $conn->prepare("SELECT username from users where username like ?");
        $sql_user->bind_param('s', $username);
        $sql_user->execute();
        $result_user = $sql_user->get_result();
        // check if the user and email already exist
        if ($result_email->num_rows || $result_user->num_rows) {
            return false;
        } else {
            // create new user
            $verification_token = md5(rand());
            $sql2 = $conn->prepare("insert into users(username,email,pass,admin,verification_token) values (?,?,?,?,?)");
            $sql2->bind_param('sssis', $username, $email, $password, $admin , $verification_token);
            $sql2->execute();

            MailController::email_verification($username , $email , $verification_token);
            session_start();
            $_SESSION["status"] = "Your account has been created please verify your account";
            return true;
        }
    }

    public static function get_email($email)
    {
        $db = new Connect();
        $conn = $db->conn();
        // check email
        $sql = $conn->prepare("SELECT email from users where email like ?");
        $sql->bind_param('s', $email);
        $sql->execute();

        return $sql->get_result();
    }

    public static function get_password($email, $pass)
    {
        $db = new Connect();
        $conn = $db->conn();

        // select password
        $sql = $conn->prepare("SELECT pass from users where email like ?");
        $sql->bind_param('s', $email);
        $sql->execute();
        $result = $sql->get_result();
        $row = $result->fetch_assoc();

        // check password
        if ($row['pass'] == md5($pass)) {
            $sql2 = $conn->prepare("SELECT id from users where email like ?");
            $sql2->bind_param('s', $email);
            $sql2->execute();
            $result2 = $sql2->get_result();

            $idRow = $result2->fetch_assoc();
            // die(User::check_user_status($idRow["id"]));

            if(!User::check_user_status($idRow["id"])){
                return false;
            }

            @session_start();
            $_SESSION["id"] = $idRow['id'];
            $id = $_SESSION["id"];
            $_SESSION["user"] = User::get_user($id);

            return $id;
        } else {
            return false;
        }
    }

    public static  function get_user($id)
    {
        $db = new Connect();
        $conn = $db->conn();

        $sql = $conn->prepare("SELECT username from users where id like ?");
        $sql->bind_param('s', $id);
        $sql->execute();

        $result = $sql->get_result();
        $us = $result->fetch_assoc();
        return $us["username"];
    }

    public static function verify_admin($id)
    {
        $db = new Connect();
        $conn = $db->conn();

        $sql = $conn->prepare("SELECT admin from users where id like ?");
        $sql->bind_param('s', $id);
        $sql->execute();

        $result = $sql->get_result();
        $type = $result->fetch_assoc();
        if ($type["admin"]) {
            $_SESSION["admin"] = true;
        }
        return $type["admin"];
    }

    public static function find_by_user($username){
        $db = new Connect;
        $conn = $db->conn();
        $sql = $conn->prepare("SELECT * FROM users WHERE username LIKE ? ");
        $sql->bind_param('s' , $username);
        $sql->execute();
        $result = $sql->get_result();
        
        return $result->fetch_assoc();
    }

    public function delete($id){
        if(csrf::check_form_token()){
            $db = new Connect;
            $conn = $db->conn();
    
            $sql = $conn->prepare('DELETE FROM users WHERE id = ?');
            $sql->bind_param('i' , $id);
            $sql->execute();
            return $sql->get_result();
        }
    }

    public static function insert_remember_token($id){
        if(!isset($_COOKIE["token"])){
            $token = md5(uniqid(mt_rand() , true));
            $db = new Connect;
            $conn = $db->conn();
            $sql = $conn->prepare("INSERT INTO user_tokens(token,expiry,user_id) VALUES (?,?,?)");
            $expired_seconds = time() + 60 * 60 * 24 * 30;
            $expiry = date('Y-m-d H:i:s', $expired_seconds);
            $sql->bind_param('ssi' , $token , $expiry , $id);
            $sql->execute();
            setcookie('token' , $token , strtotime('1 month'));
        }
    }

    public static function check_user_token(){
        if(isset($_COOKIE["token"])){
            $token = Validation::validate_text($_COOKIE["token"]);
            if($token){
                $db = new Connect;
                $conn = $db->conn();
                $sql = $conn->prepare('SELECT user_id FROM user_tokens WHERE token = ? and expiry > NOW()');
                $sql->bind_param('s' , $token);
                $result = $sql->execute();
                if($result){
                    $id = $sql->get_result()->fetch_assoc();
                    return $id['user_id'];
                }else{
                    return false;
                }
            }
        }
    }

    public static function delete_user_token($id){
        $id = Validation::validate_text($id);
        if($id){
            $db = new Connect;
            $conn = $db->conn();
            $sql = $conn->prepare('DELETE FROM user_tokens WHERE user_id = ?');
            $sql->bind_param('i' , $id);
            $sql->execute();
        }
    }

    public static function verify_user($token){
        $db = new connect;
        $conn = $db->conn();
        $sql = $conn->prepare("SELECT id ,verification_token FROM users WHERE verification_token = ?");
        $sql->bind_param('i' , $token);
        $sql->execute();
        $result = $sql->get_result();

        if(!$result->num_rows){
            return false;
        }

        $result = $result->fetch_assoc();

        $verified = 1;
        $id = $result["id"];
        $sql->free_result();
        $sql = $conn->prepare("UPDATE users SET verified = ? WHERE id = ?");
        $sql->bind_param('ii' , $verified , $id);

        return $sql->execute();
    }

    public static function check_user_status($id){
        $db = new connect;
        $conn = $db->conn();
        $sql = $conn->prepare("SELECT verified FROM users WHERE id = ?");
        $sql->bind_param("i" , $id);
        $sql->execute();

        $result = $sql->get_result();

        $result = $result->fetch_assoc();

        if($result["verified"] !== 1) return false;
        
        return $result["verified"];
    }
}
