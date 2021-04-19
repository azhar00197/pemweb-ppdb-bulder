<?php
session_start();
require_once __DIR__ . "/controller/AuthController.php";
AuthController::login();
