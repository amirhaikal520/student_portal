<?php
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/models/Student.php';

class LoginController
{
    private Student $studentModel;

    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $database = new Database();
        $db = $database->getConnection();
        $this->studentModel = new Student($db);
    }

    public function login(): void
    {
        if (isset($_SESSION['student_id'])) {
            header("Location: index.php?action=profile");
            exit();
        }

        $error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $no_matrik = strtoupper(trim($_POST['no_matrik'] ?? ''));
            $password  = trim($_POST['password'] ?? '');

            $student = $this->studentModel->getByNoMatrik($no_matrik);

            if ($student) {
                $dbPassword = trim($student['password'] ?? '');

                if (empty($dbPassword) || $password === $dbPassword || password_verify($password, $dbPassword)) {
                    $_SESSION['student_id']   = $student['id'];
                    $_SESSION['student_name'] = $student['name'];
                    $_SESSION['student']      = $student;

                    header("Location: index.php?action=profile");
                    exit();
                } else {
                    $error = "Kata laluan tidak sah.";
                }
            } else {
                $error = "No Matrik tidak dijumpai.";
            }
        }

        include __DIR__ . '/login.php';
    }

    public function logout(): void
    {
        session_destroy();
        header("Location: index.php?action=login");
        exit();
    }
}