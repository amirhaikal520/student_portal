<?php
session_start();

require_once __DIR__ . '/LoginController.php';
require_once __DIR__ . '/ProfileController.php';
require_once __DIR__ . '/PasswordController.php';
require_once __DIR__ . '/controllers/StudentController.php';

$action = $_GET['action'] ?? 'login';

switch ($action) {
    case 'login':
        $controller = new LoginController();
        $controller->login();
        break;

    case 'logout':
        $controller = new LoginController();
        $controller->logout();
        break;

    case 'profile':
        $controller = new ProfileController();
        $controller->profile();
        break;

    case 'upload_profile':
        $controller = new ProfileController();
        $controller->uploadProfilePicture();
        break;

    case 'change_password':
        $controller = new PasswordController();
        $controller->changePassword();
        break;

    default:
        $controller = new StudentController();
        $controller->index();
        break;
}