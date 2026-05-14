<?php
class Database {
    private $dbh;
    private $stmt;

    public function __construct() {
        try {
            $this->dbh = new PDO(
                'mysql:host=localhost;dbname=senai_asistencia',
                'root',
                ''
            );
        } catch (PDOException $e) {
            die("Error BD: " . $e->getMessage());
        }
    }

    public function query($sql) {
        $this->stmt = $this->dbh->prepare($sql);
    }

    public function execute() {
        return $this->stmt->execute();
    }

    public function resultSet() {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }
}