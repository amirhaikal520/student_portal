<?php
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/models/Student.php';

class ProfileController
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

    public function profile(): void
    {
        $studentId = $_SESSION['student_id'];
        $student = $this->studentModel->getById($studentId);

        if (!$student) {
            session_destroy();
            header("Location: index.php?action=login");
            exit();
        }

        include __DIR__ . '/profile.php';
    }

    public function uploadProfilePicture(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['profile_image'])) {
            $studentId = $_SESSION['student_id'];
            $file = $_FILES['profile_image'];

            if ($file['error'] === UPLOAD_ERR_OK) {
                $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
                $allowed = ['jpg', 'jpeg', 'png', 'gif'];

                if (in_array($ext, $allowed)) {
                    $newFileName = 'profile_' . $studentId . '_' . time() . '.' . $ext;
                    $uploadDir = __DIR__ . '/uploads/profile_pictures/';

                    if (!is_dir($uploadDir)) {
                        mkdir($uploadDir, 0777, true);
                    }

                    if (move_uploaded_file($file['tmp_name'], $uploadDir . $newFileName)) {
                        $this->studentModel->updateProfilePicture($studentId, $newFileName);
                        $_SESSION['student']['profile_image'] = $newFileName;
                    }
                }
            }
        }

        header("Location: index.php?action=profile");
        exit();
    }
}