<?php
require_once __DIR__ . '/../model/Project.php';
class ProjectController
{
    static function index()
    {
        $projects = Project::getAll();
        include __DIR__ . '/../view/ProjectListView.php';
    }
}
