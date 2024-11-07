<?php
//Model/User.php

require_once './config/config.php';

class User {
    private $conn;
    public $id, $nama, $alamat;
    private $table_name = "user";


    public function __construct($db) {
        $this->conn = $db;
    }


    function read()
    {
        $query = "SELECT*FROM " . $this->table_name;

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    function getLength() {
        $query = "SELECT COUNT(*) AS total FROM " . $this->table_name;

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC)["total"];
    }


    function hasId($id) {
        $query = "SELECT* FROM " . $this->table_name . " WHERE ID=:id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        if ($stmt->rowCount() > 0) return true;
        else return false;
    }

        public function hasUsername($username) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE username = :username LIMIT 1";
        //memepersiapkan statement untuk query di atas
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt->execute();

        // Jika ada data user yang sesuai dengan username yang di input
        if($stmt->rowCount() > 0) return true;
        return false;
    }


    // Create
    function create($nama, $alamat) {
        $query = "INSERT INTO " . $this->table_name . " (nama, alamat) VALUES(:nama, :alamat)";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nama", $nama);
        $stmt->bindParam(":alamat", $alamat);
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
    function edit() {
        $query = "UPDATE " . $this->table_name . " SET nama=:nama, alamat=:alamat WHERE id=:id";

        $stmt = $this->conn->prepare($query);

        $this->nama = htmlspecialchars(strip_tags($this->nama));
        $this->alamat = htmlspecialchars(strip_tags($this->alamat));
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":nama", $this->nama);
        $stmt->bindParam(":alamat", $this->alamat);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }




    function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id=:id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id", $this->id);
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }


}