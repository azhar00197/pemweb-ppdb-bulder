<?php
require __DIR__ . "/../model/User.php";

class AuthController
{
    static public function login()
    {
        include __DIR__ . "/../view/auth/Login.php";
    }

    static public function submitLogin()
    {
        if (
            !isset($_POST["username"]) || $_POST["username"] === "" ||
            !isset($_POST["password"]) || $_POST["password"] === ""
        ) {
            header('Location: register.php');
            exit();
        }

        $user = User::findByUsername($_POST["username"]);
        if ($user == null) {
            echo 'Username atau password salah';
            exit();
        }
        if (!password_verify($_POST["password"], $user->password)) {
            echo 'Username atau password salah';
            exit();
        } else {
            $_SESSION['auth'] = $user->username;
            $_SESSION['auth_name'] = $user->name;
            header('Location: projects.php');
        }
    }

    static public function register()
    {
        include __DIR__ . "/../view/auth/Register.php";
    }

    static public function submitRegister()
    {
        if (
            !isset($_POST["username"]) || $_POST["username"] === "" ||
            !isset($_POST["name"]) || $_POST["name"] === "" ||
            !isset($_POST["password"]) || $_POST["password"] === ""
        ) {
            header('Location: register.php');
            exit();
        }

        $user = new User(null, $_POST["username"], $_POST["name"], $_POST["password"]);
        $user->save();
        $_SESSION['auth'] = $user->username;
        $_SESSION['auth_name'] = $user->name;
        header('Location: projects.php');
    }
}
