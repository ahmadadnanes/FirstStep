<?php
include_once "./app/classes/user.php";
session_start();
$errors = [];

class UserController extends user
{
    private $username;
    private $email;
    private $password;

    public function __construct($username = null, $email, $password)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }

    function filterSingUp()
    {

        if (filter_var($this->email, FILTER_VALIDATE_EMAIL) && strlen($this->email) !== 0) {
            return true;
        } else {
            $errors['email'] = "Please Fill Email Field";
            return $errors["email"];
        }
    }

    function filterLogIn()
    {
        if (filter_var($this->email, FILTER_VALIDATE_EMAIL) && strlen($this->email) !== 0) {
            return true;
        } else {
            $errors['email'] = "Please Fill Email Field";
            return $errors["email"];
        }
    }

    function signup()
    {
        $username = $this->username;
        $email = $this->email;
        $password = md5($this->password);

        $filter = $this->filterSingUp();

        if (is_bool($filter)) {
            if (user::createUser($username, $email, $password)) {
                header("location:/login");
            } else {
                $errors["used"] = "this email or username is already in use";
                header("location:/signup/?msg=" . $errors["used"]);
            }
        } else {
            header("location:/signup/?msg=$filter");
        }
        exit;
    }

    function login()
    {
        $errors["Wrong"] = "Wrong Email or Password";

        $email = $this->email;
        $pass = $this->password;
        $filter = $this->filterLogIn();

        if (is_bool($filter)) {
            if (user::checkEmail($email)) {
                $result = user::checkPass($email, $pass);
                if ($result) {
                    if (isset($_SERVER["QUERY_STRING"])) {
                        $pre_header = $_SERVER["QUERY_STRING"];
                        header("location: /" . $pre_header);
                    } else {
                        header("location: /");
                    }
                }
            } else {
                header("location:/login/?msg=" . $errors['Wrong']);
            }
        } else {
            header("location:/login/?msg=" . $filter);
        }
    }
}





if ($_SERVER["REQUEST_URI"] == "/signup") {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["submit"])) {
            $user = new UserController(trim($_POST["username"]), $_POST["email"], trim($_POST["password"]));
            $user->signup();
        }
    } else {
        require("./app/resources/views/signup.php");
    }
} else {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["submit"])) {
            $user = new UserController(null, $_POST["email"], trim($_POST["password"]));
            $user->login();
        }
    } else {
        if (isset($_SESSION["id"])) {
            require "./app/resources/views/Home.php";
        } else {
            require "./app/resources/views/login.php";
        }
    }
    exit;
}
