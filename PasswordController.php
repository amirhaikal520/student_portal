<?php
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/models/Student.php';

class PasswordController
{
    private Student $studentModel;

    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['student_id'])) {
            header("Location: index.php?action=login");
            exit();
        }

        $database = new Database();
        $db = $database->getConnection();
        $this->studentModel = new Student($db);
    }

    public function changePassword(): void
    {
        $message = '';
        $messageType = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $oldPassword     = $_POST['old_password'] ?? '';
            $newPassword     = $_POST['new_password'] ?? '';
            $confirmPassword = $_POST['confirm_password'] ?? '';

            $studentId = $_SESSION['student_id'];
            $student   = $this->studentModel->getById($studentId);

            if (!$student || !password_verify($oldPassword, $student['password'] ?? '')) {
                $message = "Old password is incorrect.";
                $messageType = "danger";
            } elseif ($newPassword !== $confirmPassword) {
                $message = "New password and confirm password do not match.";
                $messageType = "danger";
            } elseif (strlen($newPassword) < 6) {
                $message = "New password must be at least 6 characters.";
                $messageType = "danger";
            } else {
                $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

                if ($this->studentModel->updatePassword($studentId, $hashedPassword)) {
                    $message = "Password updated successfully.";
                    $messageType = "success";
                } else {
                    $message = "Failed to update password.";
                    $messageType = "danger";
                }
            }
        }

        require_once __DIR__ . '/change_password.php';
    }
}