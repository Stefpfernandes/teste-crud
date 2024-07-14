<?php

namespace App;

use PDOException;

class Connection {
    public static function getDb() {
        try {
            $conn = new \PDO(
                "mysql:host=localhost;dbname=testemvc;charset=utf8",
                "root",
                ""
            );

            return $conn;
        } catch (\PDOException $e) {
            // Tratar o erro //
        }
    }
}
?>