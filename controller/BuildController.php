<?php
require_once __DIR__ . '/../model/Project.php';
class BuildController
{
    static function index()
    {
        include __DIR__ . '/../view/dashboard/Build.php';
    }
}
