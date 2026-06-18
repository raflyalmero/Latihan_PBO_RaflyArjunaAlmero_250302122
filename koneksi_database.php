<?php
// koneksi/database.php

class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $db_name = "DB_SIMULASI_PBO_KELAS_NamaLengkap"; // Sesuaikan NamaLengkap Anda
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name,
                $this->username,
                $this->password
            );
            // Set error mode ke exception untuk handling error yang baik
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            echo "Koneksi database gagal: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
?>