<?php
require_once __DIR__ . '/../model/Project.php';
class ProjectController
{
    static function index()
    {
        $projects = Project::getAll();
        include __DIR__ . '/../view/ProjectListView.php';
    }

    static function create()
    {
        include __DIR__ . '/../view/ProjectForm.php';
    }

    static function store()
    {
        if (!isset($_POST["name"]) || $_POST["name"] === "") {
            header('Location: create-project.php');
            exit();
        }
        $project = new Project(null, $_POST['name']);
        $project->save();
    }
}
