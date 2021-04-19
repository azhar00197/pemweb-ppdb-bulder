<?php
require_once __DIR__ . '/../model/Project.php';
class ProjectController
{
    static function index()
    {
        if (!isset($_SESSION['auth'])) {
            header('Location: login.php');
            exit();
        }
        $projects = Project::getAll();
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
        $project = new Project(null, $_POST['name']);
        $project->save();
    }
}
