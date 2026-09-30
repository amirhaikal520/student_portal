<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/Student.php';

class StudentController
{
    private Student $studentModel;

    public function __construct()
    {
        $database = new Database();
        $db = $database->getConnection();
        $this->studentModel = new Student($db);
    }

    public function index(): void
    {
        $students = $this->studentModel->getAll();
        include __DIR__ . '/../views/Students/index.php';
    }
}