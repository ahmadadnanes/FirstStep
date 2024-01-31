<?php
@session_start();
include_once "./app/Model/user.php";
$errors = [];

class UserController extends user
{
    private $username;
    private $email;
    private $password;

    public function __construct($username = null, $email = null, $password = null)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }

    public function filterSingUp()
    {
        if (filter_var($this->email, FILTER_VALIDATE_EMAIL) && strlen($this->email) !== 0) {
            return true;
        } else {
            $errors['email'] = "Please Fill Email Field";
            return $errors["email"];
        }
    }

    public function filterLogIn()
    {
        if (filter_var($this->email, FILTER_VALIDATE_EMAIL) && strlen($this->email) !== 0) {
            return true;
        } else {
            $errors['email'] = "Please Fill Email Field";
            return $errors["email"];
        }
    }

    public function signup()
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

    public function login()
    {
        $errors["Wrong"] = "Wrong Email or Password";
        $email = $this->email;
        $pass = $this->password;
        $filter = $this->filterLogIn();

        if (is_bool($filter)) {
            if (user::checkEmail($email)) {
                $result = user::checkPass($email, $pass);
                if ($result) {
                    if (isset($_POST["remember"])) {
                        if ((!isset($_COOKIE["email"]) && !isset($_COOKIE["password"]))) {
                            setcookie("email", $_POST["email"], time() + strtotime("1 month"));
                            setcookie("password", $_POST["password"], time() + strtotime("1 month"));
                        }
                    }
                    if (isset($_SERVER["QUERY_STRING"]) && !isset($_GET["msg"])) {
                        $pre_header = $_SERVER["QUERY_STRING"];
                        header("location: /" . $pre_header);
                    } else {
                        if (user::UserType($_SESSION["id"])) {
                            header("location: /admin");
                        } else {
                            require("./app/resources/views/Home.php");
                        }
                    }
                } else {
                    header("location:/login/?msg=" . $errors['Wrong']);
                }
            } else {
                header("location:/login/?msg=" . $errors['Wrong']);
            }
        } else {
            header("location:/login/?msg=" . $filter);
        }
    }

    public static function get($id)
    {
        return user::getUser($id);
    }
}



$server = explode('/', $_SERVER["REQUEST_URI"])[1];

if ($server == "signup") {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["submit"])) {
            $user = new UserController(trim($_POST["username"]), $_POST["email"], trim($_POST["password"]));
            $user->signup();
        }
    } else {
        require("./app/resources/views/auth.php");
    }
} else if ($server == "login") {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["submit"])) {
            $user = new UserController(null, $_POST["email"], trim($_POST["password"]));
            $user->login();
        }
    } else {
        if (isset($_SESSION["id"])) {
            if (user::UserType($_SESSION["id"])) {
                header("location: /admin");
            } else {
                require "./app/resources/views/Home.php";
            }
        } else {
            require "./app/resources/views/auth.php";
        }
    }
    exit;
} else if ($server == "" || $server == "index.php") {
    if (isset($_COOKIE["email"]) && isset($_COOKIE["password"])) {
        $user = new UserController(null, $_COOKIE["email"], trim($_COOKIE["password"]));
        $user->login();
    } else {
        require('./app/resources/views/Home.php');
    }
}
