<?php
require_once __DIR__ . '/../model/Project.php';
require_once __DIR__ . '/../model/User.php';
class ProjectController
{
    static function index()
    {
        if (!isset($_SESSION['auth'])) {
            header('Location: login.php');
            exit();
        }
        $user = User::findByUsername($_SESSION['auth']);
        if ($user === null) {
            header('Location: logout.php');
            exit();
        }
        $projects = Project::getAll($user->id);
        include __DIR__ . '/../view/ProjectListView.php';
    }

    static function create()
    {
        if (!isset($_SESSION['auth'])) {
            header('Location: login.php');
            exit();
        }
        include __DIR__ . '/../view/ProjectForm.php';
    }

    static function store()
    {
        if (!isset($_SESSION['auth'])) {
            header('Location: login.php');
            exit();
        }
        if (!isset($_POST["name"]) || $_POST["name"] === "") {
            header('Location: create-project.php');
            exit();
        }
        $user = User::findByUsername($_SESSION['auth']);
        if ($user === null) {
            header('Location: logout.php');
            exit();
        }
        $project = new Project(null, $user->id, $_POST['name']);
        $project->save();
        header('Location: projects.php');
    }

    static function get()
    {
        if (!isset($_SESSION['auth'])) {
            header('Location: login.php');
            exit();
        }
        if (!isset($_GET["project"]) || $_GET["project"] === "") {
            header('Location: projects.php');
            exit();
        }

        include __DIR__ . "/../view/dashboard/Informasi.php";
    }
}
