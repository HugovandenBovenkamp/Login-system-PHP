<?php
session_start();

require_once "controllers/LoginController.php";
require_once "controllers/RegisterController.php";
require_once 'models/db.php';
require_once 'functions.php';

// Checks GET request and sends user to login if empty
if (!isset($_GET['action'])) { $_GET['action'] = 'login'; }

$loginController = new LoginController();
$registerController = new RegisterController();


// Handles the routing and checks if the HTTP method is post, then checks the action get method and adds necessary controller
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if ($_GET['action'] == "login") {
        $loginController->login();
    }
    if ($_GET['action'] == "register") {
        $registerController->register();
    }
}
require_once "views/base.php";