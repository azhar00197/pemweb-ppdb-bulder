<?php
require __DIR__ . "/../model/User.php";

class AuthController
{
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
        header('Location: projects.php');
    }
}
