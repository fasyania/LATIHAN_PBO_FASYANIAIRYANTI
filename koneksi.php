<?php
// File: koneksi/database.php

class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $db_name = "db_simulasi_pbo_ti1d_fasyaniairyanti"; // Sesuai dengan nama database di screenshot
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            // Menggunakan PDO untuk menangani koneksi database relasional
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name, 
                $this->username, 
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch(PDOException $exception) {
            echo "Koneksi database gagal: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
?>