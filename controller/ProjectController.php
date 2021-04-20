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
        $user = User::findByUsername($_SESSION['auth']);
        if ($user === null) {
            header('Location: logout.php');
            exit();
        }
        $project = Project::getById($user->id, $_GET["project"]);
        if ($project === null) {
            header('Location: projects.php');
            exit();
        }
        include __DIR__ . "/../view/dashboard/Informasi.php";
    }

    static function update()
    {
        if (!isset($_SESSION['auth'])) {
            header('Location: login.php');
            exit();
        }
        if (
            !isset($_POST["id"]) || $_POST["id"] === "" ||
            !isset($_POST["name"]) || $_POST["name"] === "" ||
            !isset($_POST["description"]) || $_POST["description"] === "" ||
            !isset($_POST["color"]) || $_POST["color"] === ""
        ) {
            header('Location: informasi.php');
            exit();
        }
        $user = User::findByUsername($_SESSION['auth']);
        if ($user === null) {
            header('Location: logout.php');
            exit();
        }
        $project = Project::getById($user->id, $_POST["id"]);
        if ($project === null) {
            header('Location: projects.php');
            exit();
        }
        $project->name = $_POST['name'];
        $project->description = $_POST['description'];
        $project->color = $_POST['color'];
        $project->save();
        header('Location: informasi.php?project=' . $_POST["id"]);
    }
}
