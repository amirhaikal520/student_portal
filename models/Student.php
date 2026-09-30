<?php
class Student {
    private PDO $conn;
    private string $table_name = "students";

    public function __construct(PDO $db) {
        $this->conn = $db;
    }

    public function getAll(): array {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY id DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById(int $id): ?array {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ?: null;
    }

    public function getByNoMatrik(string $no_matrik): ?array {
        $query = "SELECT * FROM " . $this->table_name . " WHERE UPPER(no_matrik) = :no_matrik LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $clean_no_matrik = strtoupper(trim($no_matrik));
        $stmt->bindParam(":no_matrik", $clean_no_matrik);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ?: null;
    }

    public function updateProfilePicture(int $id, string $imageName): bool {
        $query = "UPDATE " . $this->table_name . " SET profile_image = :image WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":image", $imageName);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}